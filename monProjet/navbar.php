<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Projet Osthéopathie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark ">
      <a class="navbar-brand" href="#"><img src="assets/img/logo.png" alt="logo">Mylène Ancelin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <?php $current = basename($_SERVER['PHP_SELF']); ?>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item" <?= $current == 'ostheopath.php' ? 'id="current"' : ''; ?> >
            <a class="nav-link" href="ostheopath.php">Ostéopathie-Biokinergie</a>
          </li>
          <li class="nav-item" <?= $current == 'workshop.php' ? 'id="current"' : ''; ?> >
            <a class="nav-link" href="workshop.php">Atelier</a>
          </li>
          <li class="nav-item" <?= $current == 'testimonials.php' ? 'id="current"' : ''; ?> >
            <a class="nav-link" href="testimonials.php">Témoignages</a>
          </li>
            <li class="nav-item dropdown <?= $current == 'osteopath-calendar.php' || $current == 'workshop-calendar.php' ? 'id="current"' : ''; ?>">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Prendre un rendez-vous
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="osteopath-calendar.php">Ostéopathie</a>
                <a class="dropdown-item" href="workshop-calendar.php">Atelier</a>
              </div>
            </li>
            <li class="nav-item" <?= $current == 'contact.php' ? 'id="current"' : ''; ?>>
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          <?php if (isset($_SESSION['id_userRoles']) && $_SESSION['id_userRoles'] == 1) { ?>
            <li class="nav-item dropdown <?= $current == "add-professor.php" || $current == 'professors-list.php' ? 'id="current"' : ''; ?>">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Professeurs
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="add-professor.php">Ajouter Professeurs</a>
                <a class="dropdown-item" href="professors-list.php">Liste Professeurs</a>
              </div>
            </li>
          <?php } ?>

            <?php if (isset($_SESSION['id_userRoles']) && $_SESSION['id_userRoles'] == 1) { ?>
              <li class="nav-item dropdown <?= $current == "osteopath-calendar.php" || $current == 'worksop-calendar.php' ? 'id="current"' : ''; ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Utilisateurs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="users-list.php">Liste des utilisateurs</a>
                  <a class="dropdown-item" href="appointments-list.php">Liste des rendez-vous</a>
                </div>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="logout.php">Me déconnecter</a>
              </li>
          <?php } ?>

               <?php if (isset($_SESSION['id_userRoles']) && $_SESSION['id_userRoles'] == 2) { ?>
              <li class="nav-item dropdown <?= $current == "update-prof.php" || $current == 'appointments-atelier.php' ? 'id="current"' : ''; ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Professeurs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="update-prof.php">Modifier mon compte</a>
                  <a class="dropdown-item" href="appointments-workshop.php">Liste des ateliers</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Me déconnecter</a>
              </li>
          <?php } ?>

          <?php if (isset($_SESSION['id_userRoles'])  && $_SESSION['id_userRoles'] == 3) { ?>
            <li class="nav-item" <?= $current == 'update-user.php' ? 'id="current"' : ''; ?>>
              <a class="nav-link" href="update-user.php">Modifier mon profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Me déconnecter</a>
            </li>
          <?php } ?>

          <?php if (!isset($_SESSION['id'])) { ?>
            <li class="nav-item" <?= $current == 'signin.php' ? 'id="current"' : ''; ?>>
              <a class="nav-link" href="signin.php">M'inscrire</a>
            </li>
            <li class="nav-item" <?= $current == 'login.php' ? 'id="current"' : ''; ?>>
              <a class="nav-link" href="login.php">Me connecter</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
