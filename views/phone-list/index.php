<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhoneListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phones List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Phone List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id' => [
                'label' => 'User',

                'value' => function ($data) {
                    //var_dump("<pre>", $data->user);
                    return ArrayHelper::getValue($data->user, 'name');
                }
            ],

            'phone' => [
                'label' => '',

                'value' => function ($data) {

                    $phones = '';
                    foreach ($data->allPhoneUser as $item) {
                        $phones .= ArrayHelper::getValue($item, 'phone') . ' ';
                    }
                    return $phones;
                }
            ],
            'phone_type' => [
                'label' => 'Тип',
                'value' => function ($data) {
                    return $data->phoneType->type ;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',

            ],
        ],
    ]); ?>


</div>
