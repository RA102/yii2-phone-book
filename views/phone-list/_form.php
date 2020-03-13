<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PhoneType;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-list-form">

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'style' => 'width: 500px;',
            ]
        ]
    ); ?>

    <?= $form->field($model, 'user_id')->textInput()->label('Имя') ?>

    <?= $form->field($model, 'phone')->textInput()->label('Номер') ?>

    <?= $form->field($model, 'phone_type')->dropDownList(ArrayHelper::map(PhoneType::find()->all(), 'id', 'type'))->label('Тип') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
