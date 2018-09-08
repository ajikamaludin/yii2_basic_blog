<?php

$this->title = 'Tag';

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a('New Tag', Url::to(['/admin/tag/new']), [
    'class' => 'btn btn-primary btn-flat',
]);

echo GridView::widget([
    'dataProvider' => $model,
    'columns' => [
        'nama',
        [
            'header' => 'Action',
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'view' => false,
            ],
        ]
    ],
    'options' => [
        'class' => 'table table-bordered',
    ]
]);