<?php

include('dbConnect.php'); 

if(!empty($_GET['sivu'])) $sivu=$_GET['sivu'];else $sivu='etusivu';

if(isset($_GET['update'])) {

  $etunimi = $_GET['etunimi'];
  $sukunimi = $_GET['sukunimi'];
  $liite = $_GET['liite'];
  $kaupunki = $_GET['kaupunki'];
  $osavaltio = $_GET['osavaltio'];
  $synty = $_GET['synty'];
  $kuoli = $_GET['kuoli'];

  $id_to_update = mysqli_real_escape_string($conn, $_GET['id_to_update']);

  $sql = "UPDATE presidentti SET last_name = '$sukunimi', first_name = '$etunimi', suffix = '$liite', city = '$kaupunki', state = '$osavaltio', birth = '$synty', death = '$kuoli' WHERE presidentID = '$id_to_update'";

  if(mysqli_query($conn, $sql)) {

    header('location: index.php?sivu=kaikki');

} else {
    echo mysqli_error($conn);
}


$conn->close();
}

if(isset($_POST['delete'])) {

  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

  $sql = "DELETE FROM presidentti WHERE presidentID = $id_to_delete";

  if(mysqli_query($conn, $sql)) {
    header('location: index.php?sivu=kaikki');
} else {
    echo mysqli_error($conn);
}
mysqli_free_result($id_to_delete);

$conn->close();
}

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql='SELECT * FROM presidentti WHERE presidentID ='.$id;

    $tulos = mysqli_query($conn, $sql);

    $pressa = mysqli_fetch_assoc($tulos);

    mysqli_free_result($tulos);

    $conn->close();

    //print_r($pressa);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Presidentit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
  <div class="container">

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($sivu=='etusivu') echo 'active'?>" href="index.php?sivu=etusivu">Etusivu</a>
        </li>
      <li class="nav-item">
          <a class="nav-link <?php if($sivu=='kaikki') echo 'active'?>" href="index.php?sivu=kaikki">Kaikki presidentit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($sivu=='haku') echo 'active'?>" href="index.php?sivu=haku">Haku</a>
        </li>
      </ul>
    </div>
  </nav>
  
<h1>Presidenttisovellus</h1>

</div>
    <div class="container center">
         
        <form action="muokkaa.php" method="get">
                     <input type="hidden" name="pressaID" value =<?php echo($pressa['presidentID']);?>>
            Etunimi: <input type="text" name="etunimi" value =<?php echo($pressa['first_name']);?>><br><br>
            Sukunimi: <input type="text" name="sukunimi" value =<?php echo($pressa['last_name']);?>><br><br>
            loppuliite: <input type="text" name="liite" value =<?php echo($pressa['suffix']);?>><br><br>
            Kaupunki: <input type="text" name="kaupunki" value =<?php echo($pressa['city']);?>><br><br>
            Osavaltio: <input type="text" name="osavaltio" value =<?php echo($pressa['state']);?>><br><br>
            Syntymäaika: <input type="date" name="synty" value =<?php echo($pressa['birth']);?>><br><br>
            Kuolinaika: <input type="date" name="kuoli" value =<?php echo($pressa['death']);?>><br><br>

            <input type="hidden" name="id_to_update" value ="<?php echo($pressa['presidentID']) ?>">
            <input type="submit" name="update" value="Päivitä">

           </form>

        </form><br>
        <form action="muokkaa.php" method="POST"> 

        <input type="hidden" name="id_to_delete" value ="<?php echo($pressa['presidentID']) ?>">
        <input type="submit" name="delete" value="Poista">
        </form>

      </div>

</body>
</html>