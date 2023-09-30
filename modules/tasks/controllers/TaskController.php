<?php


namespace app\modules\tasks\controllers;

use app\modules\tasks\models\Task;
use app\modules\tasks\models\Ticket;
use app\modules\tasks\services\DataProviderFactory;
use app\modules\tasks\services\tasks\TaskService;
use app\modules\tasks\services\tickets\TicketsService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;

class TaskController extends Controller
{
    public function __construct(
        $id,
        $module,
        private readonly TaskService $taskService,
        private readonly TicketsService $ticketService,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex(): string
    {
        $task = new Task();
        $ticket = new Ticket();

        return $this->render('/index', [
            'task' => $task,
            'ticket' => $ticket,
            'dataProviderTask' => DataProviderFactory::createTaskDataProvider(),
            'dataProviderTicket' => DataProviderFactory::createTicketDataProvider(),
        ]);
    }

    public function actionCreateTask(): void
    {
        $task = new Task();

        if ($task->load(Yii::$app->request->post())) {
            $this->taskService->createTask($task);
        }

        $this->redirect(['index']);
    }

    public function actionCreateTicket(): void
    {
        $ticket = new Ticket();

        if ($ticket->load(Yii::$app->request->post())) {
            $this->ticketService->createTicket($ticket);
        }

        $this->redirect(['index']);
    }

    public function actionDeleteTask($id): void
    {
        $task = Task::findOne($id);
        $this->taskService->deleteTask($task);
        $this->redirect(['index']);
    }

    public function actionDeleteTicket($id): void
    {
        $ticket = Ticket::findOne($id);
        $this->ticketService->deleteTicket($ticket);
        $this->redirect(['index']);
    }
}
