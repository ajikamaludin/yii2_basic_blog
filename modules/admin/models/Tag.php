<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $nama
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }
    
    public static function getTagByName($name)
    {
        $tag = Tag::find()->where(['nama' => $name])->one();
        if (!$tag) {
            $tag = new Tag();
            $tag->nama = $name;
            $tag->save(false);
        }
        return $tag;
    }
}
