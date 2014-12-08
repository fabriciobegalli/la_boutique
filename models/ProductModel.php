<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $description
 * @property string $name
 * @property string $photo
 * @property integer $category_id
 *
 * @property OrderedProducts[] $orderedProducts
 * @property Order[] $orders
 * @property ProductAttributes[] $productAttributes
 * @property Attributes[] $attributes
 */
class ProductModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'name', 'photo', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['name', 'photo'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'name' => 'Name',
            'photo' => 'Photo',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderedProducts()
    {
        return $this->hasMany(OrderedProducts::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('ordered_products', ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasMany(ProductAttributes::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes()
    {
        return $this->hasMany(Attributes::className(), ['id' => 'attributes_id'])->viaTable('product_attributes', ['products_id' => 'id']);
    }
}
