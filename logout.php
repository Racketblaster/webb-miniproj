<?php
session_start();
session_destroy();
echo "Du är nu utloggad! <br>";
echo"<button type='button' onclick=" . "window.location.href='index.html'" . ">Logga ut</button> <hr>";
?>