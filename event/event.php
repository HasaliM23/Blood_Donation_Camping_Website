<?php include('../common/connection.php'); ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="event.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .main {
    background: url('blood.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh; /* Ensure full viewport height */
    /* animation: slideshow 15s infinite;  */
}
    </style>
</head>
<body>
    <div class="clearfix" style="background: url('blood.jpg') no-repeat center center fixed;">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <img src="jk.png" alt="Logo">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./event.php">EVENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../about/about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact us/contact.php">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/profile.php">PROFILE</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!-- Navigation -->

        <!-- Event Content -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                <?php 
				
				global $connection;

				$get_events = "select * from events";
				$run_events = mysqli_query($connection,$get_events);

				while($event_row = mysqli_fetch_array($run_events)){
					$event_id = $event_row['id'];
					$event_name = $event_row['name'];
					$event_date = $event_row['date'];
					$event_time = $event_row['time'];
					$event_location = $event_row['location'];
					$urgent_type = $event_row['utype'];

					echo "
                    <div class='col-md-4 mb-4'>
                        <div class='card shadow-sm border-light'>
                            <img src='blood.jpg' class='card-img-top' alt='Event Image'>
                            <div class='card-body'>
                                <h5 class='card-title'>Camp $event_id - $event_name</h5>
                                <p class='card-text'><i class='fa-solid fa-tint'></i> URGENT BLOOD TYPE $urgent_type</p>
                                <ul class='list-unstyled'>
                                    <li><i class='fa-solid fa-location-pin'></i> $event_location</li>
                                    <li><i class='fa-solid fa-calendar'></i> $event_date</li>
                                    <li><i class='fa-solid fa-clock'></i> $event_time</li>
                                </ul>
                            </div>
                        </div>
                    </div>";
					}
				?>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include('../footer/footer.php'); ?>
    </div>
</body>
</html>
