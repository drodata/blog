<div id="essay-info-bar">
	<div class="pull-left">
		<?php
		echo CHtml::link($data->essay->category->name, Yii::app()->request->baseUrl.'/essay/category/'.$data->essay->category->name);
		if ($link = Essay::getLabelLinks($data->essay->id)) {
			echo ', Labels: '.$link;
		}
		?>
		Created: <?php echo date('Y/n/j',strtotime($data->essay->c_time)); ?>
		, Updated: <?php echo date('Y/n/j',strtotime($data->essay->m_time)); ?>
	</div>
	<div class="pull-right">
		<?php echo CHtml::link('Create', Yii::app()->request->baseUrl.'/essay/create',array(
			'accesskey'=>'n',
			'class' => 'EssayCU hide',
			'data-action' => 'create',
		)); ?>
		<?php 
		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'success', 
			'label'=>'Quick Update',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'EssayCU',
				'data-action' => 'update',
				'data-id' => $data->essay->id,
				'accesskey' => 'q',
			),
		));
		echo '&nbsp;&nbsp;';
		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'primary', 
			'label'=>'Update',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'EditContent',
				'data-id' => $data->essay->id,
				'accesskey' => 'u',
			),
		));
		echo '&nbsp;&nbsp;';

		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'info', 
			'label'=>'Save',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'UpdateContent',
				'data-id' => $data->essay->id,
				'accesskey' => 's',
			),
		));
		echo '&nbsp;&nbsp;';

		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'danger', 
			'label'=>'Delete',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'EssayDelete',
				'data-id' => $data->essay->id,
			),
		));
		?> 
	</div>
</div>
<div class="essay">
	<h4 class="center">
		<?php echo CHtml::link(CHtml::encode($data->essay->title), '/blog/essay/view/'.$data->essay->id); ?>
	</h4>
	<div id="content">
		<?php
			$Parsedown = new Parsedown();
			echo $Parsedown->text(str_replace($keyword,'<span style="background:yellow;">'.$keyword.'</span>',$data->essay->content));
		?>
	<?php
	// Show andro's media data
	$dirstr = Yii::app()->params['androMediaBaseDir'].'/photo/'.date('Y/m',strtotime($data->essay->c_time));
	if (is_dir($dirstr)) {
		if ($data->essay->category->id == '19' and $fileLists = scandir( $dirstr )) {
			foreach ($fileLists as $name) {
				$info = explode('.',$name);
				if (sizeof($info) == 3 and $info[0] == date('Ymd',strtotime($data->essay->c_time)) ) {
					echo '<img src="/media/andro/photo/'.date('Y/m/',strtotime($data->essay->c_time)).$name.'" title="'.$info[1].'" />'."\n";
				}
			}
		}
	}
	?>
	</div>

</div>


<script>
$(document).ready(function(){
	// Add Bootstrap style of table
	$('.essay #content table').addClass('table');
	// Delete
	$(document).off('click','.EssayDelete').on('click','.EssayDelete',function(event){
		event.preventDefault();
		var active_element = $(this);
		var msg = '<p>确定删除此文？</p>';
		msg += '<center id="qtip-actions">'
			+ '<button class="btn btn-danger btn-xs">删除</button>'
			+ '&nbsp;&nbsp;'
			+ '<button class="btn btn-default btn-xs">取消</button>'
			+ '</center';
		$.qtip_hint({
			element: active_element,
			message: msg,
			ready_show:true,
			position:6,
			hide:{event:'unfocus'},
		});
		$('#qtip-actions .btn-danger').live('click', function(event) {
			event.preventDefault();
			$.ajax({ 
			 	type: 'POST' 
				,url: '/blog/essay/ajaxDelete'
				,dateType: 'json'
				,data: { id : active_element.data('id') }
			}).done(function( d ) {
				window.location = '/blog/essay/';
			});
		});
		$('#qtip-actions .btn-default').live('click', function(event) {
			event.preventDefault();
			active_element.qtip('destroy');
		});

	});

	// Just edit essay's content

	$(document).off('click','.EditContent').on('click','.EditContent',function(event){
		event.preventDefault();
		var active_element = $(this);
		$.ajax({ 
		 	type: 'POST' 
			,url: '/blog/essay/ajaxEditContent'
			,dateType: 'json'
			,data: { id : $(this).data('id') }
			//,beforeSend:loading
		}).done(function( d ) {
			$.qtip_hint({
				element: active_element,
				message: d.message,
				ready_show:true,
				position:d.position,
				style: d.style,
				hide:{event:'unfocus'},
			});
		}).fail( ajax_fail_handler);
		return false;
	});

	// Save essay's content
	$(document).off('click','.UpdateContent').on('click','.UpdateContent',function(event){
		event.preventDefault();
		var active_element = $(this);
		var id = $(this).data('id');
		$.ajax({ 
		 	type: 'POST' 
			,url: '/blog/essay/ajaxUpdateContent'
			,dateType: 'json'
			,data: { id : id }
		}).done(function( d ) {
			$.qtip_hint({
				element: active_element,
				message: d.message,
				ready_show:true,
				hide:{event:'unfocus'},
				position:1,
				style: d.style,
			});
			renderEssayContent(id);
		}).fail( ajax_fail_handler);
		return false;
	});

	// Save an essay, or edit other attributes but content of an existing essay
	$(document).off('click','.EssayCU').on('click','.EssayCU',function(e){
		e.preventDefault();
		var wd = $("#essay-cu-dialog");
		var wf = $("#essay-cu-form");
		var fe = wf.afGet('FormEssay');
		var trigger = wf.find('input[name=submit]');

		// reset dialog window
		fe.title.feValue('');
		fe.label.feValue('');

		// invoke label autocomplete
		ivk_essay_label_autocomplete();

		fe.action.feValue($(this).data('action'));
		if ($(this).data('id'))
			fe.id.feValue($(this).data('id'));

		// popute data in update mode
		if ($(this).data('action') === 'update') {
			$.ajax({ 
			 	type: "POST" 
				,url: "/blog/essay/ajaxGetData" 
				,dateType: "json"
				,data: {id: $(this).data('id')}
			}).done(function( d ) {
				for ( var item in d.items) {
					fe[item].feValue( d.items[ item ] );
				}
				wd.find('[type=submit]').html('Save Changes');
				wd.dialog('option','title','Quick Edit');

			});
		}
			
		wd.dialog('open');
		wf.unbind('submit');
		wf.submit(function(e){
			e.preventDefault();
			var serializedData = wf.serialize();
			trigger.attr('disabled','disabled');
			$.post('/blog/essay/ajaxCU', serializedData, function(response) {
				if (response.status) {
					wd.dialog("close");
					renderEssayContent(response.id);

				} else {
					for( var ele in response.errors) {
						var form_group = fe[ele].parents('.form-group').first();
						var warning_feedback = $('<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
						form_group.addClass("has-error has-feedback");
						warning_feedback.appendTo(form_group);
						var ff = fe[ele].parents('.col-sm-10').first();
						if (ff.find('span.help-inline'))
							ff.find('span.help-inline').remove();
						$('<span class="help-inline error">' + response.errors[ele] + '</span>').appendTo(ff);
						
					}
					trigger.removeAttr('disabled');
				}
			}).fail([ajax_fail_handler, function(){
				trigger.prop('disabled',false);
			}]).always(function(){
			});
		});
	});
});
</script>
