<?php
session_start();
$sql = "SELECT * FROM `user`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);

echo "<h1>Tråd Confermation</h1> <hr>";

if (!empty($_POST["post"])){ 
	$sql = "SELECT * FROM `posts`;";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "webb-miniproj";
	$conn = mysqli_connect($servername, $username, $password, $database);
	$topicId = $_POST["topicId"];
	$text = $_POST["post"];
	$user = $_SESSION["name"];
	$sql = "INSERT INTO posts (topicId, content, user, time) VALUES ('$topicId', '$text', '$user', now())";
	$result = $conn->query($sql);
	$conn->close();
    echo "Det nya inlägget sparades. =) <br>";
}else{
    echo"Något gick fel när du skulle göra ett nytt inlägg. =( <br>";
}
?>


<button type="button" onclick="window.location.href='index.php'">Gå till startsidan</button>

<br>

<footer>Copyright © this forum 2022</footer>