
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['std_id'])){
    $std_id=mysqli_real_escape_string(database::connect(),$_GET['std_id']);
}
else{
    echo "<script>Window.location='index.php';</script>";
}


?>

<?php
//Select student by id
$single_student=$primaryseven->selectSingleStudent($std_id);
if($single_student){
    $value=$single_student->fetch_assoc();
}

?>

<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Student Manage</li>
        <li class="">Profile</li>
        <li class='active'>Update</li>

    </ol>
</section>
<!------ student update form submit here --------->
<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
    $update_result=$primaryseven->updateStudent($_POST,$std_id);
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
                    <h3 class="text-center">Update Information of <?php echo $value['student_name']; ?></h3><br>
                    <br>
                    <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1 col-lg-1"></div>
                            <div class="col-lg-10 col-md-10">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 table-responsive">
                                        <?php
                                        if(isset($update_result)){
                                            echo $update_result;
                                        }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <table class="table table-responsive table-responsive-sm ">
                                                <tr>
                                                    <td>Student Name</td>
                                                    <td><input name="student_name" type="text" class="form-control" value="<?php echo $value['student_name'] ?>"></td>
                                                    <td>School Name</td>
                                                    <td><input readonly name="school_name" type="text" class="form-control" value="<?php echo $value['school_name'] ?>"></td>
                                                    <input name="school_no" type="hidden" class="form-control" value="<?php echo $value['sch_no'] ?>">
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td>
                                                        <select class="form-control" name="gender">
                                                            <option value="">Select One</option>
                                                            <option value="Male" <?php  if($value['gender']=='Male'){ echo "selected"; } ?> >Male</option>
                                                            <option value="Female" <?php  if($value['gender']=='Female'){ echo "selected"; } ?>>Female</option>
                                                            <option value="Other" <?php  if($value['gender']=='Other'){ echo "selected"; } ?>>Other</option>
                                                        </select>
                                                    </td>
                                                    <td>Date of Birth</td>
                                                    <td><input name="birth_date" type="date" class="form-control" value="<?php echo $value['date_of_birth'] ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Class</td>
                                                    <td><input readonly type="text" name="class" class="form-control" value="<?php echo $value['class'] ?>"></td>
                                                    <td>Enrolment Year</td>
                                                    <td><input name="year" type="text" class="form-control" value="<?php echo $value['year'] ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Home Location</td>
                                                    <td><input name="home_address" type="text" class="form-control" value="<?php echo $value['home_address'] ?>"></td>
                                                    <td>District</td>
                                                    <td><input name="district" type="text" class="form-control" value="<?php echo $value['district']
                                                    ?>"></td>
                                                </tr>
                                            </table>
                                            <div class="box-footer">
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4"></div>
                                                        <div class="col-lg-4 col-md-4">
                                                            <input name="btn_update" type="submit" class="btn btn-info btn-block" value="Update Now" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4"></div>
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