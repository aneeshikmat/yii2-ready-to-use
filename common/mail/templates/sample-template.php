<?php

use yii\helpers\Url;

?>

<?= $this->render('partials/_email-header'); ?>

    <img class="hero" src="<?= Url::base(true) ?>/img/mail-cover.png" alt="Cover" />
    <h1>Your Account is Ready!</h1>
    <p>Morbi quis lacus purus. Suspendisse dignissim erat at justo pretium, et vulputate sapien vehicula. Aliquam non viverra mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

    <!-- Divider Component -->
    <span class="divider"></span>

    <!-- Description component -->
    <h3 class="text-start mb20">Details</h3>

    <table class="description">
        <tbody>
        <tr>
            <td>
                <span class="description-lable">My Label:</span>
            </td>
            <td>
                <p class="description-value">Value 1</p>
                <p class="description-value">Value 2</p>
            </td>
        </tr>
        </tbody>
    </table>

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
                        <td> <a href="https://2nees.com" target="_blank">View</a> </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
<?= $this->render('partials/_email-footer'); ?>