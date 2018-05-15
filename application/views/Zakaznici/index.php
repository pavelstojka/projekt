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
                <div class="panel-heading"><b><font size="5">Zoznam našich zákazníkov</font></b>   <a href="<?php echo site_url('Zakaznici/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="15%">Meno</th>


                        <th width="15%">Mesto</th>
                        <th width="15%">Ulica</th>

                        <th width="15%">PSC</th>

                        <th width="15%">Mobil</th>
                        <th width="15%">Email</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Zakaznici)): foreach($Zakaznici as $Zakaznici): ?>
                        <tr>
                            <td><?php echo $Zakaznici->fullname; ?></td>

                            <td><?php echo $Zakaznici->mesto; ?></td>
                            <td><?php echo $Zakaznici->ulica; ?></td>
                            <td><?php echo $Zakaznici->psc; ?></td>
                            <td><?php echo $Zakaznici->mobil; ?></td>
                            <td><?php echo $Zakaznici->email; ?></td>

                            <td>
                                <a href="<?php echo site_url('Zakaznici/view/'.$Zakaznici->id); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Zakaznici/edit/'.$Zakaznici->id); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Zakaznici/delete/'.$Zakaznici->id); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Naozaj vymazať?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Zakaznici(s) not found......</td></tr>
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

