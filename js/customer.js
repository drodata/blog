/**
 * Customer create action
 *
 * @author Trekshot <chnkui@gmail.com>
 * @create 2012-09-26
 * @link http://www.dbflow.net/
 */
$(document).ready(function(){
	function add_province_city_evt() {
		$('#CustomerForm_city').attr('disabled','disabled');
		$('#CustomerForm_city').parent().hide();
		$('#CustomerForm_country_id').find('option[value=47]').attr('selected','selected');
		$('#CustomerForm_country_id').parent().hide();
		$('#CustomerForm_province_cn').change(function(){
			var cv = $(this).val();
			if (cv!=''&&cv!='北京市'&&cv!='上海市'&&cv!='天津市'&&cv!='重庆市'){
				$('#CustomerForm_city').removeAttr('disabled');
				$('#CustomerForm_city').parent().slideDown();
			} else {
				$('#CustomerForm_city').attr('disabled','disabled');
				$('#CustomerForm_city').parent().slideUp();
			}
		});
	}
	add_province_city_evt();
	$('#CustomerForm_full_name').focus();
	$('#typeRow').find('input[value=mainland]').attr('checked','checked');
	var pb = $('#provCityD').clone().html();
	var cc = $('#placeBox').clone().html();

	$('#typeRow').find('input[type=radio]').change(function(){
		if ($(this).val()=='mainland') {
			$('#provCityD').empty();
			$('#provCityD').html(pb);
			$('#placeBox').html(cc);
			add_province_city_evt();

			$('#CustomerForm_country_id').find('option[value=47]').attr('selected','selected');
			$('#CustomerForm_country_id').parent().hide();
		}else {
			$('#provCityD').empty();
			$('#provCityD').html(cc);
			//!$('#placeBox').html().appendTo($('provCityD'));
			$('#placeBox').html(pb);

			$('#CustomerForm_country_id').find('option[value=47]').removeAttr('selected');
			$('#CustomerForm_country_id').find('option:first').attr('selected','selected');
			$('#CustomerForm_country_id').parent().show();
		}
	});

});
