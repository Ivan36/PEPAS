
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['sub_id'])){
    $sub_id=mysqli_real_escape_string(database::connect(),$_GET['sub_id']);
}
?>

<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Subject Info</small></h1>
    <ol class="breadcrumb">
      <a href="manage_notice.php" class="btn btn-sm btn-default" style="margin-left: 10px;"><i class="fa fa-eye"></i> Manage Subjects</a>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Subject Manage</li>
        <li class="">Profile</li>
        <li class='active'>Update</li>

    </ol>
</section>
<!------ student update form submit here --------->
<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
    $update_result=$subject->updateSubject($_POST,$sub_id);
}
?>
<?php
//Select School by id
$single_subject=$subject->singleSubject($sub_id);
if($single_subject){
    $subject_value=$single_subject->fetch_assoc();
}

?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <br>
                
                <h3 class="text-center">Information of <b style="color: blue;"> <?php echo $subject_value['Sub_Name']; ?></b></h3>
                <br>
                <br>
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
                        <div class="col-md-3 col-lg-3"></div>
                        <div class="col-lg-8 col-md-8">
                            
                            <form action="" method="post">
                                <div class="row">
                                 <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="sf">Subject Name</label>
                                        <input type="text" id="sf" value="<?php echo $subject_value['Sub_Name'] ?>" class="form-control" name="subject_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="sf">Subject code</label>
                                        <input type="text" id="sf" value="<?php echo $subject_value['Sub_code'] ?>" class="form-control" name="subject_no">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                   <input name="btn_update" type="submit" class="btn btn-info btn-block" value="Update Now" />
                               </div>
                               <div class="col-md-4"></div>
                           </div>
                       </form>

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