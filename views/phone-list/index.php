<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhoneListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phone Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Phone List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user.name',
            'phone',
            'phoneType.type',

            [
                'class' => 'yii\grid\ActionColumn',

            ],
        ],
    ]); ?>


</div>