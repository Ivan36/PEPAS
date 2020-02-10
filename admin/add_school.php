

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Other Info</small></h1>
    <ol class="breadcrumb">
        <a href="school_option.php" class="btn btn-sm btn-default"><i class="fa fa-graduation-cap"></i> Manage Schools</a>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="school_option.php"><i class="fa fa-graduation-cap"></i>School Manage </a></li>
        <li class="active">Add School</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <div class="container-fluid">
                    <br>
                    
                    <h3 class="text-center">Add New School Here</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"></div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <!------ admission form submit here --------->
                            <?php
                            if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                                $add_school=$school->create($_POST);
                            }
                            ?>
                            <?php
                            if(isset($add_school)){
                                echo $add_school;
                            }
                            ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <div class="row">
                                    <form action="" method="post">
                                        <div class="row">

                                            <div class="col-md-12 col-lg-12 ">
                                                <div class="col-md-6 col-lg-6 ">
                                                    <div class="form-group">
                                                        <label for="sf">School Name</label>
                                                        <input type="text" id="sf" class="form-control" name="school_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">School Number</label>
                                                        <input type="text" id="sf" class="form-control" name="school_no" value="<?php echo ( "Sch-" . mt_rand(10000000, 999999999)); ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Number of Girls</label>
                                                        <input type="number" id="sf" class="form-control" name="girls">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Number of Boys</label>
                                                        <input type="number" id="sf" class="form-control" name="boys">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>School category</label><br>
                                                        <input type="radio" name="category" style='width:20px; border:0;' value="government" checked="checked"> Government &ensp;&ensp;&ensp;&ensp;
                                                        <input type="radio" name="category" style='width:20px; border:0;' value="private"> Private

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 ">
                                                    <div class="form-group">
                                                        <label for="sf">District</label>
                                                        <input type="text" id="sf" class="form-control" name="district" value="Mbarara" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">County</label>
                                                        <select class="form-control" name="county">
                                                            <option value="">Select county</option>
                                                            <option value="Kashari">Kashari</option>
                                                            <option value="Municipality">Mbarara Municipality</option>
                                                            <option value="Rwampala">Rwampala</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sub County</label><br>
                                                        <select class="form-control" name="subcounty">
                                                            <option value="" selected="true">Select Sub County</option>
                                                            <option value="Bubaare">Bubaare</option>
                                                            <option value="Kagongi">Kagongi</option>
                                                            <option value="Bukiro">Bukiro</option>
                                                            <option value="Kashare">Kashare</option>
                                                            <option value="Rubaya">Rubaya</option>
                                                            <option value="Rwanyamahembe">Rwanyamahembe</option>
                                                            <option value="Rubindi">Rubindi</option>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Parish</label>
                                                        <select class="form-control" name="parish">
                                                            <option value="" selected="true">Select Parish</option>
                                                            <option value="Kyandahi">Kyandahi</option>
                                                            <option value="Mirongo">Mirongo</option>
                                                            <option value="Ntuura">Ntuura</option>
                                                            <option value="Kibingo">Kibingo</option>
                                                            <option value="Bwengure">Bwengure</option>
                                                            <option value="Nsiika">Nsiika</option>
                                                            <option value="Nyabisirira">Nyabisirira</option>
                                                            <option value="Mitoozo">Mitoozo</option>
                                                            <option value="Nchune">Nchune</option>
                                                            <option value="Ngango">Ngango</option>
                                                            <option value="Ruti">Ruti</option>
                                                            <option value="Ruharo">Ruharo</option>
                                                            <option value="Bukiro">Bukiro</option>
                                                            <option value="Rwebishekye">Rwebishekye</option>
                                                            <option value="Nyarubungo">Nyarubungo</option>
                                                            <option value="Katyazo">Katyazo</option>
                                                            <option value="Nyanja">Nyanja</option>
                                                            <option value="Nyamityobora">Nyamityobora</option>
                                                            <option value="Mabira">Mabira</option>
                                                            <option value="Rutooma">Rutooma</option>
                                                            <option value="Kakyerere">Kakyerere</option>
                                                            <option value="Kakoba">Kakoba</option>
                                                            <option value="Kamikuzi">Kamikuzi</option>
                                                            <option value="Bunenero">Bunenero</option>
                                                            <option value="Kahungye">Kahungye</option>
                                                            <option value="Rwanyena">Rwanyena</option>
                                                            <option value="Rushozi">Rushozi</option>
                                                            <option value="Nyamiriro">Nyamiriro</option>
                                                            <option value="Kariro">Kariro</option>
                                                            <option value="Rwamuhigi">Rwamuhigi</option>
                                                            <option value="Bitsya">Bitsya</option>
                                                            <option value="Karwesanga">Karwesanga</option>
                                                            <option value="Karuhama">Karuhama</option>
                                                            <option value="Itara">Itara</option>
                                                            <option value="Ruhunga">Ruhunga</option>
                                                            <option value="Buramba">Buramba</option>
                                                            <option value="Nyabuhama">Nyabuhama</option>
                                                            <option value="Rwenjeru">Rwenjeru</option>
                                                            <option value="Kitooma">Kitooma</option>
                                                            <option value="Buramba">Buramba</option>
                                                            <option value="Nyabuhama">Nyabuhama</option>
                                                            <option value="Rwenjeru">Rwenjeru</option>
                                                            <option value="Rubingo">Rubingo</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sf">Date</label>
                                                        <input type="text" id="sf" class="form-control" name="date" value="<?php echo date("Y-M-D") ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4"></div>
                                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                                        <input type="submit" name="submit_btn" value="Submit" class="btn btn-primary btn-block">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"></div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>






