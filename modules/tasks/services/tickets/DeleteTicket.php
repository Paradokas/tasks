<?php

namespace app\modules\tasks\services\tickets;

use Yii;
use yii\web\NotFoundHttpException;

class DeleteTicket
{
    public function handle($ticket): bool
    {
        if ($ticket === null) {
            throw new NotFoundHttpException('Заявка не найдена');
        }

        if ($ticket->delete()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно удалена');

            return true;
        }

        Yii::$app->session->setFlash('error', 'Не удалось удалить заявку');

        return false;
    }
}