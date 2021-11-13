<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    'id',
    $usernameField,
    'email'
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'kartik\grid\ActionColumn',
    'template' => '{view}'
];
?>
<div class="card card-default">
    <div id="card-body no-padding">

        <div class="row">
            <div class="col-sm-12">
                <?php Pjax::begin(); ?>
                <?=
                \kartik\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    //  'filterModel' => $searchModel,
                    'layout' => "{summary}\n{items}\n{pager}",
                    'columns' => $columns,
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>



