<?php

$this->title = 'Project';

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a('New Project', Url::to(['new']), [
    'class' => 'btn btn-primary btn-flat',
]);

echo GridView::widget([
    'dataProvider' => $model,
    'columns' => [
        'judul',
        'date:date',
        'short_desc',
        [
            'header' => 'Action',
            'class' => 'yii\grid\ActionColumn',
        ]
    ],
    'options' => [
        'class' => 'table table-bordered',
    ]
]);