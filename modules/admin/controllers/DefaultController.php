<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class DefaultController extends Controller
{
    /**
     * default action for admin modules
     *
     * @return redirect
     */
    public function actionIndex()
    {
        return $this->redirect(['/admin/dashboard']);
    }
}