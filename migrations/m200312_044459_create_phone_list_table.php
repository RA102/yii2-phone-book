<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone_list}}`.
 */
class m200312_044459_create_phone_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone_list}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'phone' => $this->bigInteger(),
            'phone_type' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%phone_list}}');
    }
}
