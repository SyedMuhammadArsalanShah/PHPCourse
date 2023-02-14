
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "LRS";


// database connection
$con = mysqli_connect($server, $username, $password, $database);




if (!$con) {
    echo die("connection failed" . mysqli_connect_error());
} else {
    echo "connection was successfull";
}


?>