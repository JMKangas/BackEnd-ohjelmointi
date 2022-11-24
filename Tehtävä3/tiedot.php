<?php

include('dbConnect.php'); 

if(!empty($_GET['sivu'])) $sivu=$_GET['sivu'];else $sivu='etusivu';

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql='SELECT * FROM presidentti WHERE presidentID ='.$id;

    $tulos = mysqli_query($conn, $sql);

    $pressa = mysqli_fetch_assoc($tulos);

    mysqli_free_result($tulos);

    $conn->close();

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
<!-- Navigaatio -->
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

        <?php if($pressa): ?>

          <h2> Tiedot presidentistä </h2>
          <p> Etunimi: <?php echo htmlspecialchars($pressa['first_name']); ?></p>
          <p> Sukunimi: <?php echo htmlspecialchars($pressa['last_name']); ?></p>
          <p> loppuliite: <?php echo htmlspecialchars($pressa['suffix']); ?></p>
          <p> Kaupunki: <?php echo htmlspecialchars($pressa['city']); ?></p>
          <p> Osavaltio: <?php echo htmlspecialchars($pressa['state']); ?></p>
          <p> Syntymäaika: <?php echo htmlspecialchars($pressa['birth']); ?></p>
          <p> Kuolinaika: <?php echo htmlspecialchars($pressa['death']); ?></p>

        <?php else: ?>

          <?php

            header("location: index.php?sivu=kaikki");
            exit();
            ?>

        <?php endif ?>

        
        <a href="muokkaa.php?id=<?php echo $pressa['presidentID']?>">
        <button>Muokkaa tietuetta</button>
</a>

    </div>
</body>
</html>
