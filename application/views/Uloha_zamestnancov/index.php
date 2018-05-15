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
                <div class="panel-heading"><b><font size="5">Ponuky zamestnancov</font></b>  <a href="<?php echo site_url('Uloha_zamestnancov/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="30%">Zamestnanec</th>
                        <th width="30%">Oslava</th>
                        <th width="30%">Úloha</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Uloha_zamestnancov)): foreach($Uloha_zamestnancov as $Uloha_zamestnancov): ?>
                        <tr>
                            <td><?php echo $Uloha_zamestnancov->fullname; ?></td>
                            <td><?php echo $Uloha_zamestnancov->nazov; ?></td>
                            <td><?php echo $Uloha_zamestnancov->uloha; ?></td>
                            <td>
                                <a href="<?php echo site_url('Uloha_zamestnancov/view/'.$Uloha_zamestnancov->iduloha_zamestnancov); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Uloha_zamestnancov/edit/'.$Uloha_zamestnancov->iduloha_zamestnancov); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Uloha_zamestnancov/delete/'.$Uloha_zamestnancov->iduloha_zamestnancov); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Naozaj vymazať?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Uloha_zamestnancov(s) not found......</td></tr>
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

