<?php

use app\modules\tasks\models\Ticket;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\helpers\ArrayHelper;

Modal::begin([
    'id' => 'createModalTask',
]);

$form = ActiveForm::begin([
    'id' => 'task-form',
    'method' => 'post',
    'action' => ['create-task'],
]);

?>

<h4 class="modal-title my-2">Создание задачи</h4>

<?= $form->field($task, 'title', [
    'inputOptions' => ['placeholder' => 'Введите название задачи'],
])->textInput(['maxlength' => true])->label(false) ?>

<?= $form->field($task, 'description', [
    'inputOptions' => ['placeholder' => 'Введите описание задачи'],
])->textarea(['rows' => 4])->label(false) ?>

<?= $form->field($task, 'ticket_id')->dropDownList(ArrayHelper::map(Ticket::find()->all(), 'id', 'title'), ['prompt' => 'Выберите заявку'])->label('Заявка') ?>

<div class="form-group">
    <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php Modal::end(); ?>
