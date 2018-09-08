<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Inflector as flack;
use app\modules\admin\models\Setting;
use app\modules\admin\models\User;
use app\modules\admin\models\Post;
use app\modules\admin\models\GambarProject;
use app\modules\admin\models\Pekerjaan;
use app\modules\admin\models\Tag;
use app\modules\admin\models\Project;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    protected $setting;
    protected $profile;

    public function init()
    {
        $this->setting = Setting::findOne('1');
        $this->profile = User::findOne('1');
        parent::init();
    }
    /**
     * Show the Home Page
     *
     * @return void
     */
    public function actionIndex()
    {
        $posts = Post::find()
            ->where(['publish_status' => '1'])
            ->andWhere(["<=",'publish_date',date('Y-m-d')])
            ->orderBy(['id' => SORT_DESC,])
            ->limit(3)
            ->all();
        $projects = GambarProject::find()->orderBy(['id' => SORT_DESC,])->limit(4)->all();

        return $this->renderPartial('index',[
            'setting' => $this->setting,
            'profile' => $this->profile,
            'posts' => $posts,
            'projects' => $projects,
        ]);
    }

    /**
     * Show Blog list
     *
     * @return void
     */
    public function actionBlogs($q = null)
    {
        $message = [];
        $tags = Tag::find()->all();

        $query = Post::find()
            ->where(['publish_status' => '1'])
            ->andWhere(["<=",'publish_date',date('Y-m-d')])
            ->orderBy(['id' => SORT_DESC,]);

        if($q != null){
            $query = Post::find()
            ->where(['publish_status' => '1'])
            ->andWhere(["<=",'publish_date',date('Y-m-d')])
            ->andWhere(["LIKE",'judul', $q])
            ->orderBy(['id' => SORT_DESC,]);
            if($query->all() == null){
                $message = 'Not Found';
            }
        }

        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => '4',
            ]);

        $posts = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        return $this->renderPartial('blog',[
            'setting' => $this->setting,
            'profile' => $this->profile,
            'posts' => $posts,
            'pagination' => $pagination,
            'tags' => $tags,
            'message' => $message
        ]);
    }

    /**
     * Show Blog Post Detail
     *
     * @param String $title
     * @return void
     */
    public function actionBlogSlug($title)
    {

        $recommands = Post::find()
        ->where(['publish_status' => '1'])
        ->andWhere(["<=",'publish_date',date('Y-m-d')])
        ->orderBy(['id' => SORT_DESC,])
        ->limit(3)
        ->all();

        $post = $this->findModelBySlug($title);

        $idTags = Yii::$app->db->createCommand("SELECT * FROM post_to_tag WHERE id_post = $post->id")->queryAll();

        foreach($idTags as $id){
            $tags[] = Tag::findOne($id['id_tag'])->nama;
        }
        
        return $this->renderPartial('blog-detail',[
            'profile' => $this->profile,
            'setting' => $this->setting,
            'post' => $post,
            'recommands' => $recommands,
            'tags' => $tags
        ]);
    }

    /**
     * Show Project list
     *
     * @return void
     */
    public function actionProjects()
    {
        $query = Project::find()
            ->orderBy(['id' => SORT_DESC,]);

        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => '9',
            ]);

        $projects = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->renderPartial('project',[
            'pagination' => $pagination,
            'setting' => $this->setting,
            'projects' => $projects,
        ]);
    }

    /**
     * Show Project Detail
     *
     * @param String $title
     * @return void
     */
    public function actionProjectSlug($id)
    {
        $project = Project::findOne($id);
        return $this->renderPartial('project-detail',[
            'project' => $project,
            'setting' => $this->setting,
        ]);
    }

    public function actionProfile()
    {
        $pekerjaan = Pekerjaan::find()->all();
        return $this->renderPartial('profile',[
            'profile' => $this->profile,
            'pekerjaan' => $pekerjaan,
            'setting' => $this->setting,
        ]);
    }


    public function actionError()
    {
        return $this->renderPartial('404',[
            'setting' => $this->setting,
        ]);
    }

    protected function findModelBySlug($slug)
    {
        if (($model = Post::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}
