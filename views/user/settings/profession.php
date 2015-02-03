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

$this->title = Yii::t('user', 'Professional Details');
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
        Job Details
    </div> 
        <?= $form->field($model, 'job_position') ?>
        <?= $form->field($model, 'job_profile') ?>
    <div class="well well-sm">
        Office Address
    </div>
        <?= $form->field($model, 'o_address1') ?>
        <?= $form->field($model, 'o_address2') ?>
        <?= $form->field($model, 'o_city') ?>
        <?= $form->field($model, 'o_state') ?>
         <?= $form->field($model, 'o_country')->dropDownList(	$address, 
								['prompt'=>'Select...']);?>
         <?= $form->field($model, 'o_pin');
                   MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'o_pin',
                            'name' => 'input-1',
                            'mask' => '999999'
                        ])
                 ?>
	  <?= $form->field($model, 'o_phone_no');
        MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'o_phone_no',
                            'name' => 'input-5',
                            'mask' => ['(+99)9999999999[9][9][9]']
                        ]);?>
	  <?= $form->field($model, 'o_fax_no');
        MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'o_fax_no',
                            'name' => 'input-5',
                            'mask' => ['(+99)9999999999[9][9][9]']
                        ]);?>
     <div class="well well-sm">
        Past Expreinces
    </div>
        <?= $form->field($model, 'past_job_experiences') ?>
        
      
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
