<?php
    session_start();
    require 'db/connection.php';
    require 'function.php';
    $userData = checkLogin($connection);

    try {
        if(isset($_POST['delete_student']))
        {
            $studentId = mysqli_real_escape_string($connection, $_POST['student_id']);

            $query     = "DELETE FROM students WHERE id='$studentId'";
            $queryExec = mysqli_query($connection, $query);

            if($queryExec)
            {
                $successResponse = [
                    'status'  => 200,
                    'message' => 'Student deleted successfully'
                ];
                echo json_encode($successResponse);
            }
            else
            {
                $errorResponse = [
                    'status'  => 500,
                    'message' => 'Student Not Deleted'
                ];
                echo json_encode($errorResponse);
            }
        }
    } catch (Exception $ex) {
        echo json_encode(['message' => 'Something went wrong.Please try again']);
    }
?>