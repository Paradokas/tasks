<?php

use yii\helpers\Html;

$this->title = 'Таск-менеджер';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card" style="border: none;">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="action-box">
                                <?= Html::button('Создать задачу', [
                                    'class' => 'btn btn-primary my-2',
                                    'style' => 'width: 200px;',
                                    'onclick' => "$('#createModalTask').modal('show');",
                                ]) ?>
                                <?= $this->render('components/_createTask', ['task' => $task]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="action-box">
                                <?= Html::button('Создать заявку', [
                                    'class' => 'btn btn-primary my-2',
                                    'style' => 'width: 200px;',
                                    'onclick' => "$('#createModalTicket').modal('show');",
                                ]) ?>
                                <?= $this->render('components/_createTicket', ['ticket' => $ticket]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="action-box">
                                <?= Html::button('Посмотреть задачи', [
                                    'class' => 'btn btn-primary my-2',
                                    'style' => 'width: 200px;',
                                    'onclick' => "$('#viewModalTask').modal('show');",
                                ]) ?>
                                <?= $this->render('components/_viewTasks', ['dataProviderTask' => $dataProviderTask]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="action-box">
                                <?= Html::button('Посмотреть заявки', [
                                    'class' => 'btn btn-primary my-2',
                                    'style' => 'width: 200px;',
                                    'onclick' => "$('#viewModalTicket').modal('show');",
                                ]) ?>
                                <?= $this->render('components/_viewTickets', ['dataProviderTicket' => $dataProviderTicket]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
