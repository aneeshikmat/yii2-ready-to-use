<?php
/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 4/28/20
 * Time: 11:21 PM
 */

namespace console\controllers;


use common\models\User;
use common\models\UserType;

class UserController extends Controller
{

    public function actionCreate($first_name, $last_name, $email, $password, $user_type_id = UserType::SUPER_ADMIN)
    {
        $user = new User();
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->setPassword($password);
        $user->user_type_id = $user_type_id;
        $user->save();
    }
}