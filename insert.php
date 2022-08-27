<?php
    session_start();
    require 'db/connection.php';
    require 'function.php';
    $userData = checkLogin($connection);
    
    try {
        if($_POST['add_student'] == true) {
            // Store new student
            // Protect the sql injection
            $name   = mysqli_real_escape_string($connection, $_POST['stu_name']);
            $phone  = mysqli_real_escape_string($connection, $_POST['phone']);
            $email  = mysqli_real_escape_string($connection, $_POST['email']);
            $course = mysqli_real_escape_string($connection, $_POST['course']);

            // Check coming filed is empty or not
            if(empty($name) || empty($phone) || empty($email) || empty( $course)) {
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
                
            } else if(!is_numeric($_POST['phone'])) {
                $errorResponse = [
                    'status'  => 422,
                    'message' => 'Phone must be number',
                ];

                echo json_encode($errorResponse);
            } else {
                $query     = "INSERT INTO students (stu_name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
                $saveQuery = mysqli_query($connection, $query);

                if($saveQuery) {
                    $successResponse = [
                        'status' => 200,
                        'message'=> 'Student created successfully',
                    ];
                    echo json_encode($successResponse);
                } else {
                    $errorResponse = [
                        'status'  => 500,
                        'message' => 'Student not created',
                    ];
                    echo json_encode($errorResponse);
                }
            }
            
        }
        
    } catch (Exception $ex) {
        echo json_encode(['message' => 'Something went wrong.Please try again']);
    }
?>