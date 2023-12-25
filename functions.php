<?php

function check_login($conn)
{
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $query = "select * from student where email = '$email' limit 1 ";

        $result = mysqli_query($conn,$query);
        if($result && mtsqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

    }

    header("location: login.php");
    die;
}

?>