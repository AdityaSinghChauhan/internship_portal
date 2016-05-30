<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_TYPE']);
unset($_SESSION['SESS_ID']);

	
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
<script type="text/javascript">
function validate_fill()
{
      
      
        obj1=document.getElementById("email");
        obj2=document.getElementById("password");
        
        
        va1=obj1.value;
        va2=obj2.value;
        
        
       

       
        if(va1==""||va2=="")
            {
                alert("please fill the required feilds");
                retval=false;
             
            }
            else
                {
                            // alert("Please Wait");
                    retval=true;
                }
                return retval;
}
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
<li><a href="view_internship.php"> View Internship</a></li>
<li><a href="#" data-flexmenu="register">Register</a></li>
<li><a href="#" data-flexmenu="login">Login</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
   
</div>

<div id="contentwrap"> 

<div id="content">

<h2>Just a step away from your desired Interns...</h2>
<p>
   
		<!--the code bellow is used to display the message of the input validation-->
		 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li><p style="font-size:12px; color:red;"><b>',$msg,'</b></p></li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	
</p>
<p align="center">
    
    
    <form action="exec_log_employer.php" method="post" align="center">
        &nbsp;&nbsp;&nbsp;&nbsp;Enter Email : <input type="text" id="email" name="email" value="" size="30" /><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp; Enter Password : <input type="password" id="password" name="password" value="" size='25' /><br><br>
            
              &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Login" name="login" />
        </form>
    
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
</body>
</html>
