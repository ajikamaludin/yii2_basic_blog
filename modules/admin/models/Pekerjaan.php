<?php

namespace app\modules\admin\models;

use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "pekerjaan".
 *
 * @property int $id
 * @property string $nama
 */
class Pekerjaan extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pekerjaan';
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
            'nama' => 'Nama Pekerjaan',
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param self $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->id_user = Yii::$app->user->identity->id; 
        return true;
    }
}
