<?php

session_start();

include("connect.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $email = $_POST['email'];
    $pass = $_POST['pass'];


    if(!empty($email) && !empty($pass))
    {

        $query = "select * from student where email = '$email' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['pass'] === $pass)
                {
                    $_SESSION['email'] = $user_data['email'];
                    header("location: cart.html");
                    die;
                }

            }
        }
        echo "<script>alert('wrong email or password')</script>";

     
    }
    else
    {
        echo "<script>alert('wrong email or password')</script>";
    }
}
?>