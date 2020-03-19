<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use app\models\PhoneType;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $phoneList \app\models\PhoneList */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'label' => 'Телефоны',
                'value' => function ($data) {
                    $phoneString = '';
                    foreach ($data->phoneLists as $item) {
                        $phoneString .=  ArrayHelper::getValue($item, 'phone') . ", ";
                    }
                    return $phoneString;
                }

            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{add} {update} {delete}',
                'buttons' => [
                    'add' => function ($model, $key, $index) {
                        return Html::a(
                                '<span class="glyphicon glyphicon-plus"></span>', Url::to(['add', 'id' => $key->id]),  ['id' => 'addPhone']
                        );
                    }
                ]
            ],
        ],
    ]); ?>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Добавить телефон</h4>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin([]); ?>

                <?= $form->field($phoneList, 'phone')->textInput()->label('Номер телефона') ?>
                <?= $form->field($phoneList, 'phone_type')->dropDownList(ArrayHelper::map(PhoneType::find()->all(), 'id', 'type'))->label('Тип') ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
