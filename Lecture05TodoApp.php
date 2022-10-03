<!-- shift alt f => code formatting -->
<!-- database work -->

<!-- 
create database todoapp


-- for use database
use school 
-- for create table 

create table info(

Id int identity(1,1) primary key not null,
Title nvarchar(100),
description Text(10000),
date DATETIME DEFAULT current_timestamp()
) 
 -->






<?php
$insert = false;
$update = false;
$delete = false;





$server = "localhost";
$username = "root";
$password = "";
$database = "todoapp";


//create connection

$con = mysqli_connect($server, $username, $password, $database);


if (!$con) {
    die("failed connection " . mysqli_connect_error());
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['editid'])) {


        $id = $_POST['editid'];
        $title = $_POST['titleEdit'];
        $des = $_POST['desEdit'];

        $updatequery = "update info set Title='$title', description ='$des' where info.id='$id'";
        $result = mysqli_query($con, $updatequery);
        if ($result) {
            $update = true;
        } else {
            echo "not updated";
        }
    } else {


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
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- datatable.net cdn for css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>



    <!-- Button trigger modal
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">My Note </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="Lecture05TodoApp.php" method="POST">
                        <input type="hidden" name="editid" id="editid">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="titleEditt" name="titleEdit" aria-describedby="emailHelp">

                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="desEdit" id="desEdit"></textarea>
                            <label for="des">Description</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">To Do App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">contact</a>
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



    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your task has been successfully updated.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    }
    ?>

    <div class="container1" style="margin-top: 50px ;">
        <h1>My To Do App</h1>
        <form action="index.php" method="POST">
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
                $num = mysqli_num_rows($select);
                if ($num > 0) {

                    while ($show = mysqli_fetch_assoc($select)) {

                        // echo var_dump($show) . "<br>";

                        echo "<tr><td>" . $show['id'] . "</td>";
                        echo "<td>" . $show['title'] . "</td>";
                        echo "<td>" . $show['description'] . "</td>";
                        echo "<td> 
                    <button type='button' class='edit btn btn-dark'id=" . $show['id'] . ">Edit</button>
                    <button type='button' class='btn btn-dark'>Delete</button>
                    </td> 
                     </tr>";
                    }
                }

                ?>



            </tbody>
        </table>




    </div>


</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<!-- jquery cdn link -->
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

<!-- js cdn link for datatable -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>



<script>
    edits = document.getElementsByClassName('edit');


    Array.from(edits).forEach((element) => {

        element.addEventListener("click", (e) => {

            // console.log("edit sahi chal raha hai humara mubarak ho", e.target.parentNode.parentNode);
            // yeh variable name hai or kuch nahi hai 
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName("td")[1].innerText;
            des = tr.getElementsByTagName("td")[2].innerText;
            console.log(title, des)
            titleEditt.value = title;
            desEdit.value = des;
            editid.value = e.target.id;
            console.log("bhai yeh id hai laiba", e.target.id)
            $('#editModal').modal('toggle');

        })
    })
</script>







</html>