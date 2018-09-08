<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\User;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\PasswordForm;
use app\modules\admin\models\FotoForm;
use app\modules\admin\models\CvForm;
use app\modules\admin\models\Pekerjaan;


class UserController extends Controller
{
    private $model;

    /**
     * {@inheritDoc}
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        if(!Yii::$app->user->isGuest){
            $this->model = User::findByUsername(Yii::$app->user->identity->username);
        }
    }

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
                        'actions' => ['login','create'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout','index','detail','password','cv','foto'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * show user detail dan pekerjaan
     *
     * @return void
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pekerjaan::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index',[
            'model' => $this->model,
            'pekerjaan' => $dataProvider,
        ]);
    }

    /**
     * show form detail user and save changes
     *
     * @return void
     */
    public function actionDetail()
    {
        if ($this->model->load(Yii::$app->request->post()) && $this->model->save()) {
            Yii::$app->session->setFlash('success','Berhasil Mengubah Profile');
            return $this->redirect(['index']);
        }

        return $this->render('form_detail',[
            'model' => $this->model,
        ]);
    }

    /**
     * show form password and save password changes
     *
     * @return void
     */
    public function actionPassword()
    {   
        $password = new PasswordForm();

        if ($password->load(Yii::$app->request->post()) && $password->changePassword()) {
            Yii::$app->session->setFlash('success','Berhasil Mengubah Password');
            return $this->redirect(['index']);
        }
        
        return $this->render('form_password',[
            'model' => $password,
        ]);
    }

    /**
     * show form cv and save uploaded cv file|pdf
     *
     * @return void
     */
    public function actionCv()
    {

        $model = new CvForm();
        if (Yii::$app->request->isPost) {
            $model->cv = UploadedFile::getInstance($model, 'cv');
            if ($model->upload()) {
                Yii::$app->session->setFlash('success','Berhasil Mengunggah CV');
                return $this->redirect('index');
            }
        }

        return $this->render('form_cv',[
            'model' => $model,
        ]);
    }

    /**
     * show form foto and save uploaded foto file|pdf
     *
     * @return void
     */
    public function actionFoto()
    {
        $model = new FotoForm();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                Yii::$app->session->setFlash('success','Berhasil Mengubah Foto');
                return $this->redirect('index');
            }
        }
        return $this->render('form_foto',[
            'model' => $model,
        ]);
    }

    /**
     * show login form and loging user
     *
     * @return void
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = new LoginForm();
        if ($user->load(Yii::$app->request->post()) && $user->login()) {

            return $this->redirect(['/admin/dashboard']);
        }

        return $this->renderPartial('login',[
            'model' => $user,
        ]);
    }

    /**
     * logout from system
     *
     * @return void
     */
    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest){

            Yii::$app->user->logout();
            return $this->goHome();

        }
        return 'method not allowed';
    }
}