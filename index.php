<meta charset="UTF-8">

<h1>Välkommen till mitt forum</h1>
<form action="forumsida.php" method="post" enctype="multipart/form-data">
            
    Name: <input type="text" name="name" id="name"><br>
    <br>
    Email: <input type="text" name="email" id="email"><br>
    <br>
    Homepage: <input type="text" name="homepage" id="homepage"><br>
    <br>
    tel: <input type="text" name="tel" id="tel"><br>
    <br>
    Comment: <input type="text" name="comment" id="comment"><br>
    <br>
    
    <input type="submit" value="Lägg till" name="submit">
    
</form>

<?php
$sql = "SELECT * FROM `Guestbook`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "mysql";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);

$name = $_POST["name"];
$email = $_POST["email"];
$homepage = $_POST["homepage"];
$comment = $_POST["comment"];
$sql = "INSERT INTO Guestbook (name, email, homepage, comment, time) VALUES ('$name', '$email', '$homepage', '$comment', now())";
$conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo  "<hr> Time: ". $row["time"] . "<br> From: " . $row["name"] . "<br> Email: " . $row["email"] . "<br> Comment: " . $row["comment"] .  "<hr>";
    }
} else {
    echo "0 results";
}
?>