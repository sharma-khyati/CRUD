<!DOCTYPE html>
<html>
    <head>
        <title>Student Details</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="script.js"></script>
        <style>
            .edit{
                margin-right: 10px;
            }
        </style>
    </head>
    <body>

        <div class="create row mt-5">
            <div class="col-md-9">
                <h2>Student Data</h2>
            </div>
            <div class="col-md-3">
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/student/create.php" class="btn btn-primary">Create</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Date Of Birth</th>
                    <th>Date Of Joining</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </body>
</html>
