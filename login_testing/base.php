<?php
session_start();
 
$USERhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$USERname = "login_tutorial"; // the name of the database that you are going to use for this project
$USERuser = "shortstop819"; // the username that you created, or were given, to access your database
$USERpass = "j1s2k3f0"; // the password that you created, or were given, to access your database

$INVdbhost = "localhost";
$INVname = "inventory";
$INVuser = "shortstop819";
$INVpass = "j1s2k3f0";

//Connect to inventory database
$INVdb = mysql_connect($INVhost, $INVuser, $INVpass, true) or die("MySQL Error: " . mysql_error());
mysql_select_db($INVname) or die("MySQL Error: " . mysql_error());

//Connect to username database 
$USERdb = mysql_connect($USERhost, $USERuser, $USERpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($USERname) or die("MySQL Error: " . mysql_error());

?>