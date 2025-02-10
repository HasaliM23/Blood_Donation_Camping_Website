<?php 
    session_start();
    include("./db.php");
    $query = "SELECT * FROM usermessage";
    $result = mysqli_query($con, $query);
    if(!isset($_SESSION['admin_username'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
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
<div class="row">

            <?php 
                include("includes/nav.php");
            ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
        <div class="card mb-4">
            <div class="card-header">
                Donor Messages
            </div>
            <div class="card-body">
                <table class="table table-striped" id="eventsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($result) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . (isset($row['message']) ? htmlspecialchars($row['message']) : 'No message') . "</td>";
                                echo "</tr>";
                            }
                    }
                    ?>
                    </tbody>
                </table>
             </div>
        </div>
    </main>  
</div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php } ?>