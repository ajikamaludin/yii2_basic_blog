<?php
namespace app\modules\admin;

use Yii;

class Module extends \yii\base\Module
{
    public $layout = 'main';
    
    public function init()
    {
        parent::init();
        Yii::$app->user->loginUrl = ['/admin/user/login'];
    }
}