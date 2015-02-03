<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/**
 * @var $this  yii\web\View
 * @var $form  yii\widgets\ActiveForm
 * @var $model dektrium\user\models\SettingsForm
 */

$this->title = Yii::t('user', 'Educational Details');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id'          => 'account-form',
                    'options'     => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template'     => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false
                ]); ?>
<div class=col-md-8>
    <div class="well well-sm">
        Mtech Qualification
    </div>   
                <?= $form->field($model, 'mtech_qual') ?>
                <?= $form->field($model, 'mtech_university') ?>
                 <?= $form->field($model, 'mtech_batch');
                   MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'mtech_batch',
                            'name' => 'input-1',
                            'mask' => '9999'
                        ])
                 ?>
    <div class="well well-sm">
        PhD Qualification
    </div>
                <?= $form->field($model, 'phd_qual') ?>
                <?= $form->field($model, 'phd_university') ?>
                 <?= $form->field($model, 'phd_batch');
                   MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'phd_batch',
                            'name' => 'input-1',
                            'mask' => '9999'
                        ])
                 ?>
    <div class="well well-sm">
        Other Specialization/Qualification
    </div>
        <?= $form->field($model, 'other_specialization') ?>
        

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>
                    </div>
                </div>
</div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
