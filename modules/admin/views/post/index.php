<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = "Posts";

echo Html::a('Tambah' , ['new'],[
    'class' => 'btn btn-flat btn-primary',
    'style' => 'margin-bottom: 10px;'
]);

//echo Html::input('text','','full text search : tag , post ');

echo GridView::widget([
    'dataProvider' => $model,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'judul',
        'publish_date:date',
        [
            'header' => 'Status',
            'value' => function($model){
                return ($model->publish_status == 1) ? 'Publish' : 'Draf';
            }
        ],
        [
            'header' => 'Action',
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'view' => false,
            ],
            'buttons' => [
                'lihat' => function($url, $model, $key){
                    return $url;
                }
            ]
        ],
    ],
    'options' => [
        'class' => 'table table-bordered',
    ]
]);
