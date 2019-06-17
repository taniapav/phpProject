<?php
 require_once 'regex.php';
//On créé un tableau de créneau horaires.
$hours = array('09', '10', '11', '15', '16');
//On créé un tableau d'erreurs.
$formErrors = array();
$appointments = new appointments();
$users = new users();
$usersList = $users->getUsersList();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {

  $appointments->id = htmlspecialchars($_GET['id']);
  $appointmentUsers = $appointments->getAppointment();
  $appointments->id_users = $appointmentUsers->id_users;
  $appointmentsList = $appointments->getAppointmentListUsers();
    }
}
if (count($_POST) > 0) {
  //J'instancie l'objet appointments.
  if (!empty($_POST['date'])) {
    if (preg_match($regexDate, $_POST['date'])) {
      $date = htmlspecialchars($_POST['date']);
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

  if (!empty($_POST['users'])) {
    if (preg_match($regexId, $_POST['users'])) {
      $patient = htmlspecialchars($_POST['users']);
    } else {
      $formErrors['users'] = 'Merci de sélectionner un patient';
    }
  } else {
    $formErrors['users'] = 'Merci de sélectionner un patient.';
  }
//S'il n'y a pas d'erreur dans le formulaire, j'insère dans la base:

  if (count($formErrors) == 0 && isset($_SESSION['id'])) {
      $appointments->id = $_GET['id'];
      $appointments->dateHour = $date . ' ' . $hour;
      if(!$appointments->modifyAppointment()){
         $formErrors['update'] = 'Problème';
      }
  }
}

?>
