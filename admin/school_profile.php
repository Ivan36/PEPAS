
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['sch_id'])){
    $sch_id=mysqli_real_escape_string(database::connect(),$_GET['sch_id']);
}
else{
    echo "<script>Window.location='index.php';</script>";
}


?>

<?php
//Select student by id
$single_schoolinfo=$schoolinfo->singleSchoolInfo($sch_id);
if($single_schoolinfo){
    $schoolinfo_value=$single_schoolinfo->fetch_assoc();
}

?>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>School Info</small></h1>

    <ol class="breadcrumb">
        <li><a class="btn btn btn-default" href="manage_sch_info.php" style=""><i class="fa fa-eye"></i> Manage Schools</a></li>
        <!-- <li><a class="btn btn btn-success" href="manage_teacher.php" style=""><i class="fa fa-eye"></i> Manage Teachers</a></li> -->
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">School Manage</li>
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
                    <h3 class="text-center">Information of <b style="color: blue;"><?php echo $schoolinfo_value['sch_name'] . " " . $schoolinfo_value['level']; ?></b></h3><br>
                    <br>
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
                                            <div class="col-md-12 table-responsive">

                                                <table class="table table-responsive-sm ">
                                                    <tr>
                                                        <td>Id</td>
                                                        <td><?php echo $schoolinfo_value['id']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>School Name</td>
                                                        <td><?php echo $schoolinfo_value['sch_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Head teacher Names</td>
                                                        <td><?php echo $schoolinfo_value['hteacher_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Year</td>
                                                        <td> <?php echo $schoolinfo_value['year']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>School Number</td>
                                                        <td> <?php echo $schoolinfo_value['sch_no']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Head teacher Number</td>
                                                        <td><?php echo $schoolinfo_value['h_id']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td><?php echo $schoolinfo_value['status']; ?></td>
                                                    </tr>
                                                    
                                                </table>
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
            <div class="">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-3 "></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                        <a href="update_school_profile.php?tea_id=<?php echo $schoolinfo_value['id']; ?>" type="submit" class="btn btn-info btn-block">Update school Profile</a>
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