<div class="container">
    <div class="row"><br></div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Viac o události <a href="<?php echo site_url('Udalosti/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Miesto:</label>
                    <p><?php echo !empty($Udalosti['mesto'])?$Udalosti['mesto']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Oslava:</label>
                    <p><?php echo !empty($Udalosti['nazov'])?$Udalosti['nazov']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Dátum:</label>
                    <p><?php echo !empty($Udalosti['datum'])?$Udalosti['datum']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Počet osôb:</label>
                    <p><?php echo !empty($Udalosti['pocet_osob'])?$Udalosti['pocet_osob']:''; ?></p>
                </div><div class="form-group">
                    <label>Cena:</label>
                    <p><?php echo !empty($Udalosti['cena'])?$Udalosti['cena']:''; ?></p>
                </div><div class="form-group">
                    <label>Možnosti platby:</label>
                    <p><?php echo !empty($Udalosti['moznost_platby'])?$Udalosti['moznost_platby']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Zákazník:</label>
                    <p><?php echo !empty($Udalosti['fullname'])?$Udalosti['fullname']:''; ?></p>
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