<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetAdmin;

/* @var $this \yii\web\View */
/* @var $content string */

AppAssetAdmin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap" >
        <div id="wrapper">
        <?php
            NavBar::begin([
                'brandLabel' => 'CDES Admin',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right top-nav'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],                      
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/user/security/login']] :
                        ['label'=>Yii::$app->user->identity->username,
                            'items'=>[
                                \Yii::$app->user->identity->getIsAdmin()?['label' => 'Dashboard', 'url' => ['/user/admin']] :'',
                                 ['label'=>'Profile','url'=>['/user/profile']],
                                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/user/security/logout'],
                                'linkOptions' => ['data-method' => 'post']],                               
                            ]
                        ]
                        
                         
                ],
            ]);
            ?>
         <div class="collapse navbar-collapse navbar-ex1-collapse">
           <ul class="nav navbar-nav side-nav">
                    <li class="<?php $i=2; echo  $i==2?'active':'';?>">
                        <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/admin']);?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="<?php $i=2; echo $i==2?'active':'';?>">
                        <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/role']);?>"><i class="fa fa-fw fa-bar-chart-o"></i> Manage User Roles</a>
                    </li>
                    <li>
                        <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/admin/userlst']);?>"><i class="fa fa-fw fa-table"></i> Manage Users</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
         </div>
         <?php
            NavBar::end();
        ?>
       <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                         <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    ]) ?>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                     <div class="col-lg-12">
                     <?= $content ?>
                     </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->
             

        </div>
        <!-- /#page-wrapper -->
        </div>
       
    </div>

   <footer class="footer">
                        <div class="container">
                            <p class="pull-left">&copy;Seshadri <?= date('Y') ?></p>
                            <p class="pull-right">Powered By SB</p>
                        </div>
                    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
