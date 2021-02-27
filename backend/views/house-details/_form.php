<?php
use backend\models\HouseDetails;
use backend\models\PropertyDetails;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\proertydetails;
use backend\models\propertyfloor;
/* @var $this yii\web\View */
/* @var $model backend\models\HouseDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="house-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'house_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_id')->dropDownList(ArrayHelper::map(PropertyDetails::find()->all(),'property_id','property_name'),['prompt'=>'Select property name','property_id','property_name'])?>

    <?= $form->field($model, 'floor_id')->dropDownList(ArrayHelper::map(PropertyFloor::find()->all(),'floor_id','floor_name'),['prompt'=>'Select floor name','floor_id','floor_name'])?>

    <?= $form->field($model, 'rent_amount')->textInput() ?>

    <?= $form->field($model, 'water_amount')->textInput() ?>

    <?= $form->field($model, 'EB_rate')->textInput() ?>


    <?= $form->field($model, 'House_details')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
