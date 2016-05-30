<?php
session_start();
include 'connection.php';
$email=$_REQUEST['email'];

//check if the email already exists in the database
$query=mysql_query("select STUD_ID from student where EMAIL='$email' ");
$row=mysql_fetch_array($query);
if($row)
{
    
    $err_msg="An account with same email address registered already";
    $_SESSION['ERRMSG_ARR'] = $err_msg;
    header("location: reg_student.php?remarks=email_already_registered");
}
else
{
    //code for inserting values in the table
    $fname=$_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $password=$_REQUEST['password'];
    $mobile=$_REQUEST['contact'];
    $college=$_REQUEST['college'];
    if($email==""||$fname==""||$lname==""||$password==""||$mobile==""||$college=="")
    {
        $err_msg="Please fill the details appropriately";
        $_SESSION['ERRMSG_ARR'] = $err_msg;
        header("location: reg_student.php?remarks=please_fill_details");
    }
    else{
    mysql_query("INSERT INTO student(EMAIL, F_NAME, L_NAME, PASSWORD,  MOBILE, COLLEGE) VALUES('$email', '$fname', '$lname', '$password', '$mobile', '$college')") or die("faulty query");
    $err_msg="Congratulations! Registration Successful.";
    $_SESSION['ERRMSG_ARR'] = $err_msg;
    //Mailing verification link code
    $headers = 'From: aditya@cgvigyansabha.in' . "\r\n" .
    'Reply-To: astroadityachauhan@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $link="http://www.internship.cgvigyansabha.in/account_verification.php?email=".$email."&type=student";
    $emailbody="Dear Member\n please click on the following link to verify your account. \n ".$link."\n Regards \n Internship Portal";
    mail($email, 'ACCOUNT VERIFICATION', $emailbody);
    header("location: reg_student.php?remarks=success");
}
}

?>
