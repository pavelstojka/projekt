<div class="container">
    <div class="row"><br></div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Viac o úlohe <a href="<?php echo site_url('Uloha_zamestnancov/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Zamestnanec:</label>
                    <p><?php echo !empty($Uloha_zamestnancov['fullname'])?$Uloha_zamestnancov['fullname']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Oslava:</label>
                    <p><?php echo !empty($Uloha_zamestnancov['nazov'])?$Uloha_zamestnancov['nazov']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Úloha:</label>
                    <p><?php echo !empty($Uloha_zamestnancov['uloha'])?$Uloha_zamestnancov['uloha']:''; ?></p>
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