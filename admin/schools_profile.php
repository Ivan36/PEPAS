
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['sch_id'])){
  $sch_id=mysqli_real_escape_string(database::connect(),$_GET['sch_id']);
}
?>

<?php
//Select School by id
$single_school=$school->singleSchool($sch_id);
if($single_school){
  $school_value=$single_school->fetch_assoc();
}

?>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Teacher Info</small></h1>

    <ol class="breadcrumb">
        <a href="school_option.php" class="btn btn-sm btn-default" style="margin-left: 10px;"><i class="fa fa-graduation-cap"></i> Manage Schools</a>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Teacher Manage</li>
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
                        <a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i> </a>
                    </div>
                    <h3 class="text-center">School Profile of <b style="color: blue;"><?php echo $school_value['sch_name'] . " " . $school_value['level']; ?></b></h3><br>
                    <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="row container-fluid">
                                            <div class="col-md-12 table-responsive">

                                                <table class="table table-responsive-sm ">
                                                    <tr>
                                                        <td>School Number</td>
                                                        <td><?php echo $school_value['sch_no']; ?></td>
                                                        <td>School Name</td>
                                                        <td><?php echo $school_value['sch_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>District</td>
                                                        <td><?php echo $school_value['district']; ?></td>

                                                        <td>County</td>
                                                        <td><?php echo $school_value['county']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub County</td>
                                                        <td><?php echo $school_value['sub_county']; ?></td>

                                                        <td>Parish</td>
                                                        <td><?php echo  $school_value['parish']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number of Girls </td>
                                                        <td><?php echo  $school_value['girls']; ?></td>
                                                        <td>Number of Boys </td>
                                                        <td><?php echo $school_value['boys']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Total Students</td>
                                                        <td><?php echo $school_value['total']; ?></td>
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
                        <a href="update_sch.php?sch_id=<?php echo $school_value['id']; ?>" type="submit" class="btn btn-info btn-block">Update Profile</a>
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