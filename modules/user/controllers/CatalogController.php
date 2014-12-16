<?php

namespace app\modules\user\controllers;

use app\models\CategorySearchModel;
use app\models\ProductModel;
use app\models\ProductSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CatalogController extends Controller
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

    public function actionIndex($id)
    {
        $ctSearchModel = new CategorySearchModel();
        $ctDataProvider = $ctSearchModel->search([]);

        $ptSearchModel = new ProductSearch();
        $ptDataProvider = $ptSearchModel->search(['ProductSearch' => ['categoryId' => $id]]);

        return $this->render('index', [
            'ctDataProvider' => $ctDataProvider,
            'ptDataProvider' => $ptDataProvider,
            'id' => $id,
        ]);
    }


    public function actionView($id)
    {
        $product = ProductModel::find()->where(['id' => $id])->one();

        if (!isset($product)) {
            return $this->redirect('/user/');
        }
        return $this->render('view', [
            'product' => $product,
        ]);
    }

    public function actionAddToCart()
    {
        $productId = (string)$_POST['id'];
        if (!Yii::$app->session->has('cart_items')) {
            Yii::$app->session->set('cart_items', array());
        }
        if (array_key_exists($productId, Yii::$app->session['cart_items'])) {
            $_SESSION['cart_items'][$productId]['quantity'] = $_SESSION['cart_items'][$productId]['quantity'] + 1;
        } else {
            $_SESSION['cart_items'][$productId] = array('id' => $productId, 'quantity' => 1);
        }
    }

    public function actionRemoveFromCart()
    {
        $productId = (string)$_POST['id'];
        if (!Yii::$app->session->has('cart_items')) {
            Yii::$app->session->set('cart_items', array());
        }
        if (array_key_exists($productId, Yii::$app->session['cart_items'])) {
            $quantity = $_SESSION['cart_items'][$productId]['quantity'];
            if (isset($quantity)) {
                if ($quantity <= 1) {
                    unset($_SESSION['cart_items'][$productId]);
                } else {
                    $_SESSION['cart_items'][$productId]['quantity'] = $quantity - 1;
                }
            }
        }
    }

    public function actionSearch($key, $id)
    {
        $ctSearchModel = new CategorySearchModel();
        $ctDataProvider = $ctSearchModel->search([]);
        $query = (new Query())->select('*')
            ->from('product')
            ->where(['and', ['=', 'categoryId', $id], ['like', 'name', $key]])
            ->orderBy('name');
        $ptDataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'ctDataProvider' => $ctDataProvider,
            'ptDataProvider' => $ptDataProvider,
            'id' => $id,
        ]);
    }
}