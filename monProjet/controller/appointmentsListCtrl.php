<?php
// J'instancie un objet appointments.
$appointments = new appointments();

if(!empty($_GET['deleteId'])){
  $appointments->id = $_GET['deleteId'];
  $appointments->deleteAppointment();
}
//je crée une variable qui est un tableau d'objets.
$appointmentsList = $appointments->getAppointmentsList();
