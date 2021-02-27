<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PropertydetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propertydetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propertydetails-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Propertydetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'property_id',
            'property_name',
            'property_street1',
            'property_street2',
            'property_city',
            //'property_state',
            'country.country_name',
            //'Status',
            //'Permission',

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>


</div>
