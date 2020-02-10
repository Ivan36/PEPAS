
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Teacher Info</small></h1>

    <ol class="breadcrumb">
        <li><a class="btn btn btn-default" href="manage_hteacher.php" style=""><i class="fa fa-eye"></i> Manage H/Ts</a></li>
        <li><a class="btn btn btn-default" href="manage_teacher.php" style=""><i class="fa fa-eye"></i> Manage Teachers</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Teacher Manage</li>
        <li class="active">Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="text-center">
        <br>
        <a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i> </a>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <div class="container-fluid">

                    <br>
                    <?php

                    $select_result=$teacher->selectTotalHTeacher();

                    $i=1;
                    if($select_result){
                        foreach ($select_result as $teacher_value){

                            ?>
                            <h3 class="text-center">Information(Profile) of H/T: <b style="color: blue;"><?php echo $teacher_value['teacher_name']; ?></b></h3><br>
                            <br>
                            <div class="box-body">
                                <!----- student profile --------->
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                                                    <div class="text-center">
                                                        <img src="<?php echo $teacher_value['image']; ?>" width="130px" height="140px">
                                                    </div>
                                                    <br>
                                                    <br>
                                                </div>

                                                <div class="row container-fluid">
                                                    <div class="col-md-12 table-responsive">

                                                        <table class="table table-responsive-sm ">
                                                         <tr>
                                                            <th>General Information</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Head Teacher Roll</td>
                                                            <td><?php echo $teacher_value['id']; ?></td>
                                                            
                                                            <td>Head Teacher Name</td>
                                                            <td><?php echo $teacher_value['teacher_name']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender</td>
                                                            <td><?php echo $teacher_value['gender']; ?></td>
                                                            
                                                            <td>Date of Birth</td>
                                                            <td><?php echo $teacher_value['birth_date']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact Information</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile</td>
                                                            <td><?php echo $teacher_value['mobile']; ?></td>

                                                            <td>National Id</td>
                                                            <td><?php echo  $teacher_value['national_id']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Education </td>
                                                            <td><?php echo  $teacher_value['education']; ?></td>
                                                            <td>Designation </td>
                                                            <td><?php echo $teacher_value['designation']; ?></td>
                                                        </tr>

                                                        <?php
                                                        $address=$teacher_value['address'];
                                                        $exp=explode(',',$address);
                                                        $village=$exp['0'];
                                                        $union=$exp['1'];
                                                        $sub_district=$exp['2'];
                                                        $district=$exp['3'];
                                                        ?>
                                                        <tr>
                                                            <th>Address</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Village</td>
                                                            <td><?php echo $village; ?></td>
                                                            <td>Parish</td>
                                                            <td><?php echo $union; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub County</td>
                                                            <td><?php echo $sub_district; ?></td>
                                                            <td>District</td>
                                                            <td><?php echo $district; ?></td>
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

                    <?php }} ?>
                </div>
            </div>
            <div class="">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-3 "></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                        <a href="update_hteacher.php?tea_id=<?php echo $teacher_value['id']; ?>" type="submit" class="btn btn-info btn-block">Update Profile</a>
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