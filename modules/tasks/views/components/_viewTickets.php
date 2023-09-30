<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\grid\GridView;

Modal::begin([
    'id' => 'viewModalTicket',
    'headerOptions' => ['id' => 'createModalLabel'],
    'size' => Modal::SIZE_EXTRA_LARGE,
]);
?>
<h4 class="modal-title">Список заявок</h4>
<?= GridView::widget([
    'dataProvider' => $dataProviderTicket,
    'summary' => false,
    'columns' => [
        'id',
        'title',
        'status',
        'code',
        'description',
        'related_tasks',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger">Удалить</span>', ['delete-ticket', 'id' => $model->id], [
                        'title' => 'Удалить',
                        'data-confirm' => 'Вы уверены, что хотите удалить эту заявку?',
                        'data-method' => 'post',
                    ]);
                },
            ],
        ],
    ],
]) ?>

<?php Modal::end(); ?>
