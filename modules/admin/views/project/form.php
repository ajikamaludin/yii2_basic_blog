<?php

$this->title = 'Tag';

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();

echo $form->field($model, 'judul');
echo $form->field($model, 'client');
echo $form->field($model, 'date')->input('date');
echo $form->field($model, 'short_desc');
echo $form->field($model, 'long_desc')->textarea([
        'rows' => 10
]);

echo Html::submitButton('Save',[
    'class' => 'btn btn-primary btn-flat'
]);

ActiveForm::end();
