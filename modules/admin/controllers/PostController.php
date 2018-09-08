<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Tag;
use app\modules\admin\models\Post;


class PostController extends Controller
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
                        'actions' => ['index','new','update','delete','coba'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
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

    public function actionNew()
    {
        $model = new Post();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->headerImage = UploadedFile::getInstance($model, 'headerImage');
            if($model->upload()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Post has been saved.'));
                return $this->redirect(['index']);
            }
        }

        $tag = Tag::find()->all();

        return $this->render('form',[
            'model' => $model,
            'tag' => $tag,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            $model->headerImage = UploadedFile::getInstance($model, 'headerImage');
            if($model->upload()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Post has been update.'));
                return $this->redirect(['index']);
            }
        }

        $tag = Tag::find()->all();

        return $this->render('form',[
            'model' => $model,
            'tag' => $tag,
        ]);
    }

    public function actionDelete($id)
    {
        ($this->findModel($id)->delete()) ? Yii::$app->session->setFlash('success', Yii::t('app', 'Post has been delete.')) : '';    
        return $this->redirect(['index']);
    }

    public function findModel($id)
    {
        return Post::findOne($id);
    }
}