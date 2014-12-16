<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $registretionDate
 *
 * @property ProductModel[] $products
 * @property OrderModel[] $orders
 */
class UserModel extends ActiveRecord implements IdentityInterface
{

    public $group = 'user';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'password'], 'required'],
            [['registretionDate'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'match', 'pattern' => '/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            [['password'], 'string', 'max' => 32],

            ['email', 'email', 'message' => 'Enter valid email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'registretiondate' => 'Registration date',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(ProductModel::className(), ['id' => 'productId'])->viaTable('{order}', ['userId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(OrderModel::className(), ['userId' => 'id']);
    }

    public static function findByEmail($email)
    {
        $user = UserModel::find()->where(['email' => $email])->one();
        return $user;
    }

    public function validatePassword($password)
    {
        Yii::info($this->password == md5($password));
        return $this->password == md5($password);
    }

    public static function findIdentity($id)
    {
        $identity = UserModel::find()->where(['id' => $id])->one();
        return $identity;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $identity = UserModel::find()->where(['password' => $token])->where(['active' => 1])->one();
        return $identity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->email;
    }

    public function validateAuthKey($authKey)
    {
        return $this->email === $authKey;
    }
}
