<?php

$a = 5;
$b = 3;

?>

<!DOCTYPE html>
<html>
    <header>

        <title>
            Tehtävä 1
        </title>

    </header>
    <body>
        <h2> Laskutoimituksia </h2>

        <?php

        echo ("<h3> Perusoperaattorit </h3>");
        $Summa = $a + $b;
        $Vahennys = $a - $b;
        $Jako = ($a / $b);
        $Jako = number_format($Jako, 1, ',');
        $Kerto = $a * $b;
        $JakoJ = $a % $b;

        echo ("<p>$a + $b = $Summa</p>");
        echo ("<p>$a - $b = $Vahennys</p>");
        echo ("<p>$a / $b = $Jako</p>");
        echo ("<p>$a * $b = $Kerto</p>");
        echo ("<p>$a % $b = $JakoJ</p><br>");

        echo ("<h3> Kertotaulu </h3>");

        $luku = 6;
        $r = 10;
    
        $i = 1;

        while ($i <= $r) {
            echo "\t", $luku, " * ", $i, " = ", $luku * $i, "<br>", "\n";
            $i++;
        }

        echo ("<br><h3> Ehtolauseet </h3>");

        $nimi = "Pekka";
        $ika = 50;

        if($ika<18) echo "<p>$ika-vuotias $nimi on alaikäinen</p>";
        if($ika>18 AND $ika<=65) echo "<p>$ika-vuotias $nimi on työikäinen</p>";
        if($ika>65) echo "<p>$ika-vuotias $nimi on eläkeläinen</p>";

        ?>
            <br><p> Pekka </p>
            <p> 185kg </p>
            <p> 100kg </p>
    <?php

        $nimi = "Pekka";
        $pituus = 185;
        $paino = 100;
        $indeksi = $paino/($pituus*$pituus)*10000;
        $indeksi = number_format($indeksi, 1, ',');

        echo ("<p>Henkilö $nimi painoindeksi on $indeksi </p>"); 
        if($indeksi<20) echo "<p> $nimi on aliravittu </p>";
        if($indeksi>=20 AND $indeksi<=25) echo "<p> $nimi on normaalipainoinen </p>";
        if($indeksi>25 AND $indeksi<=30) echo "<p> $nimi on lievästi ylipainoinen </p>";
        if($indeksi>30) echo "<p> $nimi on ylipainoinen!!! </p>";
?>

    </body>

</html>