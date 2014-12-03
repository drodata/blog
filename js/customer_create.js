/**
 * Customer create action
 *
 * @author Trekshot <chnkui@gmail.com>
 * @create 2012-09-26
 * @link http://www.drodata.com/
 */
$(document).ready(function(){
	function add_province_city_evt() {
		$('#CustomerForm_city_ml').attr('disabled','disabled');
		$('#CustomerForm_city_ml').parent().hide();
		$('#CustomerForm_country_id').find('option[value=47]').attr('selected','selected');
		$('#CustomerForm_country_id').parent().hide();
		$('#CustomerForm_province_ml').change(function(){
			var cv = $(this).val();
			if (cv!=''&&cv!='北京市'&&cv!='上海市'&&cv!='天津市'&&cv!='重庆市'){
				$('#CustomerForm_city_ml').removeAttr('disabled');
				$('#CustomerForm_city_ml').parent().slideDown();
			} else {
				$('#CustomerForm_city_ml').attr('disabled','disabled');
				$('#CustomerForm_city_ml').parent().slideUp();
			}
		});
	}
	add_province_city_evt();
	if ($('#addressType').val()=='common') {
		$('#CustomerForm_full_name').val('mask');
		$('#CustomerForm_short_name').val('mask');
		$('.companyD').hide();
	}
	$('#CustomerForm_full_name').focus();
	$('#typeRow').find('input[value=mainland]').attr('checked','checked');
	$('#provCityAb').hide();

	$('#typeRow').find('input[type=radio]').change(function(){
		if ($(this).val()=='mainland') {
			$('#countryD').find('option[value=47]').attr('selected','selected');
			$('#countryD').slideUp();
			$('#provCityAb').slideUp();
			$('#provCityMl').slideDown();
			add_province_city_evt();

			$('#CustomerForm_country_id').parent().hide();
		}else {
			// 存储一个假值，确保通过非空验证
			$('#CustomerForm_province_ml').find('option[value=北京市]').attr('selected','selected');
			$('#CustomerForm_country_id').find('option[value=47]').removeAttr('selected');
			$('#CustomerForm_country_id').find('option:first').attr('selected','selected');

			$('#countryD').slideDown();
			$('#provCityAb').slideDown();
			$('#provCityMl').slideUp();

		}
	});

});
