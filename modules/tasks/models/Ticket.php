<?php

namespace app\modules\tasks\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\base\InvalidConfigException;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property string $status
 * @property string $description
 */
class Ticket extends ActiveRecord
{
    public $related_tasks;
    /**
     * @throws InvalidConfigException
     */
    public function getTasks(): ActiveQuery
    {
        return $this->hasMany(Task::class, ['id' => 'task_id'])
            ->viaTable('task_ticket', ['ticket_id' => 'id']);
    }

    public static function tableName(): string
    {
        return 'tickets';
    }

    public function rules(): array
    {
        return [
            [['code' , 'status'], 'safe'],
            [['title', 'description'], 'required'],
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
            'related_tasks' => 'Связанные задачи',
        ];
    }
}
