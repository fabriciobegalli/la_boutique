<?php

namespace app\modules\user\controllers;

use app\models\CategorySearchModel;
use app\models\ProductSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
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
        $ctSearchModel = new CategorySearchModel();
        $ctDataProvider = $ctSearchModel->search([]);

        $ptSearchModel = new ProductSearch();
        $ptDataProvider = $ptSearchModel->search(['ProductSearch' => ['categoryId' => "1"]]);

        return $this->render('index', [
            'ctDataProvider' => $ctDataProvider,
            'ptDataProvider' => $ptDataProvider,
            'id' => '1',
        ]);
    }
}
