<?php
  require_once 'regex.php';
  $users = new users();
  $users->id = $_SESSION['id'];

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
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
          $users->mail =  htmlspecialchars($_POST['mail']);
        } else {
          $formErrors['mail'] = 'Merci de renseigner un mail valide';
        }
      } else {
        $formErrors['mail'] = 'Merci de renseigner votre mail';
      }

      if(count($formErrors) == 0 && isset($_SESSION['id'])){
      $users->modifyUsers();
      }
}
      /*
       * Je vérifie qu'un paramètre d'url deleteId a bien été envoyé.
       * Je l'appelle deleteId pour éviter toute suppression accidentelle si j'effectue
       * une autre action dans cette page qui nécessite l'id de mon patient.
       */
      if(!empty($_GET['deleteId'])){
          if(preg_match($regexId, $_GET['deleteId'])){
              $users->id = $_GET['deleteId'];
              if($users->deleteUsers()){
                session_destroy();
                header('location: index.php?');
                /*header('location: index.php?deleteId=true'); pour afficher un message votre compt a été bien supprimé dans index.php*/
                exit;
                  $deleteSuccess = 'Le patient a été supprimé';
              } else {
                  $deleteError = 'Le patient n\'a pas été supprimé';
              }
          }
      }
      $usersProfil = $users->getUsersProfil();
  ?>
