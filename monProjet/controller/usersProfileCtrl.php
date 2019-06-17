<?php
  require_once 'regex.php';
  $users = new users();

  if(!empty($_GET['id'])){
    if (preg_match($regexId, $_GET['id'])){
    $users->id = htmlspecialchars($_GET['id']);

    }
   if(count($_POST) > 0){
     $formErrors = array();
      if(!empty($_POST['lastname'])){
        if (preg_match($regexName, $_POST['lastname'])){
          $users->lastname=htmlspecialchars($_POST['lastname']);
        }else{
          $formErrors['lastname'] = 'Merci de renseigner un nom de famille valide';
        }
      }else{
      $formErrors['lastname'] = 'Merci de renseigner votre nom de famille';
      }


    if (!empty($_POST['firstname'])) {
        if (preg_match($regexName, $_POST['firstname'])) {
          $users->firstname = htmlspecialchars($_POST['firstname']);
        } else {
          $formErrors['firstname'] = 'Merci de renseigner un prénom valide';
        }
      } else {
        $formErrors['firstname'] = 'Merci de renseigner votre prénom';
      }

      if (!empty($_POST['birthdate'])) {
          $users->birthdate =  htmlspecialchars($_POST['birthdate']);
      } else {
        $formErrors['birthdate'] = 'Merci de renseigner votre date de naissance';
      }

      if (!empty($_POST['phone'])) {
        if (preg_match($regexPhoneNumber, $_POST['phone'])) {
          $users->phone =  htmlspecialchars($_POST['phone']);
        } else {
          $formErrors['phone'] = 'Merci de renseigner un numéro de téléphone valide';
        }
      } else {
        $formErrors['phone'] = 'Merci de renseigner votre numéro de téléphone';
      }

      if (!empty($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
          $users->mail =  htmlspecialchars($_POST['mail']);
        } else {
          $formErrors['mail'] = 'Merci de renseigner un mail valide';
        }
      } else {
        $formErrors['mail'] = 'Merci de renseigner votre mail';
      }

      if(count($formErrors) == 0){

      $users->modifyUsers();
      }
    }
      $usersProfil = $users->getUsersProfil();

   }else{
     header('location:index.php');
     exit;
   }

  ?>
