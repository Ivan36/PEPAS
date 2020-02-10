<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>School Grades</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">School Manage</li>
        <li><a href="#"><i class="fa fa-eye"></i>School Manage Grades </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title">Schools Grades </h3>
                        <a href="hteacher_grade.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2 col-lg-2"></div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tm">Filter the grades by selecting Teacher Names</label>
                                        <select name="teacher_name" id="se" class="form-control">
                                            <option value="0" selected="selected">Select Teacher</option>
                                            <?php

                                            $select_result=$teacher->selectTotalTeacher();

                                            $i=1;
                                            if($select_result){
                                                foreach ($select_result as $value){

                                                    ?>

                                                    <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="padding-top: 26px;">
                                        <button name="btn_submit" type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>
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
                                        <th>Teacher Names</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Total Students</th>
                                        <th>Actual Grade(%)</th>
                                        <th>Grade</th>
                                        <th>Rankings</th>
                                        <th>Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                                        $add_result=$teachergrade->selectTeacherGradesRank($_POST);
                                        if ($add_result) {
                                            $select_result=$teachergrade->selectTeacherGradesRank($_POST);
                                        }
                                        else{
                                            $select_result=$teachergrade->selectTeacherGradesRank($_POST);
                                        }

                                    }
                                    else{
                                        $select_result=$teachergrade->selectTotalTeacherGrades();
                                    }



                                    $i=1;
                                    if($select_result){
                                        foreach ($select_result as $value){

                                            ?>
                                            <tr>
                                                <td style="padding-top: 35px"><?php echo $value['teacher_name'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['class'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['subject'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['g_total'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['p_actual'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['grade'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $i++;; ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['year'] ?></td>

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