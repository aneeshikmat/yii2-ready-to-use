<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index card card-default">
    <div class="card-header with-border">
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="card-body no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [

                'id',
                'name',
                'is_active:boolean',
                'created_at',
                // 'created_by',
                 'updated_at',
                // 'updated_by',
                // 'is_deleted',
                // 'deleted_at',
                // 'deleted_by',
                // 'ip_address',
                // 'user_agent',

                ['class' => 'kartik\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
