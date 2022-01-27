<meta charset="UTF-8">
<?php
$sql = "SELECT * FROM `user`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);

$login_success = false;
$full_name = "";
#echo "Num rows: ". $result->num_rows;
if (($result->num_rows) > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["userId"] == $_POST["name"] &&
					$row["passwd"] == $_POST["pass"]) {
			$login_success = true;
		}
	}
}

$conn->close();

if($login_success) {
	$_SESSION["name"] = $_POST["name"];
	echo "Välkommen " . $_SESSION["name"] . ". ";
}else {
    echo "Användarnamnet eller lösenordet är fel. Försök igen. ";
}
?>
<br>
<button type="button" onclick="window.location.href='index.html'">Logga ut</button>