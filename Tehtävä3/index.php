<?php
/*
    file:   index.php
    desc:   Autosovelluksen oletussivu
*/
if(!empty($_GET['sivu'])) $sivu=$_GET['sivu'];else $sivu='etusivu';
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
<?php
    if($sivu=='etusivu'){
        echo '<h3>Esimerkkejä tietokantakyselyistä</h3>
            <h4>Lorem Ipsum</h4>
            <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos 
            qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, 
            adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
            consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, 
            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>';
    }
    if($sivu=='kaikki') include('kaikki.php');
    if($sivu=='haku') include('haku.php');

?>
  
</div>

</body>
</html>