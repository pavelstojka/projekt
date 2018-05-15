<div class="container">
    <div class="row"><br></div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Viac o mieste<a href="<?php echo site_url('Miesta/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Názov:</label>
                    <p><?php echo !empty($Miesta['mesto'])?$Miesta['mesto']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Ulica:</label>
                    <p><?php echo !empty($Miesta['ulica'])?$Miesta['ulica']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>PSČ:</label>
                    <p><?php echo !empty($Miesta['psc'])?$Miesta['psc']:''; ?></p>
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