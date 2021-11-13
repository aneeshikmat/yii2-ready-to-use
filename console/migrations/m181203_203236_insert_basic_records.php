<?php

use common\migration\Migration;

/**
 * Class m181127_203236_insert_basic_records
 */
class m181203_203236_insert_basic_records extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('user_type', ['name','is_active'], [
            ['Super Admin',1],
            ['Admin',1],
            ['User',1],
        ]);
        $user = new \common\models\User();
        $user->first_name = 'Super';
        $user->last_name = 'Admin';
        $user->email = 'superadmin@yiieasyouse.com';
        $user->gender = \common\models\User::GENDER_MALE;
        $user->dob = '1995-09-16';
        $user->country_id = \common\models\Country::JORDAN;
        $user->city_id = \common\models\City::JORDAN_AMMAN;
        $user->setPassword('123123123');
        $user->user_type_id = \common\models\UserType::SUPER_ADMIN;
        $user->save();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181127_203236_insert_basic_records cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181127_203236_insert_basic_records cannot be reverted.\n";

        return false;
    }
*/
}
