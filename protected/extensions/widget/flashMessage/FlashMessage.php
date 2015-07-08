<?php
class FlashMessage extends CWidget
{
	public function init()
	{
		$flashes = Yii::app()->user->flashes;
		if (sizeof($flashes) > 0)
		{
			$opt = '';
			foreach ($flashes as $class=>$msg)
			{
				$opt .= '<div class="flash-msg bg-'.$class.'">'.$msg.'</div>';
			}
			echo $opt;
			Yii::app()->clientScript->registerScript(
				'flash-msg-animation',
				'$(".flash-msg").css({
					"position":"fixed",
					"top":"5px",
					"left":"40%",
					"right":"40%",
					"z-index":"1100",
					"text-align":"center",
					"padding":"3px"
				}).animate({opacity: 1.0}, 5000).fadeOut("slow");',
				CClientScript::POS_READY
			);
		}
	}

	public function run()
	{
	}

}
?>
