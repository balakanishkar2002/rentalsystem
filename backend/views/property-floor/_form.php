<?php

use backend\models\PropertyDetails;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\proertydetails;

/* @var $this yii\web\View */
/* @var $model backend\models\propertyfloor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propertyfloor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floor_name')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'property_id')->dropDownList(ArrayHelper::map(PropertyDetails::find()->all(),'property_id','property_name'),['prompt'=>'Select property name','property_id','property_name'])?>

    <?= $form->field($model, 'floor_details')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

      <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
