<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $date
 * @property integer $cost
 * @property boolean $completed
 *
 * @property UserModel $user
 * @property OrderListItemModel[] $orderListItems
 * @property ProductModel[] $products
 */
class OrderModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'cost'], 'required'],
            [['userId', 'cost'], 'integer'],
            [['date'], 'safe'],
            [['completed'], 'boolean'],
            ['cost', 'match', 'pattern' => '/^[0-9]+([.]([0-9]){1,2})?$/', 'message' => 'Please, enter a valid price'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'userId' => 'User Id',
            'date' => 'Date',
            'cost' => 'Cost',
            'completed' => 'Completed'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderListItems()
    {
        return $this->hasMany(OrderListItemModel::className(), ['orderId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(ProductModel::className(), ['id' => 'productId'])->viaTable('{orderlistitem}', ['id' => 'orderId']);
    }
}
