<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class PasswordForm extends Model
{
    public $password;
    public $newPassword;
    public $newPassword_repeat;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['password','newPassword','newPassword_repeat'], 'required'],
            ['newPassword', 'compare'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Old Password',
            'newPassword' => 'New Password Repeat',
            'newPassword_repeat' => 'New Password'
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function changePassword()
    {
        if ($this->validate()) {
            if($this->getUser()->validatePassword($this->password)){
                $this->_user->password = Yii::$app->getSecurity()->generatePasswordHash($this->newPassword);
                $this->_user->save();
                return $this->_user;
            }else{
                Yii::$app->session->setFlash('error','Password tidak sesuai');
            }
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername(Yii::$app->user->identity->username);
        }

        return $this->_user;
    }
}
