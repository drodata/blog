/**
 * supplier
 *
 * @author Trekshot <chnkui@gmail.com>
 * @create 2012-12-13
 * @link http://www.drodata.com/
 */
$(document).ready(function(){

	// Create supplier
	$('#companyBankTypeD').hide();
	$('#typeD').find('input[type=radio]').change(function(){
		if ($(this).val()=='company') {
			$('#companyBankTypeD').slideDown();
		} else {
			$('#companyBankTypeD').slideUp();
		}
	});
});
