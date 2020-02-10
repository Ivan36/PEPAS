
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?Php
if (ISSET($_POST['btn_submit'])) {
   $teacher_name=$_POST['teacher_name'];
   $from_date=$_POST['from_year'];
   $to_date=$_POST['upto_year'];
   if($stmt = $connection->query("SELECT year,p_actual FROM hteacher_grades where teacher_name='$teacher_name' AND year BETWEEN '" . $from_date . "' AND  '" . $to_date . "'")){
    $php_data_array = Array(); 
    while ($row = $stmt->fetch_row()) {
     $php_data_array[] = $row;
 }
}else{
    echo $connection->error;
}
echo "<script>
var my_2d = ".json_encode($php_data_array)."
</script>";
}else{
    echo $connection->error;
}

?>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Head Teacher Perfomance</small></h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Results Manage</li>
        <li class="active">Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="tm"> Select Head Teacher</label>
                            <select name="teacher_name" id="se" class="form-control">
                                <option value="0" selected="selected">Select head teacher</option>
                                <?php

                                $select_result = $teacher->selectTotalHTeacher();

                                $i = 1;
                                if ($select_result) {
                                    foreach ($select_result as $value) {

                                        ?>

                                        <option value="<?php echo $value['teacher_name']; ?>">
                                            <?php echo $value['teacher_name']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="tm">select From Year</label>
                                <select name="from_year" class="form-control">
                                    <option value="2015">select year</option>
                                    <?php
                                    for ($i = 2014; $i <= date('Y'); $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="tm">select upto Year</label>
                                <select name="upto_year" class="form-control">
                                    <option value="<?php echo date("Y"); ?>">select year</option>
                                    <?php
                                    for ($i = 2014; $i <= date('Y'); $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style="padding-top: 26px;">
                            <button name="btn_submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <div id="div_print" class="box">
                    <div class="container-fluid">
                        <div class="text-center">

                            <a class="pull-right" style="font-size: 18px; margin-right: 20px;" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i></a>
                        </div>

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_submit'])) {
                            $add_result = $hteachergrade->overllHTeacherPerformance($_POST);
                            if ($add_result) {
                                $select_result = $hteachergrade->overllHTeacherPerformance($_POST);
                                ?>
                                <h3 class="text-center">Perfomance of <?php echo $teacher_name . " from " . $from_date . " to " . $to_date ; ?></h3>
                                <?php
                            } else {
                                $select_result = $hteachergrade->overllHTeacherPerformance($_POST);
                            }
                        } else { 
                            $select_result=$hteachergrade->selectTotalBestGrades();
                            echo "<h3 class='text-center'>All Head Teacher Perfomances in Current Results</h3>";  
                        }

                        ?>

                        <div class="box-body">
                            <!----- student profile --------->
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="row container-fluid">

                                                <div class="col-md-12 col-lg-12 table-responsive">
                                                    <!-- <table class="table table-responsive-sm table-bordered table-striped nowrap"> -->
                                                        <table cellspacing="0" width="100%" id="example4" class="display nowrap table table-striped table-bordered table-hover table-responsive">
                                                            <thead>
                                                                <th>Head Teacher</th>
                                                                <th>Year</th>
                                                                <th>Perfomance</th>
                                                            </thead>
                                                            <?php
                                                            $i=1;
                                                            if($select_result){
                                                                foreach ($select_result as $sch_grade){
                                                                    $teacher_name=$sch_grade['teacher_name'];
                                                                    ?>
                                                                    <tbody>

                                                                        <tr>
                                                                            <td><?php echo $sch_grade['teacher_name']; ?></td>
                                                                            <td><?php echo $sch_grade['year']; ?></td>
                                                                            <td><?php echo  $sch_grade['p_actual']; ?></td>
                                                                        </tr>
                                                                    </tbody>


                                                                <?php }} ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>

                            </div>
                            <div id="curve_chart"></div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Year');
        // data.addColumn('number', 'Grade 1');
        // data.addColumn('number', 'Grade 2');
        // data.addColumn('number', 'Grade 3');
        // data.addColumn('number', 'Grade 4');
        data.addColumn('number', 'Perfomance Curve');
        for(i = 0; i < my_2d.length; i++)
            data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);  
            //,parseInt(my_2d[i][2]),parseInt(my_2d[i][3]),parseInt(my_2d[i][4]),parseInt(my_2d[i][5])
            var options = {
                title: 'Overall Perfomance of <?php echo $teacher_name . " from " . $from_date . " to " . $to_date ; ?>',
                curveType: 'function',
                width: 900,
                height: 500,
                legend: { position: 'top-right' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    ///////////////////////////////
</script>
</section>


<?php
require_once 'inc/footer.php';
?>