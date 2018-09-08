<?php

$this->title = 'Profile Pengguna';

use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Html;

?>

<h3>Profile</h3>

<?php
echo Html::a('Ubah Detail' , ['detail'],[
        'class' => 'btn btn-flat btn-primary',
        'style' => 'margin-bottom: 10px'
]);

echo Html::a('Ubah Password' , ['password'],[
    'class' => 'btn btn-flat btn-primary',
    'style' => 'margin-bottom: 10px;margin-left:10px'
]);

echo Html::a('Ubah Foto Profile' , ['foto'],[
    'class' => 'btn btn-flat btn-primary',
    'style' => 'margin-bottom: 10px;margin-left:10px'
]);

echo Html::a('Unggah CV' , ['cv'],[
    'class' => 'btn btn-flat btn-primary',
    'style' => 'margin-bottom: 10px;margin-left:10px'
]);

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'username',
        'nama',
        'tgl_lahir:date',
        'email',
        'pekerjaan',
        'short_desc',
        'long_desc',
        'instagram_account',
        [
            'label' => 'CV File',
            'format'=> 'raw',
            'value' => function($model){
                return Html::a('CV File', '/'.$model->cv_file);
            }
        ]
    ],
]);

?>

<h3>Riwayat Pekerjaan</h3>

<?php

echo Html::a('Tambah' , ['pekerjaan/new'],[
    'class' => 'btn btn-flat btn-primary',
    'style' => 'margin-bottom: 10px;'
]);

echo GridView::widget([
    'dataProvider' => $pekerjaan,
    'columns' => [
        'nama',
        [
            'header' => 'Action',
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'view' => false,
            ],
            'buttons' => [
                'update' => function ($url, $model) {
                    $url = '/admin/pekerjaan/update?id='.substr($url,-1);
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'lead-update'),
                    ]);
                },
                'delete' => function ($url, $model) {
                    $url = '/admin/pekerjaan/delete?id='.substr($url,-1);
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'lead-delete'),
                                'data-confirm' => 'Are you sure you want to delete this item?',
                    ]);
                }
    
              ],
        ]
    ],
    'options' => [
        'class' => 'table table-bordered',
    ]
]);
?>