<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\rule\models\RolesModel */

$this->title = 'Create Roles Model';
$this->params['breadcrumbs'][] = ['label' => 'Roles Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
