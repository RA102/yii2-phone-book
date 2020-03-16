<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PhoneList;
use app\models\PhoneType;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $phoneList app\models\PhoneList */

$this->title = 'Update User: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php foreach ($model->phoneLists as $item) { ?>
        <?= ArrayHelper::getValue($item, 'phone') . ' - ' . $form->field($item, 'phone_type', ['options' => ['style' => 'width: 200px;']])->dropDownList(ArrayHelper::map(PhoneType::find()->all(), 'id', 'type')) . "<br>"?>
    <?php } ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
