<?php

namespace app\modules\tasks\services\tickets;

use Yii;
use app\modules\tasks\services\CodeGenerate;

class CreateTicket
{
    public function handle($ticket): bool
    {
        $ticket->code = CodeGenerate::generateTicketCode();

        if ($ticket->save()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно создана.');

            return true;
        }

        Yii::$app->session->setFlash('error', 'Заявка не создана.');

        return false;
    }
}
