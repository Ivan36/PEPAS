
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['sch_id'])){
  $sch_id=mysqli_real_escape_string(database::connect(),$_GET['sch_id']);
}
?>

<!-- Right side Threme color setting -->
<section class="content-header">
  <h1> Dashboard <small>School Info</small></h1>
  <ol class="breadcrumb">
    <a href="add_p4_std.php" class="btn btn-sm btn-default" style="margin-left: 10px;"><i class="fa fa-graduation-cap"></i> Manage Schools</a>
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="add_p4_std.php"><i class="fa fa-plus"></i>School Manage </a></li>
    <li class="">Profile</li>
    <li class='active'>Update</li>

  </ol>
</section>
<!------ student update form submit here --------->
<?php
//Select School by id
$single_school=$school->singleSchool($sch_id);
if($single_school){
  $school_value=$single_school->fetch_assoc();
}

?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="box">
        <br>

        <h3 class="text-center">Add <b style="color: red;">P4</b> Students of <b style="color: blue;"> <?php echo $school_value['sch_name']; ?></b></h3><br>
        <br>
        <div class="box-body">
          <!------ admission form submit here --------->
          <?php
          if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
            $add_students=$primaryfour->addStudents($_POST);
          }
          ?>

          <form role="form" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-1 col-lg-1"></div>
              <div class="col-lg-10 col-md-10">
                <?php
                if (isset($add_students)){

                  echo $add_students;
                }
                ?>
                <div class="row">
                  <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                    <div class="form-group">
                      <label for="sf">School Name *</label>
                      <input type="text" id="sf" value="<?php echo $school_value['sch_name'] ?>" class="form-control" name="school_name" readonly>
                    </div>
                    <div class="form-group">
                      <label for="education">Student Names *</label>
                      <input name="student_name" type="text" class="form-control"  placeholder="Education status">
                    </div>
                    <div class="form-group">
                      <label for="dateOfBirth">Date OF Birth *</label>
                      <input id="datePicker" name="birth_date" type="text" readonly class="form-control" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender *</label>
                      <br>
                      <!-- checked="checked" -->
                      <input type="radio" name="gender" style='width:20px; border:0;' value="Male" > Male &ensp;&ensp;&ensp;&ensp;
                      <input type="radio" name="gender" style='width:20px; border:0;' value="Female"> Female &ensp;&ensp;&ensp;&ensp;
                      <input type="radio" name="gender" style='width:20px; border:0;' value="Other"> Other
                    </div>
                    
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                    <div class="form-group">
                      <label for="sf">School Number</label>
                      <input type="text" id="sf" value="<?php echo $school_value['sch_no'] ?>" class="form-control" name="school_no" readonly>
                    </div>
                    <div class="form-group">
                      <label for="union">Home Location *</label>
                      <input name="home_address" type="text" class="form-control"  placeholder="Parish/Division name">
                    </div>
                    <div class="form-group">
                      <label for="district">District *</label>
                      <input name="district" type="text" class="form-control" value="Mbarara">
                    </div>
                    <div class="form-group">
                      <label for="tm">Select Year</label>
                      <select name="year" class="form-control">
                        <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                        <?php 
                        for($i = 2010 ; $i < date('Y'); $i++){
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