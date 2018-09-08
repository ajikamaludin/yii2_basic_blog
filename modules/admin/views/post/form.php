<?php

$this->title = 'Tulis Post Baru';

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\View;

$this->registerJs(
    "
        CKEDITOR.replace( 'ckeditor' );
    ",
    View::POS_READY
);

//$model->publish_date = date('m-d-Y');

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

echo $form->field($model, 'judul');

echo $form->field($model, 'publish_status')->dropDownList([
    '1' => 'Publish',
    '2' => 'Draf'
]);

echo $form->field($model, 'headerImage')->fileInput();

echo $form->field($model, 'body')->textarea([
    'rows' => 12,
    'id' => 'ckeditor',
]);

echo $form->field($model, 'tag')->widget(Select2::className(), [
    //'model' => $model,
    'data' => ArrayHelper::map($tag, 'nama', 'nama'),
    'maintainOrder' => true,
    'options' => [
        'multiple' => true,
    ],
    'pluginOptions' => [
        'tokenSeparators' => [',', ' '],
        'tags' => true,
    ],
]);

echo $form->field($model, 'publish_date')->input('date');

echo Html::submitButton('Save',[
    'class' => 'btn btn-flat btn-primary'
]);

ActiveForm::end();