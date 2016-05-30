<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
if(!isset($_SESSION['SESS_TYPE'])||($_SESSION['SESS_TYPE']!='EMPLOYER'))
{
    header("location: index.php");
}
if($_SESSION['SESS_TYPE']=='EMPLOYER')
       {
           $log="Log Out";
           $link="logout.php";
           $flex="#";
           
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
<script language="javascript" src="js/cal2.js">
/*
Xin's Popup calendar script-  Xin Yang (http://www.yxscripts.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/
</script>
<script language="javascript" src="js/cal_conf2.js"></script>
<script type="text/javascript">
function validate_fill()
{
      
      
        obj1=document.getElementById("title");
        obj2=document.getElementById("start_date");
        obj3=document.getElementById("deadline");
        obj4=document.getElementById("location");
        obj5=document.getElementById("stipend");
        obj6=document.getElementById("duration");
        obj7=document.getElementById("type");
        obj8=document.getElementById("cat1");
        obj9=document.getElementById("about");
        
        
        va1=obj1.value;
        va2=obj2.value;
        va3=obj3.value;
        va4=obj4.value;
        va5=obj5.value;
        va6=obj6.value;
        va7=obj7.value;
        va8=obj8.value;
        va9=obj9.value;
        
       

       
        if(va1==""||va2==""||va3==""||va4==""||va5==""||va6==""||va7==""||va8==""||va9=="")
            {
                alert("please fill the required feilds");
                retval=false;
             
            }
            else
                {
                    //alert("Congratulations!!! Registration Successful... ")
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
<li><a href="#" data-flexmenu="admin">Publish</a></li>
<li><a href="view_internship.php"> View Internship</a></li>
<li><a href="#" data-flexmenu="register">Register</a></li>
<li><a href="<?php echo $link; ?>" data-flexmenu="<?php echo $flex; ?>"><?php echo $log; ?></a></li>

<li><a href="contact.php">Contact</a></li>
</ul>
   
</div>

<div id="contentwrap"> 

<div id="content">

<h2>Just a step away from your desired Interns...</h2>
<p>
   
		<!--the code bellow is used to display the message of the input validation-->
		 <?php
			if( isset($_SESSION['ERRMSG_ARR']) ) {
			$msg=$_SESSION['ERRMSG_ARR'];
				echo '<li><p style="font-size:12px; color:red;"><b>',$msg,'</b></p></li>'; 
				
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	
</p>
<p align="center">
    
    
    <form name="form1" action="exec_publish_internship.php" method="post" align="center" onsubmit="return(validate_fill());">
        Title of Internship<span style="color:red;">*</span> : <input type="text" id="title" name="title" value="" size="54" /><br><br>
        
                Start Date<span style="color:red;">*</span> : <input type="text" id="start_date" name="start_date" value="" size="16"/><a src="images/calendar.png" href="javascript:showCal('Calendar1')"><img src="images/calendar.png" width="20" height="20"  ></img></a>&nbsp;
        Deadline<span style="color:red;">*</span> : <input type="text" name="deadline" id="deadline" value="" size="20"/><a src="images/calendar.png" href="javascript:showCal('Calendar2')"><img src="images/calendar.png" width="20" height="20"  ></img></a><br><br>
        Location<span style="color:red;">*</span> : <input type="text" name="location" id="location" value="" size="22" />&nbsp;
        Stipend<span style="color:red;">*</span> : <input type="text" name="stipend" id="stipend" value="" size="22" /><br><br>
        Duration( in months)<span style="color:red;">*</span> : <input type="text" id="duration" name="duration" value="" size="11.5" />&nbsp;       
        Type<span style="color:red;">*</span> : <select id="type" name="type">
            <option>Full Time</option>
            <option>Part Time</option>
            <option>Remote</option>
        </select>
        <br><br>
        Category 1<span style="color:red;">*</span> : <select id="cat1" name="cat1" >
                    <option>Engineering</option>
                    <option>IT</option>
                    <option>MANAGEMENT</option>
                    <option>NGO</option>
                    <option>OTHER</option>
                </select>
        <br><br>
        Category 2 : <select name="cat2">
                    <option>Engineering</option>
                    <option>IT</option>
                    <option>MANAGEMENT</option>
                    <option>NGO</option>
                    <option>OTHER</option>
                </select>
        <br><br>
        Category 3 : <select name="cat3">
                    <option>Engineering</option>
                    <option>IT</option>
                    <option>MANAGEMENT</option>
                    <option>NGO</option>
                    <option>OTHER</option>
                </select>
        <br><br>
        About Internship<span style="color:red;">*</span> : (1000 Characters) <br></br>
        <textarea name="about"  id="about" rows="4" cols="55"></textarea>
        <br></br>     
        <input type="submit" value="Publish" name="publish" enabled/>
        
       
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
