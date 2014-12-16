<?= 
$this->render('../category/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
?>