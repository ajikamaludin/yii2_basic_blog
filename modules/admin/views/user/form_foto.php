<?php

$this->title = 'Foto';

use yii\widgets\ActiveForm;
use yii\helpers\Html;

echo Html::img('/'.Yii::$app->user->identity->foto_file , [
    'style' => 'margin-bottom:20px;width: 300px;heigth:auto;',
]);

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

echo $form->field($model, 'imageFile')->fileInput();

echo Html::submitButton('Upload',[
    'class' => 'btn btn-flat btn-primary'
]);

ActiveForm::end();