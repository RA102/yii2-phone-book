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
    <div class="row">

        <div class="user-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name', ['options' => ['style' => 'width: 300px;']])->textInput(['maxlength' => true]) ?>

                        <?php foreach ($phoneList as $index => $item) { ?>
                            <div class="form-group">

                                <?= $form->field($item, "[$index]id")->hiddenInput()->label(false); ?>

                                <?= $form->field($item, "[$index]phone", ['options' => ['style' => 'width: 300px;']])->textInput(); ?>

                                <?= $form->field($item, "[$index]phone_type", ['options' => ['style' => 'width: 200px;']])
                                        ->dropDownList(ArrayHelper::map(PhoneType::find()
                                        ->all(), 'id', 'type'), ['options' => ['style' => 'height: 30px;']])
                                ?>
                            </div>
                        <?php } ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

    <a href="add"></a>

</div>
