<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Head Teacher Info</small></h1>
    <ol class="breadcrumb">
        <a class="btn btn btn-default" href="manage_hteacher.php" style="margin-left: 10px;"><i class="fa fa-eye"></i> Manage H/T</a>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Head Teacher Add</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <br>
                <h3 class="text-center">Head Teacher Add Here</h3>
                <br>
                <div class="box-body">
                    <!------ admission form submit here --------->
                    <?php
                    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                        $add_result=$teacher->createh($_POST,$_FILES);
                    }
                    ?>

                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-1 col-lg-1"></div>
                            <div class="col-lg-10 col-md-10">
                                <?php
                                if (isset($add_result)){

                                    echo $add_result;
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <label for="studentName">Head Teacher Name *</label>
                                            <input name="teacher_name" type="text" class="form-control"  placeholder="Enter teacher name">
                                        </div>
                                        <div class="form-group">
                                            <label for="education">Education *</label>
                                            <input name="education" type="text" class="form-control"  placeholder="Education status" value="Primary Education">
                                        </div>
                                        <div class="form-group">
                                            <label for="dateOfBirth">Date OF Birth *</label>
                                            <input id="datePicker" name="birth_date" type="text" readonly class="form-control" placeholder="yyyy-mm-dd" value="1880-02-17">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender *</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select One</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile *</label>
                                            <input name="mobile" type="text" class="form-control"  placeholder="Mobile number">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input name="email" type="text" class="form-control"  placeholder="Email address">
                                        </div>
                                        <div class="form-group">
                                            <label for="national_id">National Id *</label>
                                            <input name="national_id" type="text" class="form-control"  placeholder="National id" value="RTN39DT9SA12IL">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <label for="village">Village *</label>
                                            <input name="village" type="text" class="form-control"  placeholder="Village name" value="Not Known">
                                        </div>
                                        <div class="form-group">
                                            <label for="union">Parish/Division *</label>
                                            <select class="form-control" name="union">
                                                <option value="" selected="true">Select Sub County</option>
                                                <option value="Ruti">Ruti</option>
                                                <option value="Ruharo">Ruharo</option>
                                                <option value="Bukiro">Bukiro</option>
                                                <option value="Rwebishekye">Rwebishekye</option>
                                                <option value="Katyazo">Katyazo</option>
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
                                                <option value="Itara">Itara</option>
                                                <option value="Ruhunga">Ruhunga</option>
                                                <option value="Buramba">Buramba</option>
                                                <option value="Nyabuhama">Nyabuhama</option>
                                                <option value="Rwenjeru">Rwenjeru</option>
                                                <option value="Kitooma">Kitooma</option>
                                                <option value="Buramba">Buramba</option>
                                                <option value="Nyabuhama">Nyabuhama</option>
                                                <option value="Rwenjeru">Rwenjeru</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subDistrict">Sub County *</label>
                                            <select class="form-control" name="sub_district">
                                                <option value="" selected="true">Select Sub County</option>
                                                <option value="Bubaare">Bubaare</option>
                                                <option value="Kagongi">Kagongi</option>
                                                <option value="Bukiro">Bukiro</option>
                                                <option value="Kashare">Kashare</option>
                                                <option value="Rubaya">Rubaya</option>
                                                <option value="Rwanyamahembe">Rwanyamahembe</option>
                                                <option value="Rubindi">Rubindi</option>
                                                <option value="Biharwe">Biharwe</option>
                                                <option value="Kakyika">Kakyika</option>
                                                <option value="Kakoba">Kakoba</option>
                                                <option value="Kamikuzi">Kamikuzi</option>
                                                <option value="Nyakayojo">Nyakayojo</option>
                                                <option value="Nyamitanga">Nyamitanga</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="district">District *</label>
                                            <input name="district" type="text" value="Mbarara" class="form-control"  placeholder="District name">
                                        </div>

                                        <div class="form-group">
                                            <label for="designation">Designation *</label>
                                            <input name="designation" type="text" class="form-control"  placeholder="Teacher designation" value="Head Teacher">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image *</label>
                                            <input name="image" type="file" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1"></div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4">
                                        <button name="btn_submit" type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>


<?php
require_once 'inc/footer.php';
?>