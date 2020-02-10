

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';

?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>School Data Management</small></h1>
    <ol class="breadcrumb">
        <a class="btn btn btn-default" href="manage_teacher_sch.php" style="margin-left: 10px;"><i class="fa fa-eye"></i> Manage school info</a>
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
                <h3 class="text-center">Add Teacher's Schools Classes & Subjects info Here</h3>
                <br>
                <div class="box-body">
                    <!------ admission form submit here --------->
                    <?php

                    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                        $add_result=$teacherschool->addSchTeacher($_POST);
                    }
                    ?>

                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                                <?php
                                if (isset($add_result)){

                                    echo $add_result;
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-3 col-lg-3"></div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="se">School Name</label>
                                            <select name="school_name" id="se" class="form-control">
                                                <option value="0" selected="selected">Select School</option>
                                                <?php

                                                $select_result=$school->selectTotalSchool();

                                                $i=1;
                                                if($select_result){
                                                    foreach ($select_result as $value){

                                                        ?>

                                                        <option value="<?php echo $value['sch_name']; ?>"><?php echo $value['sch_name']; ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="se">Teacher Names</label>
                                                <select name="teacher_name" id="se" class="form-control">
                                                    <option value="0" selected="selected">Select Teacher</option>
                                                    <?php

                                                    $select_result=$teacher->selectTotalTeacher();

                                                    $i=1;
                                                    if($select_result){
                                                        foreach ($select_result as $value){

                                                            ?>

                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                    </select>
                                                </div>
                                                 <div class="form-group">
                                                <label for="se">Select All Classe</label><br>
                                                        <input type="radio" name="class_name" value="Primary One"> P.1 &ensp;&ensp;&ensp;
                                                        <input type="radio" name="class_name" value="Primary Two"> P.2 &ensp;&ensp;&ensp;
                                                        <input type="radio" name="class_name" value="Primary Three"> P.3 &ensp;&ensp;&ensp;
                                                        <input type="radio" name="class_name" value="Primary Four"> P.4 &ensp;&ensp;
                                                        <input type="radio" name="class_name" value="Primary Five"> P.5&ensp;&ensp;&ensp;
                                                        <input type="radio" name="class_name" value="Primary Six">
                                                        P.6 &ensp;&ensp;&ensp;
                                                         <input type="radio" name="class_name" value="Primary Seven">
                                                        P.7 &ensp;&ensp;&ensp;
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="se">Subject</label>
                                                <select name="subject_name" id="se" class="form-control">
                                                    <option value="0" selected="selected">Select Subject</option>
                                                    <?php

                                                    $select_result=$subject->selectTotalSubject();

                                                    $i=1;
                                                    if($select_result){
                                                        foreach ($select_result as $value){

                                                            ?>

                                                            <option value="<?php echo $value['Sub_Name']; ?>"><?php echo $value['Sub_Name']; ?></option>
                                                        <?php }} ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="tm">Select Years</label>
                                                    <select name="year[]" class="form-control" multiple="multiple">
                                                         <option value="0" selected="selected">Select Year</option>
                                                        <?php 
                                                        for($i = 2010 ; $i <= date('Y'); $i++){
                                                          echo "<option value='$i'>$i</option>";
                                                      }
                                                      ?>
                                                  </select>
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
    


