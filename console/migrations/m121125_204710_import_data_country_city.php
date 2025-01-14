<?php

use common\migration\Migration;

/**
* Class m181125_204710_import_data_country_city
*/
class m121125_204710_import_data_country_city extends Migration
{
    /**
    * {@inheritdoc}
    */
    public function up()
    {


        // add foreign key for table `country`
        $this->addForeignKey(
            'city_ibfk_1',
            '{{%city}}',
            'country_id',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `province_id`
        $this->createIndex(
            'city_ibfk_2',
            '{{%city}}',
            'province_id'
        );






    }

    /**
    * {@inheritdoc}
    */
    public function down()
    {



        // drops foreign key for table `country`
        $this->dropForeignKey(
            'city_ibfk_1',
            '{{%city}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            'city_ibfk_1',
            '{{%city}}'
        );

        // drops foreign key for table `provinces`
        $this->dropForeignKey(
            'city_ibfk_2',
            '{{%city}}'
        );

        // drops index for column `province_id`
        $this->dropIndex(
            'city_ibfk_2',
            '{{%city}}'
        );

        $this->dropTable('{{%city}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181125_204710_import_data_country_city cannot be reverted.\n";

        return false;
    }
*/
}
