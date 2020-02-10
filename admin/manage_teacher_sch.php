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
                            <h3 class="box-title">Total Schools </h3>
                            <a href="teacher_schools.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
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
                                    <th>Teacher Names</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $select_result=$teacherschool->selectTotalSchTeacher();

                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['teacher_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['class'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['subject'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['year'] ?></td>
                                            <td style="padding-top: 25px">
                                                <a href="sch_teacher_profile.php?sch_id=<?php echo $value['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                                <a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-schools_head' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
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