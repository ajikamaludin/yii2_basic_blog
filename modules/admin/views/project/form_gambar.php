<?php

$this->title = 'Gambar Project';

use yii\widgets\ActiveForm;
use yii\helpers\Html;


$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

echo $form->field($model, 'imageFile')->fileInput();

echo Html::submitButton('Upload',[
    'class' => 'btn btn-flat btn-primary'
]);

ActiveForm::end();