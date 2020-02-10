
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
$single_student=$primaryfour->selectSingleStudent($std_id);
if($single_student){
    $value=$single_student->fetch_assoc();
}

?>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Student Info</small></h1>

    <ol class="breadcrumb">
        <li><a class="btn btn btn-default" href="manage_p4_std.php" style=""><i class="fa fa-eye"></i> Manage Students</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Student Manage</li>
        <li class="active">Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <div class="container-fluid">
                    <div class="text-center">
                        <br>
                        <a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i> </a>
                    </div>
                    <br>
                    <h3 class="text-center">Profile of <b style="color: blue;"><?php echo $value['student_name']; ?></b></h3><br>
                    <br>
                    <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1 col-lg-1"></div>
                            <div class="col-lg-10 col-md-10">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">

                                        <div class="row container-fluid">
                                            <div class="col-md-12 col-lg-12 table-responsive">

                                                <table class="table table-responsive-sm ">
                                                    <tr>
                                                        <th>General Information</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Student Id</td>
                                                        <td><?php echo $value['id']; ?></td>

                                                        <td>Student Name</td>
                                                        <td><?php echo $value['student_name']; ?></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Enrolment Year</td>
                                                        <td><?php echo $value['year']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Personal Information</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td><?php echo $value['gender']; ?></td>
                                                        <td>Date of Birth</td>
                                                        <td><?php echo $value['date_of_birth']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Students No</td>
                                                        <td><?php echo $value['std_no']; ?></td>
                                                        <td>Class </td>
                                                        <td><?php echo  $value['class']; ?></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Home Address</td>
                                                        <td><?php echo $value['home_address']; ?></td>
                                                        <td>District</td>
                                                        <td><?php echo $value['district']; ?></td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-lg-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-3 "></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                        <a href="update_p4_std.php?std_id=<?php echo $value['id']; ?>" type="submit" class="btn btn-info btn-block">Update Profile</a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-3"></div>
                </div>

            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

</section>


<?php
require_once 'inc/footer.php';
?>