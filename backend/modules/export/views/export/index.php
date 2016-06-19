<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\members\models\destoon\SearchMember */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '导出';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <form action="" method="post">
        选择需要导出的表<br /><br />
        <div class="checkbox">
            <label><input type="checkbox" id="checkall" onclick="export_all()" name="test[]">全部</label>
            <label><input name="test[]" type="checkbox" value="1" />订单 </label>
            <label><input name="test[]" type="checkbox" value="2" />登录记录 </label>
            <label><input name="test[]" type="checkbox" value="3" />收藏 </label>
            <label><input name="test[]" type="checkbox" value="4" />询价 </label>
            <label><input name="test[]" type="checkbox" value="5" />用户表 </label>
        </div>

    </form>

    <p>
        <?= Html::a('导出表', ['test'], ['class' => 'btn btn-success']) ?>
    </p>
</div>

<script>
    function export_all()
    {
        all = document.getElementById("checkall");
        subCheckbox = document.getElementsByName("test[]");
        for (var i=0;i<subCheckbox.length;i++)
        {
            subCheckbox[i].checked = all.checked;
        }
    }
</script>
