<?php

namespace frontend\models;

use common\models\UserType;
use Yii;
use yii\base\Model;
use common\models\User as MainUser;
use yii\helpers\ArrayHelper;

/**
 * Signup form
 */
class SignupForm extends MainUser
{


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['user_type_id'], 'in', 'range' => [UserType::USER]],
            [['is_active'], 'default', 'value' => SignupForm::STATUS_ACTIVE],
            [['password', 'confirm_password'], 'required'],

        ]);
    }

    /**
     * Signs user up.
     *
     * @return SignupForm|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        if (!$this->save()) {
            return null;
        }

        //@TODO send welcome email or password !!

        if(!empty($this->email)) {
            Yii::$app
                ->mailer
                ->compose(
                    ['html' => 'templates/signUp'],
                    ['user' => $this]
                )
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                ->setTo($this->email)
                ->setSubject(Yii::t('app', 'Welcome in {name}', [
                      "name" => Yii::$app->name
                    ]))
                ->send();
        }

        return $this;
    }
}
