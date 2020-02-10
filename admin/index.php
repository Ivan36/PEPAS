<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <?php
        $tables=['primary_four','primary_five','primary_six','primary_seven'];
        $total_students=0;
        foreach ($tables as $value){
            $query_student="SELECT * FROM $value";
            $result_student=database::connect()->query($query_student);
            if ($result_student){
                if ($result_student->num_rows>0){
                    $val=$result_student->num_rows;

                    $total_students =$total_students+$val;

                }
            }

        }

        $query="SELECT * FROM total_teachers where type='teacher'";
        $result=database::connect()->query($query);
        if ($result){
            if ($result->num_rows>0){
                $total_teachers =$result->num_rows;
            }
        }else{
            $total_teachers='0';
        }
        $query="SELECT * FROM total_hteachers";
        $result=database::connect()->query($query);
        if ($result){
            if ($result->num_rows>0){
                $total_hteachers =$result->num_rows;
            }
        }else{
            $total_hteachers='0';
        }

        $query="SELECT * FROM total_staff";
        $result=database::connect()->query($query);
        if ($result){
            if ($result->num_rows>0){
                $total_staff =$result->num_rows;
            }else{
                $total_staff='0';
            }
        }

        $query="SELECT * FROM schools_tb";
        $result=database::connect()->query($query);
        if ($result){
            if ($result->num_rows>0){
                $total_school =$result->num_rows;
            }else{
                $total_staff='0';
            }
        }

                //$unsee_complain=$communication->selectUnseenComplain();

        ?>
        <div class="col-lg-3 col-xs-12 col-sm-12 col-md-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 class="text-center" style="font-size: 20px">Total Head Teachers</h3><h4  class="text-center"><?php if ($total_hteachers){ echo $total_hteachers; }else{ echo '0'; }  ?></h4>
                </div>
                <div class="">
                    <i class=""></i>
                </div>
                <a href="manage_hteacher.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-12">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3 class="text-center" style="font-size: 20px">Total Teachers</h3><h4  class="text-center"><?php echo $total_teachers; ?></h4>
                </div>
                <div class="icon">
                    <i class=""></i>
                </div>
                <a href="manage_teacher.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-12">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3 class="text-center" style="font-size: 20px">Total Pupils(P4-P7)</h3><h4  class="text-center"><?php echo $total_students; ?></h4>
                </div>
                <div class="icon">
                    <i class=""></i>
                </div>
                <a href="Manage_p7_std_result.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-12">
            <div class="small-box bg-aqua ">
                <div class="inner ">
                    <h3 class="text-center" style="font-size: 20px">Total Schools</h3><h4  class="text-center"><?php    echo $total_school;
                    ?></h4>
                </div>
                <div class="">
                    <i class=""></i>
                </div>
                <a href="school_option.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <div class="box" style="margin-left: : 5px; margin-right: 10px; padding: 10px; ">
                <h3>Welcome back!  (<?php echo session::get('addName') ?>)</h3>
                <p style="font-family: Georgia, Times New Roman, serif; font-size: 18px; font-style: italic; color:#3c8dbc;">Welcome to Primary Schools Performance Assesment System(PEPAS).PEPAS tracks pupils enrollment rate, analyses the performance and ranks the best schools, head teachers and teachers in each subcounty in Mbarara District.</p>
                
            </div>
        </div>

    </div>
</section>

<?php
require_once 'inc/footer.php';
?>