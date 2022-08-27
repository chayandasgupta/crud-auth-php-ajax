<?php
session_start();
require 'db/connection.php';
require 'function.php';
$userData = checkLogin($connection);

if (isset($_POST['update_student'])) {
    
    try {
        $studentId = mysqli_real_escape_string($connection, $_POST['student_id']);

        $name   = mysqli_real_escape_string($connection, $_POST['stu_name']);
        $email  = mysqli_real_escape_string($connection, $_POST['email']);
        $phone  = mysqli_real_escape_string($connection, $_POST['phone']);
        $course = mysqli_real_escape_string($connection, $_POST['course']);

        if(empty($name) || empty($email) || empty($phone) || empty($course)) 
        {
            $errorResponse = [
                'status'  => 422,
                'message' => 'All fields are required'
            ];
            echo json_encode($errorResponse);
            
        } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
           
            $errorResponse = [
                'status'  => 422,
                'message' => 'Invalid email form',
            ];

            echo json_encode($errorResponse);

        } else {
            $query     = "UPDATE students SET stu_name='$name', email='$email', phone='$phone', course='$course' 
                        WHERE id='$studentId'";
            $queryExec = mysqli_query($connection, $query);

            if($queryExec)
            {
                $successResponse = [
                    'status'  => 200,
                    'message' => 'Student updated successfully'
                ];
                echo json_encode($successResponse);
            } else {
                $errorResponse = [
                    'status'  => 500,
                    'message' => 'Student not found'
                ];
                echo json_encode($errorResponse);
            }
        }
    } catch (Exception $ex)  {
        echo json_encode(['message' => 'Something went wrong.Please try again']);
    }
}
?>