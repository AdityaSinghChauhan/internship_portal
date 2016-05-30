<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('connection.php');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$email = clean($_REQUEST['email']);
	$password = clean($_REQUEST['password']);
 
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: log_employer.php");
		exit();
	}
        
 
	//Create query
	$qry="SELECT * FROM employer WHERE EMAIL='$email' AND PASSWORD='$password'";
	$result=mysql_query($qry);
        
 
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$fetch = mysql_fetch_assoc($result);
			$_SESSION['SESS_TYPE'] = 'EMPLOYER';
                        $_SESSION['SESS_ID'] = $fetch['EMP_ID'];
			$_SESSION['SESS_FIRST_NAME'] = $fetch['COM_NAME'];
			$_SESSION['SESS_EMAIL'] = $fetch['EMAIL'];
                        
			session_write_close();
			header("location: index.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'The entered email and password do not match in our database';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: log_employer.php");
				exit();
			}
		}
	}
 else{
  
		die("Query failed");
 }
?>