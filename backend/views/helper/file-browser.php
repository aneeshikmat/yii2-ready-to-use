<?php

/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 12/3/18
 * Time: 12:43 AM
 */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this \yii\web\View */
/* @var $model bool|\common\models\Media|null */


$this->registerJs(<<<JS
 function selectFile(url,caption)
           {
                if(url != '')
                {
                  var args = top.tinymce.activeEditor.windowManager.getParams();
                  win = (args.window);
                  input = (args.input);
                  var input_int = input.replace("-inp","").replace("mceu_","");
                  input_int = parseInt(input_int);
                  input_int = input_int+1;
                  input_int = "mceu_"+input_int;
                  win.document.getElementById(input).value = url;
                  win.document.getElementById(input_int).value = caption;
                  top.tinymce.activeEditor.windowManager.close();  		
                  }
                return false;
    
            }

JS
);

?>

<?php \yii\widgets\Pjax::begin(['id' => 'image-upload']) ?>
<?php echo Html::csrfMetaTags(); ?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'file')->fileInput() ?>
            </div>
            <div class="col-md-4">
                <?= Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>


<?php if (!$model->isNewRecord) {
    $url = $model->getUrl();
    $fileName = $model->name;
    echo Html::a(Html::img($model->getThumb(), ['style' => 'width:100px;height;100px']), '#', [
        'onclick' => "selectFile('$url','$fileName'); return false;"
    ]);
} ?>


<?php \yii\widgets\Pjax::end(); ?>



