<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_ticket}}`.
 */
class m230929_151219_create_task_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('task_ticket', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'ticket_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx_task_ticket_task_id', 'task_ticket', 'task_id');
        $this->createIndex('idx_task_ticket_ticket_id', 'task_ticket', 'ticket_id');

        $this->addForeignKey('fk_task_ticket_task', 'task_ticket', 'task_id', 'tasks', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_task_ticket_ticket', 'task_ticket', 'ticket_id', 'tickets', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('task_ticket');
    }
}
