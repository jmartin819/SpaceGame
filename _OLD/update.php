<?php 

$hostname = 'localhost';
$username = 'shortstop819';
$password = 'j1s2k3f0';
$STATdb = 'user_stats';

try {
    $STATdb = new PDO("mysql:host=$hostname;dbname=$STATdb", $username, $password);

    $query = "SELECT * FROM general_stats WHERE username='myuser1'";
    foreach ($STATdb->query($query) as $row){}

    $tempVentures = $row['ventures'];
    $tempVentures = $tempVentures+1;
    $tempPoints = $row['points'];
    $tempGold = $row['gold'];

    //$value_arrary = echo '<script type="text/javascript" src="update.js">', 'randomMoonItem();', '</script>';
    //echo $value_array[0];

    $tempPoints = $tempPoints+3;
    $tempGold = $tempGold+15;

    $STATdb->exec("UPDATE general_stats SET ventures=$tempVentures WHERE username='myuser1'");
    $STATdb->exec("UPDATE general_stats SET points=$tempPoints WHERE username='myuser1'");
    $STATdb->exec("UPDATE general_stats SET gold=$tempGold WHERE username='myuser1'");

    echo $tempVentures."{{}}".$tempPoints."{{}}".$tempGold;

    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
