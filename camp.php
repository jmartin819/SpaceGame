<?php include "base.php"; ?>

<!DOCTYPE HTML>
<html>
<head> 
<title id="title">Space Adventure</title>

<!-- Linking to javascript for page -->
<link rel='stylesheet' type='text/css' href='stylesheet.css'/>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="extra.js"></script>
<p id="currentUser">Welcome, <code><?=$_SESSION['Username']?></code>. <a id="mylogout" href="logout.php">Logout</a>.</p>

<h1> Ship </h1>
</head>

<?php

mysql_select_db($INVname) or die("MySQL Error: " . mysql_error());

$theUser = $_SESSION['Username'];

$query = "SELECT * FROM oxygen WHERE Username='$theUser'";
$result = mysql_query($query, $INVdb) or die("MySQL Error2: " . mysql_error());   

echo "<table border='1' id='mytable'>";
echo "<tr> <th>user</th> <th>oxygen</th> <th>compoxy</th> </tr>";
while($row = mysql_fetch_array( $result )) {
    //Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['Username'];
	echo "</td><td>"; 
	echo $row['Oxygen'];
	echo "</td><td>"; 
	echo $row['CompressedOxygen'];
	echo "</td></tr>"; 
} 
echo "</table>";

/*$result = mysql_query('SELECT * FROM oxygen', $INVdb) or die("MySQL Error2: " . mysql_error());

echo "<table border='1' id='mytable'>";
echo "<tr> <th>user</th> <th>oxygen</th> <th>compoxy</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
    //Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['Username'];
	echo "</td><td>"; 
	echo $row['Oxygen'];
	echo "</td><td>"; 
	echo $row['CompressedOxygen'];
	echo "</td></tr>"; 
} 
echo "</table>";

mysql_select_db($USERname) or die("MySQL Error: " . mysql_error());
$result2 = mysql_query('SELECT * FROM users', $USERdb) or die("MySQL Error2: " . mysql_error());


echo "<table border='1' id='mytable2'>";
echo "<tr> <th>userid</th> <th>name</th> <th>password</th> <th>email</th></tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result2 )) {
    //Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['UserID'];
	echo "</td><td>"; 
	echo $row['Username'];
	echo "</td><td>"; 
	echo $row['Password'];
	echo "</td><td>"; 
	echo $row['EmailAddress'];
	echo "</td></tr>"; 
} 
echo "</table>";

*/
?>
<body>
<?php
echo '<div id="parentDiv">';
	echo '<div id="sidebar">';
		echo '<div id="Buttons">';
			echo '<button value="index.php" onclick="openLink(value)">Home</button><br>';
			echo '<button value="camp.php" onclick="openLink(value)">Camp</button><br>';
		echo '</div>';
		echo '<div id="Info">';

			$query = "SELECT * FROM oxygen WHERE Username='$theUser'";
			$result = mysql_query($query, $INVdb) or die("MySQL Error2: " . mysql_error());
			$row = mysql_fetch_array( $result );
			echo '<span id="realOxygen">realOxygen:';
			echo $row['Oxygen'];
			echo '</span><br>';

			echo '<span id="Points">Points: 0</span><br>';
			echo '<span id="Gold">Gold: 0</span><br>';
			echo '<span id="Oxygen"> Oxygen: 0</span><br>';
			echo '<span id="compOxygen"> Compressed Oxygen: 0</span><br>';
			echo '<span id="Location">Location: Moon</span><br>';
		echo '</div>';
		echo '</div>';
	echo '<div id="content">';
		echo '<span> Time till next venture: </span>';
		echo '<div id="countdown">Venture Ready!</div><br>';
		echo '<div id="Orange">Venture Out!</div>';
		echo '<h1> Log: </h1>';
		echo '<div id="ActualLog">';
			echo '<div id="Log1"></div>';
			echo '<div id="Log2"></div>';
			echo '<div id="Log3"></div>';
			echo '<div id="Log4"></div>';
			echo '<div id="Log5"></div>';
		echo '<div id="Result"></div>';
		echo '<div id="Message"></div>';
		echo '<div id="Log"></div>';	
		echo '<br><br>';
		echo '<h1> Store: </h1>';
		echo '<button id="PurchaseOxygen"> Purchase Oxygen </button>';
		echo 'Cost: 20 gold --- Amount: <input type="text" value="0" id="regOxygen"><br>';
		echo '<button id="PurchaseCompressedOxygen"> Purchase Compressed Oxygen </button>';
		echo 'Cost: 300 gold -- Amount: <input type="text" value="0" id="compressedOxygen"><br>';
		echo '<div id="StoreLog"></div>';
		echo '<div id="Version"> Version 1.1.2 </div>';
	echo '</div>';
echo '</div>';
?>
</body>
</html>