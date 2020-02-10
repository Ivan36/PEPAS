<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Teacher Grades</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Teacher Manage</li>
            <li><a href="#"><i class="fa fa-eye"></i>Teacher Manage Grades </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="box-title">Teacher Grades </h3>
                            <a href="teacher_grade.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <?php
                            if(isset($del_message)){
                                echo $del_message;
                                header("refresh: 6");
                            }
                            ?>
                           <table cellspacing="0" width="100%" id="example" class="display nowrap table table-striped table-bordered table-hover table-responsive">
        
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Teacher Names</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Total Students</th>
                                    <th>Actual Grade(%)</th>
                                    <th>Grade</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $select_result=$teachergrade->selectTotalTeacherGrades();

                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['teacher_name']."<br>".$value['school_name'] ?></td>
                                            
                                            <td style="padding-top: 35px"><?php echo $value['class'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['subject'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['g_total'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['p_actual'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['grade'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['remarks'] ?></td>
                                            
                                            <td style="padding-top: 25px">
                                                <a href="teacher_grade_profile.php?sch_id=<?php echo $value['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
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