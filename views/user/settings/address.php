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

$this->title = Yii::t('user', 'Address Details');
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
        Permanent Address
    </div> 
        <?= $form->field($model, 'p_address1') ?>
        <?= $form->field($model, 'p_address2') ?>
        <?= $form->field($model, 'p_city') ?>
        <?= $form->field($model, 'p_state') ?>
        <?= $form->field($model, 'p_country')->dropDownList(	$countries, 
								['prompt'=>'Select...']);?>
         <?= $form->field($model, 'p_pin');
                   MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'p_pin',
                            'name' => 'input-1',
                            'mask' => '999999'
                        ])
                 ?>

    <div class="well well-sm">
        Correspondence Address
    </div>
        <?= $form->field($model, 'c_address1') ?>
        <?= $form->field($model, 'c_address2') ?>
        <?= $form->field($model, 'c_city') ?>
        <?= $form->field($model, 'c_state') ?>
         <?= $form->field($model, 'c_country')->dropDownList(	$countries, 
								['prompt'=>'Select...']);?>
         <?= $form->field($model, 'c_pin');
                   MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'c_pin',
                            'name' => 'input-1',
                            'mask' => '999999'
                        ])
                 ?>
     <div class="well well-sm">
        Contact Numbers
    </div>
        <?= $form->field($model, 'mobile_no') ;
         MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'mobile_no',
                            'name' => 'input-5',
                            'mask' => ['(+99)-99-999-99999']
                        ]); ?>
        <?= $form->field($model, 'phone_no');
        MaskedInput::widget([
                            'model' => $model,
                            'attribute' => 'phone_no',
                            'name' => 'input-5',
                            'mask' => ['(+99)9999999999[9][9][9]']
                        ]);?>
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
