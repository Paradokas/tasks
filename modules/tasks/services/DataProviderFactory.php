<?php

namespace app\modules\tasks\services;

use yii\data\ActiveDataProvider;
use app\modules\tasks\models\Task;
use app\modules\tasks\models\Ticket;

class DataProviderFactory
{
    public static function createTaskDataProvider(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Task::find()
                ->select(['tasks.*', 'tickets.code AS ticket_code'])
                ->innerJoin('task_ticket', 'tasks.id = task_ticket.task_id')
                ->innerJoin('tickets', 'task_ticket.ticket_id = tickets.id'),
        ]);
    }

    public static function createTicketDataProvider(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Ticket::find()
                ->select(['tickets.*', 'GROUP_CONCAT(tasks.code) AS related_tasks'])
                ->leftJoin('task_ticket', 'tickets.id = task_ticket.ticket_id')
                ->leftJoin('tasks', 'task_ticket.task_id = tasks.id')
                ->groupBy('tickets.id'),
        ]);
    }
}
