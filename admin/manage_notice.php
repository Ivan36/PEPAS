<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Subject Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Subject Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="box-title">Total Subjects </h3>
                            <a href="add_notice.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
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
                                    <th>Name</th>
                                    <th>Subject Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $select_result=$subject->selectTotalSubject();

                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['Sub_Name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['Sub_code'] ?></td>
                                            <td style="padding-top: 25px">
                                                <a href="update_subject.php?sub_id=<?php echo $value['id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> </a>
                                                <a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-subjects' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
                                            </td>
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