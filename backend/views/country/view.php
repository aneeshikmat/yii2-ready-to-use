<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view card card-default">
    <div class="card-header">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="card-body no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'iso',
                'name',
                'printable_name',
                'iso3',
                'numcode',
                'dialing_code_1',
                'dialing_code_2',
                'dialing_code_3',
                'degree_language_id',
                'weight',
                'arabic_name',
                'created_at:datetime',
                'created_by',
                'updated_at:datetime',
                'updated_by',
                'is_deleted',
                'deleted_at',
                'deleted_by',
                'ip_address',
                'user_agent',
            ],
        ]) ?>
    </div>
</div>
