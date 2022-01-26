<?php
$sql = "SELECT * FROM `Guestbook`;";
$servername = "localhost";
$username = "root";
$password = "";
$database = "mysql";
$conn = mysqli_connect($servername, $username, $password, $database);
$result = $conn->query($sql);
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