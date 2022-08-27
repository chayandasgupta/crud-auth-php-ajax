<?php
    require 'db/connection.php';

    session_start();

    // Registration new user
    
    try {
        if(isset($_POST['sign_up']) == true){
            $name     = mysqli_real_escape_string($connection, $_POST['name']);
            $email    = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $hashPass = md5($password);
            // Validation
            if(empty($name) || empty($email) || empty($password)) {
                $errorResponse = [
                    'status'  => 422,
                    'message' => 'All fileds are required',
                ];

                echo json_encode($errorResponse);

            } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $errorResponse = [
                    'status'  => 422,
                    'message' => 'Invalid email form',
                ];

                echo json_encode($errorResponse);
                
            } else if(strlen($password) < 6) {
                $errorResponse = [
                    'status'  => 422,
                    'message' => 'Password must be minimum of 6 characters',
                ];

                echo json_encode($errorResponse);
            } else {
                $data = "SELECT * FROM users where email = '$email' limit 1";
                $checkDuplicate = mysqli_query($connection, $data);

                if (mysqli_num_rows($checkDuplicate) > 0)
                {   
                    $errorResponse = [
                        'status'  => 201,
                        'message' => 'Email ID already exists',
                    ];
        
                    echo json_encode($errorResponse);
        
                } else{
                    $query     = "INSERT INTO users(`name`, `email`, `password`) 
                    VALUES ('$name', '$email', '$hashPass')";
                    $saveQuery = mysqli_query($connection, $query);
        
                    if($saveQuery) {
                        $_SESSION['email'] = $email;
                        
                        $successResponse = [
                            'status' => 200,
                            'message'=> 'Registration successful',
                        ];
                        echo json_encode($successResponse);
                    } else {
                        $errorResponse = [
                            'status'  => 500,
                            'message' => 'Registration not complete',
                        ];
                        echo json_encode($errorResponse);
                    }
                }
                mysqli_close($connection);
            }
        }
        
    } catch(Exception $e) {
        echo json_encode(['message' => 'Something went wrong']);
    }


    // Login user
    try {
        if(isset($_POST['sign_in']) == true) {
            $email    = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $hashPass = md5($password);
    
            // validation
            if(empty($email) || empty($password)) {
                $errorResponse = [
                    'status'  => 422,
                    'message' => 'All fileds are required',
                ];
    
                echo json_encode($errorResponse);
    
            } else {
                // check email and password matched or not
                $query = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$hashPass'";        
                $check = mysqli_query($connection, $query);
    
                if (mysqli_num_rows($check) > 0)
                {
                    
                    $_SESSION['email'] = $email;
    
                    $successResponse = [
                        'status' => 200,
                        'message'=> 'Login successful',
                    ];
                    echo json_encode($successResponse);
                } else{
                    $errorResponse = [
                        'status' => 201,
                        'message'=> 'Invalid email or password ',
                    ];
                    echo json_encode($errorResponse);
                }
                mysqli_close($connection);
            }
        }
    } catch(Exception $e) {
        echo json_encode(['message' => 'Something went wrong']);
    }
    
?>