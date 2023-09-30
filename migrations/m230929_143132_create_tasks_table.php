<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m230929_143132_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'code' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'status' => "ENUM('open', 'closed') DEFAULT 'open'",
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('idx_tasks_status', 'tasks', 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('tasks');
    }
}
