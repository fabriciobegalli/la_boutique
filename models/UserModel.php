<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $password
 * @property string role
 * @property string auth_key
 * @property OrderModel[] $orders
 */
class UserModel extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $auth_key;
    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name', 'phone'], 'required'],
            [['email', 'name'], 'string', 'max' => 1000],
            ['email', 'email'],
            ['email', 'unique'],
            ['role', 'number'],
            ['password', 'required', 'on' => 'create'],
            ['phone', 'match', 'pattern' => '/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            ['password', 'match', 'pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,10}$/', 'when' => function ($model) {
                return !empty($model->password);
            }]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'phone' => 'Phone',
            'password' => 'Password',
            'role' => 'Is Admin'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(OrderModel::className(), ['user_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->password = md5($this->password);
        } else {
            if ($this->password == '') {
                unset($this->password);
            } else {
                $this->password = md5($this->password . 'sflprt49fhi2');
            }
        }
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
