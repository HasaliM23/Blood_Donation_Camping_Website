<!DOCTYPE html>
<html lang="en">
     <head>
        <title>Blood Donation Camp</title>
        <link rel="stylesheet" href="css/index.css">		
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--boostrap link-->
		<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .footer form{
                position:relative;
                bottom:10px;
                right: 100px;
                padding-bo   ttom: 15px;
                align-items: center;
                justify-content: space-between;
            }

        </style>
</head>
<body>
    <div class="main">
    	<!--navigation-->
		<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
              <img src="Images/jk.png" alt="">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="index.php">HOME</a>
                    </li>
                  <li class="nav-item">
                    <a class="nav-link" href="event/event.php">EVENTS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about/about.php">ABOUT</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="contact us/contact.php">CONTACT</a>
                    </li>
                    <button>
                      <a href="admin panel/dashbord.php" target="_blank">ADMIN</a>
                    </button>
                </ul>
              </div>
            </div>
          </nav><!--navigation-->
             <div class="search"></div>
    
    <div class="brak">
       <div class="content">
        <h1>Donate Blood <br><span>Save Life</span></h1>
        <p class="par">Donate your blood and inspire others to donate.</p><br>

        <label>JOIN-US</label>
        <div class="icon">
          <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
          <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
          <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
          <a href="#"><ion-icon name="logo-google"></ion-icon></a>
          <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
        </div>
      </div>
        <div class="fo">
            <form>
            <p class="liw">Log in with us</p>
            <button class="bttnn"><a href="./doners/login.php" >Login</a></button>
            <p class="link">Don't have an account</p>
            <button class="bttnn"><a href="./new register page/register.php">Signup</a></button>
        </form>
        </div>  
      </div> 
        <div class="bot">
          <P class="bot1">WE ARE HERE FOR HELPING PEOPLE</P>
          <p class="bot2">You can give blood at any of our blood donation venues.We have <br>several
                   donor centers and visit other venues on various occations.<br></p>
        </div>
  </div>               
</div>
<?php include("./footer/footer.php");?>
 <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>   
</body>
</html>
