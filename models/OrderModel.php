<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $code
 * @property integer $status
 * @property integer $user_id
 *
 * @property Users $user
 * @property OrderedProducts[] $orderedProducts
 * @property Products[] $products
 */
class OrderModel extends \yii\db\ActiveRecord
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
            [['code', 'status', 'user_id'], 'required'],
            [['status', 'user_id'], 'integer'],
            [['code'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderedProducts()
    {
        return $this->hasMany(OrderedProducts::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('ordered_products', ['order_id' => 'id']);
    }
}
