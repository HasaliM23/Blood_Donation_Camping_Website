<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <!-- <link rel="stylesheet" href="footer.css"> -->
 <style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
    box-sizing: border-box;
}

body{
    background: #eef8ff;
}
.footer{
    width: 100%;
    background: #000000;
    color: #fff;
    padding: 50px 0 30px;
    border-top-left-radius: 125px;
    font-size: 13px;
    line-height: 20px;
}
.row{
    width: 85%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: space-between;
}
.col{
    flex-basis: 25%;
    padding: 20px;

}
.col:nth-child(2),
.col:nth-child(3){
    flex-basis:15%;
}

.logo{
    width: 170px;
    margin-bottom: 32px;
    background-color: #fff;
    padding: 0 10px 0 10px;
}
.col h3{
    width: fit-content;
    margin-bottom: 40px;
    position: relative;
}
.email-id{
    width: fit-content;
    margin: 10px 0;
}
ul li{
    list-style: none;
    margin-bottom: 12px;
}
ul li a{
    text-decoration: none;
    color: #fff;
}
.footer form{
    /* display:none; */
    padding-bottom: 15px;
    align-items: center;
    justify-content: space-between;

}
.footer form input{
    width:100%;
    background: transparent;
    color: #ccc;
    border: 0;
    outline: none;
    border-bottom: 1px solid #ccc;
    margin-bottom: 20px;
}
.footer form>button{
    background-color: dodgerblue;
    color: #ccc;
    width: 70px;
    height: 25px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;

}
.footer form button:hover{
    background-color: orange;
    color: #2d0b00;
    font-weight: bold;
}
hr{
    width: 90%;
    border: 0;
    border-bottom: 1px solid #ccc;
    margin: 20px auto;
}
.copyright{
    text-align: center;
}
.underline{
    width: 100%;
    height: 5px;
    background: #767676;
    border-radius: px;
    position: absolute;
    top:25px ;
    left: 0;
}
.underline span{
    width: 15px;
    height: 100%;
    background: #fff;
    border-radius: 3px;
    position:absolute;
    top: 0;
    left: 10px;
    animation: moving 2s linear infinite; 
}
@keyframes moving{
    0%{
        left: -20px;
    }
    100%{
        left: 100%;
    }
}
.icon a{
    text-decoration: none;
    color: #fff;
   
   
    
}
.icon ion-icon{
    color: #fff;
    font-size: 25px;
    padding-left: 15px;
    padding-top: 20px;
    transition: 0.4s ease;
    float: left;
    
   
}
 .icon ion-icon:hover{
    color: #ff7200;
 }
 </style>
    

</head>
<body>
    <div class = "footer">
        <div class="row">
            <div class="col">
                <img src="http://localhost/bloodDonationCamp/footer/footer.png" class="logo">
                <p>We hope you satisfy our service as much as we enjoy offering it to you. If
                    you have any questions or comments, please don't hesitate to contact us</p>

                    <div class="icon">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                    </div>
            </div>
            <div class="col">
                <h3>office<div class="underline"><span></span></div></h3>
                <p>No:555/5d, Elvitigala Road,</p>
                <p>Narahenpita, Colombo</p>
                <p>(00500)</p>
                <p class="email-id">vitalpulsebloodbank@gmail.com</p>
                <h4>tel:+94112369931</h4>
            </div>
            <div class="col">
                <h3>Links <div class="underline"><span></span></div></h3>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../event/event.php">Events</a></li>
                    <li><a href="../about/about.html">About-Us</a></li>
                    <li><a href="../contact us/contact.php">Contact-Us</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>Newsletter <div class="underline"><span></span></div></h3>
                <form action="">
                    <input type="email" placeholder="Enter your email id" required>
                    <input type="text" placeholder="Type Your Text" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright © vital-pulse-blood-bank.com | All right reserved.</p>
    </footer>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> 
</body>
</html>