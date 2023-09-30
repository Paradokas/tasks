<?php

namespace app\modules\tasks\controllers\api;

use Yii;
use yii\web\Response;
use yii\rest\ActiveController;
use app\modules\tasks\models\Task;

class TaskController extends ActiveController
{
    public $modelClass = Task::class;


    public function actionGetTasks(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return Task::find()->all();
    }

    public function actionView($id): array|Task
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $task = Task::findOne($id);
        if ($task === null) {
            Yii::$app->response->statusCode = 404;
            return ['error' => 'Задача не найдена'];
        }

        return $task;
    }
}
