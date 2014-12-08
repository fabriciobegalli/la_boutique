<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password', 'rememberMe'], 'required'],
            [['email'], 'string', 'max' => 1000],
            ['email', 'email'],
            ['password', 'match', 'pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,10}$/']
        ];
    }

    /**
     * Logs in a user using the provided email and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[email]]
     *
     * @return UserModel|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserModel::find()->where(['email' => $this->email])->one();
        }

        return $this->_user;
    }
}
