<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class CvForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $cv;

    /**
     * @var filePath
     */
    private $filePath;

    public function rules()
    {
        return [
            [['cv'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cv' => 'CV File ( PDF only )',
        ];
    }
    
    /**
     * to save file|pdf upload
     *
     * @return void
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->filePath = "uploads/" . uniqid() . '.' . $this->cv->extension;
            return ($this->cv->saveAs($this->filePath) && $this->saveUser());
        } else {
            return false;
        }
    }

    /**
     * save file|pdf path to database
     *
     * @return void
     */
    public function saveUser()
    {
        $user = User::findByUsername(Yii::$app->user->identity->username);
        $user->cv_file = $this->filePath;
        return $user->save();
    }
}