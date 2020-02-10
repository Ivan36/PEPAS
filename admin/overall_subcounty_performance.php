
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?Php
if (ISSET($_POST['btn_submit'])) {
   $sub_county=$_POST['sub_county'];
   $from_date=$_POST['from_year'];
   $to_date=$_POST['upto_year'];
   if($stmt = $connection->query("SELECT year,p_div_1 FROM sub_county_results where sub_county='$sub_county' AND year BETWEEN '" . $from_date . "' AND  '" . $to_date . "'")){
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
<style type="text/css">
    td{
        text-align: center;
    }
</style>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Teacher Info</small></h1>

    <ol class="breadcrumb">
        <li><a class="btn btn btn-default" href="hteacher_grades_list.php" style=""><i class="fa fa-eye"></i> Manage P.L.E Results</a></li>
        <li><a class="btn btn btn-default" href="manage_teacher.php" style=""><i class="fa fa-eye"></i> Manage Results</a></li>
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
                            <label for="tm"> Select Sub County</label>
                            <select name="sub_county" id="se" class="form-control">
                                <option value="0" selected="selected">Select Sub County</option>
                                <?php

                                $select_result = $hteachergrade->getSubCounties();

                                $i = 1;
                                if ($select_result) {
                                    foreach ($select_result as $value) {

                                        ?>

                                        <option value="<?php echo $value['sub_county']; ?>">
                                            <?php echo $value['sub_county']; ?></option>
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

                            <a class="pull-right" style="font-size: 20px; margin-right: 20px;" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i> </a>
                        </div>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_submit'])) {
                            $add_result = $hteachergrade->overllSubPerformance($_POST);
                            if ($add_result) {
                                $select_result = $hteachergrade->overllSubPerformance($_POST);
                                ?>
                                <h3 class="text-center">Perfomance of <?php echo $sub_county . " Subcounty from " . $from_date . " to " . $to_date ; ?></h3>

                                <?php
                            } else {
                                $select_result = $hteachergrade->overllSubPerformance($_POST);
                            }
                        } else { 
                         $select_result = $hteachergrade->selectSubCountyResults();
                         ?>
                         <h3 class="text-center">Perfomance of all Subcounties in (Current Results)</h3>
                         <?php
                     }


                     ?>
                     <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">


                                        <div class="row container-fluid">
                                            <div class="col-md-12 table-responsive">

                                                <table cellspacing="0" width="100%" id="example3" class="display nowrap table table-striped table-bordered table-hover table-responsive">

                                                    <thead>
                                                        <tr>
                                                            <!-- <th>NO</th> -->
                                                            <th>Sub County</th>
                                                            <th>Div 1</th>
                                                            <th>Div 2</th>
                                                            <th>Div 3</th>
                                                            <th>Div 4</th>
                                                            <th>U</th>
                                                            <th>ABS</th>
                                                            <th>Total</th>
                                                            <th>Div 1(%)</th>
                                                            <th>Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        if ($select_result) {
                                                            foreach ($select_result as $value) {
                                                                $year1=$value['year'];
                                                                ?>
                                                                <tr class="text-center">
                                                                    <!-- <td style="padding-top: 35px"><//?php echo  $i++; ?></td> -->
                                                                    <td style="padding-top: 35px ;text-align: left;"><?php echo $value['sub_county'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $value['div_1'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $value['div_2'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $value['div_3'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $value['div_4'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $value['div_u'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $value['div_x'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $value['total'] ?></td>
                                                                    <td style="padding-top: 35px"><?php echo round($value['p_div_1'], 1)  ?></td>
                                                                    <td style="padding-top: 35px"><?php echo $year1; ?></td>
                                                                </tr>

                                                                <?php

                                                            }
                                                        } ?>
                                                    </tbody>

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
            <div class="">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-3 "></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                        <!-- <a href="update_hteacher.php?tea_id=<//?php echo $teacher_value['id']; ?>" type="submit" class="btn btn-info btn-block">Update Profile</a> -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-3"></div>
                </div>

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
                title: 'Overall Perfomance of <?php echo $sub_county . " from " . $from_date . " to " . $to_date ; ?>',
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