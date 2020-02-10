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
        <li><a href="#"><i class="fa fa-eye"></i>School Manage Mock Grades </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title">Schools Mock Grades </h3>
                        <a href="add_sch_mock_results.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 col-sm-2 col-xs-2"></div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="tm">Filter the grades by selecting Year</label>
                                        <select name="filteryear" class="form-control">
                                            <option value="0">select year</option>
                                            <?php 
                                            for($i = 2014 ; $i <= date('Y'); $i++){
                                              echo "<option value='$i'>$i</option>";
                                          }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-2 col-xs-2" style="padding-top: 26px;">
                                <button name="btn_submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <?php
                    if(isset($del_message)){
                        echo $del_message;
                    }
                    ?>
                    <table cellspacing="0" width="100%" id="example" class="display table table-striped table-bordered table-hover table-responsive">

                        <thead>
                            <tr id="filters">
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                            <th>SchoolName</th>
                            <th>Head Teacher</th>
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
                            $add_result=$hteachergrade->selectMockResultRank($_POST);
                            if ($add_result) {
                                $select_result=$hteachergrade->selectMockResultRank($_POST);
                            }
                            else{
                                $select_result=$hteachergrade->selectMockResultRank($_POST);
                            }

                        }
                        else{
                            $select_result=$hteachergrade->selectSchoolMockResult();
                        }


                        $i=1;
                        if($select_result){
                            foreach ($select_result as $value){

                                ?>
                                <tr>
                                    <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                    <td style="padding-top: 35px"><?php echo $value['teacher_name'] ?></td>
                                    <td style="padding-top: 35px"><?php echo $value['g_total'] ?></td>
                                    <td style="padding-top: 35px"><?php echo $value['p_actual'] ?></td>
                                    <td style="padding-top: 35px"><?php
                                    if ($value['grade']=='Grade two') {
                                        echo "grade II";
                                    }
                                    else if ($value['grade']=='Grade four') {
                                        echo "grade IV";
                                    }
                                    else if ($value['grade']=='Grade three') {
                                        echo "grade III";
                                    }
                                    else if ($value['grade']=='Ungraded') {
                                        echo "U";
                                    }
                                    else if ($value['grade']=='Grade one') {
                                        echo "grade III";
                                    }
                                    else{
                                     echo "No grade"; 
                                 }

                                 ?></td>
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