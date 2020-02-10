

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Other Info</small></h1>
    <ol class="breadcrumb">
        <a href="manage_notice.php" class="btn btn-sm btn-default"><i class="fa fa-eye"></i> Mangege Subjects</a>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="manage_notice.php"><i class="fa fa-eye"></i> Subject Management</a></li>
        <li class="active">Add Subject</li>
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
                    
                    <h3 class="text-center">Add Subjects Here</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <!------ admission form submit here --------->
                            <?php
                            if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                                $add_subject=$subject->create($_POST);
                            }
                            ?>
                            <?php
                            if(isset($add_subject)){
                                echo $add_subject;
                            }
                            ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <form action="" method="post">
                                        <div class="row">
                                           
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="sf">Subject Name</label>
                                                    <input type="text" id="sf" class="form-control" name="subject_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sf">Subject Code</label>
                                                    <input type="text" id="sf" class="form-control" name="subject_no">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <input type="submit" name="submit_btn" value="Add subject" class="btn btn-primary btn-block">
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>






