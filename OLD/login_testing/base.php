<?php
session_start();
 
$dbhost = "localhost";
$dbuser = "shortstop819";
$dbpass = "j1s2k3f0";

$USERname = "login_tutorial";
$INVname = "inventory";
$STATname = "user_stats";

//Connect to inventory database
$INVdb = mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error in inventory connection: " . mysql_error());
mysql_select_db($INVname, $INVdb) or die("MySQL Error in inventory selection: " . mysql_error());

//Connect to stats database
$STATdb = mysql_connect($dbhost, $dbuser, $dbpass, true) or die("MySQL Error in stat connection: " . mysql_error());
mysql_select_db($STATname, $STATdb) or die("MySQL Error in stat selection: " . mysql_error());

//Connect to username database 
$USERdb = mysql_connect($dbhost, $dbuser, $dbpass, true) or die("MySQL Error in user connection: " . mysql_error());
mysql_select_db($USERname, $USERdb) or die("MySQL Error in user selection: " . mysql_error());

?>