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
        <li><a href="#"><i class="fa fa-eye"></i>School Manage Grades </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="text-center">
        <a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i> </a><a class="pull-right" style="color: red;" href="best_schools.php">View government schools only</a>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
            <div id="div_print" class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="text-center" style="text-align: center; color: blue; font-size: 20px;">Best Performing Overall Schools in P.L.E Results</h3>
                        
                    </div><!-- /.box-header -->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title" style="text-align: center; color: blue; font-size: 20px;">Best (10) Schools in <?php echo $get_curr_year - 1; ?> </h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table cellspacing="0" width="100%" id="example4" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                                    <thead>
                                        <tr>
                                            <th>SchoolName</th>
                                            <th>Actual Grade(%)</th>
                                            <th>Category</th>
                                            <th>Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $select_result=$hteachergrade->selectTotalGrades21();

                                        $i=1;
                                        if($select_result){
                                            foreach ($select_result as $value){

                                                ?>
                                                <tr>
                                                    <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                                    <td style="padding-top: 35px"><?php echo $value['p_actual'] ?></td>
                                                    <td style="padding-top: 35px"><?php echo $value['sch_category'] ?></td>
                                                    <td style="padding-top: 35px"><?php echo $i++; ?></td>
                                                </tr>

                                            <?php }} ?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div>

                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="box-header">
                                    <h3 class="box-title" style="text-align: center; color: blue; font-size: 20px;">Best (10) Schools in <?php echo $get_curr_year - 2; ?> </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table cellspacing="0" width="100%" id="example4" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                                        <thead>
                                            <tr>
                                                <th>SchoolName</th>
                                                <th>Actual Grade(%)</th>
                                                <th>Category</th>
                                                <th>Rank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $select_result=$hteachergrade->selectTotalGrades22();

                                            $i=1;
                                            if($select_result){
                                                foreach ($select_result as $value){

                                                    ?>
                                                    <tr>
                                                        <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                                        <td style="padding-top: 35px"><?php echo $value['p_actual'] ?></td>
                                                        <td style="padding-top: 35px"><?php echo $value['sch_category'] ?></td>
                                                        <td style="padding-top: 35px"><?php echo $i++; ?></td>
                                                    </tr>

                                                <?php }} ?>
                                            </tbody>

                                        </table>
                                    </div><!-- /.box-body -->
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="box-header">
                                        <h3 class="box-title" style="text-align: center; color: blue; font-size: 20px;">Best (10) Schools in <?php echo $get_curr_year - 3; ?> </h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body table-responsive">
                                        <table cellspacing="0" width="100%" id="example4" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                                            <thead>
                                                <tr>
                                                    <th>SchoolName</th>
                                                    <th>Actual Grade(%)</th>
                                                    <th>Category</th>
                                                    <th>Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $select_result=$hteachergrade->selectTotalGrades23();

                                                $i=1;
                                                if($select_result){
                                                    foreach ($select_result as $value){

                                                        ?>
                                                        <tr>
                                                            <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                                            <td style="padding-top: 35px"><?php echo $value['p_actual'] ?></td>
                                                            <td style="padding-top: 35px"><?php echo $value['sch_category'] ?></td>
                                                            <td style="padding-top: 35px"><?php echo $i++; ?></td>
                                                        </tr>

                                                    <?php }} ?>
                                                </tbody>

                                            </table>
                                        </div><!-- /.box-body -->
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="box-header">
                                            <h3 class="box-title" style="text-align: center; color: blue; font-size: 20px;">Best (10) Schools in <?php echo $get_curr_year - 4; ?> </h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive">
                                            <table cellspacing="0" width="100%" id="example4" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                                                <thead>
                                                    <tr>
                                                        <th>SchoolName</th>
                                                        <th>Actual Grade(%)</th>
                                                        <th>Category</th>
                                                        <th>Rank</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $select_result=$hteachergrade->selectTotalGrades24();

                                                    $i=1;
                                                    if($select_result){
                                                        foreach ($select_result as $value){

                                                            ?>
                                                            <tr>
                                                                <td style="padding-top: 35px"><?php echo $value['school_name'] ?></td>
                                                                <td style="padding-top: 35px"><?php echo $value['p_actual'] ?></td>
                                                                <td style="padding-top: 35px"><?php echo $value['sch_category'] ?></td>
                                                                <td style="padding-top: 35px"><?php echo $i++; ?></td>
                                                            </tr>

                                                        <?php }} ?>
                                                    </tbody>

                                                </table>
                                            </div><!-- /.box-body -->
                                        </div>

                                    </div>

                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
                <?php
                require_once 'inc/footer.php';
                ?>