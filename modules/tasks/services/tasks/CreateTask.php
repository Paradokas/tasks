<?php

namespace app\modules\tasks\services\tasks;

use app\modules\tasks\services\CodeGenerate;
use Yii;

class CreateTask
{
    public function handle($task): bool
    {
        $task->code = CodeGenerate::generateTaskCode();

        if ($task->save()) {
            $taskId = $task->id;
            $selectedTicketId = $task->ticket_id;
            Yii::$app->db->createCommand()->insert('task_ticket', [
                'task_id' => $taskId,
                'ticket_id' => $selectedTicketId,
            ])->execute();

            Yii::$app->session->setFlash('success', 'Задача успешно создана и связана с заявкой.');

            return true;
        }

        Yii::$app->session->setFlash('error', 'Задача не создана.');

        return false;
    }
}
