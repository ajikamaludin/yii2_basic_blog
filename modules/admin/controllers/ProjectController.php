<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Project;
use app\modules\admin\models\GambarProject;

class ProjectController extends Controller
{

    private $limitImage = 4;
    
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
                        'actions' => ['index','view','new','update','delete','gambar','delete-gambar'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Project::find(),
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
        $model = new Project();

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','Behasil menambahkan project baru');
            return $this->redirect(['view']);
        }

        return $this->render('form',[
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        $provider = new ArrayDataProvider([
            'allModels' => $model->gambars,
        ]);

        $status = ($provider->getCount() < $this->limitImage) ? true : false;

        return $this->render('detail',[
            'model' => $model,
            'gambars' => $provider,
            'status' => $status,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','Behasil mengubah project');
            return $this->redirect(['index']);
        }

        return $this->render('form',[
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success','Behasil menghapus project');

        return $this->redirect(['index']);
    }

    public function actionGambar($id)
    {
        $model = GambarProject::find()->where(['id_project' => $id])->all();
        
        if(count($model) >= $this->limitImage){
            Yii::$app->session->setFlash('error','Anda tidak dapat menambah gambar');
            return $this->redirect(['/admin/project/view', 'id' => $id]);
        }
        
        $model = new GambarProject();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload($id)) {
                Yii::$app->session->setFlash('success','Berhasil Menambah Gambar');
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('form_gambar',[
            'model' => $model,
        ]);
    }

    public function actionDeleteGambar($id)
    {
        $model = GambarProject::findOne($id)->delete();
        Yii::$app->session->setFlash('success','Behasil menghapus gambar');

        return $this->redirect(Yii::$app->request->referrer);
    }

    private function findModel($id)
    {
        
        return Project::findOne($id);
    }
}