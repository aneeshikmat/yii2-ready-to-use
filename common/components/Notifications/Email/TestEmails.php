<?php

namespace common\components\Notifications\Email;


use common\components\helpers\LanguageHelpers;
use common\models\Staff;
use common\models\UserType;
use Yii;
use common\models\User;

class TestEmails extends MailMessage{

    public function __construct(){
        $this->setFrom(Yii::$app->params['supportEmail']);
	    parent::__construct();
    }


	public function sendResetPassword(User $user,$password){

		$this->setLanguage(Yii::$app->language);
		$this->setSubject(Yii::t('email','new password'));
		$this->setTo($user->email);
		$view =  '@common/mail/templates/passwordResetToken';
		$this->setHtmlBody(Yii::$app->controller->renderPartial($view,['user'=>$user,'password'=>$password]) );
		$this->send();
	}


}