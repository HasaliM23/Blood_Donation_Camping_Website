<?php 

include("../common/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Blood Donation Camping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <img src="jk.png" alt="">
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
                            <a class="nav-link" href="../event/event.php">EVENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../about/about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact us/contact.php">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!--navigation-->

        <!-- Background Image -->
        <div class="background-image">
            <section class="contact py-5">
                <div class="container">
                    <div class="text-center mb-4 text-light">
                        <h2>Contact Us</h2>
                        <p>If you have any questions or need more information, feel free to contact us. We are here to help!</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-map-marker-alt fa-2x mb-3"></i>
                                    <h5 class="card-title">Address</h5>
                                    <p class="card-text">Rajarata University of Sri Lanka</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-phone fa-2x mb-3"></i>
                                    <h5 class="card-title">Phone</h5>
                                        <p class="card-text">tel: <a href="tel:+94112369931" style = "text-decoration:none; color:#000000">+94112369931</a></p>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-envelope fa-2x mb-3"></i>
                                    <h5 class="card-title">Email</h5>
                                    <p class="card-text" ><a href="mailto:vitalpulsebloodbank@gmail" style = "text-decoration:none; color:#000000">vitalpulsebloodbank@gmail.com</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contactForm mt-4">
                        <h3 class="text-center mb-4 text-light">Send Us a Message</h3>
                        <form id="contactForm" method="post">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" required>
                                        <label for="fullName">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name ="email" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" placeholder="Type your message..." name = "message" style="height: 150px;" required></textarea>
                                    <label for="message">Type your message...</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary px-5 text-center" >Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php  include('../footer/footer.php');?>
    </div>
</body>
</html>

<?php 

if (isset($_POST['submit'])){
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $insert_contact="insert into usermessage ( name, email, message ) values ('$name', '$email', '$message')";

    $run_contact = mysqli_query($connection,$insert_contact);

    echo"<script>alert('Message sent successfully')</script>";
}

?>


