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
                <div class="panel-heading"><?php echo $action; ?> zákazníka <a href="<?php echo site_url('Zakaznici'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Meno</label>
                            <input type="text" class="form-control" name="meno" id="meno" placeholder="Zadaj meno" value="<?php echo !empty($post['meno'])?$post['meno']:''; ?>">
                            <?php echo form_error('meno','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Priezvisko</label>
                            <input type="text" class="form-control" name="priezvisko" placeholder="Zadaj priezvisko" value="<?php echo !empty($post['priezvisko'])?$post['priezvisko']:''; ?>">
                            <?php echo form_error('priezvisko','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Mesto</label>
                            <input type="text" class="form-control" name="mesto" placeholder="Zadaj mesto" value="<?php echo !empty($post['mesto'])?$post['mesto']:''; ?>">
                            <?php echo form_error('mesto','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Ulica</label>
                            <input type="text" class="form-control" name="ulica" placeholder="Zadaj ulicu" value="<?php echo !empty($post['ulica'])?$post['ulica']:''; ?>">
                            <?php echo form_error('ulica','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">PSČ</label>
                            <input type="text" class="form-control" name="psc" placeholder="Zadaj PSČ" value="<?php echo !empty($post['psc'])?$post['psc']:''; ?>">
                            <?php echo form_error('psc','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Mobil</label>
                            <input type="text" class="form-control" name="mobil" placeholder="Zadaj mobilné číslo" value="<?php echo !empty($post['mobil'])?$post['mobil']:''; ?>">
                            <?php echo form_error('mobil','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Zadaj email" value="<?php echo !empty($post['email'])?$post['email']:''; ?>">
                            <?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>
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