<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view card card-default">
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
                [
                    'attribute'=>'userType.name',
                    'label'=>Yii::t('app','User Type')
                ],
                'first_name',
                'last_name',
                'gender',
                'dob',
                'phone_number',
                'email:email',
                [
                        'attribute'=>'country.name',
                        'label'=>Yii::t('app','Country Name')
                ],
                [
                        'attribute'=>'city.name',
                        'label'=>Yii::t('app','City Name')
                ],

                'is_active:boolean',
                'media_id',
                'avatar:image',
                'created_at:datetime',
                'updated_at:datetime',
            ]
        ]) ?>
    </div>
</div>
