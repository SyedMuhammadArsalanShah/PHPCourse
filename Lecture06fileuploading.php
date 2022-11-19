<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "image";


// database connection
$con = mysqli_connect($server, $username, $password, $database);




if (!$con) {
    echo die("connection failed" . mysqli_connect_error());
} else {
    echo "connection was successfull";
}



if (isset($_FILES['image'])) {
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    
    $name = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $tmp = $_FILES['image']['tmp_name'];
    $type = $_FILES['image']['type'];
    // full path
    $path = $_FILES['image']['full_path'];
    // upload loaction
    $upload = move_uploaded_file($tmp, "upload-images/" . $name);
    if ($upload) {
        echo "successfully uploaded";

        $sql = "insert into info(name,image)
        values('$name','$path')";

        $res =  mysqli_query($con, $sql);
        if ($res) {

            echo "inserted";
        } else {
            echo "not inserted";
        }
    } 
    else {

        echo "unsuccessfully uploaded";
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





    <form action="Lecture06fileuploading.php" method="post" enctype="multipart/form-data">

        <input type="file" name="image">
        <input type="submit" value="submit">


    </form>
</body>

</html>