<?php

session_start();

include("connect.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_POST['name'];
    $email = $_POST["email"];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];

    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    if(!empty($name) && !empty($phone) && !empty($email) && !empty($pass))
    {
        $query = "INSERT INTO student(name,email,pass,phone) VALUES('$name','$email','$pass','$phone')";

        if(mysqli_query($conn, $query))
        {
            header("location: home.html");
            die;
        }
        else
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        echo "<script>alert('Please fill out all fields!')</script>";
    }
}
?>