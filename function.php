<?php
    function checkLogin($connection) {
        if(isset($_SESSION['email'])) {

            $userEmail = $_SESSION['email'];

            $query     = "SELECT * FROM users where `email` = '$userEmail'";
            $queryExec = mysqli_query($connection, $query);

            if($queryExec && mysqli_num_rows($queryExec) > 0) {
                $userData = mysqli_fetch_assoc($queryExec);
                return $userData;
            }
        } else {
            header("Location: login.php");
            die;
        }
    }
?>