<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PhoneType;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $phoneList app\models\PhoneList */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($phoneList, 'phone')->textInput()->label('Номер телефона') ?>
    <?= $form->field($phoneList, 'phone_type')->dropDownList(ArrayHelper::map(PhoneType::find()->all(), 'id', 'type'))->label('Тип') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
