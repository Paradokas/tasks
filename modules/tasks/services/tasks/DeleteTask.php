<?php

namespace app\modules\tasks\services\tasks;

use Yii;
use yii\web\NotFoundHttpException;

class DeleteTask
{
    /**
     * @throws NotFoundHttpException
     */
    public function handle($task): bool
    {
        if ($task === null) {
            throw new NotFoundHttpException('Задача не найдена');
        }

        if ($task->delete()) {
            Yii::$app->session->setFlash('success', 'Задача успешно удалена');

            return true;
        }

        Yii::$app->session->setFlash('error', 'Не удалось удалить задачу');

        return false;
    }
}
