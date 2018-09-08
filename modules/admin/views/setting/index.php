<?php

$this->title = 'Setting Page';

use yii\widgets\DetailView;
use yii\helpers\Html;

echo Html::a('Ubah', ['update'], [
    'class' => 'btn btn-flat btn-primary',
    'style' => 'margin-bottom: 20px;'
]);

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'welcome_title',
        [
            'label' => 'Link Home',
            'format' => 'raw',
            'value' => function($model){
                return Html::a($model->link_home, $model->link_home);
            }
        ],
        [
            'label' => 'Navbar Logo',
            'format' => 'raw',
            'value' => function($model){
                return Html::img('/'.$model->navbar_logo,[
                    'style' => 'width: 500px;height:auto;'
                ]);
            }
        ],
        [
            'label' => 'Footer Logo',
            'format' => 'raw',
            'value' => function($model){
                return Html::img('/'.$model->footer_logo,[
                    'style' => 'width: 500px;height:auto;'
                ]);
            }
        ]
    ],
]);


?>