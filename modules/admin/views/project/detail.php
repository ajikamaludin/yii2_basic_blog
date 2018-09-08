<?php

$this->title = 'Detail Project';

use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Html;
?>

<h3>Project : <?= $model->judul ?></h3>

<?php
echo Html::a('Ubah' , ['update?id='.$model->id],[
        'class' => 'btn btn-flat btn-primary',
        'style' => 'margin-bottom: 10px'
]);

echo Html::a('Hapus' , ['delete?id='.$model->id],[
    'class' => 'btn btn-flat btn-danger',
    'style' => 'margin-bottom: 10px;margin-left:10px'
]);

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'judul',
        'client',
        'date:date',
        'short_desc',
        'long_desc'
    ],
]);

?>

<h3>Gambar Project</h3>

<?php

if($status){
    echo Html::a('Tambah' , ['gambar?id='.$model->id],[
        'class' => 'btn btn-flat btn-primary',
        'style' => 'margin-bottom: 10px;'
    ]);
}else{
    echo "<p>Anda hanya dapat mengunggah 4 gambar</p>";
}

echo GridView::widget([
    'dataProvider' => $gambars,
    'columns' => [
        [
            'label' => 'Gambar',
            'format' => 'raw',
            'value' => function($gambars){
                return Html::img('/'.$gambars->gambar_file,[
                    'style' => 'width: 200px;height:150px;',
                ]);
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'view' => false,
                'update' => false,
            ],
            'buttons' => [
                'delete' => function ($url, $gambars) {
                    $url = '/admin/project/delete-gambar?id='.$gambars->id;
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