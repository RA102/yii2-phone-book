<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneList */

$this->title = 'Update Phone List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Phone Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phone-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
