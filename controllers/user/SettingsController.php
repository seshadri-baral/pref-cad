<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers\user;

use dektrium\user\controllers\SettingsController as BaseSettingsController;

use dektrium\user\Module;
use dektrium\user\models\SettingsForm;
use yii\authclient\ClientInterface;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * SettingsController manages updating user settings (e.g. profile, email and password).
 *
 * @property \dektrium\user\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class SettingsController extends BaseSettingsController
{
    /**
     * @inheritdoc
     */
   // public $defaultAction = 'profile';

    /**
     * @inheritdoc
     */
   
 

    /**
     * @inheritdoc
     */
      public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'disconnect' => ['post']
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['profile', 'account', 'confirm', 'networks', 'connect', 'disconnect','education','address','profession','upload'],
                        'roles'   => ['@']
                    ],
                ]
            ],
        ];
    }
    /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionProfile()
    {
       $model = $this->finder->findProfileById(\Yii::$app->user->identity->getId());
       $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Profile settings have been successfully saved'));
            return $this->refresh();
        }

        return $this->render('profile', [
            'model' => $model
        ]);
    }
    /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionEducation()
    {
       
        $model = $this->finder->findProfileById(\Yii::$app->user->identity->getId());
       $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Educational details have been successfully saved'));
            return $this->refresh();
        }

        return $this->render('education', [
            'model' => $model
        ]);
    }
     /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionAddress()
    {
       
        $model = $this->finder->findProfileById(\Yii::$app->user->identity->getId());
       $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Address details have been successfully saved'));
            return $this->refresh();
        }

        return $this->render('address', [
            'model' => $model,'countries'=>\Yii::$app->params['country']
        ]);
    }
      /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionProfession()
    {
       
        $model = $this->finder->findProfileById(\Yii::$app->user->identity->getId());
       $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Professional details have been successfully saved'));
            return $this->refresh();
        }

        return $this->render('profession', [
            'model' => $model,'address'=>\Yii::$app->params['country']
        ]);
    }
    /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionUpload()
    {
       
        $model = $this->finder->findProfileById(\Yii::$app->user->identity->getId());
        $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->getRequest()->post())) {
            if ($model->pimage != NULL && !$model->deleteImage()) {
                \Yii::$app->getSession()->setFlash('danger', \Yii::t('user','Error deleting existing image. Please try after sometime.'));
                return $this->refresh();
            }
               $image = $model->uploadImage();
             if ( $model->validate() && $model->save() )
             { 
                 if ($image !== false) {
                    $path = $model->getImageFile();
                    $image->saveAs($path);
                    \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Image settings have been successfully saved'));
                    return $this->refresh();
                }
             }else{
                 \Yii::$app->getSession()->setFlash('danger', \Yii::t('user', 'Image settings have not been saved'));
                    return $this->refresh();
             }
            
        }

        return $this->render('uploadimg', [
            'model' => $model
        ]);
    }

    /**
     * Displays page where user can update account settings (username, email or password).
     *
     * @return string|\yii\web\Response
     */
    public function actionAccount()
    {
        /** @var SettingsForm $model */
        $model = \Yii::createObject(SettingsForm::className());

        $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', \Yii::t('user', 'Account settings have been successfully saved'));
            return $this->refresh();
        }

        return $this->render('account', [
            'model' => $model,
        ]);
    }     
    
}
  
