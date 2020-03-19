<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PhoneType;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $phoneList app\models\PhoneList */


?>
<div class="user-update">
    <div class="row">
        <div class="user-form">

            <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <div class="col-md-3">
                    <?= $form->field($phoneList,'phone')->textInput()->label('Телефон') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($phoneList, 'phone_type', ['options' => ['style' => 'width: 200px;']])
                        ->dropDownList(ArrayHelper::map(PhoneType::find()->all(), 'id', 'type'), ['options' => ['style' => 'height: 30px;']])
                        ->label('Тип')
                    ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>

