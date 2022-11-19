<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "welcome  ". $_SESSION['username']."<br>";
    echo "your favourite category is  ". $_SESSION['favcat'];



}




?>