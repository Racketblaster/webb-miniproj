<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM `user`;";
$result = $conn->query($sql);

$ranNum=0;
$userN=$_POST["name"];
$passW=$_POST["pass"];

while($row = $result->fetch_assoc()) {
    if($row["name"] == $userN) {
        $ranNum=1;
    } else {
        $sql = "INSERT INTO user (name, pass) VALUES ('$userN', '$passW')";
        $ranNum=2;
    }
}
if ($ranNum=1){
    echo("Användarnamnet " . $userN . " är redan användt");
} elseif($ranNum=2){
    echo("Användarnamnet " . $userN . " och lösenordet är registrerat");
} else{
    echo("error");
}
?>

<button type="button" onclick="window.location.href='index.html'">Gå tillbaka</button>