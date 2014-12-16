<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OrderListItemSearch represents the model behind the search form about `app\models\OrderListItemModel`.
 */
class OrderListItemSearch extends OrderListItemModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderId', 'productId', 'quantity'], 'integer'],
            [['cost'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OrderListItemModel::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'orderId' => $this->orderId,
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'cost' => $this->cost,
        ]);
        return $dataProvider;
    }
}
