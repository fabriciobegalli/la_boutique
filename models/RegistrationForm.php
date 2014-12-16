<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
    public $name;
    public $second_name;
    public $email;
    public $phone;
    public $password;
    public $confirmation;

    private $_user = false;

    public function rules()
    {
        return [
            [['name', 'second_name', 'email', 'password', 'confirmation', 'phone'], 'required', 'message' => 'Please fill in this field.'],
            ['email', 'email', 'message' => 'Please, provide a correct email.'],
            ['name', 'match', 'pattern' => '/^\\s*[sa-zA-ZаяА-Я-]+\\s*$/', 'message' => 'Please, provide valid name.'],
            ['second_name', 'match', 'pattern' => '/^\\s*[a-zA-Zа-яА-Я-]+\\s*$/', 'message' => 'Please, provide valid second name.'],
            ['phone', 'match', 'pattern' => '/(\+){0,1}[0-9]{4,14}/', 'message' => 'Please, provide correct number.'],
            ['email', 'validateEmail'],
            ['password', 'match', 'pattern' => '/^\\s*(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,10}\\s*$/', 'message' => 'Password must have 6-10 symbols, contains upper- and lowercase letters and digits.'],
            ['confirmation', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords do not match."],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Fist name',
            'second_name' => 'Second name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmation' => 'Repeat password',
            'phone' => 'Phone',
        ];
    }

    /**
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */

    public function validateEmail($attribute, $params)
    {
        $user = UserModel::find()->where(['email' => $this->email])->count();

        if ($user != 0)
            $this->addError('email', 'This email is already taken.');
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function register()
    {
        $user = new UserModel();
        $user->name = trim($this->name) . " " . trim($this->second_name);
        $user->email = trim($this->email);
        $user->password = md5(trim($this->password));
        $user->phone = trim($this->phone);
        return $user->save();
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->email);
        }

        return $this->_user;
    }
}
