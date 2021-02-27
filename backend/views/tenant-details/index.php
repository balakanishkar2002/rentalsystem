<?php

use backend\models\PropertyFloor;
use backend\models\HouseDetails;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TenantDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tenant Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tenant Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Tenant_id',

            'property.property_name',
            'floor.floor_name',
            'house.house_name',
            'tenant_name',
            'rent_amount',
            'water_amount',
            'advance_amount',
            //'other_charges',
            //'tenant_name',
            //'tenant_mobile_no',
            //'tenant_details:ntext',
            //'created_date',
            //'updated_date',

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>


</div>
