<?php 
    session_start();
    include("./db.php");
    if(!isset($_SESSION['admin_username'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="security.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include("includes/nav.php"); ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h1 class="mt-3">Security Settings</h1>
                <p>Manage security settings and access controls here.</p>

                <!-- Security Settings Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        Update Donor Password
                    </div>
                    <div class="card-body">
                        <form id="securitySettingsForm" method="post" action="./includes/reset_password.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Enter Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Enter New Password</label>
                                <input type="password" class="form-control" id="pass" name="password" placeholder="Enter new password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="security.js"></script>
</body>
</html>




<?php } ?>