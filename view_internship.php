<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
       
        session_start();
        $button="enabled";
        $label="Apply";
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
           
           $button="disabled";
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

<h2>The opportunities are endless...</h2>
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
    <?php
    include 'connection.php';
    // Query for a list of all existing files
        $sql = 'SELECT `INTERN_ID`, `NAME`, `COMPANY_NAME`, `LOCATION`, `DURATION`, `STIPEND`, `START_DATE`, `DEADLINE`, `TYPE`, `CATEGORY_1`, `CATEGORY_2`, `CATEGORY_3`, `ABOUT`  FROM `internship`';

        $result = $dbLink->query($sql);
     
    // Check if it was successfull
        if($result) {
        // Make sure there are some files in there
            if($result->num_rows == 0) {
                echo '<p>There are no internships in the database</p>';
            }
            else {
            
            // Print the top of a table
                echo '<table width="100%" padding="0" cellspacing="0" border="1"  >
                    <tr>
                    <td align="center"><p style="font-size:16px"><b>ID</b></p></td>
                        <td><p style="font-size:16px"><b>Name</b></p></td>
                        <td><p style="font-size:16px"><b>Company</b></p></td>
                        <td><p style="font-size:16px"><b>Location</b></p></td>
                        <td><p style="font-size:16px"><b>Duration</b></p></td>
                        <td><p style="font-size:16px"><b>Stipend</b></p></td>
                        <td><p style="font-size:16px"><b>Start Date</b></p></td>
                        <td><p style="font-size:16px"><b>Deadline</b></p></td>
                        <td><p style="font-size:16px"><b>Type</b></p></td>
                        <td><b>&nbsp;</b></td>
                    </tr>';
     
            // Print each file
                while($row = $result->fetch_assoc()) {
                echo "
                    <tr><td><p style='font-size:16px;'>{$row['INTERN_ID']}</p></td>
                        <td><p style='font-size:16px;'>{$row['NAME']}</p></td>
                        <td><p style='font-size:16px; '>{$row['COMPANY_NAME']}</p></td>
                        <td><p style='font-size:16px; '>{$row['LOCATION']}</p></td>
                        <td><p style='font-size:16px;'>{$row['DURATION'] } months</p></td>
                        <td><p style='font-size:16px;'>{$row['STIPEND']} INR</p></td>
                        <td><p style='font-size:16px;'>{$row['START_DATE']}</p></td>
                        <td><p style='font-size:16px;'>{$row['DEADLINE']}</p></td>
                        <td><p style='font-size:16px;'>{$row['TYPE']}</p></td>";
                        //Checking for already applied internships
            if(isset($_SESSION['SESS_TYPE'])&&$_SESSION['SESS_TYPE']=="STUDENT"){
            $intern_id=$row['INTERN_ID'];
            $stud_id=$_SESSION['SESS_ID'];
            
            $qry_duplicate = "SELECT * FROM application WHERE INTERN_ID = '$intern_id' AND STUD_ID = '$stud_id' ";
            $result_duplicate=mysql_query($qry_duplicate);
            if($result_duplicate) {
                
		if(mysql_num_rows($result_duplicate) > 0) {
                    $label="Applied";
                    $button="disabled";
                }
                else
                {
                    $label="Apply";
                    $button="enabled";
                }
            }
            }
                        
                        ?>
                        <td>
                            <form method='post' action='apply_internship.php'>
                                <input type="hidden" name="intern_id" value="<?php echo $row['INTERN_ID']; ?>" />
                                <input type="hidden" name="stud_id" value="<?php echo $_SESSION['SESS_ID']; ?>" />
                                <input type="submit" value="<?php echo $label; ?>" name="apply" <?php echo $button; ?>/>
                            </form>
                        </td>  
                    <?php echo "
                         </tr>";
                }
     
            // Close table
                echo '</table>';
            }
     
        // Free the result
            $result->free();
        }
        else
            {
        
            echo 'Error! SQL query failed:';
            echo "<pre>{$dbLink->error}</pre>";
            }
     
    // Close the mysql connection
        $dbLink->close();
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
