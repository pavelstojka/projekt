<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading"><b><font size="5">Možnosť platby</font></b>  <a href="<?php echo site_url('/Moznosti_platby/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th width="90%">Názov</th>

                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Moznosti_platby)): foreach($Moznosti_platby as $Moznosti_platby): ?>
                        <tr>

                            <td>
                                <?php echo $Moznosti_platby->nazov; ?>
                            </td>

                            <td>
                                <a href="<?php echo site_url('Moznosti_platby/view/'.$Moznosti_platby->idmoznosti_platby); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Moznosti_platby/edit/'.$Moznosti_platby->idmoznosti_platby); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Moznosti_platby/delete/'.$Moznosti_platby->idmoznosti_platby); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Naozaj vymazať?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Moznosti_platby(s) not found......</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="pagination" style="align-content: center">
        <ul class="pagination">
            <?php foreach ($links as $link) {
                echo "<li class=\"page-item\">". $link."</li>";
            } ?>
        </ul>
    </div>

</div>

<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 4.5.2018
 * Time: 12:22
 */

