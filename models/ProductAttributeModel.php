<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Html;

/**
 * This is the model class for table "productAttributes".
 *
 * @property integer $productId
 * @property integer $attributeId
 * @property string $value
 *
 * @property ProductModel $product
 * @property AttributeModel $attribute
 */
class ProductAttributeModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productAttributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productId', 'attributeId', 'value'], 'required'],
            [['attributeId'], 'integer'],
            ['value', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productId' => 'Product Id',
            'attributeId' => 'Attribute Id',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductModel::className(), ['id' => 'productId']);
    }

    public function getProductLink()
    {
        return Html::a($this->product->name, ['./product/view', 'id' => $this->product->id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes()
    {
        return $this->hasOne(AttributeModel::className(), ['id' => 'attributeId']);
    }

    public function getAttributeLink()
    {
        return Html::a($this->attributes->name, ['./attribute/view', 'id' => $this->attributes->id]);
    }

    /**
     * @param $productId
     * @return array
     */
    public function getOtherAttributes($productId)
    {
        return AttributeModel::find()->where('id != :attributeId', ['attributeId' => 'attributeId'])->viaTable('{productAttributes}', ['productId' => $productId])->asArray()->all();
    }


    public function getOthers($productId, $categoryId)
    {
        $subQuery = (new Query())->select('attributeId')->from('productAttributes')->where('productId=:id', [':id' => $productId]);
        $query = (new Query)->select('*')
            ->from('attribute a')
            ->where(['not in', 'a.id', $subQuery])
            ->having(['=', 'categoryId', $categoryId]);
        return $query->all();
    }

}
