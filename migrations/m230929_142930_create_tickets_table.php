<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tickets}}`.
 */
class m230929_142930_create_tickets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('tickets', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'code' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'status' => "ENUM('open', 'closed') DEFAULT 'open'",
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // Создаем индекс для поля "статус"
        $this->createIndex('idx_tickets_status', 'tickets', 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('tickets');
    }
}
