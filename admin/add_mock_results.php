<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['sch_name'])) {
  $sch_name = mysqli_real_escape_string(database::connect(), $_GET['sch_name']);
}
?>

<!-- Right side Threme color setting -->
<section class="content-header">
  <h1> Dashboard <small>School Info</small></h1>
  <ol class="breadcrumb">
    <a href="add_p7_std.php" class="btn btn-sm btn-default" style="margin-left: 10px;"><i class="fa fa-graduation-cap"></i> Manage Schools</a>
    <li><a class="btn btn btn-default" href="manage_mock_results.php" style=""><i class="fa fa-eye"></i> Manage Mock Reults</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="add_p7_std.php"><i class="fa fa-plus"></i>School Manage </a></li>
    <li class="">Profile</li>
    <li class='active'>Update</li>

  </ol>
</section>
<!------ student update form submit here --------->
<?php
//Select School by id
$single_school = $school->singleSchoolName($sch_name);
if ($single_school) {
  $school_value = $single_school->fetch_assoc();
}

?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="box">
        <br>

        <h3 class="text-center">Add<b style="color: red;"> P7 Mock </b>Results for Students of <b style="color: blue;"> <?php echo $school_value['sch_name']; ?></b></h3><br>
        <br>
        <div class="box-body">
          <!------ admission form submit here --------->
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_submit'])) {
            $add_marks = $studentresults->addMockResults($_POST);
          }
          ?>

          <form role="form" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-1 col-lg-1"></div>
              <div class="col-lg-10 col-md-10">
                <?php
                if (isset($add_marks)) {

                  echo $add_marks;
                }
                ?>
                <div class="row">
                  <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                    <div class="form-group">
                      <label for="sf">School Name *</label>
                      <input type="text" id="sf" value="<?php echo $school_value['sch_name'] ?>" class="form-control" name="school_name" readonly>
                      <input type="hidden" id="sf" value="<?php echo $school_value['sch_no'] ?>" class="form-control" name="school_no" readonly>
                    </div>
                    <div class="form-group">
                      <label for="education">English Grade *</label>
                      <select class="form-control" id="se" name="eng_g">
                        <option value="0" selected="">Select Grade</option>
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
                        <option value="0" selected="">Select Grade</option>
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
                      <label for="tm">Select Year</label>
                      <select name="year" class="form-control">
                        <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                        <?php
                        for ($i = 2010; $i < date('Y'); $i++) {
                          echo "<option value='$i'>$i</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                    <div class="form-group">
                      <label for="se">Select Students</label>
                      <select name="std_no" id="se" class="form-control">
                        <option value="0" selected="selected">Select School</option>
                        <?php

                        $select_result = $primaryseven->selectStudentForm($sch_name);

                        $i = 1;
                        if ($select_result) {
                          foreach ($select_result as $value) {

                            ?>

                            <option value="<?php echo $value['std_no']; ?>"><?php echo $value['student_name'] . " : " . $value['std_no'] ?></option>
                          <?php }
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="sf">Science Grade *</label>
                      <select class="form-control" id="se" name="sci_g">
                        <option value="0" selected="">Select Grade</option>
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
                        <option value="0" selected="">Select Grade</option>
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
                      <label for="union">Reporting Date *</label>
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