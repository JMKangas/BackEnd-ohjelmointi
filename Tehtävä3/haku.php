<?php
/**
 *  file:   haku.php
 *  desc:   Haetaan autoja tietokannasta hakusanan perusteella
 */
if(!empty($_GET['hakusana'])) $hakusana=$_GET['hakusana']; else $hakusana='%%';

include('dbConnect.php');

$sql="SELECT * FROM presidentti 
        WHERE first_name like '$hakusana%%'
        OR last_name like '%%$hakusana%%'
        ORDER by first_name, last_name";

$tulos = mysqli_query($conn, $sql);

$montako=mysqli_num_rows($tulos);
$presidentit = mysqli_fetch_all($tulos, MYSQLI_ASSOC);

?>
<h3>Hae presidenttejä kirjoittamalla hakusana</h3><br>
<form action="index.php" method="get">
  <input type="hidden" name="sivu" value="haku">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Hakusana" name="hakusana"><br>
      <input type="submit" class="btn btn-primary" value="Hae">
    </div>
  </div>
</form><br>

<h3>presidentit tietokannassa ( <?php echo $montako ?>kpl)</h3>

<table class="table table-striped">
    <thead>
      <tr>

 
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>loppuliite</th>
        <th>Kaupunki</th>
        <th>Osavaltio</th>
        <th>Syntymäaika</th>
        <th>Kuolinaika</th>

      </tr>
    </thead>
    <tbody>

      <?php

      foreach($presidentit as $rivi) { 

        echo '<tr>';
        echo "<td><a href=tiedot.php?id=$rivi[presidentID]>$rivi[first_name]</a></td>";
        echo "<td><a href=tiedot.php?id=$rivi[presidentID]>$rivi[last_name]</a></td>";
        echo '<td>'.$rivi['suffix'].'</td>';
        echo '<td>'.$rivi['city'].'</td>';
        echo '<td>'.$rivi['state'].'</td>';
        echo '<td>'.$rivi['birth'].'</td>';
        echo '<td>'.$rivi['death'].'</td>';
        echo '</tr>';
      }

      $conn->close(); 
      ?>
    </tbody>
  </table>