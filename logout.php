<?php

    session_start();
   
    unset($_SESSION['SESS_FIRST_NAME']);
    unset($_SESSION['SESS_TYPE']);
     unset($_SESSION['SESS_ID']);
        
        
    session_destroy();
    header("location: index.php");

?>
