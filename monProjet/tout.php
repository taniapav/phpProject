<?php  $pseudo= addslashes($_POST'pseudo']);
    $req = $PDO->query("SELECT pseudo FROM utilisateurs WHERE pseudo='$pseudo'");
    $chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
    if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo > '1')
    {
        $error_pseudo_identique = 'Ce pseudo existe déjà !';
    }else{ $error_pseudo_identique = 'Ce pseudo est disponible!';}
?>
<?php  $sql = 'SELECT COUNT(*) FROM table_utilisateurs WHERE pseudo_utilisateur="'.$_POST'pseudo_formulaire'].'" ';
$req = mysql_query($sql) or die(mysql_error() );
$exist = mysql_result($req, 0);
if ($exist >= 1) {
echo 'Ce pseudo existe déjà !';
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Projet Osthéopathie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><img src="assets/img/logo.png" alt="logo">Myléne Ancelin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ostheo.php">Osteopathie-Biokinergie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#telier.php">Atelier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="conseil.php">Conseils</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tarif.php">Tarifs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscrire.php">S'inscrire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connecter.php">Se connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tout.php">tout</a>
          </li>
        </ul>

      </div>
    </nav>

  <div class="bgimg-1" id="accueil">
    <div class="caption">

    </div>
  </div>

  <div class="pres">

  </div>

  <div class="bgimg-2">
    <div class="caption">

    </div>
  </div>



  <div class="bgimg-3">
    <div class="caption">
    <span class="cabinet">SCROLL UP</span>
    </div>
  </div>

  <div class="consult">
    <div class="rdv">
      <button type="button" class="btn btn-secondary">PRENDRE RDV</button>
      <p>Myléne Ancelin</p>
      <p>Osthéopathe</p>
      <p>e-mailnsnsn@lflflf</p>
      <p>telepho,</p>
    </div>
  </div>


  <footer>
    <div class="row text-center">
      <div class="col-md-3">
        <ol>
          <li><h5>Myléne Ancelin</h5></li>
          <li><h6>Osthéopathe</h6></li>
          <li>26 rue notr dame de bien venu</li>
          <li>60200 Compiegne</li>
          <li></li>
        </ol>
      </div>
      <div class="col-md-3">
        <ol>
          <li><h5>Info contact</h5></li>
          <li><button type="button" class="btn btn-info">Contactze-moi en ligne</button></li>
          <li><a href="#"><i class="fas fa-mobile-alt"></i></a>Téléphone 06 17 18 33 28</li>
          <li><a href="#"><i class="fas fa-at"></i></a>mylene.ancelin@gmail.com</li>
        </ol>
      </div>
      <div class="col-md-3">
        <ol>
          <li><a href="#">Mensions légales &</a></li>
          <li><a href="#">Données Personnelles</a></li>
          <li><a href="#">Confidentialité &&</a></li>
          <li><a href="#">Cookies</a></li>
        </ol>
      </div>
      <div class="col-md-3">
        <ol>
          <li><h5>Suivez moi</h5></li>
          <li><a href="#"><i class="icon fab fa-facebook fa-2x"></i></a></li>
          <a href="#"><i class="icon fab fa-linkedin fa-2x"></i></a>
        </ol>
      </div>
      <div class=" col-md-12 tex text-center">
        <p>2015-2017 - Tous droits réservés à Tatjana PAVLOVIC.<br />
          Il est strictement interdit de copier et de distribuer le contenu de ce site sans l'accord express de son propriétaire..
        </p>
      </div>
    </div>
  </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
  </body>
</html>
