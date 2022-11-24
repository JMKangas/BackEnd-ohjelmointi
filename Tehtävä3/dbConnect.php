<?php

$palvelin = 'localhost';
$tietokanta = 'presidentit';
$dbUser = 'presidentitKayttaja';
$dbPassword = 'presidentitKayttaja'; //salasana on tässä sovelluksessa sama kuin k.tunnus.

// Yhteyden luonti
$conn = new mysqli($palvelin, $dbUser, $dbPassword, $tietokanta);

// Yhteyden tarkastus
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn,'utf8');
?>
