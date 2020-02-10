<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student Manage</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title">Students Who finished Alredy</h3>
                        <a href="#add_p7_std.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                        <a style="margin: 1px;" href="#all-p4-students.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-folder"></i> Get All Details</a>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"></div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="tm">Select School</label>
                                    <select name="school_name" id="se" class="form-control">
                                        <option value="0" selected="selected">Select School</option>
                                        <?php

                                        $select_result = $school->selectTotalSchool();

                                        $i = 1;
                                        if ($select_result) {
                                            foreach ($select_result as $value) {

                                                ?>

                                                <option value="<?php echo $value['sch_name']; ?>">
                                                    <?php echo $value['sch_name']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="tm">select Year</label>
                                    <select name="filteryear" class="form-control">
                                        <option value="">select year</option>
                                        <?php
                                        for ($i = 2010; $i < date('Y'); $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style="padding-top: 26px;">
                                <button name="btn_submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <?php
                            if (isset($del_message)) {
                                echo $del_message;
                            }
                            ?>
                            <table cellspacing="0" width="100%" id="example" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Student Name</th>
                                        <th>School</th>
                                        <th>Student No</th>
                                        <th>Gender</th>
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_submit'])) {
                                        $add_result = $primaryseven->filterOldStudents($_POST);
                                        if ($add_result) {
                                            $select_result = $primaryseven->filterOldStudents($_POST);
                                        } else {
                                            $select_result = $primaryseven->filterOldStudents($_POST);
                                        }
                                    } else {
                                        $select_result = $primaryseven->selectOldStudents();
                                    }
                                    $i = 1;
                                    if ($select_result) {
                                        foreach ($select_result as $value) {

                                            ?>
                                            <tr>
                                                <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['student_name'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['std_no'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['gender'] ?></td>
                                                <td style="padding-top: 35px"><?php echo $value['class'] ?></td>
                                                <td style="padding-top: 25px">
                                                    <a href="p7_std_profile.php?std_id=<?php echo $value['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                                    <a onclick="return confirm('Are you sure to delete this field?')" href="#?del_result=<?php echo $value['id'] . '-primary_seven' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
                                                </td>
                                            </tr>

                                        <?php }
                                    } ?>
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