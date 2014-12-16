<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "attribute".
 *
 * @property integer $id
 * @property integer $categoryId
 * @property string $name
 * @property string $measureUnits
 *
 * @property CategoryModel $category
 * @property ProductAttributeModel[] $productAttributes
 * @property ProductModel[] $products
 */
class AttributeModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryId', 'name',], 'required'],
            [['categoryId'], 'integer'],
            [['name'], 'string', 'max' => 20],
            ['name', 'match', 'pattern' => '/[a-zA-Zа-яА-Я][a-zA-Zа-яА-Я\\s-]+$/', 'message' => 'Enter valid name'],
            [['measureUnits'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'categoryId' => 'Category Id',
            'name' => 'Name',
            'measureUnits' => 'Measure units',
        ];
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
        return $this->hasMany(ProductAttributeModel::className(), ['attributeId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(ProductModel::className(), ['id' => 'productId'])->viaTable('{productAttributes}', ['attributeId' => 'id']);
    }

}
