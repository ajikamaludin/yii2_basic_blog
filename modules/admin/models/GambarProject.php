<?php

namespace app\modules\admin\models;

use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "project_gambar".
 *
 * @property int $id
 * @property int $id_project
 * @property string $gambar_file
 */
class GambarProject extends ActiveRecord
{

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_gambar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'gambar_file'], 'required'],
            [['id_project'], 'integer'],
            [['gambar_file'], 'string', 'max' => 190],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_project' => 'Id Project',
            'gambar_file' => 'Gambar File',
        ];
    }

    /**
     * relations belongs to project
     *
     * @return void
     */
    public function getProject()
    {
        return $this->belongsTo(Project::class, ['id', 'id_project']);
    }

        /**
     * to save image upload
     *
     * @return void
     */
    public function upload($id)
    {
        $this->id_project = $id;
        $this->gambar_file = "uploads/project/" . uniqid() . '.' . $this->imageFile->extension;
        if ($this->validate() && $this->save()) {
            return ($this->imageFile->saveAs($this->gambar_file));
        } else {
            return false;
        }
    }

}
