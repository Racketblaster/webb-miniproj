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

if (!empty($_POST["rubrik"])){
	$_SESSION["rubrik"] = $_POST["rubrik"];
	$_SESSION["text"] = $_POST["text"];
}

if (!empty($_POST["pass"])){
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["pass"] = $_POST["pass"];
}

#echo "Num rows: ". $result->num_rows;
if (($result->num_rows) > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["name"] == $_SESSION["name"] &&
					$row["pass"] == $_SESSION["name"]) {
			$login_success = true;
		}
	}
}

$conn->close();

if($login_success) {
	echo "<h1>Välkommen " . $_SESSION["name"] . " </h1> <hr>";
	echo"<h2>Vill du skapa en ny tråd?</h2>";
	echo"<button type='button' onclick=" . "window.location.href='addPost.html'" . ">Skapa en tråd</button>";
}else {
    echo "Användarnamnet eller lösenordet är fel. Försök igen. ";
}
?>
<br>
<button type="button" onclick="window.location.href='index.html'">Logga ut</button>
<br>