<?php 

    session_start();
    include("./db.php");

$get_donors = "SELECT * FROM donors";
$get_events = "SELECT * FROM events";
$run_events = mysqli_query($con, $get_events);
$run_donor = mysqli_query($con, $get_donors);

// Count total events
$cont_events_query = "SELECT COUNT(*) AS total FROM events";
$cont_events_result = mysqli_query($con, $cont_events_query);
$cont_events_row = mysqli_fetch_assoc($cont_events_result);
$cont_events = $cont_events_row['total'];

// Count total donors
$cont_donors_query = "SELECT COUNT(*) AS total FROM donors";
$cont_donors_result = mysqli_query($con, $cont_donors_query);
$cont_donors_row = mysqli_fetch_assoc($cont_donors_result);
$cont_donors = $cont_donors_row['total'];

    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include("includes/nav.php"); ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h1 class="mt-3">Dashboard</h1>
                <div class="row">
                    <!-- Key Metrics -->
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Donations</h5>
                                <p class="card-text">86</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Upcoming Events</h5>
                                <p class="card-text"><?php echo"$cont_events"; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Active Donors</h5>
                                <p class="card-text"><?php echo"$cont_donors"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php } ?>
