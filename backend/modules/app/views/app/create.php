<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\app\models\AppModel */

$this->title = 'Create App Model';
$this->params['breadcrumbs'][] = ['label' => 'App Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
