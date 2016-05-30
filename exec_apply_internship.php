<?php
session_start();
include 'connection.php';

$intern_id=$_REQUEST['intern_id'];
$stud_id=$_REQUEST['stud_id'];
$cover=$_REQUEST['hire'];
if($cover=="")
{
    $err_msg="The text box can't be left empty.";
    $_SESSION['ERRMSG_ARR'] = $err_msg;
    header("location: apply_internship.php?remarks=unsuccess");
}
else{
    //Getching emp_id from internship table against the intern_id
    $qry="SELECT EMP_ID FROM internship WHERE INTERN_ID='$intern_id'";
    $result=mysql_query($qry);
    $fetch = mysql_fetch_assoc($result);
    $emp_id=$fetch['EMP_ID'];
    mysql_query("INSERT INTO application(STUD_ID, INTERN_ID,EMP_ID,COVER) VALUES('$stud_id', '$intern_id','$emp_id', '$cover')") or die("faulty query");
    $err_msg="Congratulations! You have successfully applied for the internship.";
    $_SESSION['ERRMSG_ARR'] = $err_msg;
   
    header("location: view_internship.php?remarks=success");
}
?>
