<?php

//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

//On initialise un tableau d'erreurs vide
$formErrors = array();
if (count($_POST) > 0) {
  $users = new users();
  if (!empty($_POST['mail'])) {
    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
      $users->mail = htmlspecialchars($_POST['mail']);
    } else {
      $formErrors['mail'] = 'Merci de renseigner un mail valide';
    }
  } else {
    $formErrors['mail'] = 'Merci de renseigner votre mail';
  }

  if (!isset($_POST['password']) || empty($_POST['password'])) {
    $formErrors['password'] = 'Merci de renseigner votre mot de passe';
  }

  if (count($formErrors) == 0) {
    //Après mes vérifications habituelles, je lance ma méthode checkUser afin de vérifier si l'utilisateur existe bien.
    $check = $users->checkUsersMail();
    if ($check->number == 1) {
      //Si l'utilisateur existe je récupère le hash de son mot de passe pour le comparé au mot de passe tapé
      $hash = $users->getHashByMail();
      //On utilise la fonction password_verify pour vérifier que les mots de passe correspondent
      if (password_verify($_POST['password'], $hash->password)) {
        $usersInformations = $users->getUsersByMail();
        /**
         * Si les mots de passe correspondent, on crée une session et les variables de session qui contiendront
         * tous les éléments que l'on souhaite conserver tout au long de la connexion
         * Il faut appeler session_start sur toutes les pages pour que l'on ai accès aux
         * variables de session. C'est ce qui constitue la connexion en elle-même.
         */
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        /*session status() est utilisée pour connaitre l'état de la session courante.*/
        /*PHP_SESSION_NONE si les sessions sont activées, mais qu'aucune n'existe.*/

        $_SESSION['id'] = $usersInformations->id;
        $_SESSION['id_userRoles'] = $usersInformations->id_userRoles;

     } else {
          $formErrors['mail'] = 'L\'email et/ou le mot de passe est invalide';
          $formErrors['password'] = 'L\'email et/ou le mot de passe est invalide';
        }
       } else {
          $formErrors['mail'] = 'L\'email et/ou le mot de passe est invalide';
          $formErrors['password'] = 'L\'email et/ou le mot de passe est invalide';
    }
  }
}
?>
