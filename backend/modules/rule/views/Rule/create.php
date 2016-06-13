<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\rule\models\RuleModel */

$this->title = 'Create Rule Model';
$this->params['breadcrumbs'][] = ['label' => 'Rule Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
