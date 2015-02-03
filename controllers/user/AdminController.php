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

use dektrium\user\controllers\AdminController as BaseAdminController;

use dektrium\user\Finder;
use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * AdminController allows you to administrate users.
 *
 * @property \dektrium\user\Module $module
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class AdminController extends BaseAdminController
{
    /** @var Finder */
    protected $finder;
    public $layout = 'admin';
    /**
     * @param string $id
     * @param \yii\base\Module $module
     * @param Finder $finder
     * @param array $config
     */
    public function __construct($id, $module, Finder $finder, $config = [])
    {
        $this->finder = $finder;      
        parent::__construct($id, $module,$finder, $config);
    }

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete'  => ['post'],
                    'confirm' => ['post'],
                    'block'   => ['post']
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'block', 'confirm','userlst'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->identity->getIsAdmin();
                        }
                    ],
                ]
            ]
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index', [           
        ]);
    }
     /**
     * Lists all User models.
     * @return mixed
     */
    public function actionUserlst()
    {
        $searchModel  = \Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->search($_GET);

        return $this->render('userlst', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
        ]);

        $this->performAjaxValidation($user);

        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been created'));
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'user' => $user
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param  integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $user->scenario = 'update';
        $profile = $this->finder->findProfileById($id);
        $r = \Yii::$app->request;
        $this->performAjaxValidation([$user, $profile]);
        if ($user->load($r->post()) && $profile->load($r->post()) && $user->save() && $profile->save()) {
           
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been updated'));
            return $this->refresh();
        }

        return $this->render('update', [
            'user'    => $user,
            'profile' => $profile,
            'module'  => $this->module,
        ]);
    }

}
