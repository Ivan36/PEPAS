
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
    <a href="school_option.php" class="btn btn-sm btn-default" style="margin-left: 10px;"><i class="fa fa-graduation-cap"></i> Manage Schools</a>
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="school_option.php"><i class="fa fa-plus"></i>School Manage </a></li>
    <li class="">Profile</li>
    <li class='active'>Update</li>

  </ol>
</section>
<!------ student update form submit here --------->
<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
  $update_result=$school->updateSchool($_POST,$sch_id);
}
?>
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
      <div id="div_print" class="box">
        <h3 class="text-center">Update Information of<b style="color: blue;"> <?php echo $school_value['sch_name']; ?></b></h3><br>
        <div class="box-body">
          <!----- student profile --------->
          <div class="row">
            <div class="col-md-1 col-lg-1"></div>
            <div class="col-lg-10 col-md-10">
              <?php
              if(isset($update_result)){
               echo $update_result;
              }
              ?>
              <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"></div>
              <div class="col-lg-10 col-md-10">
                <div class="row">
                                    <form action="" method="post">
                                        <div class="row">

                                            <div class="col-md-12 col-lg-12 ">
                                                <div class="col-md-6 col-lg-6 ">
                                                    <div class="form-group">
                                                        <label for="sf">School Name</label>
                                                        <input type="text" id="sf" class="form-control" name="school_name" value="<?php echo $school_value['sch_name'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">School Number</label>
                                                        <input type="text" id="sf" class="form-control" name="school_no" value="<?php echo $school_value['sch_no'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Number of Girls</label>
                                                        <input type="number" id="sf" class="form-control" name="girls" value="<?php echo $school_value['girls'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Number of Boys</label>
                                                        <input type="number" id="sf" class="form-control" name="boys" value="<?php echo $school_value['boys'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>School category</label><br>
                                                        <input type="radio" name="category" style='width:20px; border:0;' value="government" checked="checked"> Government &ensp;&ensp;&ensp;&ensp;
                                                        <input type="radio" name="category" style='width:20px; border:0;' value="private"> Private

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 ">
                                                    <div class="form-group">
                                                        <label for="sf">District</label>
                                                        <input type="text" id="sf" class="form-control" name="district" value="<?php echo $school_value['district'] ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">County</label>
                                                        <select class="form-control" name="county">
                                                            <option value="<?php echo $school_value['county'] ?>"><?php echo $school_value['county'] ?></option>
                                                            <option value="Kashari">Kashari</option>
                                                            <option value="Municipality">Mbarara Municipality</option>
                                                            <option value="Rwampala">Rwampala</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sub County</label><br>
                                                        <select class="form-control" name="subcounty">
                                                            <option value="<?php echo $school_value['sub_county'] ?>" selected="true"><?php echo $school_value['sub_county'] ?></option>
                                                            <option value="Bubaare">Bubaare</option>
                                                            <option value="Kagongi">Kagongi</option>
                                                            <option value="Bukiro">Bukiro</option>
                                                            <option value="Kashare">Kashare</option>
                                                            <option value="Rubaya">Rubaya</option>
                                                            <option value="Rwanyamahembe">Rwanyamahembe</option>
                                                            <option value="Rubindi">Rubindi</option>
                                                            <option value="Biharwe">Biharwe</option>
                                                            <option value="Kakyika">Kakyika</option>
                                                            <option value="Kakoba">Kakoba</option>
                                                            <option value="Kamikuzi">Kamikuzi</option>
                                                            <option value="Nyakayojo">Nyakayojo</option>
                                                            <option value="Nyamitanga">Nyamitanga</option>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Parish</label>
                                                        <input type="text" id="sf" class="form-control" name="parish" value="<?php echo $school_value['parish'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Update Date</label>
                                                        <input type="text" id="sf" class="form-control" name="date" value="<?php echo date("Y-M-D") ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4"></div>
                                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                                        <input type="submit" name="btn_update" value="Update" class="btn btn-primary btn-block">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

           </div>
           <div class="col-md-1"></div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="col-md-1"></div>
</div>
</section>


<?php
require_once 'inc/footer.php';
?>