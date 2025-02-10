<?php
//connection = mysqli_connect(DBserver,DBuser,DBpassword,DBname);

$connection = mysqli_connect('localhost','root','','blood_donation');

//mysqli_connect_error();

//checking the connection

if (mysqli_connect_error()) {
    die('database connection failed ' . mysqli_connect_error());

}
else {
    echo "";
}
?>