<div class="container">
    <div class="row"><br></div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Viac o zákazníkovi <a href="<?php echo site_url('Zakaznici/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Zákazník:</label>
                    <p><?php echo !empty($Zakaznici['fullname'])?$Zakaznici['fullname']:''; ?></p>
                </div>             
                <div class="form-group">
                    <label>Mesto:</label>
                    <p><?php echo !empty($Zakaznici['mesto'])?$Zakaznici['mesto']:''; ?></p>
                    <div class="form-group">
                        <label>Ulica:</label>
                        <p><?php echo !empty($Zakaznici['ulica'])?$Zakaznici['ulica']:''; ?></p>
                    </div>
                    <div class="form-group">
                        <label>PSČ:</label>
                        <p><?php echo !empty($Zakaznici['psc'])?$Zakaznici['psc']:''; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Mobil:</label>
                        <p><?php echo !empty($Zakaznici['mobil'])?$Zakaznici['mobil']:''; ?></p>
                        <div class="form-group">
                            <label>Email:</label>
                            <p><?php echo !empty($Zakaznici['email'])?$Zakaznici['email']:''; ?></p>
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