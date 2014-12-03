/**
 * JS when update a customer's main address
 *
 * @author Trekshot <chnkui@gmail.com>
 * @create 2012-10-12
 * @link http://www.dbflow.net/
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
	if ($('#addressType').val()=='common')
		$('.companyD').hide();
		
		
	if ($('#typeRow').find('input[type=radio]:checked').val() == 'mainland'){
		$('#countryD').find('option[value=47]').attr('selected','selected');
		$('#countryD').slideUp();
		$('#provCityAb').slideUp();
		$('#provCityMl').slideDown();

		var activeProvince = $('#CustomerForm_province_ml option:selected').val();
		if ( activeProvince=='北京市' || activeProvince=='上海市' || activeProvince=='天津市'|| activeProvince=='重庆市') {
			$('#CustomerForm_city_ml').parent().hide();
		}

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
	}else {
		$('#CustomerForm_province_ml').find('option[value=北京市]').attr('selected','selected');

		$('#countryD').slideDown();
		$('#provCityAb').slideDown();
		$('#provCityMl').slideUp();
	}

	$('#typeRow').find('input[type=radio]').change(function(){
		if ($(this).val()=='mainland') {
			$('#countryD').find('option[value=47]').attr('selected','selected');
			$('#countryD').slideUp();
			$('#CustomerForm_province_ml').find('option[value=北京市]').removeAttr('selected');
			$('#CustomerForm_province_ml').find('option:first').attr('selected','selected');
			$('#provCityAb').slideUp();
			$('#provCityMl').slideDown();
			add_province_city_evt();
		}else {
			$('#countryD').find('option[value=47]').removeAttr('selected');
			$('#countryD').find('option:first').attr('selected','selected');
			$('#countryD').slideDown();
			$('#CustomerForm_province_ml').find('option[value=北京市]').attr('selected','selected');
			$('#provCityAb').slideDown();
			$('#provCityMl').slideUp();
		}
	});


});
