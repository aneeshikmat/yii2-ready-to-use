<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

<?= $this->render('partials/_email-header'); ?>
    <img class="hero" src="<?= Url::base(true) ?>/img/mail-cover.png" alt="Cover" />
    <h1><?= Yii::t('app', "Reset Password") ?></h1>
    <p>
      <?= Yii::t('app', "Hello, {name}", [
        "name" => Html::encode($user->username)
      ]) ?>
    </p>
    <p><?= Yii::t('app', "Follow the link below to reset your password") ?>:</p>

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
                        <td> <?= Html::a(Yii::t('app', 'Reset Password'), $resetLink) ?> </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
<?= $this->render('partials/_email-footer'); ?>