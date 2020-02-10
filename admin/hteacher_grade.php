

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';

?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>School Data Management</small></h1>
    <ol class="breadcrumb">
        <a class="btn btn btn-default" href="hteacher_grades_list.php" style="margin-left: 10px;"><i class="fa fa-eye"></i> Manage H/T grades</a>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">School Infomation</li>
        <li class="active">Add</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <br>
                <h3 class="text-center">Add Head Teacher/School <b style="color: blue"> P.L.E Results</b> Here</h3>
                <p class="text-center" style="color: red; font-size: 16px;">Note: If there are no students in acertain grade leave it as Zero (0).</p>
                <br>
                <div class="box-body">
                    <!------ admission form submit here --------->
                    <?php

                    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                        $add_result=$hteachergrade->addGrades($_POST);
                    }
                    ?>

                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <?php
                                if (isset($add_result)){

                                    echo $add_result;
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xs-10 col-sm-10">
                                        <div class="form-group">
                                            <label for="se">School Name</label>
                                            <select name="school_name" id="se" class="form-control">
                                                <option value="0" selected="selected">Select School</option>
                                                <?php

                                                $select_result=$schoolinfo->selectTotalSchoolForm();

                                                $i=1;
                                                if($select_result){
                                                    foreach ($select_result as $value){

                                                        ?>

                                                        <option value="<?php echo $value['sch_name']; ?>"><?php echo $value['sch_name'] . " " . "P/S" . " : ".$value['hteacher_name'] ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="se">Grade One (I)</label>
                                                <input type="number" name="g_one" id="se" value="0" class="form-control" placeholder="enter No of students in grade one">
                                            </div>
                                            <div class="form-group">
                                                <label for="se">Grade Two (II)</label>
                                                <input type="number" name="g_two" id="se" value="0" class="form-control" placeholder="enter No of students in grade Two">
                                            </div>

                                            <div class="form-group">
                                                <label for="se">Grade Three (III)</label>
                                                <input type="number" name="g_three" value="0" id="se" class="form-control" placeholder="enter No of students in grade Three">
                                            </div>
                                            <div class="form-group">
                                                <label for="se">Reporting Date</label>
                                                <input type="text" name="date" id="se" value="<?php
                                                date_default_timezone_set('Africa/Nairobi');
                                                echo $timestamp = date("d-m-Y h:i:s a", time());?>" class="form-control" placeholder="enter No of students in grade one" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <label for="tm">Select Year</label>
                                                <select name="year" class="form-control">
                                                 <option value="2019" selected="selected">2019</option>
                                                 <?php 
                                                 for($i = 2019 ; $i <= date('Y'); $i++){
                                                  echo "<option value='$i'>$i</option>";
                                              }
                                              ?>
                                          </select>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="se">Grade Four (IV)</label>
                                        <input type="number" name="g_four" value="0" id="se" class="form-control" placeholder="enter No of students in grade Four">
                                    </div>

                                    <div class="form-group">
                                        <label for="se">Grade Five (U)</label>
                                        <input type="number" name="g_u" value="0" id="se" class="form-control" placeholder="enter No of students who failed the exams">
                                    </div>
                                    <div class="form-group">
                                        <label for="se">Grade (X)</label>
                                        <input type="number" name="g_x" value="0" id="se" class="form-control" placeholder="enter No of students who didnot do exams">
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
                                    <button name="btn_submit" type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
</section>

<?php
require_once 'inc/footer.php';
?>



