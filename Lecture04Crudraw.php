<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "crudraw";


// database connection
$con = mysqli_connect($server, $username, $password, $database);




if (!$con) {
    echo die("connection failed" . mysqli_connect_error());
} else {
    echo "connection was successfull";
}

// **** CREATE DATABASE ****

// $sql = "create database crudraw";
// $resdata = mysqli_query($con, $sql);
// if ($resdata) {

//     echo "  succuessfuly created database <br>";
// } else {

//     echo "  not created database <br>";
// }




// **** CREATE TABLE ****


// $sql = "create table info(
//        id int auto_increment primary key not null,
//        name varchar(250),
//        email varchar(250),
//        age int

//        )";
// $restable = mysqli_query($con, $sql);
// if ($restable) {
//     echo "Succuessfuly Table <br>";
// } else {
//     echo "Not Table  <br>";
// }


// **** INSERT TABLE ****

$name = "arshad shareef";
$email = "m@gmail.com";
$age = 123;


//  $sql="insert into info(name, email, age)values('$name', '$email', '$age')";


//  $res=mysqli_query($con, $sql);

//  if($res){
//     echo"inserted successfully";
//  }else{
//     echo"not inserted";
//  }



$sql = "select *from info ";

$res = mysqli_query($con, $sql);


// count rows

$numcounter = mysqli_num_rows($res);
echo "<br>total rows" . $numcounter . "<br>";


// **** FETCH SINGLE DATA ****



// 1st row

// $row=mysqli_fetch_assoc($res);
// echo "<br>total rows".var_dump($row);

// 2nd row

// $row=mysqli_fetch_assoc($res);
// echo "<br>total rows".var_dump($row);





// **** FETCH COMPLETE DATA ****

if ($numcounter > 0) {

    while ($show = mysqli_fetch_assoc($res)) {

        // echo "<br>total rows".var_dump($show);

        echo "ID  =" . $show['id'] . "<br>";
        echo "NAME  =" . $show['name'] . "<br>";
        echo "EMAIL  =" . $show['email'] . "<br>";
        echo "AGE  =" . $show['age'] . "<br>";
    }
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


    <table border="1">
        <thead>

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Option</th>
            </tr>
        </thead>

        <tbody>

            <?php

             // **** FETCH DATA IN TABULAR FORMAT ****
            $sqlselect = "select *from info ";
            $result = mysqli_query($con, $sqlselect);
            while ($show = mysqli_fetch_assoc($result)) {



                // echo "<br>total rows".var_dump($show);

                echo "<tr> <td>" . $show['id'] . "</td>";
                echo " <td>" . $show['name'] . "</td>";
                echo " <td>" . $show['email'] . "</td>";
                echo " <td>" . $show['age'] . "</td>";
                echo "<td> <button>Edit </button>
                <button>Delete</button></td></tr>";
            }

            ?>
        </tbody>
    </table>

</body>

</html>