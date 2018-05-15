<div class="container">
    <div class="row"><br></div>
    <div class="col-xs-12">
        <?php
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?> událosť <a href="<?php echo site_url('Udalosti'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <?php echo form_label('Názov mesta:'); ?>
                            <?php echo form_dropdown('miesta_idmiesta', $mesto, $mesto_selected, 'class="form-control"'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Názov oslavy:'); ?>
                            <?php echo form_dropdown('rodinne_oslavy_idrodinne_oslavy', $rodinne_oslavy, $rodinne_oslavy_selected, 'class="form-control"'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Dátum</label>
                            <input type="text" class="form-control" name="datum" placeholder="Zadaj dátum" value="<?php echo !empty($post['datum'])?$post['datum']:''; ?>">
                            <?php echo form_error('datum','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Počet osôb</label>
                            <input type="text" class="form-control" name="pocet_osob" placeholder="Zadaj počet osôb" value="<?php echo !empty($post['pocet_osob'])?$post['pocet_osob']:''; ?>">
                            <?php echo form_error('pocet_osob','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Cena</label>
                            <input type="text" class="form-control" name="cena" placeholder="Zadaj cenu" value="<?php echo !empty($post['cena'])?$post['cena']:''; ?>">
                            <?php echo form_error('cena','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Možnosť platby:'); ?>
                            <?php echo form_dropdown('moznosti_platby_idmoznosti_platby', $moznosti_platby, $moznosti_platby_selected, 'class="form-control"'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Meno zákazníka:'); ?>
                            <?php echo form_dropdown('zakaznici_id', $zakaznik, $zakaznik_selected, 'class="form-control"'); ?>
                        </div>
                       




                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrď"/>
                    </form>
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
 * Time: 13:57
 */