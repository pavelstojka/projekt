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
                <div class="panel-heading"><b><font size="5">Rodinné oslavy</font></b>  <a href="<?php echo site_url('Rodinne_oslavy/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="45%">Názov</th>
                        <th width="45%">Sezóna</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Rodinne_oslavy)): foreach($Rodinne_oslavy as $Rodinne_oslavy): ?>
                        <tr>
                            <td><?php echo $Rodinne_oslavy->nazov; ?></td>
                            <td><?php echo $Rodinne_oslavy->sezona; ?></td>
                            <td>
                                <a href="<?php echo site_url('Rodinne_oslavy/view/'.$Rodinne_oslavy->idrodinne_oslavy); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Rodinne_oslavy/edit/'.$Rodinne_oslavy->idrodinne_oslavy); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Rodinne_oslavy/delete/'.$Rodinne_oslavy->idrodinne_oslavy); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Naozaj vymazať?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Rodinne_oslavy(s) not found......</td></tr>
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

