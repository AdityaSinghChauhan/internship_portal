<?php
session_start();
include 'connection.php';

    //code for inserting values in the table
    $com_name=$_SESSION['SESS_FIRST_NAME'];
    $name=$_REQUEST['title'];
    $start_date=$_REQUEST['start_date'];
    $deadline=$_REQUEST['deadline'];
    $location=$_REQUEST['location'];
    $stipend=$_REQUEST['stipend'];
    $category1=$_REQUEST['cat1'];
    $category2=$_REQUEST['cat2'];
    $category3=$_REQUEST['cat3'];
    $type=$_REQUEST['type'];
    $about=$_REQUEST['about'];
    $duration=$_REQUEST['duration'];
    if($com_name==""||$name==""||$start_date==""||$deadline==""||$location==""||$stipend==""||$category1==""||$type==""||$about==""||$duration=="")
    {
        $err_msg="Please fill the details appropriately";
        $_SESSION['ERRMSG_ARR'] = $err_msg;
        header("location: publish_internship.php?remarks=please_fill_details");
    }
    else{
    $emp_id=$_SESSION['SESS_ID'];
    mysql_query("INSERT INTO internship(NAME, COMPANY_NAME, EMP_ID, DURATION,  LOCATION, DEADLINE, ABOUT, CATEGORY_1, CATEGORY_2, CATEGORY_3, STIPEND, START_DATE, TYPE) VALUES('$name', '$com_name','$emp_id', '$duration', '$location', '$deadline', '$about', '$category1', '$category2', '$category3', '$stipend', '$start_date', '$type')") or die("faulty query");
    $err_msg="Congratulations! Internship published successfully";
    $_SESSION['ERRMSG_ARR'] = $err_msg;
    //Mailing verification link code
    
     
    header("location: publish_internship.php?remarks=success");
    }
?>
