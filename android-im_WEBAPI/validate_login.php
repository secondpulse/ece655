<?php

// Grab User submitted information
$email = $_POST["username"];
$pass = $_POST["password"];

// Connect to the database
$con = mysql_connect("192.168.1.107","rooter","password");
// Make sure we connected succesfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db("my_dbname",$con);

$result = mysql_query("SELECT username, password FROM users WHERE username = $email");

$row = mysql_query($result);

if($row["username"]==$email && $row["password"]==  md5($pass))
    echo"You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";
?>
