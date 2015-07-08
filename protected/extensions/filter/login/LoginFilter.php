<?php
class LoginFilter extends CFilter
{
	protected function preFilter($filterChain)
	{
		if (Yii::app()->user->id)
			$filterChain->run();
		else
		{
			Yii::app()->user->loginRequired();
			return false;
		}
	}
}
?>
