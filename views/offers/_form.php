<?php

use app\models\Car;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Offer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'end_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'car_id')->dropDownList(
        ArrayHelper::map(Car::find()->all(), 'id', 'plate_number'),
        ['prompt' => 'Select..']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
