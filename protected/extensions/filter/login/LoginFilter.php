<?php
class LoginFilter extends CFilter
{
	protected function preFilter($filterChain)
	{
		if (Yii::app()->user->id)
			$filterChain->run();
		else
		{
			Yii::app()->request->redirect(Yii::app()->baseUrl.'/site/login');
			return false;
		}
	}
}
?>
