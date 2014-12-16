<?php

namespace app\modules\user\controllers;

use app\models\OrderModel;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class OrderController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $orders = OrderModel::find()->where(['userId' => Yii::$app->user->getIdentity()->getId()])->all();
        $items = array();
        foreach ($orders as $key => $value) {
            $query = (new Query())->select('*')->from('orderlistitem')->where(['orderId' => $value['id']]);
            $oliDataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $items[] = $oliDataProvider;
        }
        return $this->render('index', [
            'orders' => $orders,
            'items' => $items,
        ]);
    }
}