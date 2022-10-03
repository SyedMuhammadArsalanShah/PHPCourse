<?php
$server = "localhost";
$username = "root";
$password = "";



//create connection

$con = mysqli_connect($server, $username, $password, "engrac");
// $sql = "create database engrac";
// $resdata = mysqli_query($con, $sql);
// if ($resdata) {

//     echo "  succuessfuly created database <br>";
// } else {

//     echo "  notcreated database <br>";
// }

if (!$con) {
    die("failed connection " . mysqli_connect_error());
} else {
    echo "connection was successful<br>";
}





// create table query

// $sql="Create Table engrac.info ( Id int auto_increment primary key not null,
//                           Name varchar(250) not null,
//                           Email varchar (250) not null,
//                           Age varchar(250)  
//                           )";
//                           $restable=mysqli_query($con, $sql);
//                           if ($restable) {
//                               echo "Succuessfuly Table <br>";
//                           } else {
//                               echo "Not Table  <br>";
//                           }





$name = "Engr.Misbah Iqbal  ";
$email = "misbah@gmail.com";

$sql = "Insert into engrac.info(name, email)values('$name', '$email')";
$res = mysqli_query($con, $sql);

if ($res) {

    echo "  succuessfuly inserted <br>";
} else {

    echo "  not inserted <br>";
}


// ************insert query************






// // ************select query************ 


$sql1 = "select * from engrac.info ";
// $res2 = mysqli_query($con, $sql1);
// // //count rows



// if ($num > 0) {
//     while ($show = mysqli_fetch_assoc($res2)) {

//         // echo var_dump($show) . "<br>";
//         //datatype
//         echo "Id " .    $show['Id'] . "<br>";

//         echo "Name " .  $show['Name'] . "<br>";
//         echo "Email " . $show['Email'] . "<br>";
//         echo "Age " .   $show['Age'] . "<br>";
//     }

    // for fetch single data    
    // $show=mysqli_fetch_assoc($res1);
    // echo var_dump($show)."<br>";


    // $show=mysqli_fetch_assoc($res1);
    // echo var_dump($show)."<br>";

    //     // $show=mysqli_fetch_assoc($res1);
    //     // echo var_dump($show)."<br>";

    //     // $show=mysqli_fetch_assoc($res1);
    //     // echo var_dump($show)."<br>";



    // }


// }












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
                            $num = mysqli_num_rows($res11);
                            if ($num > 0) {

                                while ($show = mysqli_fetch_assoc($res11)) {

                                    // echo var_dump($show) . "<br>";

                                    echo "<tr><td>" . $show['Id'] . "</td>";
                                    echo "<td>" . $show['Name'] . "</td>";
                                    echo "<td>" . $show['Email'] . "</td>";
                                    echo "<td> <button>Edit </button><button>Delete</button></td> 
                                        </tr>";
                                }
                            }

                            
                ?>



        </tbody>

    </table>


</body>

 </html>