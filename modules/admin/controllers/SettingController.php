<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\modules\admin\models\Setting;


class SettingController extends Controller
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
                        'actions' => ['index','update'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = $this->findModel();
        return $this->render('index',[
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $model = $this->findModel();

        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost) {
            $model->navbarImage = UploadedFile::getInstance($model, 'navbarImage');
            $model->footerImage = UploadedFile::getInstance($model, 'footerImage');
            if ($model->upload()) {
                
                Yii::$app->session->setFlash('success','Setting Changes');
                return $this->redirect(['index']);
            }
            
        }

        return $this->render('form',[
            'model' => $model,
        ]);
    }

    private function findModel($id = '1')
    {
        return Setting::findOne($id);
    }

}
