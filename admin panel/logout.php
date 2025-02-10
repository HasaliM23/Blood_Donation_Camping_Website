<?php 

session_start();

session_destroy();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="logout.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">You Have Been Logged Out</h1>
                        <p class="card-text">Thank you for using our system. You have successfully logged out.</p>
                        <a href="./login.php" class="btn btn-primary">Back to Login</a>
                        <a href="../index.php" class="btn btn-secondary">Go to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   

</body>
</html>
