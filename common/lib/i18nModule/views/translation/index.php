<?php

use common\lib\i18nModule\models\SourceMessage;
use common\lib\i18nModule\Module;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\lib\i18nModule\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('Source Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="element-box card card-default">

    <div class="card-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => yii\helpers\ArrayHelper::merge($searchModel->getColumns(), [
                [
                    'class' => kartik\grid\ActionColumn::class,
                    'template' => '{update} {delete}',
                ],
            ]),

        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
