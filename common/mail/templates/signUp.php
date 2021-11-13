<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$loginLink = Yii::$app->urlManager->createAbsoluteUrl(['site/login']);
?>

<?= $this->render('partials/_email-header'); ?>
    <img class="hero" src="<?= Url::base(true) ?>/img/mail-cover.png" alt="Cover" />
    <h1><?= Yii::t('app', "Thanks for being awesome!") ?></h1>
    <p>
      <?= Yii::t('app', "Hello, {name}", [
        "name" => Html::encode($user->username)
      ]) ?>
    </p>
    <p><?= Yii::t('app', "Thank you for filling out our sign up form. We are glad that you joined us") ?>:</p>

    <!-- Divider Component -->
    <span class="divider"></span>

    <!-- Button Component -->
    <table  class="btn btn-primary">
        <tbody>
        <tr>
            <td class="text-start">
                <table >
                    <tbody>
                    <tr>
                        <td> <?= Html::a(Yii::t('app', 'Sign in'), $loginLink) ?> </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
<?= $this->render('partials/_email-footer'); ?>