<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
if(!isset($_SESSION['SESS_TYPE'])||($_SESSION['SESS_TYPE']=='EMPLOYER'))
{
    header("location: log_student.php");
}
include 'connections.php';
$uname=$_SESSION['SESS_FIRST_NAME'];
$log="Log Out ".$uname;
$link="logout.php";
$flex="#";
$intern_id=$_REQUEST['intern_id'];
$stud_id=$_REQUEST['stud_id'];


    // Query for a list of all existing files
        $sql = "SELECT INTERN_ID, NAME, COMPANY_NAME, LOCATION, DURATION, STIPEND, START_DATE, DEADLINE, TYPE, CATEGORY_1, CATEGORY_2, CATEGORY_3,ABOUT, TIME  FROM internship WHERE INTERN_ID='$intern_id'";
        $result = $dbLink->query($sql);
$row = $result->fetch_assoc();
       
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
<script language="javascript" src="js/cal2.js">
/*
Xin's Popup calendar script-  Xin Yang (http://www.yxscripts.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/
</script>
<script language="javascript" src="js/cal_conf2.js"></script>
<script>
function textCounter( field, countfield, maxlimit ) {
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  field.blur();
  field.focus();
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>
<script type="text/javascript">
function validate_fill()
{
      
      
        obj1=document.getElementById("hire");
       
        
        
        va1=obj1.value;
      
        
       

       
        if(va1=="")
            {
                alert("please fill the textbox");
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
<li><a href="<?php echo $link; ?>" data-flexmenu="<?php echo $flex; ?>"><?php echo $log; ?></a></li>

<li><a href="contact.php">Contact</a></li>
</ul>
   
</div>

<div id="contentwrap"> 

<div id="content">

<h2>Just a step away from your desired Internship...</h2>
<p>
     <?php
			if( isset($_SESSION['ERRMSG_ARR'])) {
			echo '<ul class="err">';
			$msg=$_SESSION['ERRMSG_ARR'];
				echo '<li><p style="font-size:12px; color:red;"><b>',$msg,'</b></p></li>'; 
				
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
</p>
<p >
    <b> Title: <?php echo $row['NAME']; ?> </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <b>Company : <?php echo $row['COMPANY_NAME']; ?> </b><br></br>
    <b>Duration: </b><?php echo $row['DURATION']; ?> months  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Location : </b><?php echo $row['LOCATION']; ?> <br><br>
            <b>Stipend: <?php echo $row['STIPEND']; ?> </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>Type: </b><?php echo $row['TYPE']; ?><br><br>
    <b>Start Date: </b><?php echo $row['START_DATE']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Deadline : </b><?php echo $row['DEADLINE']; ?><BR><BR>
    <b>About Internship:</b><br>
    <?php echo $row['ABOUT']; ?><br><br>
    <b>How are you the best fit for the job ? (1000 characters)</b><br>
    <form action="exec_apply_internship.php" method='post' onsubmit="return(validate_fill());" >
        <input type="hidden" name="intern_id" value="<?php echo $intern_id; ?>" />
        <input type="hidden" name="stud_id" value="<?php echo $stud_id; ?>" />
        <input onblur="textCounter(this.form.recipients,this,1000);" disabled  onfocus="this.blur();" tabindex="999" maxlength="3" size="3" value="1000" name="counter">Characters Remaining
        <textarea onblur="textCounter(this,this.form.counter,1000);" onkeyup="textCounter(this,this.form.counter,1000);" id="hire" name="hire" rows="4" cols="55"></textarea><br>
    <input type="submit" value="Apply" name="apply" />
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
<ul id="admin" class="flexdropdownmenu">
<li><a href="publish_internship.php">Publish</a></li>
<li><a href="view_application.php">View Applications</a></li>
</ul>
</body>
</html>
