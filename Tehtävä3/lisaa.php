<?php 

include('dbConnect.php'); 

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $etunimi = $_POST['etunimi'];
  $sukunimi = $_POST['sukunimi'];
  $liite = $_POST['liite'];
  $kaupunki = $_POST['kaupunki'];
  $osavaltio = $_POST['osavaltio'];
  $date = date('y-m-d', strtotime($_POST['synty']));
  $kuoli = date('y-m-d', strtotime($_POST['kuoli']));

  if (isset($liite)) {
      $liite=NULL;
  } if (isset($kuoli)) {
      $kuoli=NULL;
  } 

      $sql = "INSERT INTO presidentti (first_name, last_name, suffix, city, state, birth, death) VALUES ('$etunimi', '$sukunimi', '$liite', '$kaupunki', '$osavaltio', '$synty', '$kuoli')";


      $status = "Your message was sent";
    
      if(mysqli_query($conn, $sql)) {
          header('location: index.php?sivu=kaikki');
      } else {
          echo mysqli_error($conn);
      }
    }
    mysqli_close($conn);
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
  <div class="container">
    <h2>Lisää tiedot presidentistä </h2>

    <form action="" method="POST" class="main-form">
      <div class="form-group">
        <label for="name"> Etunimi: </label>
        <input type="text" name="etunimi" id="etunimi" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div><br>

      <div class="form-group">
        <label for="name"> Sukunimi: </label>
        <input type="text" name="sukunimi" id="sukunimi" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div><br>

      <div class="form-group">
        <label for="name"> Loppuliite: </label>
        <input type="text" name="liite" id="liite" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div><br>

      <div class="form-group">
        <label for="name"> Kaupunki: </label>
        <input type="text" name="kaupunki" id="kaupunki" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div><br>

      <div class="form-group">
        <label for="name"> Osavaltio: </label>
        <input type="text" name="osavaltio" id="osavaltio" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div><br>

      <div class="form-group">
        <label for="name"> Syntymäaika: </label>
        <input type="date" name="synty" id="synty" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div><br>

      <div class="form-group">
        <label for="name"> Kuolinaika: </label>
        <input type="date" name="kuoli" id="kuoli" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div><br>

      <input type="submit" class="gt-button" value="Submit">

      <div class="form-status">
        <?php echo $status ?>
      </div>
    </form>
  </div>

</body>

</html>