<?php
require 'db/connection.php';

// Specific student data edit
if(isset($_GET['student_id']))
{   
    $studentId = mysqli_real_escape_string($connection, $_GET['student_id']);

    $query     = "SELECT * FROM students WHERE id='$studentId'";
    $queryExec = mysqli_query($connection, $query);

    if(mysqli_num_rows($queryExec) == 1)
    {
        $student = mysqli_fetch_assoc($queryExec);

        $successResponse = [
            'status'  => 200,
            'message' => 'Student fetch successfully',
            'data'    => $student
        ];

        echo json_encode($successResponse);
    } else {
        $errorResponse = [
            'status'  => 404,
            'message' => 'Student not found'
        ];
        echo json_encode($errorResponse);
    }      
}
?>