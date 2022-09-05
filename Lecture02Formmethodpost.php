<?php
// variable to connect

$insert=false;
if (isset($_POST['na'])) {


$server="localhost";
$username="root";
$password="";

// create database connection


$con= mysqli_connect($server, $username, $password);


if (!$con) {
    
 die("connection failed".mysqli_connect_error());


}

$name  =$_POST['na'];
$email =$_POST['em'];
$phone =$_POST['co'];




$sql ="insert into  phppost.info (name, email, phone)values('$name', '$email', '$phone')";

//execute the query


if ($con->query($sql)==true) {
    // echo $sql;
    // echo "Successfully executed";




    $insert=true;
}else{


    echo"Error  $sql <br> $con->error";
}


$con->close();




}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

if ($insert == true) {
    echo "<p>thanks for submission</p>";
}


?>
    
 <form action="Formmethodpost.php" method="post">

     <label for="un">Name</label>
     <input type="text" name="na" id="un">
      <br>


     <label for="une">Email</label>
     <input type="email" name="em" id="une">
     <br>
     <label for="unee">Phone </label>
     <input type="phone" name="co" id="unee">
     <br>
     <input type="submit" value="Submit">






 </form>




</body>
</html>