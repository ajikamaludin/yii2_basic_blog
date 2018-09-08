<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FotoForm extends Model
{
    /**
     * @var imageFile
     */
    public $imageFile;

    /**
     * @var filePath
     */
    private $filePath;

    /**
     * {@inheritDoc}
     *
     * @return void
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024],
        ];
    }
    
    /**
     * to save image upload
     *
     * @return void
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->filePath = "uploads/" . uniqid() . '.' . $this->imageFile->extension;
            return ($this->imageFile->saveAs($this->filePath) && $this->saveUser());
        } else {
            return false;
        }
    }

    /**
     * save image path to database
     *
     * @return void
     */
    public function saveUser()
    {
        $user = User::findByUsername(Yii::$app->user->identity->username);
        $user->foto_file = $this->filePath;
        return $user->save();
    }
}