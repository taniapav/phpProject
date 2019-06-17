<?php
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';
//On initialise un tableau d'erreurs vide
$formErrors = array();
/*
 * On vérifie si le tableau $_POST est vide
 * S'il est vide => le formulaire n'a pas été envoyé
 * S'il a au moins une ligne => le formulaire a été envoyé, on peut commencer les vérifications
 */
if (count($_POST) > 0) {
  $users = new users();
  if ($_SERVER['PHP_SELF'] == '/signin.php'){
    $users->idGroupe = 3;

  }elseif ($_SERVER['PHP_SELF'] == '/add-professor.php') {
    $users->idGroupe = 2;
  }

  if (!empty($_POST['gender'])) {
    if ($_POST['gender'] === 'Madame' || $_POST['gender'] === 'Monsieur') {
      $users->gender = $_POST['gender'];
    } else {
      $formErrors['gender'] = 'Votre état civil est incorrect';
    }
  } else {
    $formErrors['gender'] = 'Veuillez renseigner votre état civil';
  }

  if (!empty($_POST['login'])) {
    if (preg_match($regexLogin, $_POST['login'])) {
      $users->login = htmlspecialchars($_POST['login']);
      /**
       * Je vérifie si le Pseudo existe dans la base de données
       */
      $checkLogin = $users->checkUsersLogin();
      if ($checkLogin->number > 0) {
        $formErrors['login'] = 'Ce Pseudo existe déjà, veuillez en choisir un autre.';
      }
    } else {
      $formErrors['login'] = 'Merci de renseigner un pseudo';
    }
  } else {
    $formErrors['login'] = 'Merci de renseigner votre pseudo';
  }

  if (!empty($_POST['lastname'])) {
    /*
     * On vérifie si la saisie utilisateur correspond à la regex
     * Si tout va bien => on stocke dans la variable qui nous servira à afficher
     * Sinon => on stocke l'erreur dans le tableau $formErrors
     */
    if (preg_match($regexName, $_POST['lastname'])) {
      //On utilise la fonction htmlspecialchars pour supprimer les éventuelles balises html 
      $users->lastname = htmlspecialchars($_POST['lastname']);
    } else {
      $formErrors['lastname'] = 'Merci de renseigner un nom de famille valide';
    }
  } else {
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
    if (preg_match($regexBirthDate, $_POST['birthdate'])) {
      $users->birthdate = htmlspecialchars($_POST['birthdate']);
    } else {
      $formErrors['birthdate'] = 'Merci de renseigner une date de naissance valide';
    }
  } else {
    $formErrors['birthdate'] = 'Merci de renseigner votre date de naissance';
  }

  if (!empty($_POST['phone'])) {
    if (preg_match($regexPhoneNumber, $_POST['phone'])) {
      $users->phone = htmlspecialchars($_POST['phone']);
    } else {
      $formErrors['phone'] = 'Merci de renseigner un téléphone valide';
    }
  } else {
    $formErrors['phone'] = 'Merci de renseigner votre téléphone';
  }

  if (!empty($_POST['mail'])) {
    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
      if (!empty($_POST['mailConfirm'])) {

        if (filter_var($_POST['mailConfirm'], FILTER_VALIDATE_EMAIL) && $_POST['mail'] == $_POST['mailConfirm']) {
          $users->mail = htmlspecialchars($_POST['mail']);
          $checkMail = $users->checkUsersMail();
          if ($checkMail->number > 0) {
            $formErrors['mail'] = 'Un compte avec ce mail existe déjà';
          }
        } else {
          //Si la saisie de l'utilisateur est mauvaise
          $formErrors['mailConfirm'] = 'Votre adresse mail de confirmation est incorrecte.';
        }
      } else {
        $formErrors['mailConfirm'] = 'Veuillez renseigner votre adresse mail de confirmation';
      }
    } else {
      $formErrors['mail'] = 'Merci de renseigner un mail valide';
    }
  } else {
    $formErrors['mail'] = 'Merci de renseigner votre mail';
  }


  if (!empty($_POST['password'])) {
    if (!empty($_POST['passConfirm'])) {
      if ($_POST['password'] == $_POST['passConfirm']) {
        $users->password = password_hash($_POST['passConfirm'], PASSWORD_DEFAULT);
      } else {
        //Si la saisie de l'utilisateur est mauvaise
        $formErrors['passConfirm'] = 'Votre mot de passe de confirmation est incorrect.';
      }
    } else {
      $formErrors['passConfirm'] = 'Veuillez renseigner votre mot de passe de confirmation';
    }
  } else {
    $formErrors['password'] = 'Merci de renseigner votre mot de passe';
  }


  if (count($formErrors) == 0) {
    if ($users->addUsers()) {
      $formSuccess = 'Enregistrement effectué';
    } else {
      $formSuccess['add'] = 'Une erreur est survenue';
    }
  }
}
?>
