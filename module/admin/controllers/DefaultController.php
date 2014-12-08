<?php

namespace app\module\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [

            // ...
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            // ...

        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
