<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
       
        session_start();
       if(!isset($_SESSION['SESS_FIRST_NAME']))
       {
           $log="Login";
           $link="#";
           $flex="login";
           
       }
       else if($_SESSION['SESS_TYPE']=='STUDENT')
       {
           $uname=$_SESSION['SESS_FIRST_NAME'];
           $log="Log Out ".$uname;
           $link="logout.php";
           $flex="#";
           
       }
       else if($_SESSION['SESS_TYPE']=='EMPLOYER')
       {
           
           $log="Log Out";
           $link="logout.php";
           $flex="#";
           $flag=true;
       }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="icon" type="image/gif/png/jpg" href="images/title.jpg"></link>
<title>Internship Portal - Beta</title>
<link rel="stylesheet" type="text/css" href="css/flexdropdown.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/flexdropdown.js">

/***********************************************
* Flex Level Drop Down Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Please keep this notice intact
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
</head>
<body>

<div id="wrap">

<div id="header">
<h1><a href="index.php">Internship Portal - Beta</a></h1>
</div>

<div id="menu"  >
    
<ul >
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<?php
//This piece of code is to display options only to the employer

    if(isset($_SESSION['SESS_TYPE'])&&$_SESSION['SESS_TYPE']=='EMPLOYER')
    {
        ?>
        <li><a href="#" data-flexmenu="admin">Publish</a></li>
    <?php } ?>
<li><a href="view_internship.php"> View Internship</a></li>
<li><a href="#" data-flexmenu="register">Register</a></li>
<li><a href="<?php echo $link; ?>" data-flexmenu="<?php echo $flex; ?>"><?php echo $log; ?></a></li>
<li><a href="contact.php">Contact</a></li>

</ul>
   
</div>

<div id="contentwrap"> 

<div id="content">

<h2>Internship Portal - Beta</h2>

<p>
	 Internshala is a dot com business with the heart of dot org.

At the core of the idea is the belief that internships, if managed well, can make a positive difference to the student, to the employer, and to the society at large. Hence, the ad-hoc culture surrounding internships in India should and would change. Internshala aims to be the driver of this change. 
</p>


<p>
    <img style="float: center; padding: 0 10px 10px 0;" src="images/for-students.png" width="400" height="350" alt="internship portal" />
</p>

</div>

<div id="sidebar">
<h3>What's New</h3>
<marquee direction="up" behavior="scroll" scrolldelay="1" scrollamount="2" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">
<ul>
<li><a href="#">I am working on an Internship Portal</a></li>
<li><a href="#"> I love coding ;)</a></li>
<li><a href="#">... and Astronomy </a></li>
<li><a href="#">I am enjoying developing this application</a></li>
<li><a href="#">Thankyou Internshala</a></li>
</ul>
</marquee>

<h3>Useful Resources</h3>
<marquee direction="up" behavior="scroll" scrolldelay="1" scrollamount="2" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">
<ul>
<li><a href="#">I am working on an Internship Portal</a></li>
<li><a href="#"> I love coding ;)</a></li>
<li><a href="#">... and Astronomy </a></li>
<li><a href="#">I am enjoying developing this application</a></li>
<li><a href="#">Thankyou Internshala</a></li>
</ul>
</marquee>

</div>

<div style="clear: both;"> </div>

</div>

<div id="footer">
<p>&copy; Copyright 2016 Internship Portal - Beta </p></div>

</div>
<ul id="register" class="flexdropdownmenu">
<li><a href="reg_student.php">As Student</a></li>
<li><a href="reg_employer.php">As Employer</a></li>
</ul>
<ul id="login" class="flexdropdownmenu">
<li><a href="log_student.php">As Student</a></li>
<li><a href="log_employer.php">As Employer</a></li>
</ul>
<ul id="admin" class="flexdropdownmenu">
<li><a href="publish_internship.php">Publish an Internship</a></li>
<li><a href="view_application.php">View Applications</a></li>
</ul>
</body>
</html>
