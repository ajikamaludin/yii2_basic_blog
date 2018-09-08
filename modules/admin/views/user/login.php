<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php AppAsset::register($this); ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
        <?php $this->beginBody() ?>
        <section id="content" class="content">
            <div class="login-box">
                <div class="login-logo">
                    <a href="#"><b>Admin</b>LTE</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Sign in to Start</p>

                    <?php $form = ActiveForm::begin() ?>
                    <div class="form-group has-feedback">
                        <?= $form->field($model, 'username') ?>
                    </div>
                    <div class="form-group has-feedback">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php ActiveForm::end() ?>

            </div>
        </section>
        
        <footer class="footer">
            <div class="container">
                
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>