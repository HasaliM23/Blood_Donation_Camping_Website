<?php 
    session_start();
    include("./db.php");
    if(!isset($_SESSION['admin_username'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete_event'])) {
                $event_id = $_POST['event_id'];
                $delete_query = "DELETE FROM events WHERE id = $event_id";
                mysqli_query($con, $delete_query);
                // Redirect to the same page to reflect changes
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                // Retrieve form data
                $name = $_POST['eventName'];
                $date = $_POST['eventDate'];
                $time = $_POST['eventTime'];
                $location = $_POST['eventLocation'];
                $utype = $_POST['utype'];

                // Prepare the SQL query
                $insert_event_query = "INSERT INTO events (name, date, time, location, `utype`) VALUES ('$name', '$date', '$time', '$location', '$utype')";

                // Execute the query
                if (mysqli_query($con, $insert_event_query)) {
                    echo "<script>alert('New event added successfully')</script>";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            }
        }

        $query = "SELECT * FROM events";
        $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include("includes/nav.php"); ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h1 class="mt-3">Event Management</h1>
                <p>Manage your blood donation events here.</p>

                <!-- Add Event Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        Add New Event
                    </div>
                    <div class="card-body">
                        <form id="eventForm" method="POST" action="">
                            <div class="mb-3">
                                <label for="eventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="eventName" name="eventName" required>
                            </div>
                            <div class="mb-3">
                                <label for="eventDate" class="form-label">Event Date</label>
                                <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="eventTime" class="form-label">Event Time</label>
                                <input type="time" class="form-control" id="eventTime" name="eventTime" required>
                            </div>
                            <div class="mb-3">
                                <label for="eventLocation" class="form-label">Event Location</label>
                                <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>
                            </div>
                            <div class="mb-3">
                                <label for="utype" class="form-label">Urgent Type</label>
                                <input type="text" class="form-control" id="utype" name="utype" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Event</button>
                        </form>
                    </div>
                </div>

                <!-- Event List Table -->
                <div class="card mb-4">
                    <div class="card-header">
                        Upcoming Events
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="eventsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>Urgent Type</th>
                                    <th>Action</th>
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
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                        echo "<td>" . $row['location'] . "</td>";
                                        echo "<td>" . $row['utype'] . "</td>";
                                        echo "<td>
                                        <form method='POST' action=''>
                                            <input type='hidden' name='event_id' value='" . $row['id'] . "'>
                                            <button type='submit' name='delete_event' class='btn btn-danger'>Delete</button>
                                        </form>
                                      </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No events found</td></tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php } ?>
