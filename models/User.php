<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    public $authKey;
    public $accessToken;
    public $group;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'name' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
            'group' => 'admin',
        ],
    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        if(UserModel::findIdentity($id)==null)
        {
            return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        }
        return UserModel::findIdentity($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        $user = UserModel::findByEmail($username);

        return $user;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password == $password;
    }
}
