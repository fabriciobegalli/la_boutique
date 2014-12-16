<?php

namespace app\modules\admin\controllers;

use app\models\ProductAttributeModel;
use app\models\ProductAttributeSearch;
use app\models\ProductModel;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductAttributesController implements the CRUD actions for ProductAttributeModel model.
 */
class ProductAttributesController extends Controller
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


    public function actionIndex($productId)
    {
        $searchModel = new ProductAttributeSearch();
        $dataProvider = $searchModel->search(['ProductAttributeSearch' => ['productId' => $productId]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'productId' => $productId
        ]);
    }

    /**
     * Displays a single ProductAttributeModel model.
     * @param integer $productId
     * @param integer $attributeId
     * @return mixed
     */
    public function actionView($productId, $attributeId)
    {
        return $this->render('view', [
            'model' => $this->findModel($productId, $attributeId),
        ]);
    }

    /**
     * Creates a new ProductAttributeModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param $productId
     * @return mixed
     */
    public function actionCreate($productId)
    {
        $model = new ProductAttributeModel();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(Yii::$app->user->returnUrl);
        } else {
            $model->productId = $productId;
            $product = ProductModel::find()->where(['id' => $productId])->one();
            return $this->render('create', [
                'model' => $model,
                'product' => $product,
            ]);
        }
    }

    /**
     * Updates an existing ProductAttributeModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $productId
     * @param integer $attributeId
     * @return mixed
     */
    public function actionUpdate($productId, $attributeId)
    {
        $model = $this->findModel($productId, $attributeId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->user->returnUrl);
        } else {
            $model->productId = $productId;
            $product = ProductModel::find()->where(['id' => $productId])->one();
            return $this->render('update', [
                'model' => $model,
                'product' => $product
            ]);
        }
    }

    /**
     * Deletes an existing ProductAttributeModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $productId
     * @param integer $attributeId
     * @return mixed
     */
    public function actionDelete($productId, $attributeId)
    {
        $this->findModel($productId, $attributeId)->delete();

        return $this->redirect(Yii::$app->user->returnUrl);
    }

    /**
     * Finds the ProductAttributeModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $productId
     * @param integer $attributeId
     * @return ProductAttributeModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($productId, $attributeId)
    {
        if (($model = ProductAttributeModel::findOne(['productId' => $productId, 'attributeId' => $attributeId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
