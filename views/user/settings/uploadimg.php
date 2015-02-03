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
use kartik\file\FileInput;

/**
 * @var $this  yii\web\View
 * @var $form  yii\widgets\ActiveForm
 * @var $model dektrium\user\models\SettingsForm
 */

$this->title = Yii::t('user', 'Image Settings');
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
                    'options'     => ['class' => 'form-horizontal','enctype'=>'multipart/form-data'],
                    'fieldConfig' => [
                        'template'     => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false
                ]); ?>
<div class="col-md-10">             
               <div class="col-md-5 col-lg-offset-5">
                 <div class="well well-sm">
                    Existing Image
                </div>
                <?php
                //display the image uploaded previously or show a placeholder
                 
                    echo Html::img($model->getImageUrl(), [
                                    'class'=>'img-thumbnail', 
                                    'alt'=>'Profile Image', 
                                    'title'=>'Passposrt Image'
                                ]); ?>
                       <hr/>       
                   </div>
                 
                  <?php
                  //file upload widget
                  echo $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options'=>['accept'=>'image/*'],
                        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],                                     
                                                                'showPreview' => true,
                                                                'showCaption' => true,
                                                                'showRemove' => true,
                                                                'showUpload' => false                                                        
                                          ]
                    ]);
                   
                ?>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>
                    </div>
                </div>
                <div class="well well-sm">
                    Please note the following requirements for the image
                    <ol>
                        <li>Keep the image size low, preferrably less than 200kb</li>
                        <li>Keep the dimensions of image same to PASSPORT IMAGE, preferrably 250x250 pixels</li>
                        <li>The image should have your face area,cofirming to the passport images guidelines</li>
                        <li>Give your image only. Obscene images will be deleted and user will be banned</li>
                    </ol>
                </div>
</div>
                <?php ActiveForm::end(); ?>
                
            </div>
        </div>
    </div>
</div>
