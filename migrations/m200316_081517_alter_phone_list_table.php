<?php

use yii\db\Migration;

/**
 * Class m200316_081517_alter_phone_list_table
 */
class m200316_081517_alter_phone_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('phone_list', 'phone', 'string');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('phone_list', 'phone', 'bigint');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200316_081517_alter_phone_list_table cannot be reverted.\n";

        return false;
    }
    */
}
