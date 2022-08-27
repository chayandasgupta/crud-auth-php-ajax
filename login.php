<?php
    session_start();
    require 'db/connection.php';
    if(isset($_SESSION['email'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ajax crud</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/all.min.css"/>

    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .auth_form {
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            padding: 15px;
            background: #fff;
            max-width: 100%;
        }
        .form-control {
            border-radius: 0px;
        }

        .form-control:focus {
            box-shadow: none;
        }
    </style>
</head>
<body>  
    <div class="wrapper">
        <!-- Header -->
        <header class="mb-5">
            <div class="container">
                <?php
                    include 'includes/navbar.php'
                ?>
            </div>
        </header>

        <!-- All Students -->
        <section class="student-list">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="errorMessage" class="alert alert-danger d-none m-3"></div>
                        <div id="successMessage" class="alert alert-success d-none m-3"></div>
                    </div>
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5 m-auto">
                            <div class="title_container text-center">
                                <h2 class="text-info mb-3">Admin <span id="auth_system">Login</span></h2>
                            </div>

                            <!-- Admin login form -->
                            <form id="login_form" name="form1" method="post" class="auth_form">
                                <div class="form-group">
                                    <label for="pwd">Email:</label>
                                    <input type="email" class="form-control" id="email_log" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
                                </div>
                                <!-- <div class="form-group">
                                    <input type="checkbox" name="remeber"> Remember Me
                                </div> -->
                                <div class="form-group">
                                    <p class="text-center">
                                        Not a member yet? <a href="javascript:void(0)" id="register">Sign Up</a>
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success">Sign In</button>
                            </form>

                            <!-- Admin register form -->
                            <form id="register_form" name="form1" method="post" class="d-none auth_form">
                                <div class="form-group">
                                    <label for="email">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <p class="text-center">
                                        Already a member <a href="javascript:void(0)" id="login">Sign In</a>
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success" id="btn_register">Sign Up</button>
                            </form>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery library -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Login js -->
    <script src="assets/js/login.js"></script>
</body>
</html>