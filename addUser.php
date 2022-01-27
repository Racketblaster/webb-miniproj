<?php
$sql = "SELECT * FROM `user`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);
$sql = "INSERT INTO Guestbook (name, pass) VALUES ('$_POST["name"]', '$_POST["pass"]'";
$conn->query($sql);
?>

<button type="button" onclick="window.location.href='index.html'">Gå tillbaka</button>