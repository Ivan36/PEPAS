
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?Php
if (ISSET($_POST['btn_submit'])) {
 $sub_county=$_POST['sub_county'];
 $filteryear=$_POST['filteryear'];
 if($stmt = $connection->query("SELECT school_name,p_actual FROM hteacher_grades WHERE sub_county='$sub_county' AND year='$filteryear' ORDER by p_actual DESC LIMIT 10")){
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
                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-6"></div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
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
                                <label for="tm">select Year</label>
                                <select name="filteryear" class="form-control">
                                    <option value="<?php echo date("Y") - 1; ?>">select year</option>
                                    <?php
                                    for ($i = 2015; $i <= date('Y')- 1; $i++) {
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
                            $add_result = $hteachergrade->selectBestSchoolSubCounty($_POST);
                            if ($add_result) {
                                $select_result = $hteachergrade->selectBestSchoolSubCounty($_POST);
                                ?>
                                <h3 class="text-center">Best Schools in <?php echo $sub_county . " Sub County in ". $filteryear; ?>  </h3>
                                <?php
                            } else {
                                $select_result = $hteachergrade->selectBestSchoolSubCounty($_POST);
                            }
                        } else { 
                            $select_result=$hteachergrade->selectBestSchoolSubCounty1();
                            echo "<h3 class='text-center'>All Sub County Perfomances in Current Results</h3>";  
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
                                                                <th>School</th>
                                                                <th>Sub County</th>
                                                                <th>Perfomance</th>
                                                                <th>Year</th>
                                                            </thead>
                                                            <?php
                                                            $i=1;
                                                            if($select_result){
                                                                foreach ($select_result as $sch_grade){
                                                                    ?>
                                                                    <tbody>

                                                                        <tr>
                                                                            <td><?php echo $sch_grade['school_name']; ?></td>
                                                                            <td><?php echo $sch_grade['sub_county']; ?></td>
                                                                            <td><?php echo  $sch_grade['p_actual']; ?></td>

                                                                            <td><?php echo $sch_grade['year']; ?></td>
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
                            <div class="box-header">
                                <h3 class="box-title"> <?php if (isset($_POST['filteryear']) && isset($_POST['sub_county'])) {
                                    echo "Graphical Representation of best Schools in ". $sub_county . " Sub County in ". $filteryear;
                                }  ?> </h3><br>
                            </div>
                            <div id="chart_div1" style="width: 97%; height: 500px; margin-left: 20px;"></div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Best Schools in <?php echo $sub_county; ?>');
        data.addColumn('number', 'Pupils in Div 1 (%)');
        // data.addColumn('number', '');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0],parseInt(my_2d[i][1])]); //, parseInt(my_2d[i][1])
var options = {
  title: 'Sub County Results',
  hAxis: {title: 'Best Schools in <?php echo $sub_county . " Sub County in ". $filteryear; ?>',  titleTextStyle: {color: '#333'}},
  vAxis: {minValue: 0}
};

var chart = new google.charts.Bar(document.getElementById('chart_div1'));
chart.draw(data, options);
}
</script>
</section>


<?php
require_once 'inc/footer.php';
?>