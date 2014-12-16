<?php

namespace app\modules\admin\controllers;

use app\models\ProductAttributeSearch;
use app\models\ProductModel;
use app\models\ProductSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for ProductModel model.
 */
class ProductController extends Controller
{

    private $image_array = ['image/gif', 'image/jpeg', 'image/png', 'images/jpg'];

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
     * Lists all ProductModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new ProductAttributeSearch();
        $dataProvider = $searchModel->search(['ProductAttributeSearch' => ['id' => $this->findModel($id)->id]]);
        Yii::info($this->findModel($id)->id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ProductModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductModel();
        if (isset($_FILES['ProductModel']) && $_FILES['ProductModel']['name']['photo'] != "") {
            if (!in_array($_FILES['ProductModel']['type']['photo'], $this->image_array))
                $model->addError('photo', 'Allowed file extensions: jpg, gif, png.');
            else {
                $rnd = rand(0, 9999);
                $uploadedFile = UploadedFile::getInstance($model, 'photo');
                $fileName = 'web/files/' . $rnd . '_' . $uploadedFile->name;
                $model->photo = $fileName;
                Yii::info($model->photo);
                $uploadedFile->saveAs($fileName);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            $model->createAttributes();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (isset($_FILES['ProductModel']) && $_FILES['ProductModel']['name']['photo'] != "") {
            if (!in_array($_FILES['ProductModel']['type']['photo'], $this->image_array)) {
                $model->addError($model->photo, 'Allowed file extensions: jpg, gif, png.');
            } else {
                if ($model->photo != "") {
                    unlink(Yii::$app->basePath . '/web/' . $model->photo);
                }
                $rnd = rand(0, 9999);
                $uploadedFile = UploadedFile::getInstance($model, 'photo');
                $fileName = 'web/files/' . $rnd . '_' . $uploadedFile->name;
                $model->photo = $fileName;
                $uploadedFile->saveAs($fileName);
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
