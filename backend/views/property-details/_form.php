<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\country;

/* @var $this yii\web\View */
/* @var $model backend\models\Propertydetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propertydetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'property_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_street1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_street2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map(country::find()->all(),'country_id','country_name'),['prompt'=>'Select country name','country_id','country_name'])?>

    <?= $form->field($model, 'Status')->dropDownList(['1'=>'Active','0'=>'Not-Active'],['prompt'=>'Select Country Status']) ?>

    <?= $form->field($model, 'Permission')->dropDownList(['DBACESS'=>'Database Access','NODBACESS'=>'No Database Access'],['prompt'=>'Select Premission type']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
