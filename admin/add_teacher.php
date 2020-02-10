<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Teacher Info</small></h1>
    <ol class="breadcrumb">
        <li> <a class="btn btn btn-default" href="manage_teacher.php" style="margin-left: 10px;"><i class="fa fa-eye"></i> Manage Teachers</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Teacher Add</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <br>

                <h3 class="text-center">Teacher Add Here</h3>
                <br>
                <div class="box-body">
                    <!------ admission form submit here --------->
                    <?php
                    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                        $add_result=$teacher->create($_POST,$_FILES);
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
                                            <label for="studentName">Teacher Names *</label>
                                            <input name="teacher_name" type="text" class="form-control"  placeholder="Enter teacher name">
                                        </div>
                                        <div class="form-group">
                                            <label for="education">Education *</label>
                                            <input name="education" type="text" class="form-control"  placeholder="Education status" value="Primary education">
                                        </div>
                                        <div class="form-group">
                                            <label for="dateOfBirth">Date OF Birth *</label>
                                            <input id="datePicker" name="birth_date" type="text" readonly class="form-control" placeholder="yyyy-mm-dd" value="1982-08-12">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender *</label>
                                            <br>
                                            <!-- checked="checked" -->
                                            <input type="radio" name="gender" style='width:20px; border:0;' value="male" > Male &ensp;&ensp;&ensp;&ensp;
                                            <input type="radio" name="gender" style='width:20px; border:0;' value="female"> Female &ensp;&ensp;&ensp;&ensp;
                                            <input type="radio" name="gender" style='width:20px; border:0;' value="other"> Other
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
                                            <input name="national_id" type="text" class="form-control"  placeholder="National id" value="RU7HG45ES21NXC8D">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <label for="village">Village *</label>
                                            <input name="village" type="text" class="form-control"  placeholder="Village name" value="not Known">
                                        </div>
                                        <div class="form-group">
                                            <label for="union">Parish/Division *</label>
                                            <select class="form-control" name="union">
                                                <option value="Mabira" selected="true">Mabira</option>
                                                <option value="Kyandahi">Kyandahi</option>
                                                <option value="Mirongo">Mirongo</option>
                                                <option value="Ntuura">Ntuura</option>
                                                <option value="Kibingo">Kibingo</option>
                                                <option value="Bwengure">Bwengure</option>
                                                <option value="Nsiika">Nsiika</option>
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
                                            <input name="district" type="text" class="form-control" value="Mbarara" readonly="true">
                                        </div>

                                        <div class="form-group">
                                            <label for="designation">Designation *</label>
                                            <select class="form-control" name="designation">
                                                <option value="Deputy head teacher">Deputy head teacher</option>
                                                <option value="Education Assistant II">Education Assistant II</option>
                                                <option value="Assistant teacher">Assistant teacher</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Teacher Category *</label>
                                            <br>
                                            <!-- checked="checked" -->
                                            <input type="radio" name="category" style='width:20px; border:0;' value="Government" > Government &ensp;&ensp;&ensp;&ensp;
                                            <input type="radio" name="category" style='width:20px; border:0;' value="PTA"> P.T.A &ensp;&ensp;&ensp;&ensp;
                                            <input type="radio" name="category" style='width:20px; border:0;' value="other"> Not sure
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