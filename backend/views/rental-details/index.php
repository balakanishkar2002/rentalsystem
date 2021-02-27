<?php
use backend\models\PropertyFloor;
use backend\models\HouseDetails;
use backend\models\TenantDetails;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RentalDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rental Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rental Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'property.property_name',
            'floor.floor_name',
            'house.house_name',
            'tenant.tenant_name',
            'EB_startreading',
            'EB_Endreading',
            'RentMonth',
            'RentYear',
            'Rent_due',
            'Rent_paid',
            //'Notes',

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>


</div>
