<?php

include('dbConnect.php'); 

$sql='SELECT * FROM presidentti ORDER by first_name, last_name';  


$tulos = mysqli_query($conn, $sql);


$montako=mysqli_num_rows($tulos);

$presidentit = mysqli_fetch_all($tulos, MYSQLI_ASSOC);

?>

<h3>presidentit tietokannassa ( <?php echo $montako ?>kpl)</h3>

<a href="Lisaa.php?id=<?php echo $pressa['presidentID']?>">
<button>Lisää presidentti</button>

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

    
        echo "<tr>";
        echo "<td><a href=tiedot.php?id=$rivi[presidentID]>$rivi[first_name]</a></td>";
        echo "<td><a href=tiedot.php?id=$rivi[presidentID]>$rivi[last_name]</a></td>";
        echo '<td>'.$rivi['suffix'].'</td>';
        echo '<td>'.$rivi['city'].'</td>';
        echo '<td>'.$rivi['state'].'</td>';
        echo '<td>'.$rivi['birth'].'</td>';
        echo '<td>'.$rivi['death'].'</td>';

      }

      $conn->close();
      ?>
    </tbody>
  </table>