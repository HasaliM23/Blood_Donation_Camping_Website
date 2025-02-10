
<?php 
    session_start();
    include("./db.php");
    if (isset($_POST['delete_donor'])) {
        $donor_id = $_POST['donor_id'];
        $delete_query = "DELETE FROM donors WHERE id = $donor_id";
        mysqli_query($con, $delete_query);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    $query = "SELECT * FROM donors";
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
    <title>Donor Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="donor.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php 
                include("includes/nav.php");
            ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h1 class="mt-3">Donor Management</h1>
                <p>View and manage donor information here.</p>

                <!-- Add Donor Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        Add New Donor
                    </div>
                    <div class="card-body">
                        <form id="donorForm" method="POST" action="">
                            <div class="mb-3">
                                <label for="donorName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="donorName" name="name" placeholder="Enter donor's name" required>
                            </div>
                            <div class="mb-3">
                                <label for="donorEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="donorEmail" name="email" placeholder="Enter donor's email" required>
                            </div>
                            <div class="mb-3">
                                <label for="donorPass" class="form-label">Password</label>
                                <input type="passsword" class="form-control" id="donorPass" name="pass" placeholder="Enter password" required>
                            </div>
                            <div class="mb-3">
                                <label for="donorPhone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="donorPhone" name="phone" placeholder="Enter donor's phone number" required>
                            </div>
                            <div class="mb-3">
                                <label for="donorBloodType" class="form-label">Blood Type</label>
                                <select class="form-select" id="donorBloodType" name="blood_type" required>
                                    <option value="" disabled selected>Select blood type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                            <button type="submit" name="add_donor" class="btn btn-primary">Add Donor</button>
                        </form>
                    </div>
                </div>

                <!-- Donor Table -->
                <div class="card mb-4">
                    <div class="card-header">
                        Donor List
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="donorTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Blood Type</th>
                                    <th>Actions</th>
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
                                        echo "<td>" . $row['contact'] . "</td>";
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>
                                        <form method='POST' action=''>
                                            <input type='hidden' name='donor_id' value='" . $row['id'] . "'>
                                            <button type='submit' name='delete_donor' class='btn btn-danger'>Delete</button>
                                        </form>
                                      </td>";
                                echo "</tr>";
                            }
                                } else {
                                    echo "<tr><td colspan='6'>No donors found</td></tr>";
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

<?php 
    if(isset($_POST['add_donor'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $blood_type = $_POST['blood_type'];


        $insert_donor = "INSERT INTO donors (name, email, password, contact, type) VALUES ('$name', '$email', '$pass', '$phone', '$blood_type')";
        $run_donor = mysqli_query($con, $insert_donor);
    
        if($run_donor){
            echo "<script>alert('Donor added successfully')</script>";
            echo "<script>window.open('donor.php','_self')</script>";
        } else {

            echo "Error: " . mysqli_error($con);
        }
    }    
?>

<?php } ?>
