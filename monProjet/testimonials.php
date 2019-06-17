<?php 
session_start();
require_once'navbar.php';
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

//On initialise un tableau d'erreurs vide
$formErrors = array();
  if (count($_POST) > 0) {

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
      <h2>Osthéopathie - Biokinergie - kinésithérapie</h2>
    </div>
  </div>

  <div class="pres">
    <div class="container">
     <div class="row">
       <div class="col-md-8 offset-2">
          <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
         <form action="login.php" method="POST">
              <fieldset>
                <legend class="text-center"><h2 class="text-muted">Deposer votre avis !</h2></legend>
                <div class="form-group">
                  <label for="mail" class="text-muted">Adresse mail</label>
                <input type="email" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                <?php if (isset($formErrors['mail'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                <?php } ?>
                </div>
                <div class="form-group">
                  <label for="message" class="text-muted">Message</label>
                  <textarea required name="message" class="form-control bg-transparent <?= isset($formErrors['message']) ? 'is-invalid' : (isset($message) ? 'is-valid' : '') ?>" id="message" rows="5" placeholder="ex : Bonjour, ..."><?= isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
                  <?php if (isset($formErrors['message'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['message'] ?></div>
                  <?php } ?>
                </div>
                </fieldset>
            </form>
          <?php } ?>
          <div class="text-center text-muted inscrir"><hr/>Vous n'êtes pas encore inscrit ?</div>
          <div class="text-center"><a href="signin.php"><input type="submit" name="send" class="btn btn-outline-secondary btContact" value="M'inscrire"/></a></div>
          <div class="text-center">
            <h3>Nos praticiens parlent de nous</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('footer.php') ?>
