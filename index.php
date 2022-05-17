<meta charset="UTF-8">
<?php
session_start();
$sql = "SELECT * FROM `user`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);

$login_success = false;


if (!empty($_POST["pass"])){
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["pass"] = sha1($_POST["pass"]);
}

#echo "Num rows: ". $result->num_rows;
if (($result->num_rows) > 0) {
    while($row = $result->fetch_assoc()) {
		if (!empty($_SESSION["pass"]) || !empty($_SESSION["pass"])){
			if($row["name"] == $_SESSION["name"] &&	$row["pass"] == $_SESSION["pass"]) {
				$login_success = true;
			}
		}
	}
}

$conn->close();

if($login_success) {
	echo "<h1>Välkommen " . $_SESSION["name"] . " </h1> <hr>";
	echo"<h2>Vill du skapa en ny tråd?</h2>";
	echo"<button type='button' onclick=" . "window.location.href='addPost.html'" . ">Skapa en tråd</button> <br>";
	echo"<button type='button' onclick=" . "window.location.href='logout.php'" . ">Logga ut</button> <hr>";
		if (!empty($_POST["rubrik"])){ 
			$sql = "SELECT * FROM `topics`;";
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "webb-miniproj";
			$conn = mysqli_connect($servername, $username, $password, $database);
			$header = $_POST["rubrik"];
			$text = $_POST["text"];
			$user = $_SESSION["name"];
			$sql = "INSERT INTO topics (header, content, user, time) VALUES ('$header', '$text', '$user', now())";
			$result = $conn->query($sql);
			$conn->close();
		}
	$sql = "SELECT * FROM `topics`;";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "webb-miniproj";
	$conn = mysqli_connect($servername, $username, $password, $database);
	$result = $conn->query($sql);
		if (($result->num_rows) > 0) {
			while($row = $result->fetch_assoc()) {
			echo"<form action='readTopic.php' method='POST'>
				Kommentera på tråden: <br>
				<input type='hidden' name='id' value='" . $row["id"] . "'>
				<input type='hidden' name='header' value='" . $row["header"] . "'>
				<input type='submit' value ='Läs inlägg'>
				</form>";
				
				echo "Header: ". $row["header"] . "<br> Content: " . $row["content"] . "<br> User: " . $row["user"] . "<br> Time: " . $row["time"] .  "<hr>";
			}
		} else {
			echo "0 results";
		}
}else {
    echo "Användarnamnet eller lösenordet är fel. Försök igen. ";
}
?>
<br>

<footer>Copyright © this forum 2022</footer>