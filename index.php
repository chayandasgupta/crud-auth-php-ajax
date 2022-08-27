<?php
    session_start();
    require 'db/connection.php';
    require 'function.php';
    $userData = checkLogin($connection);
?>
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
                        <div id="successMessage" class="alert alert-success d-none m-3"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>All Students</h4>
                                <button type="button" class="btn btn-sm btn-dark float-end" data-toggle="modal" data-target="#studentAddModal"><i class="fa fa-plus-circle"></i> Add New student</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query     = "SELECT * FROM students";
                                                $queryExec = mysqli_query($connection, $query); 
                                                if(mysqli_num_rows($queryExec) > 0) {
                                                    foreach ($queryExec as $key => $student) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?= $key+1 ?>
                                                                </th>
                                                                <td>
                                                                    <?= $student['stu_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $student['phone'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $student['email'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $student['course'] ?>
                                                                </td>
                                                                <td>
                                                                    <button class="button btn-sm btn-primary border-0" id="editStudent" value="<?= $student['id'] ?>">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button class="button btn-sm btn-danger border-0" id="deleteStudent" value="<?= $student['id'] ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }   
                                            ?>     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- student add modal -->
        <?php
            include("partials/student_modal.php");
        ?>
    </div>

    <!-- jQuery library -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/all.min.js"></script>

    <!-- Custom js -->
    <script src="assets/js/student.js"></script>
</body>
</html>