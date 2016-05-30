<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
       
       session_start();
       $emp_id=$_SESSION['SESS_ID'];
       if(!isset($_SESSION['SESS_TYPE'])||$_SESSION['SESS_TYPE']=='STUDENT')
       {
           header("location: log_employer.php?remarks=unsucess_login");
           
           
       }
       
       else if($_SESSION['SESS_TYPE']=='EMPLOYER')
       {
           $log="Log Out";
           $link="logout.php";
           $flex="#";
           
       }
       include 'connections.php';
       error_reporting(E_ALL ^ E_DEPRECATED);
       
       
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

<div id="contentwrap_view"> 

<div id="content_view">

<h2>And here are your desired Interns...</h2>
<p>
    <?php
    include 'connection.php';
    //Fetching intern_id and stud_id for lisiting
    $qry_num="SELECT INTERN_ID,STUD_ID FROM application WHERE EMP_ID='$emp_id'";
    $result_num=mysql_query($qry_num);
    $num_rows=mysql_num_rows($result_num);
    
    
    echo '<table width="100%" padding="0" cellspacing="0" border="1"  >
                    <tr>
                        <td><p style="font-size:16px"><b>S_NO</b></p></td>
                        <td><p style="font-size:16px"><b>INTERN_ID</b></p></td>
                        <td><p style="font-size:16px"><b>STUD_ID</b></p></td>
                        <td><p style="font-size:16px"><b>Name</b></p></td>
                        <td><p style="font-size:16px"><b>College</b></p></td>
                        <td><p style="font-size:16px"><b>Mobile</b></p></td>
                        
                        
                    </tr>';
    for($i=1;$i<=$num_rows;$i++)
    {
        $fetch_num = mysql_fetch_assoc($result_num);
        $intern_id=$fetch_num['INTERN_ID'];
        $stud_id=$fetch_num['STUD_ID'];
        
        $sql = "SELECT * FROM student WHERE STUD_ID='$stud_id'";
        $result_stud=  mysql_query($sql);
        $num_rows_stud=mysql_num_rows($result_stud);
    
        $row=  mysql_fetch_assoc($result_stud);
        echo "
                    <tr><td><p style='font-size:16px;'>{$i}</p></td>
                        <td><p style='font-size:16px;'>{$intern_id}</p></td>
                        <td><p style='font-size:16px; '>{$stud_id}</p></td>
                        <td><p style='font-size:16px; '>{$row['F_NAME']}</p></td>
                        <td><p style='font-size:16px;'>{$row['COLLEGE'] }</p></td>
                        <td><p style='font-size:16px;'>{$row['MOBILE']}</p></td>";
                        ?>
    <td>
                            <form method='post' action='view_detail.php'>
                                <input type="hidden" name="intern_id" value="<?php echo $intern_id; ?>" />
                                <input type="hidden" name="stud_id" value="<?php echo $stud_id; ?>" />
                                <input type="submit" value="View" name="apply" />
                            </form>
                        </td>  
    <?php
    }
    
      echo "
                         </tr>";
                
     
            // Close table
                echo '</table>';
            ?>
</p>


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
