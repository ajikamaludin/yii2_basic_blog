<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $navbar_logo
 * @property string $footer_logo
 * @property string $link_home
 * @property string $welcome_title
 */
class Setting extends \yii\db\ActiveRecord
{

    public $navbarImage;
    public $footerImage;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['navbar_logo', 'footer_logo', 'link_home', 'welcome_title'], 'required'],
            [['navbar_logo', 'footer_logo', 'link_home', 'welcome_title'], 'string', 'max' => 190],
            [['navbarImage'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024],
            [['footerImage'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'navbar_logo' => 'Navbar Logo',
            'footer_logo' => 'Footer Logo',
            'link_home' => 'Link Home',
            'welcome_title' => 'Welcome Title',
            'navbarImage' => 'Navbar Logo',
            'footerImage' => 'Footer Logo'
        ];
    }

    /**
     * to save image upload
     *
     * @return void
     */
    public function upload()
    {
        $this->navbar_logo = "uploads/logo/" . uniqid() . '.' . $this->navbarImage->extension;
        $this->footer_logo = "uploads/logo/" . uniqid() . '.' . $this->footerImage->extension;
        if ($this->validate() && $this->save()) {
            return ($this->navbarImage->saveAs($this->navbar_logo) && $this->footerImage->saveAs($this->footer_logo));
        } else {
            return false;
        }
    }
}
