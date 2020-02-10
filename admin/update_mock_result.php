<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['std_id'])) {
    $std_id = mysqli_real_escape_string(database::connect(), $_GET['std_id']);
} else {
    echo "<script>Window.location='index.php';</script>";
}


?>

<?php
//Select student by id
$single_student = $primaryseven->selectSingleMockResult($std_id);
if ($single_student) {
    $value = $single_student->fetch_assoc();
}

?>

<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a class="btn btn btn-default" href="manage_mock_results.php" style=""><i class="fa fa-eye"></i> Manage Mock Reults</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Student Manage</li>
        <li class="">Profile</li>
        <li class='active'>Update</li>

    </ol>
</section>
<!------ student update form submit here --------->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])) {
    $update_result = $studentresults->updateMockResults($_POST, $std_id);
}
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <div class="container-fluid">
                    <br>
                    <h3 class="text-center">Update Mock Results of <b style="color:blue"> <?php echo $value['student_name']; ?></b> (Class: P7)</h3><br>
                    <br>
                    <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1 col-lg-1"></div>
                            <div class="col-lg-10 col-md-10">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 table-responsive">
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-1 col-lg-1"></div>
                                                <div class="col-lg-10 col-md-10">
                                                    <?php
                                                    if (isset($update_result)) {

                                                        echo $update_result;
                                                    }
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                                                            <div class="form-group">
                                                                <label for="sf">School Name *</label>
                                                                <input type="text" id="sf" value="<?php echo $value['school_name']; ?>" class="form-control" name="school_name" readonly>
                                                                <input type="hidden" id="sf" value="<?php echo $value['std_no']; ?>" class="form-control" name="std_no" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="education">English Grade *</label>
                                                                <select class="form-control" id="se" name="eng_g">
                                                                    <option value="<?php echo $value['english_g']; ?>"><?php echo $value['english_g']; ?></option>
                                                                    <option value="D1">D1</option>
                                                                    <option value="D2">D2</option>
                                                                    <option value="C3">C3</option>
                                                                    <option value="C4">C4</option>
                                                                    <option value="C5">C5</option>
                                                                    <option value="C6">C6</option>
                                                                    <option value="P7">P7</option>
                                                                    <option value="P8">P8</option>
                                                                    <option value="F9">F9</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="dateOfBirth">Math Grade *</label>
                                                                <select class="form-control" id="se" name="math_g">
                                                                    <option value="<?php echo $value['math_g']; ?>"><?php echo $value['math_g']; ?></option>
                                                                    <option value="D1">D1</option>
                                                                    <option value="D2">D2</option>
                                                                    <option value="C3">C3</option>
                                                                    <option value="C4">C4</option>
                                                                    <option value="C5">C5</option>
                                                                    <option value="C6">C6</option>
                                                                    <option value="P7">P7</option>
                                                                    <option value="P8">P8</option>
                                                                    <option value="F9">F9</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tm">Year</label>
                                                                <input class="form-control" type="text" value="<?php echo $value['year']; ?>" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                                                            <div class="form-group">
                                                                <label for="se">Select Students</label>
                                                                <input type="text" id="sf" value="<?php echo $value['student_name']; ?>" class="form-control" name="student_name" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sf">Science Grade *</label>
                                                                <select class="form-control" id="se" name="sci_g">
                                                                    <option value="<?php echo $value['science_g']; ?>"><?php echo $value['science_g']; ?></option>
                                                                    <option value="D1">D1</option>
                                                                    <option value="D2">D2</option>
                                                                    <option value="C3">C3</option>
                                                                    <option value="C4">C4</option>
                                                                    <option value="C5">C5</option>
                                                                    <option value="C6">C6</option>
                                                                    <option value="P7">P7</option>
                                                                    <option value="P8">P8</option>
                                                                    <option value="F9">F9</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="union">Social Studies *</label>
                                                                <select class="form-control" id="se" name="sst_g">
                                                                    <option value="<?php echo $value['sst_g']; ?>"><?php echo $value['sst_g']; ?></option>
                                                                    <option value="D1">D1</option>
                                                                    <option value="D2">D2</option>
                                                                    <option value="C3">C3</option>
                                                                    <option value="C4">C4</option>
                                                                    <option value="C5">C5</option>
                                                                    <option value="C6">C6</option>
                                                                    <option value="P7">P7</option>
                                                                    <option value="P8">P8</option>
                                                                    <option value="F9">F9</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="union">Update Date *</label>
                                                                <input name="date" type="text" class="form-control" value="<?php
                                                                echo $timestamp = date("d-m-Y h:i:s a", time()); ?>" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>
                                            </div>
                                            <div class="box-footer">
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div class="col-lg-4">
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
                            <div class="col-md-1 col-lg-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-lg-1"></div>
    </div>
</section>


<?php
require_once 'inc/footer.php';
?>