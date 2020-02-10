

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';

?>
<!-- Right side Threme color setting -->

<section class="content-header">
  <h1> Dashboard <small>School Data Management</small></h1>
  <ol class="breadcrumb">
    <a class="btn btn btn-default" href="manage_sch_info.php" style="margin-left: 10px;"><i class="fa fa-eye"></i> Manage school info</a>
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
        <h3 class="text-center">Add/Assign Head Teachers to Schools Here</h3>
        <br>
        <div class="box-body">
          <!------ admission form submit here --------->
          <?php

          if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
            $add_result=$schoolinfo->addSchInfo($_POST);
          }
          ?>

          <form role="form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group fieldGroup">
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
                        <label for="se">SchoolName</label>
                        <select name="school_name" id="se" class="form-control">
                          <?php

                          $select_result=$school->selectTotalSchoolForm();

                          $i=1;
                          if($select_result){
                            foreach ($select_result as $value){

                              ?>

                              <option value="<?php echo $value['sch_name']; ?>"><?php echo $value['sch_name']; ?></option>
                            <?php }} ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="se">Head Teacher Name</label>
                          <select name="teacher_name" id="se" class="form-control">
                            <?php

                            $select_result=$teacher->selectTotalHTeacherForm();

                            $i=1;
                            if($select_result){
                              foreach ($select_result as $value){

                                ?>

                                <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                              <?php }} ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="tm">Year</label>
                            <select name="year" class="form-control">
                              <?php 
                              for($i = 2000 ; $i <= date('Y'); $i++){
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3 col-lg-3" style="padding-top: 10%;">
                          <div class="form-group"></div>
                          <div class="input-group-addon"> 
                            <a href="javascript:void(0)" class="btn btn-success addMore"><span class="fa fa-plus" aria-hidden="true"></span> Add</a>
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
                </div>
              </form>
              <div class="form-group fieldGroupCopy" style="display: none;">
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-lg-10">
                    
                    <div class="row">
                      <div class="col-md-3 col-lg-3"></div>
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="se">SchoolName</label>
                          <select name="school_name" id="se" class="form-control">
                            <?php

                            $select_result=$school->selectTotalSchoolForm();

                            $i=1;
                            if($select_result){
                              foreach ($select_result as $value){

                                ?>

                                <option value="<?php echo $value['sch_name']; ?>"><?php echo $value['sch_name']; ?></option>
                              <?php }} ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="se">Head Teacher Name</label>
                            <select name="teacher_name" id="se" class="form-control">
                              <?php

                              $select_result=$teacher->selectTotalHTeacherForm();

                              $i=1;
                              if($select_result){
                                foreach ($select_result as $value){

                                  ?>

                                  <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                <?php }} ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="tm">Year</label>
                              <select name="year" class="form-control">
                                <?php 
                                for($i = 2000 ; $i <= date('Y'); $i++){
                                  echo "<option value='$i'>$i</option>";
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3 col-lg-3" style="padding-top: 10%;">
                            <div class="form-group"></div>
                            <div class="input-group-addon"> 
                              <a href="javascript:void(0)" class="btn btn-danger remove"><span class="fa fa-times" aria-hidden="true"></span> Remove</a>
                            </div>
                          </div>
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
        <script type="text/javascript">
          $(document).ready(function(){
    //group add limit
    var maxGroup = 10;
    
    //add more fields group
    $(".addMore").click(function(){
      if($('body').find('.fieldGroup').length < maxGroup){
        var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
        $('body').find('.fieldGroup:last').after(fieldHTML);
      }else{
        alert('Maximum '+maxGroup+' form-groups are allowed.');
      }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
      $(this).parents(".fieldGroup").remove();
    });
  });
</script>
<?php
require_once 'inc/footer.php';
?>



