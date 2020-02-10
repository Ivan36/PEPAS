<!-- <html>
<head>
<title>live-clock</title>
<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
document.getElementById('ct').style.color='red';
display_c();
 }
//  function display_ct() {
// var x = new Date()
// var x1=x.toUTCString();// changing the display to UTC string
// document.getElementById('ct').innerHTML = x1;
// tt=display_c();
//  }
</script>
</head>

<body onload=display_ct(); style="margin-right: 5%;">
<span id='ct' ></span>

</body>
</html> -->

<?php
    date_default_timezone_set('Africa/Nairobi');
    echo $timestamp = date("d-m-Y h:i:s a", time());