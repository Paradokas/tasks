<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\grid\GridView;

Modal::begin([
    'id' => 'viewModalTask',
    'headerOptions' => ['id' => 'createModalLabel'],
    'size' => Modal::SIZE_EXTRA_LARGE,
]);
?>
<h4 class="modal-title">Список задач</h4>
<?= GridView::widget([
    'dataProvider' => $dataProviderTask,
    'summary' => false,
    'columns' => [
        'id',
        'title',
        'status',
        'code',
        'description',
        'ticket_code',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger">Удалить</span>', ['delete-task', 'id' => $model->id], [
                        'title' => 'Удалить',
                        'data-confirm' => 'Вы уверены, что хотите удалить эту задачу?',
                        'data-method' => 'post',
                    ]);
                },
            ],
        ],
    ],
]) ?>

<?php Modal::end(); ?>
