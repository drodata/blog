<?php
class PostRequestCheckFilter extends CFilter
{
	protected function preFilter($filterChain)
	{
		if (Yii::app()->request->isPostRequest)
			$filterChain->run();
		else
		{
			throw new CHttpException(400, "Invalid request.");
			return false;
		}
	}
}
?>
