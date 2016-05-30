<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
       
        session_start();
       if(!isset($_SESSION['SESS_FIRST_NAME']))
       {
           $log="Log in";
           $link="login_index.php";
           
       }
       else
       {
           $uname=$_SESSION['SESS_FIRST_NAME'];
           $log="Log Out ".$uname;
           $link="logout.php";
           
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
<script type="text/javascript">
function validate_fill()
{
      
      
        obj1=document.getElementById("f_name");
        obj2=document.getElementById("l_name");
        obj3=document.getElementById("password");
        obj4=document.getElementById("email");
        obj5=document.getElementById("mobile");
        
        obj6=document.getElementById("college");
        
        va1=obj1.value;
        va2=obj2.value;
        va3=obj3.value;
        va4=obj4.value;
        va5=obj5.value;
        va6=obj6.value;
        
       

       
        if(va1==""||va2==""||va3==""||va4==""||va5==""||va6=="")
            {
                alert("please fill the required feilds");
                retval=false;
             
            }
            else
                {
                   // alert("Congratulations!!! Registration Successful... ")
                    retval=true;
                }
                return retval;
}
function checkEmail() 
    {
    

    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
  
    return false;
 }
 }
 function characterFilter()
			{
				try
				{
					ob1=document.getElementById("mobile");
					ob2=document.getElementById("mobile_msg");
					v1=ob1.value;
					foundnum=false;
					i=0;
					for(i=0;i<v1.length;i++)
					{
						if(v1.charAt(i)>='A' && v1.charAt(i)<='Z'||v1.charAt(i)>='a' && v1.charAt(i)<='z')
						{
							foundnum=true;
							break;
						}

					}
					if(foundnum==true)
					{
						ob2.innerHTML="Character not allowed in mobile textfield";
						newval="";
						for(j=0;j<i;j++)
						{
							newval+=v1.charAt(j);
						}
						ob1.value=newval;
					}
					else
					{
						ob2.innerHTML="";
						
					}
				}catch(ex)
				{
 					ob1.innerHTML="<br/>Error "+ex;
				}		
				return true;
			}
function numericFilter()
			{
				try
				{
					ob1=document.getElementById("f_name");
					ob2=document.getElementById("f_name_msg");
					v1=ob1.value;
					foundnum=false;
					i=0;
					for(i=0;i<v1.length;i++)
					{
						if(v1.charAt(i)>='0' && v1.charAt(i)<='9')
						{
							foundnum=true;
							break;
						}

					}
					if(foundnum==true)
					{
						ob2.innerHTML="Numeric Value Not Allowed";
						newval="";
						for(j=0;j<i;j++)
						{
							newval+=v1.charAt(j);
						}
						ob1.value=newval;
					}
					else
					{
						ob2.innerHTML="";
						
					}
				}catch(ex)
				{
 					ob1.innerHTML="<br/>Error "+ex;
				}		
				return true;
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
 <h2>Register as Student</h2><br>
<h2>Just a step away from your dream Internships...</h2>
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
<p>
    
    <form action="exec_reg_student.php" method="post" onsubmit="return(validate_fill());">
            First Name:<span style="color:red;">*</span> <input type="text" id='f_name' name="fname" value="" size="19.5" onKeyUp="numericFilter();" /><span id="f_name_msg" style="color:red"></span>  &nbsp; Last Name<span style="color:red;">*</span>: <input type="text" id='l_name' name="lname" value="" size="19.5" /><br><br>
            Your Email<span style="color:red;">*</span>: <input type="text" name="email" id="email" value="name@xyz.com" size="57" onchange="checkEmail();"/><br><br>
            Choose a password<span style="color:red;">*</span> : <input type="password" id="password" name="password" value="" size="16" /> &nbsp; Mobile:<span style="color:red;">*</span> <input type="text" id="mobile" name="contact" value="" size="16" onKeyUp="characterFilter();" /><span id="mobile_msg" style="color:red"></span><br><br>
            College<span style="color:red;">*</span> : <input type="text" id="college" name="college" value="" size="60" /><br><br>
            <input type="submit" value="Sign Up" name="submit" />
           
    
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
