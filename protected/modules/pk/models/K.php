<?php

class K extends CActiveRecord
{
	public function nongli() {
		$lunar = new Lunar();
		$current_data = date('Y-n-j',strtotime('now'));
		$ymd_arr = explode('-',$current_data);
		$ldate=$lunar->convertSolarToLunar($ymd_arr[0],$ymd_arr[1],$ymd_arr[2]);

		return $ldate[1].$ldate[2];
	}

	/**
	 * A wrapper for print_r()
	 */
	function printR($arr) {
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}
}
