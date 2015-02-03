<?php
/* @var $this yii\web\View */
$this->title = 'CDES:Data Acquisition Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>CAET Data Acquisition System</h1>

        <p class="lead">Application for gathering data related to CAET.</p>
        <?php if ( Yii::$app->user->isGuest): ?>
              <p><a class="btn btn-lg btn-success" href="<?php echo \Yii::$app->urlManager->baseUrl.'/user/registration/register' ?>">Register</a></p>            
        <?php endif; ?>
       
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>About CAET</h2>

                <p align="justify">The College of Agricultural Engineering and Technology (CAET) was established in the year 1966. Well acclaimed as one of the leading colleges under SAU-ICAR system, CAET-Bhubaneswar is imparting education, research and extension in the field of Agricultural Engineering since more than four decades.</p>

                <p><a class="btn btn-default" href="http://caet.byethost7.com" target="_blank">More &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Uses of the Application</h2>

                <p>The system aims at collecting information regarding CAET and its subsidiary units. The users need to register before using the system. The system has basic functionalitie for collecting information related to alumni,students and faculty in CAET. Users need to read the terms and condition for providing data.</p>

                <p><a class="btn btn-default" href="">More &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>About the Administrator</h2>

                <p>The administrator is the regulator of the system. He can add users to the system,authorize users to gain access into the system. If a user finds any difficulty at any point of time then he/she may contact the administrator for corrective actions.The administrator can, at any point of time, ban or delete a user for wrong actions/data. In case of problem please contact <a href="mailto:#">admin@cdes.16mb.com</a></p>

                <p><a class="btn btn-default" href="">More &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
