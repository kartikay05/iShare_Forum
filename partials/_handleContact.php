<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_conn.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];


    $query = "INSERT INTO `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$msg')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: /forum/index.php");
    } else {
        header("Location: /.");
    }
}

?>