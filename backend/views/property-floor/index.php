<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PropertyfloorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propertyfloors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propertyfloor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Propertyfloor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'floor_id',
            'floor_name',
            'property.property_name',
            //'property_id',
            'floor_details:html',
            'created_date',
            //'updated_date',

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>
    </div>

</div>
