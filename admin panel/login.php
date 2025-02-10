<?php 
    session_start();
    include("./db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blood Donation Camp</title>
    <link rel="stylesheet" href="../CSS/home1.css">		
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--bootstrap link-->
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Admin Login </h2><p></p>
           
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
               Login
           </button><!-- btn btn-lg btn-primary btn-block finish -->
       </form><!-- form-login finish -->
   </div>
</body>
</html>

<?php 
    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);
        
        $get_admin = "SELECT * FROM admin WHERE username='$admin_email' AND password='$admin_pass'";
        $run_admin = mysqli_query($con, $get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count == 1){
            $_SESSION['admin_username'] = $admin_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            echo "<script>window.open('dashbord.php','_self')</script>";
        } else {
            echo "<script>alert('Email or Password is Wrong!')</script>";
        }
    }
?>
