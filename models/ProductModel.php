<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property integer $quantity
 * @property string $photo
 * @property integer $categoryId
 *
 * @property User[] $users
 * @property OrderListItemModel[] $orderListItems
 * @property OrderModel[] $order
 * @property CategoryModel $category
 * @property ProductAttributeModel[] $productAttributes
 * @property AttributeModel[] $attributes
 */
class ProductModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'price', 'quantity', 'categoryId'], 'required'],
            [['id', 'quantity', 'categoryId'], 'integer'],
            [['price'], 'match', 'pattern' => '/^[0-9]+([.]([0-9]){1,2})?$/', 'message' => 'Please, enter a valid price'],
            [['name',], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 1000]
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
            'description' => 'Description',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'photo' => 'Photo',
            'categoryId' => 'Category Id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderListItems()
    {
        return $this->hasMany(OrderListItemModel::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(OrderModel::className(), ['id' => 'orderId'])->viaTable('{orderlistitem}', ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryModel::className(), ['id' => 'categoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasMany(ProductAttributeModel::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes()
    {
        return $this->hasMany(AttributeModel::className(), ['id' => 'attributeId'])->viaTable('productAttributes', ['productId' => 'id']);
    }

    public function createAttributes()
    {
        $attributes = AttributeModel::find()->where(['categoryId' => $this->categoryId])->all();
        for ($i = 0; $i < count($attributes); $i++) {
            $productAttribute = new ProductAttributeModel();
            $productAttribute->productId = $this->id;
            $productAttribute->value = " ";
            $productAttribute->attributeId = $attributes[$i]->id;
            Yii::info($productAttribute->productId . "  " . $productAttribute->value . "  " . $productAttribute->attributeId);
            $productAttribute->insert(false);
        }
    }

    public static function findMaxPrice($categoryId)
    {
        return ProductModel::find()->where(['categoryId' => $categoryId])->max('price');
    }
}
