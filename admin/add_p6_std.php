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
        <li><a href="p6_std_list.php"><i class="fa fa-eye"></i>School Manage </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title" style="color: blue">Register Students in Primary Six (P6) Select School</h3>
                        <a href="add_school.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Add schools</a>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php
                        if (isset($del_message)) {
                            echo $del_message;
                        }
                        ?>
                        <table cellspacing="0" width="100%" id="example1" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>School Name</th>
                                    <th>Class</th>
                                    <th>Add Students</th>
                                    <th>Add Results</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $select_result = $school->selectTotalSchool();

                                $i = 1;
                                if ($select_result) {
                                    foreach ($select_result as $value) {

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['sch_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo "P6" ?></td>
                                            <td style="padding-top: 25px">
                                                <a href="add_std_p6.php?sch_id=<?php echo $value['id']; ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Add Students </a>

                                            </td>
                                            <td style="padding-top: 25px">
                                                <a href="add_p6_std_result.php?sch_name=<?php echo $value['sch_name']; ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i> Add Results </a>

                                            </td>
                                        </tr>

                                <?php }
                                } ?>
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