<?php

namespace app\modules\admin\controllers;

use app\models\OrderListItemModel;
use app\models\OrderListItemSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OrderListItemController implements the CRUD actions for OrderListItemModel model.
 */
class OrderListItemController extends Controller
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
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all OrderListItemModel models.
     * @param $orderId
     * @return mixed
     */
    public function actionIndex($orderId)
    {
        $searchModel = new OrderListItemSearch();
        $dataProvider = $searchModel->search(['OrderListItemSearch' => ['orderId' => $orderId]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'orderId' => $orderId
        ]);
    }

    /**
     * Displays a single OrderListItemModel model.
     * @param integer $orderId
     * @param integer $productId
     * @return mixed
     */
    public function actionView($orderId, $productId)
    {
        return $this->render('view', [
            'model' => $this->findModel($orderId, $productId),
        ]);
    }

    /**
     * Creates a new OrderListItemModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderListItemModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'orderId' => $model->orderId, 'productId' => $model->productId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OrderListItemModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $orderId
     * @param integer $productId
     * @return mixed
     */
    public function actionUpdate($orderId, $productId)
    {
        $model = $this->findModel($orderId, $productId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'orderId' => $model->orderId, 'productId' => $model->productId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OrderListItemModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $orderId
     * @param integer $productId
     * @return mixed
     */
    public function actionDelete($orderId, $productId)
    {
        $this->findModel($orderId, $productId)->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the OrderListItemModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $orderId
     * @param integer $productId
     * @return OrderListItemModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($orderId, $productId)
    {
        if (($model = OrderListItemModel::findOne(['orderId' => $orderId, 'productId' => $productId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
