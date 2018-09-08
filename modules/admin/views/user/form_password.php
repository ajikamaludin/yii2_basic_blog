<?php

$this->title = 'Password';

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();

echo $form->field($model, 'password')->passwordInput();
?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'newPassword_repeat')->passwordInput(); ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'newPassword')->passwordInput(); ?>
    </div>
</div>

<?php
echo Html::submitButton('Save',[
    'class' => 'btn btn-flat btn-primary'
]);

ActiveForm::end();