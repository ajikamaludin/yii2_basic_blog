<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use app\modules\admin\models\Tag;
use yii\behaviors\SluggableBehavior;
use cornernote\linkall\LinkAllBehavior;


/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $judul
 * @property string $gambar
 * @property string $body
 * @property int $publish_status
 * @property string $publish_date
 * @property int $visit
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends ActiveRecord
{

    public $tag;
    public $headerImage;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'publish_status', 'publish_date','tag','gambar'], 'required'],
            [['publish_status'], 'integer'],
            [['body'], 'string'],
            [['headerImage'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judul' => 'Judul',
            'gambar' => 'Gambar',
            'body' => 'Body',
            'publish_status' => 'Publish Status',
            'publish_date' => 'Publish Date',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
            ],
            LinkAllBehavior::className(),
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param [type] $insert
     * @return void
     */
    public function beforeValidate()
    {
        if(parent::beforeValidate()){
            if($this->isNewRecord)
            {
                $this->created_at = date("Y-m-d");
                $this->visit = "0";
            }
            $this->updated_at = date("Y-m-d");
            return true;
        }
        return false;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if(Yii::$app->db->createCommand()->delete('post_to_tag', 'id_post = '. $this->id )->execute() >= 0){
                return true;
            }
        }
    
        return false;
    
    }

    public function upload()
    {
        $this->gambar = "uploads/post/" . uniqid() . '.' . $this->headerImage->extension;
        if ($this->validate() && $this->save()) {
            return ($this->headerImage->saveAs($this->gambar));
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        $tags = [];
        foreach ($this->tag as $tag_name) {
            $tag = Tag::getTagByName($tag_name);
            if ($tag) {
                $tags[] = $tag;
            }
        }
        $this->linkAll('tags', $tags);
        parent::afterSave($insert, $changedAttributes);
    }

    public function addVisit()
    {
        foreach($this->getTags()->all() as $tag){
            $tags[] = $tag->nama;
        }
        $this->tag = $tags;

        $this->visit = $this->visit + 1;
        return $this->save(false);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'id_tag'])
            ->viaTable('post_to_tag', ['id_post' => 'id']);
    }
}
