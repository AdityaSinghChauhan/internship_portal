 <?php 
    // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'internship');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 ?>    