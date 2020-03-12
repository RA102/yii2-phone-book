<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone_type}}`.
 */
class m200312_043013_create_phone_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone_type}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%phone_type}}');
    }
}
