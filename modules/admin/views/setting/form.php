<?php

$this->title = 'Setting Page';

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

echo $form->field($model, 'welcome_title');
echo $form->field($model, 'link_home');
echo $form->field($model, 'navbarImage')->fileInput();
echo $form->field($model, 'footerImage')->fileInput();

echo Html::submitButton('Save',[
    'class' => 'btn btn-flat btn-primary'
]);


ActiveForm::end();