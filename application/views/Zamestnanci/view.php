<div class="container">
    <div class="row"><br></div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Viac o zamestnancovi <a href="<?php echo site_url('Zamestnanci/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Názov:</label>
                    <p><?php echo !empty($Zamestnanci['fullname'])?$Zamestnanci['fullname']:''; ?></p>
                </div>




            </div>
        </div>
    </div>
</div>


<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 4.5.2018
 * Time: 13:52
 */