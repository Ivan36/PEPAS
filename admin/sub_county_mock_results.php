<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?Php
if (ISSET($_POST['btn_submit'])) {
   $sel_year=$_POST['filteryear'];
   if($stmt = $connection->query("SELECT sub_county, p_div_1  FROM sub_county_mock_results where year='$sel_year'")){
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
    if($stmt = $connection->query("SELECT sub_county, p_div_1  FROM sub_county_mock_results where year='2019'")){
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
}

?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>School Grades</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">School Manage</li>
        <li><a href="#"><i class="fa fa-eye"></i>School Manage P.L.E Grades </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title">Schools Mock Grades </h3>
                        <a href="hteacher_grade.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add</a>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 col-sm-2 col-xs-2"></div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="tm">Filter Mock Results by Year</label>
                                        <select name="filteryear" class="form-control">
                                            <option value="0">select year</option>
                                            <?php
                                            for ($i = 2018; $i <= date('Y'); $i++) {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-2 col-xs-2" style="padding-top: 26px;">
                                    <button name="btn_submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php
                        if (isset($del_message)) {
                            echo $del_message;
                        }
                        ?>
                        <table cellspacing="0" width="100%" id="example" class="display nowrap table table-striped table-bordered table-hover table-responsive">

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
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_submit'])) {
                                    $add_result = $hteachergrade->subCountyMockResultsFilter($_POST);
                                     if ($add_result) {
                                        $select_result = $hteachergrade->subCountyMockResultsFilter($_POST);
                                    } else {
                                        $select_result = $hteachergrade->subCountyMockResultsFilter($_POST);
                                    }
                                } else {
                                    $select_result = $hteachergrade->selectSubCountyMockResults();
                                }


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
                    </div><!-- /.box-body -->
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                        <div id="chart_div1"></div>
                        <br><br>

                    </div>
                    <div class="col-md-3 col-lg-3"></div>
                    <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
                        <div id="chart_div"></div>
                    </div>

                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
     google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'sub_county');
        data.addColumn('number', 'p_div_1');
        for(i = 0; i < my_2d.length; i++)
            data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
var options = {title:'Sub County Results Division One (Percent)',
width:550,
height:450};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Sub Counties in Mbarara District');
        data.addColumn('number', 'All Pupils in Division One (Percent)');
        // data.addColumn('number', '');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0],parseInt(my_2d[i][1])]); //, parseInt(my_2d[i][1])
var options = {
  title: 'Sub County Results',
  hAxis: {title: 'Sub Counties in Mbarara District',  titleTextStyle: {color: '#333'}},
  vAxis: {minValue: 0}
};

var chart = new google.charts.Bar(document.getElementById('chart_div1'));
chart.draw(data, options);
}
</script>
<?php
require_once 'inc/footer.php';
?>