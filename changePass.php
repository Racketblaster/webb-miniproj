<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webb-miniproj";
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM `user`;";
$result = $conn->query($sql);

$userN=$_POST["name"];
$passW=sha1($_POST["pass"]);
$nPassW=sha1($_POST["newPass"]);

#Kollar om produkten finns eller inte
$rättAnvändare = false;
$felLösenord = false;

#Försök på att fixa om man inte skriver in något som användar namn eller lösenord
/*if (empty($userN or $passW)){
    echo("Du glömde skriva in något användarnamn eller lösenord. Försök igen");
}*/

#Går genom alla rader i databasen tills den hittar något som är likadant som posten
while($row = $result->fetch_assoc()) {
    if(($row["name"] == $userN) && ($row["pass"] == $passW)){
        $rättAnvändare = true;
        break;
    }
    /*
    elseif($row["name"] == $userN && !($row["pass"] == $passW)) {
        $felLösenord = true;
        break;
    } 
    */
}

#Om namnet inte finns så insertas användar namnet och lösenordet i databasen, annars säger programmet att användarnamnet finns redan
if (!$rättAnvändare){
    echo("Antingen finns inte användaren eller så skrev du fel på det gamla lösenordet. ");
} else{
    $sql = "update user SET pass='$nPassW' WHERE name='$userN'";
    if ($conn->query($sql) === TRUE) {
        echo("Lösenordet har ändrats. ");
    } else {
        echo "Något gick fel, försök igen" . "<br>" . $conn->error;
    }
}

  
$conn->close();

?>

<br>
<button type="button" onclick="window.location.href='index.html'">Gå tillbaka</button>
<br>

<footer>Copyright © this forum 2022</footer>