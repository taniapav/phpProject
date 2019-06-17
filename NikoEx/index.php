<?php
$regexName = '/^[A-Z][a-zÀ-ÖØ-öø-ÿ]+(-[A-Z][a-zÀ-ÖØ-öø-ÿ]+)?$/'; // regex for firstname and lastname
$regexMail = '/^[A-Za-z]+@[a-z]+\.[a-z]+$/';  // regex for Mail and MailValid
$regexBot = '/^[0-9]$/';  // regex for BotValid
$formErrors = array();
if(count($_POST)>0){
  if(!empty($_POST['firstname'])){
    if(preg_match($regexName, $_POST['firstname'])){
      $firstname = htmlspecialchars($_POST['firstname']);
    }else{
      $formErrors['firstname'] = 'Votre prénom est incorect';
    }

  }else{
    $formErrors['firstname'] = 'Veuillez renseigner votre prénom';
  }

  if(!empty($_POST['lastname'])){
    if(preg_match($regexName, $_POST['lastname'])){
      $lastname = htmlspecialchars($_POST['lastname']);
    }else{
      $formErrors['lastname'] = 'Votre nom est incorrect';
    }

  }else{
    $formErrors['lastname'] = 'Veuillez renseigner votre nom';
  }

  if(!empty($_POST['mail'])){
    if(preg_match($regexMail, $_POST['mail'])){
      $mail = htmlspecialchars($_POST['mail']);
    }else{
      $formErrors['mail'] = 'Votre mail est incorrect';
    }

  }else{
    $formErrors['mail'] = 'Veuillez renseigner votre mail';
  }

  if(!empty($_POST['mailValid'])){
    if(preg_match($regexMail, $_POST['mailValid'])){
      $mailValid = htmlspecialchars($_POST['mailValid']);
      if()
    }else{
      $formErrors['mailValid'] = 'Votre mail est incorrect';
    }

  }else{
    $formErrors['mailValid'] = 'Veuillez renseigner votre mail';
  }

  if(!empty($_POST['botValid'])){
    if(preg_match($regexBot, $_POST['botValid'])){
      $botValid = htmlspecialchars($_POST['botValid']);
    }else{
      $formErrors['botValid'] = 'Votre robot est incorrect';
    }

  }else{
    $formErrors['botValid'] = 'Veuillez renseigner votre robot';
  }

}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Présentation php</title>
  </head>
  <body>
    <form action="index.php" method="POST">
      <p><label for="firstname">Prénom :</label></p>
      <p><input id="firstname" type="text" name="firstname" placeholder="Prénom" required /></p>
      <?php if (isset($formErrors['firstname'])) { ?>
          <div class="alert-danger">
              <p><?= $formErrors['firstname'] ?></p>
          </div>
      <?php } ?>
      <p><label for="lastname">Nom :</label></p>
      <p><input id="lastname" type="text" name="lastname" placeholder="Nom" required /></p>
      <?php
      // On affiche une alerte qui contient le texte de l'erreur s'il y en a une.
      if (isset($formErrors['lastname'])) {
          ?>
          <div class="alert-danger">
              <p><?= $formErrors['lastname'] ?></p>
          </div>
      <?php } ?>
      <p><label for="mail">Adresse email :</label></p>
      <p><input id="mail" type="email" name="mail" placeholder="Email" required /></p>
      <?php if (isset($formErrors['mail'])) { ?>
          <div class="alert-danger">
              <p><?= $formErrors['mail'] ?></p>
          </div>
      <?php } ?>
      <p><label for="mailValid">Confirmer l'adresse email :</label></p>
      <p><input id="mailValid" type="email" name="mailValid" placeholder="Confirmer l'email" required /></p>
      <p><label for="botValid">Confirmer que vous n'êtes pas un robot</label></p>
      <p><input id="botValid" type="text" name="botValid" placeholder="Entre un nombre entre 1 et 9" required /></p>
      <input type="submit" name="submit" value="Valider" />
    </form>
  </body>
</html>
<!--Le champ "botValid" doit obligatoirement être remplie pour effectuer pour que la vérification puisse s'éffectué !-->
