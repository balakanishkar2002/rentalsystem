<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\propertydetails */

$this->title = $model->property_id;
$this->params['breadcrumbs'][] = ['label' => 'Propertydetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="propertydetails-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->property_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->property_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'property_id',
            'property_name',
            'property_street1',
            'property_city',
            'property_state',
            'country_id',
           // 'Status',
            [
                'attribute' => 'Status',
                'format' => 'html',
                'value' => fn()=> Html::tag('span', $model->Status ? 'Active' : 'Draft', [
                    'class' => $model->Status ? 'badge badge-success' : 'badge badge-danger'
                ]),
            ],
            'Ownername',
            'Property_details:html',
            'created_date',
            'updated_date',
        ],
    ]) ?>

</div>
