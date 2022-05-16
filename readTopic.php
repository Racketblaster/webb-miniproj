<?php
session_start();
$sql = "SELECT * FROM `user`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);

echo "<h1>Tråd</h1> <hr>";
	echo"<h2> Du är inloggad som: "  . $_SESSION["name"] . "</h2> <hr>";
echo"<form action='readTopic.php' method='POST'>
Kommentera på tråden: <br>
<textarea type='text' name='text'> </textarea><br>
<input type='submit'>
</form>";
?>

<button type="button" onclick="window.location.href='index.php'">Gå tillbaka</button>
<br>
<button type="button" onclick="window.location.href='index.html'">Logga ut</button>