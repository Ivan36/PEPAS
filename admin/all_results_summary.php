
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->
<section class="content-header" style="margin-bottom: 5px;">
    <h1> Dashboard <small>Results Summary</small></h1>

    <ol class="breadcrumb">
        <li><a class="btn btn btn-default" href="all_results_summary.php" style=""><i class="fa fa-eye"></i> View All</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">School Manage</li>
        <li class="active">Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-3 col-lg-3 col-sm-2 col-xs-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 ">
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="tm">Result Summary of a specific Year</label>
                            <select name="filteryear" class="form-control">
                                <option value="0">select year</option>
                                <?php
                                for ($i = 2014; $i <= date('Y'); $i++) {
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div id="div_print" class="box">
                <a class="pull-right" style="font-size: 18px; margin-right: 20px;" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i></a>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_submit'])) {
                    $add_result = $hteachergrade->overResultSummary($_POST);
                    if ($add_result) {
                        $select_result = $hteachergrade->overResultSummary($_POST);
                        if($select_result){
                            $div1_value=$select_result->fetch_assoc();
                        }
                        ?>
                        <div class="container-fluid">
                            <h3 class="text-center">Results Summary of all Schools in Mbarara District in <?php echo $_POST['filteryear'];  ?></h3>
                            <div class="box-body">
                                <!----- student profile --------->
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row container-fluid">
                                                    <div class="col-md-12 col-md-12 table-responsive">

                                                        <table class="table table-responsive-sm ">
                                                            <tr>
                                                                <td>Division One</td>
                                                                <td><?php echo $div1_value['total_div1']; ?></td>

                                                                <td>Division Two</td>
                                                                <td><?php echo $div1_value['total_div2']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Division Three</td>
                                                                <td><?php echo $div1_value['total_div3']; ?></td>

                                                                <td>Division Four</td>
                                                                <td><?php echo $div1_value['total_div4']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ungraded Pupils</td>
                                                                <td><?php echo $div1_value['total_divu']; ?></td>

                                                                <td>Abscent Pupils</td>
                                                                <td><?php echo $div1_value['total_divx']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Pupils in <?php echo $get_curr_year -1; ?></td>
                                                                <td><?php echo $div1_value['grand_total']; ?></td>

                                                                <td></td>
                                                                <td></td>
                                                            </tr>


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
                    
                    <?php
                } else {
                    $select_result = $hteachergrade->overllHTeacherPerformance($_POST);
                }
            } else { 
                $single_div1=$hteachergrade->getSums1();
                if($single_div1){
                    $div1_value=$single_div1->fetch_assoc();
                }

                $single_div2=$hteachergrade->getSums2();
                if($single_div2){
                    $div2_value=$single_div2->fetch_assoc();
                }

                $single_div3=$hteachergrade->getSums3();
                if($single_div3){
                    $div3_value=$single_div3->fetch_assoc();
                }

                $single_div4=$hteachergrade->getSums4();
                if($single_div4){
                    $div4_value=$single_div4->fetch_assoc();
                }

                ?>
                <!-
                <div class="container-fluid">
                    <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container-fluid">
                                            <h3 class="text-center" style="font-size: 18px; color: blue;"><u>P.L.E Peformance Summary of all Schools in Mbarara District</u></h3>
                                            <br>
                                        </div>

                                        <div class="row container-fluid">
                                            <div class="col-md-12 col-md-12 table-responsive">

                                                <table class="table table-responsive-sm ">
                                                    <tr>
                                                        <th>Summary of <?php echo $get_curr_year -1; ?> </th>
                                                    </tr>
                                                    <tr>
                                                        <td>Division One</td>
                                                        <td><?php echo $div1_value['total_div1']; ?></td>

                                                        <td>Division Two</td>
                                                        <td><?php echo $div1_value['total_div2']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Division Three</td>
                                                        <td><?php echo $div1_value['total_div3']; ?></td>

                                                        <td>Division Four</td>
                                                        <td><?php echo $div1_value['total_div4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ungraded Pupils</td>
                                                        <td><?php echo $div1_value['total_divu']; ?></td>

                                                        <td>Abscent Pupils</td>
                                                        <td><?php echo $div1_value['total_divx']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Pupils in <?php echo $get_curr_year -1; ?></td>
                                                        <td><?php echo $div1_value['grand_total']; ?></td>

                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </table>
                                            </div>
                                            <div class="col-md-12 col-md-12 table-responsive">

                                                <table class="table table-responsive-sm ">
                                                    <tr>
                                                        <th>Summary of <?php echo $get_curr_year -2; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Division One</td>
                                                        <td><?php echo $div2_value['total_div1']; ?></td>

                                                        <td>Division Two</td>
                                                        <td><?php echo $div2_value['total_div2']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Division Three</td>
                                                        <td><?php echo $div2_value['total_div3']; ?></td>

                                                        <td>Division Four</td>
                                                        <td><?php echo $div2_value['total_div4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ungraded Pupils</td>
                                                        <td><?php echo $div2_value['total_divu']; ?></td>

                                                        <td>Abscent Pupils</td>
                                                        <td><?php echo $div2_value['total_divx']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Pupils in <?php echo $get_curr_year -2; ?></td>
                                                        <td><?php echo $div2_value['grand_total']; ?></td>

                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </table>
                                            </div>
                                            <div class="col-md-12 col-md-12 table-responsive">

                                                <table class="table table-responsive-sm ">
                                                    <tr>
                                                        <th>Summary of <?php echo $get_curr_year -3; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Division One</td>
                                                        <td><?php echo $div3_value['total_div1']; ?></td>

                                                        <td>Division Two</td>
                                                        <td><?php echo $div3_value['total_div2']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Division Three</td>
                                                        <td><?php echo $div3_value['total_div3']; ?></td>

                                                        <td>Division Four</td>
                                                        <td><?php echo $div3_value['total_div4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ungraded Pupils</td>
                                                        <td><?php echo $div3_value['total_divu']; ?></td>

                                                        <td>Abscent Pupils</td>
                                                        <td><?php echo $div3_value['total_divx']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Pupils in <?php echo $get_curr_year -3; ?></td>
                                                        <td><?php echo $div3_value['grand_total']; ?></td>

                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </table>
                                            </div>
                                            <div class="col-md-12 col-md-12 table-responsive">

                                                <table class="table table-responsive-sm ">
                                                    <tr>
                                                        <th>Summary of <?php echo $get_curr_year -4; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Division One</td>
                                                        <td><?php echo $div4_value['total_div1']; ?></td>

                                                        <td>Division Two</td>
                                                        <td><?php echo $div4_value['total_div2']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Division Three</td>
                                                        <td><?php echo $div4_value['total_div3']; ?></td>

                                                        <td>Division Four</td>
                                                        <td><?php echo $div4_value['total_div4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ungraded Pupils</td>
                                                        <td><?php echo $div4_value['total_divu']; ?></td>

                                                        <td>Abscent Pupils</td>
                                                        <td><?php echo $div4_value['total_divx']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Pupils in <?php echo $get_curr_year -4; ?></td>
                                                        <td><?php echo $div4_value['grand_total']; ?></td>

                                                        <td></td>
                                                        <td></td>
                                                    </tr>


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
            <?php } ?>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

</section>


<?php
require_once 'inc/footer.php';
