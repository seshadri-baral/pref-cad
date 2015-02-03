<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\widgets\ActiveForm       $form
 * @var dektrium\user\models\Profile $profile
 */

?>

<?= $form->field($profile, 'first_name') ?>
<?= $form->field($profile, 'middle_name') ?>
<?= $form->field($profile, 'last_name') ?>
<?= $form->field($profile, 'public_email') ?>
<?= $form->field($profile, 'website') ?>
<?= $form->field($profile, 'location') ?>
<?= $form->field($profile, 'gravatar_email') ?>
<?= $form->field($profile, 'date_of_birth') ?>
<?= $form->field($profile, 'btech_batch') ?>

