<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $judul
 * @property string $date
 * @property string $short_desc
 * @property string $long_desc
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'date', 'short_desc', 'long_desc','client'], 'required'],
            [['date'], 'safe'],
            [['long_desc'], 'string'],
            [['judul', 'short_desc'], 'string', 'max' => 190],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Nama',
            'date' => 'Tanggal',
            'short_desc' => 'Diskripsi Singkat',
            'long_desc' => 'Diskripsi',
        ];
    }

    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        $status = (GambarProject::deleteAll(['id_project' => $this->id]) >= 0) ? true : false;
        return $status;
    }

    public function getGambars()
    {
        return $this->hasMany(GambarProject::class, ['id_project' => 'id']);
    }
}
