<?php

$this->title = 'Unggah CV';

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

echo $form->field($model, 'cv')->fileInput();

echo Html::submitButton('Upload',[
    'class' => 'btn btn-flat btn-primary'
]);

ActiveForm::end();