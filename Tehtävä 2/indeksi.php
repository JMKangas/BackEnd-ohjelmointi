
<!DOCTYPE html>
<html>
    <header>

        <title>
            Tehtävä 2
        </title>

    </header>
    <body>

        <h2> Hei  </h2>

    <?php

    if(isset($_POST['select'])){

        $nimi = $_POST['ekaNimi'];
        $ika = $_POST['ika'];
        $pituus = $_POST["Pituus"];
        $paino = $_POST["Paino"];
        $a = $_POST['ekaLuku'];
        $b = $_POST['tokaLuku'];

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

        echo ("<h3> Kertotaulu (Luvun $a mukaan) </h3>");

        $luku = $a;
        $r = 10;

        $i = 1;

        while ($i <= $r) {
            echo "\t", $luku, " * ", $i, " = ", $luku * $i, "<br>", "\n";
            $i++;
        }

        $indeksi = $paino/($pituus*$pituus)*10000;
        $indeksi = number_format($indeksi, 1, ',');

        echo ("<p> Henkilön $nimi painoindeksi on $indeksi </p>");

        if($indeksi<20) echo "<p> $nimi on aliravittu </p>";
        if($indeksi>=20 AND $indeksi<=25) echo "<p> $nimi on normaalipainoinen </p>";
        if($indeksi>25 AND $indeksi<=30) echo "<p> $nimi on lievästi ylipainoinen </p>";
        if($indeksi>30) echo "<p> $nimi on ylipainoinen!!! </p>";

    }
    
?>

    </body>

</html>