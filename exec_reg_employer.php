<?php
session_start();
include 'connection.php';
$email=$_REQUEST['email'];
//check if the email already exists in the database
$query=mysql_query("select EMP_ID from employer where EMAIL='$email' ");
$row=mysql_fetch_array($query);
if($row)
{
    
    $err_msg="An account with same email address registered already";
    $_SESSION['ERRMSG_ARR'] = $err_msg;
    header("location: reg_employer.php?remarks=email_already_registered");
}
else
{
    //code for inserting values in the table
    $com_name=$_REQUEST['com_name'];
    $password=$_REQUEST['password'];
    $contact=$_REQUEST['contact'];
    $address=$_REQUEST['address'];
    $about=$_REQUEST['about'];
    if($email==""||$com_name==""||$password==""||$contact==""||$address==""||$about=="")
    {
        $err_msg="Please fill the details appropriately";
        $_SESSION['ERRMSG_ARR'] = $err_msg;
        header("location: reg_employer.php?remarks=please_fill_details");
    }
    else
    {
    mysql_query("INSERT INTO employer(EMAIL, COM_NAME,  PASSWORD,  CONTACT, ADDRESS, ABOUT) VALUES('$email', '$com_name', '$password', '$contact', '$address', '$about')") or die("faulty query");
    $err_msg="Congratulations! Registration Successful. ";
    $_SESSION['ERRMSG_ARR'] = $err_msg;
    //Mailing verification link code
    $headers = 'From: aditya@cgvigyansabha.in' . "\r\n" .
    'Reply-To: astroadityachauhan@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $link="http://www.internship.cgvigyansabha.in/account_verification.php?email=".$email."&type=employer";
    $emailbody="Dear Member\n please click on the following link to verify your account. \n ".$link."\n Regards \n Internship Portal";
    mail($email, 'ACCOUNT VERIFICATION', $emailbody);
     
     
    header("location: reg_employer.php?remarks=success");
    }
}

?>
