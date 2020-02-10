<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>School Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">School Manage</li>
        <li><a href="manage_sch_info.php"><i class="fa fa-eye"></i>School Manage </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="" style="color: blue;text-align: center;">H/T Replaced by Other Transfered H/T Info </h3>
                        <!-- <a href="add_sch_info.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a> -->
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php
                        if(isset($del_message)){
                            echo $del_message;

                        }
                        ?>
                        <table cellspacing="0" width="100%" id="example" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>SchoolName</th>
                                    <th>Former Head Teacher</th>
                                    <th>Years Served</th>
                                    <th>Current Head Teacher</th>
                                    <th>Date of Transfer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $select_result=$schoolinfo->selectTotalReplaced();

                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['old_teacher_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['years_served'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['new_teacher_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['transfer_date'] ?></td>
                                        </tr>

                                    <?php }} ?>
                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div>
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="" style="color: blue;text-align: center;">Transfered Head Teachers History </h3>
                            <!-- <a href="add_sch_info.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a> -->
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <?php
                            if(isset($del_message)){
                                echo $del_message;
                                
                            }
                            ?>
                            <table cellspacing="0" width="100%" id="example1" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>School Name</th>
                                        <th>Head Teacher</th>
                                        <th>Years Served</th>
                                        <th>Date of Transfer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $select_result=$schoolinfo->selectTransferHistory();

                                    $i=1;
                                    if($select_result){
                                        foreach ($select_result as $value){

                                            ?>
                                            <tr>
                                                <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['teacher_name'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['years_served'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['date'] ?></td>
                                                
                                            </tr>

                                        <?php }} ?>
                                    </tbody>

                                </table>
                            </div><!-- /.box-body -->
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
        <?php
        require_once 'inc/footer.php';
        ?>