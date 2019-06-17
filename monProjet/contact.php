<?php
session_start();

require_once'navbar.php';
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

//On initialise un tableau d'erreurs vide
$formErrors = array();
  if (count($_POST) > 0) {

    if (!empty($_POST['lastname'])) {

      if (preg_match($regexName, $_POST['lastname'])) {
        //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
        $lastname = strip_tags($_POST['lastname']);
      } else {
        $formErrors['lastname'] = 'Merci de renseigner un nom de famille valide';
      }
    } else {
      $formErrors['lastname'] = 'Merci de renseigner votre nom de famille';
    }

    if (!empty($_POST['firstname'])) {
      if (preg_match($regexName, $_POST['firstname'])) {
        $firstname = strip_tags($_POST['firstname']);
      } else {
        $formErrors['firstname'] = 'Merci de renseigner un prénom valide';
      }
    } else {
      $formErrors['firstname'] = 'Merci de renseigner votre prénom';
    }

    if (!empty($_POST['mail'])) {
      if (preg_match($regexMail, $_POST['mail'])) {
        $mail = strip_tags($_POST['mail']);
      } else {
        $formErrors['mail'] = 'Merci de renseigner un mail valide';
      }
    } else {
      $formErrors['mail'] = 'Merci de renseigner votre mail';
    }

  }
  ?>

  <div class="bgimg-11" id="accueil">
    <div class="caption">
      <h1 class="nom">Myléne Ancelin</h1>
      <h4>Osthéopathie - Biokinergie - kinésithérapie</h4>
      <h2 class="h2">« CONTACTEZ MOI »</h2>
      <!-- <h3>N’hésitez pas à me contacter pour obtenir plus d’informations</h3> -->
    </div>
  </div>

  <div class="pres">
    <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="row">
         <div class="col-md-8 offset-2">
          <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
            <form action="contact.php" method="POST">
              <fieldset>
                <legend class="text-center"><h2 class="text-muted">N’hésitez pas à me contacter pour obtenir plus d’informations !</h2></legend>
            <div class="form-group">
              <label class="text-muted" for="lastname">Nom</label>
              <input  maxlength="50" autocomplete="on" type="text" required name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" class="form-control bg-transparent <?= isset($formErrors['lastname']) ? 'is-invalid' : (isset($lastname) ? 'is-valid' : '') ?>" id="lastname" placeholder="ex : Dupont" />
              <?php if (isset($formErrors['lastname'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['lastname'] ?></div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="frstName" class="text-muted">Prénom</label>
                <input maxlength="50" autocomplete="on" type="text" required name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>"  class="form-control bg-transparent <?= isset($formErrors['firstname']) ? 'is-invalid' : (isset($firstname) ? 'is-valid' : '') ?>" id="firstname" placeholder="ex : Jean" />
                <?php if (isset($formErrors['firstname'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['firstname'] ?></div>
                <?php } ?>
            </div>
            <div class="form-group">
              <label for="mail" class="text-muted">Adresse mail</label>
              <input type="email" class="form-control bg-transparent" id="email" aria-describedby="emailHelp" placeholder="ex : adresse@mail.com" required>
            </div>
            <div class="form-group ">
              <label for="message" class="text-muted">Message</label>
              <textarea required name="message" class="form-control bg-transparent <?= isset($formErrors['message']) ? 'is-invalid' : (isset($message) ? 'is-valid' : '') ?>" id="message" rows="5" placeholder="ex : Bonjour, ..."><?= isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
              <?php if (isset($formErrors['message'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['message'] ?></div>
              <?php } ?>
             </div>
            </fieldset>
              <div class="text-center"><input type="submit" name="send" class="btn btn-outline-secondary btContact" value="Envoyer"/></div>
            </form>
          <?php } ?>
        </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <?php require_once('footer.php') ?>
