<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>School Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">School Manage</li>
        <li><a href="school_option.php"><i class="fa fa-eye"></i>School Manage </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title" style="color: blue">Add Students Marks(Results) for Primary (P4) Select School & Student</h3>
                        <a href="add_school.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Add schools</a>
                    </div><!-- /.box-header -->
                    
                    <div class="row">
                        <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-10 col-lg-10">
                            
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="se">Teacher Names</label>
                                        <select name="school_name" id="se" class="form-control">
                                            <option value="0" selected="selected">Select School</option>
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
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control" value="P4" name="class" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-2" style="padding-top: 26px;">
                                        <button name="btn_submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                
                                <div class="col-md-1 col-lg-1"></div>
                                
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
            <?php
            require_once 'inc/footer.php';
            ?>