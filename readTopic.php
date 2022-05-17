<?php
session_start();
$sql = "SELECT * FROM `user`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);

$id=$_POST["id"];
$header=$_POST["header"];

echo "<h1>Tråd: " . $header . "</h1> <hr>";
	echo"<h2> Du är inloggad som: "  . $_SESSION["name"] . "</h2> <br>";
	echo"<button type='button' onclick=" . "window.location.href='index.php'" . ">Gå tillbaka</button> 
	<button type='button' onclick=" . "window.location.href='logout.php'" . ">Logga ut</button> <hr>";

echo"<form action='topicConfirm.php' method='POST'>
Kommentera på tråden: <br>
<input type='hidden' name='topicId' value='" . $id . "'>
<textarea type='text' name='post'> </textarea><br>
<input type='submit'>
</form> <hr>";


$sql = "SELECT * FROM `posts` WHERE topicId=$id;";
$conn = mysqli_connect($servername, $username, $password, $database);
	$result = $conn->query($sql);
		if (($result->num_rows) > 0) {
			while($row = $result->fetch_assoc()) {
				echo "User: " . $row["user"] . ". <br> Skrev klockan: " . $row["time"] .  "<br>";
				echo '<span style="word-break: break-word;">' . "Inlägg: " . $row["content"] . "</span><hr>";
			}
		} else {
			echo "0 results <br>";
		}


?>
<br>

<footer>Copyright © this forum 2022</footer>