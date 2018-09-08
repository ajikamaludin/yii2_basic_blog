<?php

$this->title = 'Pekerjaan';

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();

echo $form->field($model, 'nama');

echo Html::submitButton('Save',[
    'class' => 'btn btn-primary btn-flat'
]);

ActiveForm::end();
