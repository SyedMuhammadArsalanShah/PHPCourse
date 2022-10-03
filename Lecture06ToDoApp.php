<?php

$insert = false;



$server = "localhost";
$username = "root";
$pass = "";

$database = "ToDolist";
$con = mysqli_connect($server, $username, $pass, $database);

// $sql = "create database ToDolist";
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




// $sql="create table info(
//     Id int auto_increment primary key not null,
//     Title nvarchar(100), description Text(10000),
//     date DATETIME DEFAULT current_timestamp())";

// $resdata = mysqli_query($con, $sql);
// if ($resdata) {

//     echo "  succuessfuly created table <br>";
// } else {

//     echo "  notcreated table <br>";
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $des = $_POST['des'];
    $sql = "Insert into info(title, description)values('$title', '$des')";
    $res = mysqli_query($con, $sql);

    if ($res) {
        // echo "  succuessfuly inserted <br>";
        $insert = true;
    } else {

        echo "  not inserted <br>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- jquery -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled">contact</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your task has been successfully added.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>";
    }
    ?>


    <div class="container" style="margin-top: 50px ;">
        <h1>My To Do App</h1>
        <form action="Lecture06ToDoApp.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">

            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" name="des" id="des"></textarea>
                <label for="des">Description</label>
            </div>
            <button style="margin-top: 10px ;" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

          


    <div class="container" style="margin-top: 50px ;">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#sno</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


                <?php
                $selectsql = "select * from info ";
                $select = mysqli_query($con, $selectsql);
                $num = mysqli_num_rows($select);// rows count
                if ($num > 0) {

                    while ($show = mysqli_fetch_assoc($select)) {

                        // echo var_dump($show) . "<br>";

                        echo "<tr><td>" . $show['Id'] . "</td>";
                        echo "<td>" . $show['Title'] . "</td>";
                        echo "<td>" . $show['description'] . "</td>";
                        echo "<td> 
                    <button type='button' class='edit btn btn-dark'id=" . $show['Id'] . ">Edit</button>
                    <button type='button' class='btn btn-dark'>Delete</button>
                    </td> 
                     </tr>";
                    }
                }

                ?>



            </tbody>
        </table>




    </div>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    
</body>

</html>