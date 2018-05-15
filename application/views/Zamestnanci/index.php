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
                <div class="panel-heading"><b><font size="5">Zoznam zamestnancov</font></b>   <a href="<?php echo site_url('Zamestnanci/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="90%">Meno</th>

                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Zamestnanci)): foreach($Zamestnanci as $Zamestnanci): ?>
                        <tr>
                            <td><?php echo $Zamestnanci->fullname; ?></td>


                            <td>
                                <a href="<?php echo site_url('Zamestnanci/view/'.$Zamestnanci->idzamestnanci); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Zamestnanci/edit/'.$Zamestnanci->idzamestnanci); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Zamestnanci/delete/'.$Zamestnanci->idzamestnanci); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Naozaj vymazať?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Zamestnanci(s) not found......</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
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
</div>

<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 4.5.2018
 * Time: 12:22
 */

