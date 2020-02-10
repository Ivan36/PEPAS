<?php

date_default_timezone_set('Africa/Nairobi');
$get_curr_year = date('Y');
$get_today_date = date('d-m-Y');
/* database file*/
require_once 'lib/database.php';
require_once 'lib/config.php';

/* Session file*/
require_once 'lib/session.php';
session::init();

/* validation file*/
require_once 'lib/validation.php';

/* helper file*/
require_once 'lib/helper.php';

/* admission file*/
require_once 'classes/adminLogin.php';
$login = new adminLogin();

/* admission file*/
require_once 'classes/TeacherGrade.php';
$teachergrade = new TeacherGrade();

/* student add file*/
require_once 'classes/Student.php';
$student = new Student();

/* result add file*/
require_once 'classes/SchoolInfo.php';
$schoolinfo = new SchoolInfo();

/* fees add file*/
require_once 'classes/TeacherSchool.php';
$teacherschool = new TeacherSchool();

/* attendance add file*/
require_once 'classes/Attendance.php';
$attendance = new Attendance();
/* attendance add file*/
require_once 'classes/Teacher.php';
$teacher = new Teacher();

/* attendance add file*/
require_once 'classes/StudentResults.php';
$studentresults = new StudentResults();

/* shifted add file*/
require_once 'classes/Shifted.php';
$shifted = new Shifted();

/* shifted add file*/
require_once 'classes/HTeacherGrade.php';
$hteachergrade = new HTeacherGrade();

/* shifted add file*/
require_once 'classes/School.php';
$school = new School();

/* shifted add file*/
require_once 'classes/PrimaryFourClass.php';
$primaryfour = new PrimaryFourClass();

/* shifted add file*/
require_once 'classes/PrimaryFiveClass.php';
$primaryfive = new PrimaryFiveClass();

/* shifted add file*/
require_once 'classes/PrimarySixClass.php';
$primarysix = new PrimarySixClass();

/* shifted add file*/
require_once 'classes/PrimarySevenClass.php';
$primaryseven = new PrimarySevenClass();

/* shifted add file*/
require_once 'classes/Class1.php';
$class = new Class1();

/* shifted add file*/
require_once 'classes/Subject.php';
$subject = new Subject();
/* shifted add file*/
require_once 'classes/Calender.php';
$calender = new Calender();

/* Communication add file*/
require_once 'classes/Communication.php';
$communication = new Communication();

/* old students add file*/
require_once 'classes/oldStudent.php';
$old_student = new oldStudent();

session::checkSession();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session::destroy();
}


require "classes/setting.php";

?>
<?php
if (isset($_GET['del_result'])) {
    $del_result = mysqli_real_escape_string(database::connect(), $_GET['del_result']);
    $exp = explode('-', $del_result);
    $id = $exp['0'];
    $table = $exp['1'];
    $del_message = helper::delete($table, $id);
}
?>
<?php
if (isset($_GET['shift_result'])) {
    $shift_result = mysqli_real_escape_string(database::connect(), $_GET['shift_result']);
    $exp = explode('-', $shift_result);
    $table1 = $exp['0'];
    $table2 = $exp['1'];
    $shift_message = helper::shiftstudents($table1, $table2);
}
if (isset($_GET['shift_p7_result'])) {
    $shift_p7_result = mysqli_real_escape_string(database::connect(), $_GET['shift_p7_result']);
    $exp = explode('-', $shift_p7_result);
    $table1 = $exp['0'];
    $table2 = $exp['1'];
    $shift_message = helper::shiftp7students($table1, $table2);
}
?>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "1200";
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page ?>'">
    <meta charset="UTF-8">
    <base target="_self">
    <!--- title---->
    <title >(PEPAS)</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/image/icon1.jpg" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!--- bootstrap---->
    <link href="assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="css/bootstrap-datepicker.css" /> -->
    <link type="text/css" href="vendor/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/datatable/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="vendor/DataTables/jquery.datatables.min.css">
    <!---font Link----->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <script src="js/ionicons.js"></script>
    <!-- google charts javascript -->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <script type="text/javascript" src="chart-js/js/loader.js"></script>
    <!--- admin css here---->
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/dist/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datePicker').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear: true,
                changeMonth: true,
                autoSize: true,
                yearRange: "1980:2030"
                // beforeShowDay: DisableDays
            });
            $('#datePicker2').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear: true,
                changeMonth: true,
                autoSize: true,
                yearRange: "1980:2030"
                // beforeShowDay: DisableDays
            });
        });
    </script>
    <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
    <script type="text/javascript">
        //the interval 'timer' is set as soon as the page loads

        var timer = setInterval(function() {
            auto_logout()
        }, 2000000);

        function reset_interval() {
            clearInterval(timer);
            timer = setInterval(function() {
                auto_logout()
            }, 2000000);
        }

        function auto_logout() {

            if (confirm("You have been logged out from the application, Press OK to login again!")) {
                window.location = "?action=logout";
            }
            window.location = "?action=logout";
        }
    </script>
    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
        if it's not present, don't show loader */
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(assets/image/Preloader_2.gif) center no-repeat #fff;
        }

        .content {
            min-height: 900px;
        }

        img {
            border-radius: 50%;
        }

        #heading1 {
            background-color: black;
            color: white;
            padding: 5px;
        }

        #heading2 {
            background-color: #f1f505;
            padding: 5px;
        }

        #heading3 {
            background-color: red;
            padding: 5px;
        }

        #hau_logo {
            height: 50px;
            float: left;
        }
    </style>


</head>
<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Logout <i class="fa fa-lock"></i></h4>
            </div>
            <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
            <div class="modal-footer">
                <a href="?action=logout" type="button" class="btn btn-danger"><i class="fa fa-sign-out-alt"></i> Logout</a>
                <a type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- Header Side Menu Start Here-->

<body class="skin-blue" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!--Only Header Here-->
        <header class="main-header">
            <a target="_blank" type="date" href="http://yitug.org" class="logo" style="padding-bottom: 1px;"><img src="../images/mcdp.jpg" width="70" height="70"> <b> PEPAS</b></a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
                <h4></h4>
                <span style="margin-top: 10px;font-size: 22px;color: white"><a href="index.php" style='color: #fff;border-bottom: 0 solid transparent;font-family: "Arial Black"'>Primary Education Performance Assessment System</a></span>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="admin_profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li> <a title="Click to Logout" data-toggle="modal" data-target=".bs-example-modal-sm" style="color: red;"><i class="fa fa-power-off"></i>Logout <b style="color: white;">(<?php echo session::get('addName') ?>)</b> </a></li>
                    </ul>
                </div>
            </nav>
            <div id="heading1"></div>
            <div id="heading2"></div>
            <div id="heading3"></div>
        </header>
        <!-- Header close -->