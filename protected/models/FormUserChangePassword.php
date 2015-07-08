<?php
class FormUserChangePassword extends CFormModel
{
	public $oldPassword;
	public $newPassword;
	public $newPasswordReinput;


	public function rules()
	{
		return array(
			array('oldPassword, newPassword, newPasswordReinput', 'required'),
			array( 'oldPassword', 'authOldPassword'),
			array( 'newPasswordReinput', 'compare', 'compareAttribute' => 'newPassword'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'oldPassword'		=> '原密码',
			'newPassword'		=> '新密码',
			'newPasswordReinput'	=> '再次输入新密码',
		);
	}

	public function authOldPassword($attribute,$params)
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
		if (!$user->validatePassword($this->oldPassword))
			$this->addError('oldPassword','密码输入错误');
	}
}
