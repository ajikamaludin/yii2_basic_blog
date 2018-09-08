<?php

$this->title = 'Detail';

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();

echo $form->field($model, 'username');
echo $form->field($model, 'nama');
echo $form->field($model, 'tgl_lahir')->input('date');
echo $form->field($model, 'email');
echo $form->field($model, 'pekerjaan');
echo $form->field($model, 'short_desc');
echo $form->field($model, 'long_desc');
echo $form->field($model, 'instagram_account');

echo Html::submitButton('Save',[
    'class' => 'btn btn-flat btn-primary'
]);

ActiveForm::end();