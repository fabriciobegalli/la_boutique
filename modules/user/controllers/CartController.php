<?php

namespace app\modules\user\controllers;

use app\models\OrderListItemModel;
use app\models\OrderModel;
use app\models\ProductModel;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CartController extends Controller
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
        if (isset($_SESSION['cart_items'])) {
            $productIds = array();
            foreach ($_SESSION['cart_items'] as $key => $value) {
                $productIds[] = $value['id'];
            }
            $query = (new Query())->select('*')->from('product')->where(['id' => $productIds]);
            $ptDataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            return $this->render('index', [
                'ptDataProvider' => $ptDataProvider,
            ]);
        } else {
            return $this->render('index', [
                'ptDataProvider' => null,
            ]);
        }

    }

    public function actionRemove($id)
    {
        Yii::info(json_encode($_SESSION['cart_items']));
        unset($_SESSION['cart_items'][$id]);
        $id = array();
        foreach ($_SESSION['cart_items'] as $key => $value) {
            $id[] = $value['id'];
        }
        $query = (new Query())->select('*')->from('product')->where(['id' => $id]);
        $ptDataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'ptDataProvider' => $ptDataProvider,
        ]);
    }

    public function actionMakeOrder()
    {
        if (count($_SESSION['cart_items']) != 0) {
            $order = new OrderModel();
            $order->userId = Yii::$app->user->getIdentity()->getId();
            $order->date = date("Y-m-d H:i:s");
            Yii::info("order prepared");
            if ($order->save(false)) {
                Yii::info("order saved");
                $cost = 0;
                foreach ($_SESSION['cart_items'] as $key => $value) {
                    $item = new OrderListItemModel();
                    $item->orderId = $order->id;
                    $item->productId = $value['id'];
                    $item->quantity = $value['quantity'];
                    $item->cost = ProductModel::find()->where(['id' => $value['id']])->one()->price;
                    Yii::info("$item->orderId  $item->productId  $item->quantity  $item->cost");
                    if ($item->save(false)) {
                        $cost += $item->cost * $item->quantity;
                    }
                }
                $order->cost = $cost;
                $order->save();
                Yii::info("order saved again");
            }
            $_SESSION['cart_items'] = array();
        }
        return $this->redirect('/user/order');
    }
}