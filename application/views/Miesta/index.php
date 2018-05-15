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
                <div class="panel-heading"> <b><font size="5">Dostupné Miesta</font></b>  <a href="<?php echo site_url('Miesta/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th width="30%">Mesto</th>
                        <th width="30%">Ulica</th>
                        <th width="30%">PSČ</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Miesta)): foreach($Miesta as $Miesta): ?>
                        <tr>
                            <td><?php echo $Miesta->mesto; ?></td>
                            <td><?php echo $Miesta->ulica; ?></td>
                            <td><?php echo $Miesta->psc; ?></td>
                            <td>
                                <a href="<?php echo site_url('Miesta/view/'.$Miesta->idmiesta); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Miesta/edit/'.$Miesta->idmiesta); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Miesta/delete/'.$Miesta->idmiesta); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Naozaj vymazať?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Miesta(s) not found......</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div id="pagination" style="align-content: center">
                <ul class="pagination">
                    <?php foreach ($links as $link) {
                        echo "<li class=\"page-item\">". $link."</li>";
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 4.5.2018
 * Time: 12:22
 */

