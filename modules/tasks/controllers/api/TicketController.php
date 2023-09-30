<?php

namespace app\modules\tasks\controllers\api;

use Yii;
use yii\web\Response;
use yii\rest\ActiveController;
use app\modules\tasks\models\Ticket;

class TicketController extends ActiveController
{
    public $modelClass = Ticket::class;

    public function actionGetTickets(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return Ticket::find()->all();
    }

    public function actionView($id): array|Ticket
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $task = Ticket::findOne($id);
        if ($task === null) {
            Yii::$app->response->statusCode = 404;
            return ['error' => 'Заявка не найдена'];
        }

        return $task;
    }
}
