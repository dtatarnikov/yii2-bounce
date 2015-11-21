<?php

use yii\db\Migration;

/**
 * Required migration to work with email bounce manager
 *
 * @author   Denis Tatarnikov <tatarnikovda@gmail.com>
 */
class m140401_082207_table_email_bounce extends Migration
{
    public function safeUp()
    {
        // table with email bounce records
        $this->createTable('{{%bounce}}', array(
            'email' => $this->string(128)->notNull().' PRIMARY KEY',
            'time' => $this->integer()->defaultValue(0),
        ));

        // table with email bounce history records
        $this->createTable('{{%bounce_history}}', array(
            'id' => $this->primaryKey(),
            'email' => $this->string(128)->notNull(),
            'reason' => $this->string(512),
            'status' => $this->string(32),
            'type' => $this->string(32),
            'is_critical' => $this->smallInteger(2)->defaultValue(0),
            'time' => $this->integer()->defaultValue(0),
        ));

        $this->createIndex('IDX_BNC_HISTORY_EMAIL', '{{%bounce_history}}', 'email');
    }

    public function safeDown()
    {
        $this->dropIndex('IDX_BNC_HISTORY_EMAIL', '{{%bounce_history}}');

        $this->dropTable('{{%bounce_history}}');
        $this->dropTable('{{%bounce}}');
    }
}