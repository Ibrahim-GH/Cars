<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'plate_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cast_per_day')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'city_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'),
        ['prompt' => 'Select..']
    ) ?>

    <?= $form->field($model, 'brand_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Brand::find()->all(), 'id', 'name'),
        ['prompt' => 'Select..']
    ) ?>

    <?= $form->field($model, 'type_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Type::find()->all(), 'id', 'name'),
        ['prompt' => 'Select..']
    ) ?>

    <?= $form->field($model, 'company_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'name'),
        ['prompt' => 'Select..']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
