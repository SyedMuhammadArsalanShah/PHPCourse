<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "abcxyz";


//create connection

$con = mysqli_connect($server, $username, $password, $database);


if (!$con) {
    die("failed connection " . mysqli_connect_error());
} else {
    echo "connection was successful<br>";
}


// create table query

// $sql="Create Table info (id int auto_increment primary key not null,
//                           name varchar(250) not null,
//                           email varchar (250) not null)";





// ************insert query************

// $name="laiba1";
// $email="laiba@gmail.com";
// $sql="Insert into info(name, email)values('$name', '$email')";
// $res=mysqli_query($con, $sql);

// if ($res) {

//     echo "  succuessfuly inserted <br>";
// } else {

//     echo "  not inserted <br>";
// }


// ************select query************ 

$sql1 = "select * from info";
$res1 = mysqli_query($con, $sql1);

//count rows
$num = mysqli_num_rows($res1);


if ($num > 0) {

     //for fetch single data    
    // $show=mysqli_fetch_assoc($res1);
    // echo var_dump($show)."<br>";


    // $show=mysqli_fetch_assoc($res1);
    // echo var_dump($show)."<br>";

    // $show=mysqli_fetch_assoc($res1);
    // echo var_dump($show)."<br>";

    // $show=mysqli_fetch_assoc($res1);
    // echo var_dump($show)."<br>";





    while ($show = mysqli_fetch_assoc($res1)) {

        // echo var_dump($show) . "<br>";

        echo "Id " . $show['id'] . "<br>";
        echo "Name " . $show['name'] . "<br>";
        echo "Email " . $show['email'] . "<br>";
    }
    echo " data from info " . $num;
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
                <th>Option</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $res11 = mysqli_query($con, $sql1);
            if ($num > 0) {

                while ($show = mysqli_fetch_assoc($res11)) {

                    // echo var_dump($show) . "<br>";

                    echo "<tr><td>" . $show['id'] . "</td>";
                    echo "<td>" . $show['name'] . "</td>";
                    echo "<td>" . $show['email'] . "</td>";
                    echo "<td> <button>Edit </button><button>Delete</button></td> 
                        </tr>";
                }
            }

            ?>



        </tbody>

    </table>


</body>

</html>