<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class DashboardController extends Controller
{
    /**
     * {@inheritDoc}
     *
     * @return void
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [''],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * show dashboard for user
     *
     * @return mixed|view
     */
    public function actionIndex()
    {
        $visit = (new \yii\db\Query())
        ->select(['sum(visit) as visit'])
        ->from('post')
        ->one();

        $post = (new \yii\db\Query())
        ->select(['count(*) as post'])
        ->from('post')
        ->one();

        return $this->render('index',[
            'visit' => $visit['visit'],
            'posts' => $post['post'],
        ]);
    }

}