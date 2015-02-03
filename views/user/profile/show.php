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

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty($profile->name) ? Html::encode($profile->first_name) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
$country = \Yii::$app->params['country'];

?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-default">
                 <div class="panel-heading">
                                <?= Html::encode('Profile Image') ?>
                            </div>
                            <div class="panel-body">
                                <img src="<?= $profile->getImageUrl() ?>?s=250" alt="" class="img-rounded img-responsive" />
                                <br/>
                                 <p align="right">
                                    <?= Html::a(Yii::t('user', 'Change'),\Yii::$app->urlManager->baseUrl.'/user/settings/upload', ['class' => 'btn  btn-success']) ?>
                                </p>
                            </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-9">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= Html::encode('Basic Information') ?>
                            </div>
                            <div class="panel-body">
                                <h4><?= $this->title ?></h4>
                                 <?php if (!empty($profile->first_name)): ?>
                                        <?= Html::encode($profile->first_name) ?>
                                    <?php endif; ?>
                                     <?php if (!empty($profile->middle_name)): ?>
                                        <?= Html::encode($profile->middle_name) ?>
                                    <?php endif; ?>
                                      <?php if (!empty($profile->last_name)): ?>
                                        <?= Html::encode($profile->last_name) ?>
                                    <?php endif; ?>
                                <ul style="padding: 0; list-style: none outside none;">
                                    <?php if (!empty($profile->location)): ?>
                                        <li><i class="glyphicon glyphicon-map-marker text-muted"></i> <?= Html::encode($profile->location) ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($profile->website)): ?>
                                        <li><i class="glyphicon glyphicon-globe text-muted"></i> <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($profile->public_email)): ?>
                                        <li><i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?></li>
                                    <?php endif; ?>
                                     <?php if (!empty($profile->date_of_birth)): ?>
                                        <li><i class="glyphicon glyphicon-calendar text-muted"></i> <?= Html::encode($profile->date_of_birth)?></li>
                                    <?php endif; ?>
                                    <li><i class="glyphicon glyphicon-time text-muted"></i> <?= Yii::t('user', 'Joined on '.date('j F Y', $profile->user->created_at)) ?></li>
                                </ul>
                                <?php if (!empty($profile->bio)): ?>
                                    <p><?= Html::encode($profile->bio) ?></p>
                                <?php endif; ?>
                                <p align="right">
                                    <?= Html::a(Yii::t('user', 'Update'),\Yii::$app->urlManager->baseUrl.'/user/settings/profile', ['class' => 'btn  btn-success']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                     <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= Html::encode('Address Details') ?>
                            </div>
                            <div class="panel-body">
                                 <div class="well well-sm">
                                    Correspondance Address
                                </div> 
                                    <?php if (!empty($profile->c_address1)): ?>
                                       Address Line 1-  <?= Html::encode($profile->c_address1) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->c_address2)): ?>
                                       Address Line 2- <?= Html::encode($profile->c_address2) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->c_city)): ?>
                                      City- <?= Html::encode($profile->c_city) ?>
                                    <?php endif; ?>
                                    <?php if (!empty($profile->c_state)): ?>
                                      State- <?= Html::encode($profile->c_state) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->c_country)): ?>
                                         Country - <?= Html::encode($country[$profile->c_country]) ?>
                                    <?php endif; ?>
                                    <br/>
                                     <?php if (!empty($profile->c_pin)): ?>
                                         Pin Code - <?= Html::encode($profile->c_pin) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->mobile_no)): ?>
                                         Mobile NO. - <?= Html::encode($profile->mobile_no) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->mobile_no)): ?>
                                         Phone NO. - <?= Html::encode($profile->phone_no) ?>
                                    <?php endif; ?>
                                     <div class="well well-sm">
                                        Permanent Address
                                    </div> 
                                      <?php if (!empty($profile->p_address1)): ?>
                                       Address Line 1-  <?= Html::encode($profile->p_address1) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->p_address2)): ?>
                                       Address Line 2- <?= Html::encode($profile->p_address2) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->p_city)): ?>
                                      City- <?= Html::encode($profile->p_city) ?>
                                    <?php endif; ?>
                                    <?php if (!empty($profile->p_state)): ?>
                                      State- <?= Html::encode($profile->p_state) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->p_country)): ?>
                                         Country - <?= Html::encode($country[$profile->p_country]) ?>
                                    <?php endif; ?>
                                    <br/>
                                     <?php if (!empty($profile->p_pin)): ?>
                                         Pin Code - <?= Html::encode($profile->p_pin) ?>
                                    <?php endif; ?>
                                    <p align="right">
                                        <?= Html::a(Yii::t('user', 'Update'),\Yii::$app->urlManager->baseUrl.'/user/settings/address', ['class' => 'btn  btn-success']) ?>
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
         <div class="col-sm-6 col-md-6">
             <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= Html::encode('Educational Details') ?>
                            </div>
                            <div class="panel-body">
                                 <?php if (!empty($profile->btech_batch)): ?>
                                       B.Tech Batch @ CAET -  <?= Html::encode($profile->btech_batch) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->mtech_qual)): ?>
                                     <div class="well well-sm">
                                       M.Tech Qualification
                                    </div>
                                       M.Tech Qualification- <?= Html::encode($profile->mtech_qual) ?>
                                       <?php if (!empty($profile->mtech_university)): ?>
                                      University- <?= Html::encode($profile->mtech_university) ?>
                                    <?php endif; ?>
                                    <?php if (!empty($profile->mtech_batch)): ?>
                                      Batch- <?= Html::encode($profile->mtech_batch) ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <br/>                                    
                                    <?php if (!empty($profile->phd_qual)): ?>
                                    <div class="well well-sm">
                                       PhD Qualification
                                    </div>
                                         PhD Qualification - <?= Html::encode($profile->phd_qual) ?>
                                         <?php if (!empty($profile->phd_university)): ?>
                                         PhD University - <?= Html::encode($profile->phd_university) ?>
                                    <?php endif; ?>
                                    <?php if (!empty($profile->phd_batch)): ?>
                                         PhD Batch - <?= Html::encode($profile->phd_batch) ?>
                                    <?php endif; ?>
                                    <?php endif; ?>                                    
                                    <br/>
                                      <?php if (!empty($profile->other_specialization)): ?>
                                    <div class="well well-sm">
                                       Other Qualification
                                    </div>
                                         Other Qualification - <?= Html::encode($profile->other_specialization) ?>
                                    <?php endif; ?> 
                                    <p align="right">
                                        <?= Html::a(Yii::t('user', 'Update'),\Yii::$app->urlManager->baseUrl.'/user/settings/education', ['class' => 'btn  btn-success']) ?>
                                    </p>
                            </div>
                        </div>
         </div>
         <div class="col-sm-6 col-md-6">
             <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= Html::encode('Professional Details') ?>
                            </div>
                            <div class="panel-body">
                                 <?php if (!empty($profile->job_position)): ?>
                                       Job Position/Designation -  <?= Html::encode($profile->job_position) ?>
                                    <?php endif; ?>
                                     <?php if (!empty($profile->job_profile)): ?>
                                       Job Profile -  <?= Html::encode($profile->job_profile) ?>
                                    <?php endif; ?>
                                <div class="well well-sm">
                                        Office Address
                                    </div> 
                                      <?php if (!empty($profile->o_address1)): ?>
                                       Address Line 1-  <?= Html::encode($profile->o_address1) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->o_address2)): ?>
                                       Address Line 2- <?= Html::encode($profile->o_address2) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->o_city)): ?>
                                      City- <?= Html::encode($profile->o_city) ?>
                                    <?php endif; ?>
                                    <?php if (!empty($profile->o_state)): ?>
                                      State- <?= Html::encode($profile->o_state) ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if (!empty($profile->o_country)): ?>
                                         Country - <?= Html::encode($country[$profile->o_country]) ?>
                                    <?php endif; ?>
                                    <br/>
                                     <?php if (!empty($profile->o_pin)): ?>
                                         Pin Code - <?= Html::encode($profile->o_pin) ?>
                                    <?php endif; ?><br/>
                                    <?php if (!empty($profile->o_phone_no)): ?>
                                         Pin Code - <?= Html::encode($profile->o_phone_no) ?>
                                    <?php endif; ?>
                                     <?php if (!empty($profile->o_fax_no)): ?>
                                         Pin Code - <?= Html::encode($profile->o_fax_no) ?>
                                    <?php endif; ?><br/>
                                     <?php if (!empty($profile->past_job_experiences)): ?>
                                       Job Profile -  <?= Html::encode($profile->past_job_experiences) ?>
                                    <?php endif; ?>
                                <p align="right">
                                <?= Html::a(Yii::t('user', 'Update'),\Yii::$app->urlManager->baseUrl.'/user/settings/profession', ['class' => 'btn  btn-success']) ?>
                                </p>
                            </div>
                        </div>
         </div>
    </div>
    
    </div>
</div>
