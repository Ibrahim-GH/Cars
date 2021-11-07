<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searches\CarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'plate_number') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'color') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'cast_per_day') ?>

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
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
