// alert('java script working well');


//initial index page
$(document).ready(function(){
$('#content').load('welcome.php');

//handle menu clicks

$('div#myNavbar ul li a').click(function(){
		// alert('href clicked');

var page = $(this).attr('href');
$('#content').load( page +'.php');

return false;

		});




});