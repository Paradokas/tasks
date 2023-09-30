<?php

namespace app\modules\tasks\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\base\InvalidConfigException;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property string $description
 */

class Task extends ActiveRecord
{
    public $ticket_id;
    public $ticket_code;
    /**
     * @throws InvalidConfigException
     */
    public function getTickets(): ActiveQuery
    {
        return $this->hasMany(Ticket::class, ['id' => 'ticket_id'])
            ->viaTable('task_ticket', ['task_id' => 'id']);
    }

    public static function tableName(): string
    {
        return 'tasks';
    }

    public function rules(): array
    {
        return [
            [['code'], 'safe'],
            [['title', 'description', 'ticket_id'], 'required'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'code' => 'Код',
            'status' => 'Статус',
            'description' => 'Описание',
            'ticket_code' => 'Код заявки',
        ];
    }
}
