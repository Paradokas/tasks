<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;


Modal::begin([
    'id' => 'createModalTicket',
    'headerOptions' => ['id' => 'createModalLabel'],
]);

$form = ActiveForm::begin([
    'id' => 'task-form',
    'method' => 'post',
    'action' => ['create-ticket'],
]);
?>

<h4 class="modal-title my-2">Создание заявки</h4>

<?= $form->field($ticket, 'title', [
    'inputOptions' => ['placeholder' => 'Введите название заявки'],
])->textInput(['maxlength' => true])->label(false) ?>

<?= $form->field($ticket, 'description', [
    'inputOptions' => ['placeholder' => 'Введите описание заявки'],
])->textarea(['rows' => 4])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php Modal::end(); ?>

