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
            <table class="table ">
                <tbody>

                <?php foreach ($model->phoneLists as $item) { ?>
                    <tr>
                        <td>
                            <?= ArrayHelper::getValue($item, 'phone', ['options' => ['style' => 'max-width: min-content;']]) ?>
                        </td>
                        <td>
                            <?= $form->field($item, 'phone_type', ['options' => ['style' => 'width: 200px;']])
                                ->dropDownList(ArrayHelper::map(PhoneType::find()->all(), 'id', 'type'), ['options' => ['style' => 'height: 30px;']])
                                ->label(false) . "<br>"?>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>


            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>

