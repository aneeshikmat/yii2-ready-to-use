<?php

use yii\db\Migration;

/**
 * Handles the creation for table `{{%country}}`.
 */
class m100130_214936_create_table_country extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [

            'id' => $this->primaryKey()->notNull(),
            'iso' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'printable_name' => $this->string(255),
            'iso3' => $this->string(255),
            'numcode' => $this->integer(11),
            'dialing_code_1' => $this->integer(11),
            'dialing_code_2' => $this->integer(11),
            'dialing_code_3' => $this->integer(11),
            'degree_language_id' => $this->integer(11),
            'weight' => $this->integer(11)->notNull(),
            'arabic_name' => $this->string(255)->notNull(),
            'created_at' => 'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'created_by' => $this->integer(11),
            'updated_at' =>'datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
            'updated_by' => $this->integer(11),
            'is_deleted' => $this->tinyInteger(1)->notNull(),
            'deleted_at' => $this->datetime(),
            'deleted_by' => $this->integer(11),
            'ip_address' => $this->string(40),
            'user_agent' => $this->string(255),

        ]);
     }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}
