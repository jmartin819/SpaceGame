<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Super Cool Site</title>
<script src="update.js"></script>
</head>   
<body> 
<div>
<?php 

$hostname = 'localhost';
$username = 'shortstop819';
$password = 'j1s2k3f0';
$STATdb = 'user_stats';

//echo '<p>Total Number of Ventures: <span id="ventures"></span></p>';

try {
    $STATdb = new PDO("mysql:host=$hostname;dbname=$STATdb", $username, $password);

    $query = "SELECT * FROM general_stats WHERE username='myuser1' ";
    foreach ($STATdb->query($query) as $row)
        {
        echo '<span> Total Ventures: </span>';
        echo '<span id="ventures" class="label-' . $row['ventures'] .'">' . $row['ventures'] . '</span><br>';
        echo '<span> Total Points: </span>';
        echo '<span id="points" class="label-' . $row['points'] .'">' . $row['points'] . '</span><br>';
        echo '<span> Total Gold: </span>';
        echo '<span id="gold" class="label-' . $row['gold'] .'">' . $row['gold'] . '</span><br>';
        }

        echo '<button onclick="updateVenture()">Run AJAX Update</button>';
    }

catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>

</div>
</body>
</html>