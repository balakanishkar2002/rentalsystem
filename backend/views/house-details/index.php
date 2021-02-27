<?php

use backend\models\PropertyFloor;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HouseDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'House Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="house-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create House Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'house_id',

                'property.property_name',
                //'floor_id',
                'floor.floor_name',
                'house_name',
                'rent_amount',
                //'water_amount',
                'EB_rate',
                //'House_details:ntext',
                //'created_date',
                //'updated_date',

                ['class' => 'common\grid\ActionColumn'],
            ],
        ]); ?>
    </div>


</div>
