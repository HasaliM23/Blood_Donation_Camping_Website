<?php 

include("../common/connection.php");

$query = "SELECT * FROM donors";
$result = mysqli_query($connection, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/LoginStyle.css">
		<!--boostrap link-->

		<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="main">
<!--navigation-->
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <img src="..//Images/jk.png" alt="">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="../index.html">HOME</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="../event/event.php">EVENTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../about/about.html">ABOUT</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../contact us/contact.php">CONTACT</a>
            </li>
        </ul>
      </div>
    </div>
  </nav><!--navigation-->

<section>
    <div class="form login">
        <div class="form-content" >
            <div class="login-container">
                <header>Login</header>

                <form action="login.php" method="POST">

                    <div class="field input-field">
                        <label for="username">Email:</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="field input-field">
                        <label style="padding-top: 20px; " for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="field button-field">
                        <button style="margin-top: 50px;" type="submit" name = "login">Login</button>
                    </div>
                    <div style="padding-top: 50px;" class="form-link">
                        <span style="padding-top: 50px;">Already haven't account? <a href="../new register page/register.php" class="register-link">Register Now</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>

</html>


<?php 

if(isset($_POST['login'])){
    
  $donor_email = $_POST['username'];
  $donor_pass = $_POST['password'];
  $select_donor = "select * from donors where email='$donor_email' AND password='$donor_pass'";
  $run_donor = mysqli_query($connection,$select_donor);
  $check_donors = mysqli_num_rows($run_donor);

  if($check_donors==0){
        
    echo "<script>alert('Your email or password is wrong')</script>";
    
    exit();
  }else{
        
    $_SESSION['donor_email']=$donor_email;
    
   echo "<script>alert('You are Logged in')</script>"; 
    
   echo "<script>window.open('../user/profile.php','_self')</script>";
    
}
}
?>