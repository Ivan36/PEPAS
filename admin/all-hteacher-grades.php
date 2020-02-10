
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Teacher Info</small></h1>

    <ol class="breadcrumb">
        <li><a class="btn btn btn-default" href="hteacher_grades_list.php" style=""><i class="fa fa-eye"></i> Manage P.L.E Results</a></li>
        <li><a class="btn btn btn-default" href="manage_teacher.php" style=""><i class="fa fa-eye"></i> Manage Results</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Results Manage</li>
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

                    $select_result=$hteachergrade->selectTotalSchoolGrades();

                    $i=1;
                    if($select_result){
                        foreach ($select_result as $sch_grade){

                            ?>
                            <h3 class="text-center"><?php echo  $i++ .". "; ?> P.L.E Results of <b style="color: blue;"><?php echo $sch_grade['school_name'] . " P/S"; ?></b> in <?php echo $sch_grade['year']; ?></h3>
                            <div class="box-body">
                                <!----- student profile --------->
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                

                                                <div class="row container-fluid">
                                                    <div class="col-md-12 table-responsive">

                                                        <table class="table table-responsive-sm ">
                                                            <tr>
                                                                <th>General Information</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Head Teacher Names</td>
                                                                <td><?php echo $sch_grade['teacher_name']; ?></td>
                                                                <td>School Id</td>
                                                                <td><?php echo $sch_grade['id']; ?></td>

                                                                
                                                            </tr>
                                                            <tr>
                                                                <th>No of students per grade</th>
                                                                <th></th>
                                                                <th>Students per grade (%)</th>
                                                            </tr>
                                                            <tr>
                                                                <tr>
                                                                    <td>Grade I</td>
                                                                    <td><?php echo $sch_grade['g_1']; ?></td>
                                                                    <td>Grade I (Percent %)</td>
                                                                    <td><?php echo $sch_grade['p_1']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Grade II</td>
                                                                    <td><?php echo $sch_grade['g_2']; ?></td>
                                                                    <td>Grade II (Percent %)</td>
                                                                    <td><?php echo $sch_grade['p_2']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Grade III</td>
                                                                    <td><?php echo $sch_grade['g_3']; ?></td>
                                                                    <td>Grade III (Percent %)</td>
                                                                    <td><?php echo $sch_grade['p_3']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Grade IV</td>
                                                                    <td><?php echo $sch_grade['g_4']; ?></td>
                                                                    <td>Grade IV (Percent %)</td>
                                                                    <td><?php echo $sch_grade['p_4']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ungraded</td>
                                                                    <td><?php echo $sch_grade['g_u']; ?></td>
                                                                    <td>U (Percent %)</td>
                                                                    <td><?php echo $sch_grade['p_u']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Missed X</td>
                                                                    <td><?php echo $sch_grade['g_x']; ?></td>
                                                                    <td>X (Percent %)</td>
                                                                    <td><?php echo $sch_grade['p_x']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Students</td>
                                                                    <td><?php echo $sch_grade['g_total']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Actual Perfomance</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Final School Perfomance (%)</td>
                                                                    <td><?php echo  $sch_grade['p_actual']; ?></td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>School Grade </td>
                                                                    <td><?php if ($sch_grade['grade']=='Grade two') {
                                                                        echo "grade II";
                                                                    }
                                                                    else if ($sch_grade['grade']=='Grade four') {
                                                                        echo "grade IV";
                                                                    }
                                                                    else if ($sch_grade['grade']=='Grade three') {
                                                                        echo "grade III";
                                                                    }
                                                                    else if ($sch_grade['grade']=='Ungraded') {
                                                                        echo "U";
                                                                    }
                                                                    else if ($sch_grade['grade']=='Grade one') {
                                                                        echo "grade III";
                                                                    }
                                                                    else{
                                                                     echo "No grade"; 
                                                                 }

                                                                 ?></td>
                                                                 <td>Remarks </td>
                                                                 <td><?php echo $sch_grade['remarks']; ?></td>
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
                            <!-- <a href="update_hteacher.php?tea_id=<//?php echo $teacher_value['id']; ?>" type="submit" class="btn btn-info btn-block">Update Profile</a> -->
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