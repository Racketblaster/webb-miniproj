<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM `user`;";
$result = $conn->query($sql);

$userN=$_POST["name"];
$passW=$_POST["pass"];

#Kollar om produkten finns eller inte
$namnFinnsRedan = false;

#Går genom alla rader i databasen tills den hittar något som är likadant som posten
while($row = $result->fetch_assoc()) {
    if($row["name"] == $userN) {
        $namnFinnsRedan = true;
        break;
    }
}

#Om namnet inte finns så insertas användar namnet och lösenordet i databasen, annars säger programmet att användarnamnet finns redan
if ($namnFinnsRedan){
    echo("Användarnamnet " . $userN . " är redan använt");
} else{
    $sql = "INSERT INTO user (name, pass) VALUES ('$userN', '$passW')";
    if ($conn->query($sql) === TRUE) {
        echo("Användarnamnet " . $userN . " och lösenordet är registrerat");
    } else {
        echo "Något gick fel, försök igen" . "<br>" . $conn->error;
    }
}

  
$conn->close();

?>

<button type="button" onclick="window.location.href='index.html'">Gå tillbaka</button>