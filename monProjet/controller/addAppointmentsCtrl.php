<?php

//On créé un tableau de créneau horaires.
$hours = array('09', '10', '11', '15', '16');
//On créé un tableau d'erreurs
$formErrors = array();
//On instancie un objet.
$users = new users();

//J'instancie l'objet appointments.
$appointments = new appointments();
if (isset($_SESSION['id_userRoles'])) {
  if($_SESSION['id_userRoles'] == 1 && !empty($_GET['id'])){
    $appointments->id_users = $_GET['id'];
    $users->id = $_GET['id'];
  } else {
    $appointments->id_users = $_SESSION['id'];
    $users->id = $_SESSION['id'];
  }
} else {
    header('location: signin.php?');
}

$user = $users->getUsersProfil();


if (count($_POST) > 0) {


  if (!empty($_POST['date'])) {
    if (preg_match($regexDate, $_POST['date'])) {      
      if($_POST['date'] >= date('Y-m-d')){
        $date = htmlspecialchars($_POST['date']);
      }else{
        $formErrors['date'] = 'Merci de saisir une date supérieure ou égale à celle du jour.';
      }
    } else {
      $formErrors['date'] = 'Merci de saisir une date valide.';
    }
  } else {
    $formErrors['date'] = 'Merci de remplir la date.';
  }

  if (!empty($_POST['hour'])) {
    if (preg_match($regexHour, $_POST['hour'])) {
      $hour = htmlspecialchars($_POST['hour']);
    } else {
      $formErrors['hour'] = 'Merci de saisir une heure valide.';
    }
  } else {
    $formErrors['hour'] = 'Merci de remplir l\'heure.';
  }

  //S'il n'y a pas d'erreur dans le formulaire, j'insère dans la base:
  if (count($formErrors) == 0) {
    $appointments->dateHour = $date . ' ' . $hour;
    $check = $appointments->checkFreeAppointments();
    if ($check === false) {
      $formErrors['check'] = 'Une erreur est survenue.';
    } elseif ($check > 0) {
      $formErrors['check'] = 'Le rendez-vous n\'est pas disponible.';
    } else {
      if ($appointments->addAppointements()) {
        $formSuccess = 'Le rendez-vous a bien été enregistré.';
      } else {
        $formErrors['add'] = 'Une erreur est survenue';
      }
    }
  }
}
?>
