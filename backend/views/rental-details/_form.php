<?php

use backend\models\HouseDetails;
use backend\models\PropertyDetails;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\proertydetails;
use backend\models\propertyfloor;
use backend\models\tenantDetails;
use backend\models\rentalDetails;
/* @var $this yii\web\View */
/* @var $model backend\models\RentalDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rental-details-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'property_id')->dropDownList(PropertyDetails::dropdown(),[
            'style'=>'width:500px',
        'prompt'=>'Select property name',
        'onchange'=>'$.post(
	"'.Yii::$app->urlManager->createUrl('property-floor/loadfloor?id=').'"+$(this).val(), 
	function(data){
		$("select#floor_id").html(data);
		}
	);'
    ])?>

    <?= $form->field($model, 'floor_id')->dropDownList(PropertyFloor::dropdown(),[
        'style'=>'width:500px','prompt'=>'Select floor name','id'=>'floor_id',
        'onchange'=>'$.post(
        "'.Yii::$app->urlManager->createUrl('house-details/loadhouse?id=').'"+$(this).val(), 
        function(data){
            $("select#house_id").html(data);
            }
        );'
    ])?>


    <?= $form->field($model, 'house_id')->dropDownList(HouseDetails::dropdown(),[
        'style'=>'width:500px','prompt'=>'Select house name','id'=>'house_id',
          'onchange'=>'$.post(
        "'.Yii::$app->urlManager->createUrl('tenant-details/loadtenant?id=').'"+$(this).val(), 
        function(data){
            $("select#Tenant_id").html(data);
            }
        );'
    ])?>

    <?= $form->field($model, 'Tenant_id')->dropDownList(TenantDetails::dropdown(),[
        'style'=>'width:500px','prompt'=>'Select house name','id'=>'Tenant_id'
    ])?>

    <?= $form->field($model, 'EB_startreading')->textInput(['style'=>'width:500px']) ?>

    <?= $form->field($model, 'EB_Endreading')->textInput(['style'=>'width:500px']) ?>

    <?= $form->field($model, 'RentMonth')->dropDownList(array (
        'Jan'  => 'Jan',
        'Feb'  => 'Feb',
        'Mar'  => 'Mar',
        'Apr'  => 'Apr',
        'May'  => 'May',
        'Jun'  => 'Jun',
        'Jul'  => 'Jul',
        'Aug'  => 'Aug',
        'Sep'  => 'Sep',
        'Oct' => 'Oct',
        'Nov' => 'Nov',
        'Dec' => 'Dec'
    ),['style'=>'width:500px']) ?>

    <?= $form->field($model, 'RentYear')->dropDownList($model->getYearsList(),['style'=>'width:500px']) ?>


    <?= $form->field($model, 'Notes')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
