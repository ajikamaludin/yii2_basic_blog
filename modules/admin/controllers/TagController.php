<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

use app\modules\admin\models\Tag;

class TagController extends Controller
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
                        'actions' => ['index','new','update','delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * show index of tag , list of tag
     *
     * @return mixed|view
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Tag::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index',[
            'model' => $dataProvider,
        ]);
    }

    /**
     * show form for new tag
     *
     * @return redirect|view
     */
    public function actionNew()
    {
        $model = new Tag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Berhasil Menambahkan Tag Baru');
            return $this->redirect('index');
        }

        return $this->render('form',[
            'model' => $model,
        ]);
    }

    /**
     * show form for update tag
     *
     * @return redirect|view
     */
    public function actionUpdate($id)
    {
        $model = Tag::findOne($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Berhasil Mengubah Tag');
            return $this->redirect('index');
        }

        return $this->render('form',[
            'model' => $model,
        ]);
    }

    /**
     * remove tag
     *
     * @return redirect
     */
    public function actionDelete($id)
    {
        $model = Tag::findOne($id);
        if($model->delete()){
            Yii::$app->session->setFlash('success','Berhasil Menghapus Tag');
            return $this->redirect('index');
        }
    }

}