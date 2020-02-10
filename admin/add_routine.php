

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Other Info</small></h1>
    <ol class="breadcrumb">
        <a href="routine_manage_option.php" class="btn btn-sm btn-default"><i class="fa fa-eye"></i> Manage Classes </a>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="routine_manage_option.php"><i class="fa fa-eye"></i> Class Manage</a></li>
        <li class="active">Add Classes</li>
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
                    
                    <h3 class="text-center">Add Classes Here</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <!------ admission form submit here --------->
                            <?php
                            if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                                $add_class=$class->create($_POST);
                            }
                            ?>
                            <?php
                            if(isset($add_class)){
                                echo $add_class;
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
                                                    <label for="sf">Class Name</label>
                                                    <select type="text" id="sf" class="form-control" name="class_name">
                                                        <option value="" selected="">Please select class</option>
                                                        <option value="Primary One">P-one</option>
                                                        <option value="Primary Two">P-Two</option>
                                                        <option value=" Primary Three">P-Three</option>
                                                        <option value="Primary Four">P-Four</option>
                                                        <option value="Primary Five">P-Five</option>
                                                        <option value="Primary Six">P-Six</option>
                                                        <option value="Primary Seven">P-Seven</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sf">Class Number</label>
                                                    <input type="text" id="sf" class="form-control" name="class_no">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <input type="submit" name="submit_btn" value="Add class" class="btn btn-primary btn-block">
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






