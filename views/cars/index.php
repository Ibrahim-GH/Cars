<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::$app->user->isGuest ? null : Html::a(Yii::t('app', 'Create Car'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'plate_number',
            [
                'attribute' => 'image_url',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function ($model) {
                    return $model->imageUrl;
                },
            ],
            'model',
            'color',
            'year',
            'cast_per_day',
            'city_id' => 'city.name',
            'brand_id' => 'brand.name',
            'type_id' => 'type.name',
            'company_id' => 'company.name',

            [
                'class' => 'yii\grid\ActionColumn',
                'visible' => !Yii::$app->user->isGuest
            ],
        ],
    ]); ?>


</div>
