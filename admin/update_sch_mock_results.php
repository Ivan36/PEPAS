
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['g_id'])){
    $g_id=mysqli_real_escape_string(database::connect(),$_GET['g_id']);
}
?>

<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Teacher Info</small></h1>
    <ol class="breadcrumb">
        <a class="btn btn btn-default" href="manage_sch_mock_results.php" style="margin-left: 10px;"><i class="fa fa-eye"></i> Manage Sch grades</a>
        <!-- <li><a class="btn btn btn-default" href="manage_teacher.php" style=""><i class="fa fa-eye"></i> Manage Teachers</a></li> -->
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Teacher Manage</li>
        <li class="">Profile</li>
        <li class='active'>Update</li>

    </ol>
</section>
<!------ student update form submit here --------->
<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
    $update_result=$hteachergrade->updateMockGrades($_POST,$g_id);
}
?>
<?php
//Select student by id
$single_hteacher_grade=$hteachergrade->singleSchoolMockResult($g_id);
if($single_hteacher_grade){
    $value=$single_hteacher_grade->fetch_assoc();
}

?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <h3 class="text-center">Update Mock Results of <b style="color: blue;"><?php echo $value['school_name']." P/S"; ?></b></h3><br>
                
                <div class="box-body">
                    <!----- student profile --------->
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container-fluid">
                                    </div>
                                    <div class="row container-fluid">
                                        <div class="col-md-12 table-responsive ">
                                            <?php
                                            if(isset($update_result)){
                                                echo $update_result;
                                            }
                                            ?>
                                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"></div>
                                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-6 col-xs-10 col-sm-10">
                                                                <div class="form-group">
                                                                    <label for="se">Head Name</label>
                                                                    <input type="text" id="sf" value="<?php echo $value['teacher_name'] ?>" class="form-control" name="teacher_name" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sf">School Name</label>
                                                                    <input type="text" id="sf" value="<?php echo $value['school_name'] ?>" class="form-control" name="school_name" readonly >
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="se">Grade One (I)</label>
                                                                    <input type="number" name="g_one" id="se" class="form-control"  value="<?php echo $value['g_1'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="se">Grade Two (II)</label>
                                                                    <input type="number" name="g_two" id="se" class="form-control" value="<?php echo $value['g_2'] ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="se">Grade Three (III)</label>
                                                                    <input type="number" name="g_three" id="se" class="form-control" value="<?php echo $value['g_3'] ?>">
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-xs-10 col-sm-10">
                                                                <div class="form-group">
                                                                    <label for="tm">Year</label>
                                                                    <input type="text" name="year" id="se" class="form-control" value="<?php echo $value['year'] ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="se">Grade Four (IV)</label>
                                                                    <input type="number" name="g_four" id="se" class="form-control" value="<?php echo $value['g_4'] ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="se">Grade Five (U)</label>
                                                                    <input type="number" name="g_u" id="se" class="form-control" value="<?php echo $value['g_u'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="se">Grade (X)</label>
                                                                    <input type="number" name="g_x" id="se" class="form-control" value="<?php echo $value['g_x'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="se">Updating Date</label>
                                                                    <input type="text" name="date" id="se" value="<?php
                                                                    date_default_timezone_set('Africa/Nairobi');
                                                                    echo $timestamp = date("d-m-Y h:i:s a", time());?>" class="form-control" placeholder="enter No of students in grade one" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1"></div>
                                                </div>
                                                <div class="box-footer">
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-xs-2 col-md-4 col-sm-2"></div>
                                                            <div class="col-lg-4 col-xs-6 col-md-4 col-sm-6">
                                                                <button name="btn_update" type="submit" class="btn btn-primary btn-block">Update</button>
                                                            </div>
                                                            <div class="col-lg-4"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>


<?php
require_once 'inc/footer.php';
?>