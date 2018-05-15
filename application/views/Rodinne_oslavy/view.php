<div class="container">
    <div class="row"><br></div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Viac o oslavách <a href="<?php echo site_url('Rodinne_oslavy/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Názov:</label>
                    <p><?php echo !empty($Rodinne_oslavy['nazov'])?$Rodinne_oslavy['nazov']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Sezóna:</label>
                    <p><?php echo !empty($Rodinne_oslavy['sezona'])?$Rodinne_oslavy['sezona']:''; ?></p>
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