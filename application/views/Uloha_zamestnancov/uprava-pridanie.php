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
                <div class="panel-heading"><?php echo $action; ?> úlohu <a href="<?php echo site_url('Uloha_zamestnancov'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <?php echo form_label('Názov zamestnanca:'); ?>
                            <?php echo form_dropdown('zamestnanci_idzamestnanci', $zamestnanec, $zamestnanec_selected, 'class="form-control"'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Názov oslavy:'); ?>
                            <?php echo form_dropdown('rodinne_oslavy_idrodinne_oslavy', $rodinne_oslavy, $rodinne_oslavy_selected, 'class="form-control"'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Úloha</label>
                            <input type="text" class="form-control" name="Uloha" placeholder="Zadaj úlohu" value="<?php echo !empty($post['Uloha'])?$post['Uloha']:''; ?>">
                            <?php echo form_error('Uloha','<p class="help-block text-danger">','</p>'); ?>
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