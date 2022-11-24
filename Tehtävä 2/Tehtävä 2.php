<?php

$a = 5;
$b = 3;

?>

<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf8">

        <title>
            Tehtävä 2
        </title>

    </header>
    <body>
        <h2> Laskutoimituksia </h2>
        
        <p> Kaikki kentät ovat pakollisia </p>

        <br><form action="indeksi.php" method="post">
            
            Luku 1: <input type="number" name="ekaLuku" placeholder="numeroarvo"><br>
            Luku 2: <input type="number" name="tokaLuku" placeholder="numeroarvo"><br><br>

            <h2> Painoindeksi laskuri </h2>

            Nimi: <input type="text" name="ekaNimi"  placeholder = "kirjoita nimesi"><br>
            Ikä: <input type="number" name="ika" placeholder="numeroarvo"><br>
            Pituus: <input type="number" name="Pituus" placeholder="senttimetreinä"><br>
            Paino: <input type="number" name="Paino" placeholder="kiloina">
            <input type="submit" name="select" value="Laske">


    </form>

    </body>

</html>