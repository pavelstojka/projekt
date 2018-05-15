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
                <div class="panel-heading"><b><font size="5">Události</font></b>  <a href="<?php echo base_url().'Udalosti/add'; ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="10%">Miesta</th>
                        <th width="10%">Oslavy</th>
                        <th width="20%">Dátum</th>
                        <th width="10%">Počet osôb</th>
                        <th width="10%">Cena</th>
                        <th width="10%">Platby</th>
                        <th width="20%">Zákazník</th>

                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Udalosti)): foreach($Udalosti as $Udalosti): ?>
                        <tr>
                            <td>
                                <?php echo $Udalosti->mesto; ?>
                            </td>
                            <td><?php echo $Udalosti->nazov; ?></td>
                            <td><?php echo $Udalosti->datum; ?></td>
                            <td><?php echo $Udalosti->pocet_osob; ?></td>
                            <td><?php echo $Udalosti->cena; ?></td>
                            <td><?php echo $Udalosti->moznost_platby; ?></td>
                            <td><?php echo $Udalosti->fullname; ?></td>
                            <td>
                                <a href="<?php echo site_url('Udalosti/view/'.$Udalosti->idudalosti); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Udalosti/edit/'.$Udalosti->idudalosti); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Udalosti/delete/'.$Udalosti->idudalosti); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Naozaj vymazať?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Udalosti(s) not found......</td></tr>
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

