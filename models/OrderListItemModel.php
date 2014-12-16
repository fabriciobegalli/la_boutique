<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "orderlistitem".
 *
 * @property integer $orderId
 * @property integer $productId
 * @property integer $quantity
 * @property integer $cost
 * @property string $productLink
 * @property ProductModel $product
 * @property OrderModel $order
 */
class OrderListItemModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderlistitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderId', 'productId', 'quantity', 'cost'], 'required'],
            [['orderId', 'productId', 'quantity'], 'integer'],
            ['quantity', 'match', 'pattern' => '/[1-9][0-9]+$/', 'message' => 'Please, enter valid quantity'],
            ['cost', 'match', 'pattern' => '/^[0-9]+([.]([0-9]){1,2})?$/', 'message' => 'Please, enter valid price'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderId' => 'Order Id',
            'productId' => 'Product Id',
            'quantity' => 'Quantity',
            'cost' => 'Cost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductModel::className(), ['id' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(OrderModel::className(), ['id' => 'orderId']);
    }

    public function getProductLink()
    {
        return Html::a($this->product->name, ['./product/view', 'id' => $this->product->id]);
    }

    /**
     * @param mixed $productLink
     */
    public function setProductLink($productLink)
    {
        $this->productLink = $productLink;
    }
}
