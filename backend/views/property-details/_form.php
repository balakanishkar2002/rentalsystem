<?php
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\country;

/* @var $this yii\web\View */
/* @var $model backend\models\propertydetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propertydetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'property_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_street1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map(country::find()->all(),'country_id','country_name'),['prompt'=>'Select country name','country_id','country_name'])?>

    <?= $form->field($model, 'Status')->checkbox() ?>

    <?= $form->field($model, 'Ownername')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'Property_details')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
