<?php
  session_start();
  require_once 'models/database.php';
  require_once 'models/users.php';
  require_once 'controller/signInCtrl.php';
  require_once 'navbar.php';
?>
  <div class="bgimg-11" id="accueil">
    <div class="caption">
      <h1 class="nom">Mylène Ancelin</h1>
      <h4>Osthéopathie - Biokinergie - kinésithérapie</h4>
    </div>
  </div>

  <div class="container mt-5 mb-5">
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
    <form action="add-professor.php" method="POST">
        <fieldset>
          <legend class="text-center text-muted"><p class="bienV">Ajouter des intervenants</legend>
          <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12">
              <label class="text-muted" for="gender">Etat civil</label>
              <select class="form-control text-muted" id="gender" name="gender">
                  <option selected disabled>---Choix---</option>
                  <option value="Madame"  <?= isset($_POST['gender']) && $_POST['gender'] == 'Madame' ? 'selected' : '' ?>>Madame</option>
                  <option value="Monsieur"  <?= isset($_POST['gender']) && $_POST['gender'] == 'Monsieur' ? 'selected' : '' ?>>Monsieur</option>
              </select>
              <?php if (isset($formErrors['gender'])) {
                  ?>
                  <div class="invalid-feedback"><?= $formErrors['gender'] ?></div>
              <?php }
              ?>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <label class="text-muted" for="login">Pseudo</label>
          <input  type="text" autocomplete="on" required name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>" class="form-control <?= isset($formErrors['login']) ? 'is-invalid' : (isset($login) ? 'is-valid' : '') ?>" id="login" placeholder="superman" />
          <?php if (isset($formErrors['login'])) { ?>
            <div class="invalid-feedback"><?= $formErrors['login'] ?></div>
          <?php } ?>
        </div>
      </div>
          <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12">
              <label class="text-muted" for="lastname">Nom de famille</label>
              <?php

              ?>
              <input  type="text" autocomplete="on" required name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" class="form-control <?= isset($formErrors['lastname']) ? 'is-invalid' : (isset($lastname) ? 'is-valid' : '') ?>" id="lastname" placeholder="Dupont" />
              <?php if (isset($formErrors['lastname'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['lastname'] ?></div>
              <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <label  class="text-muted" for="firstname">Prénom</label>
              <input type="text" autocomplete="on" required name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>"  class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (isset($firstname) ? 'is-valid' : '') ?>" id="firstname" placeholder="Jean" />
              <?php if (isset($formErrors['firstname'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['firstname'] ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12">
              <label class="text-muted" for="birthdate">Date de naissance</label>
              <input type="date" autocomplete="on" required name="birthdate" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>" class="form-control <?= isset($formErrors['birthdate']) ? 'is-invalid' : (isset($birthdate) ? 'is-valid' : '') ?>" id="birthdate" />
              <?php if (isset($formErrors['birthdate'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['birthdate'] ?></div>
              <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <label class="text-muted" for="phone">Numéro de téléphone</label>
              <input type="text" autocomplete="on" required name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" class="form-control <?= isset($formErrors['phone']) ? 'is-invalid' : (isset($phone) ? 'is-valid' : '') ?>" id="phone" placeholder="01 02 03 04 05" />
              <?php if (isset($formErrors['phone'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['phone'] ?></div>
              <?php } ?>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12">
              <label class="text-muted" for="mail">Adresse mail</label>
              <input type="email" autocomplete="on" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
              <?php if (isset($formErrors['mail'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
              <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <label class="text-muted" for="mailConfirm">Confirmez votre adresse mail</label>
              <input type="email" required name="mailConfirm" value="<?= isset($_POST['mailConfirm']) ? $_POST['mailConfirm'] : '' ?>" class="form-control <?= isset($formErrors['mailConfirm']) ? 'is-invalid' : (isset($mailConfirm) ? 'is-valid' : '') ?>" id="mailConfirm" placeholder="adresse@mail.com" />
              <?php if (isset($formErrors['mailConfirm'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['mailConfirm'] ?></div>
              <?php } ?>
            </div>
          </div>

        <div class="form-group row">
          <div class="col-lg-6 col-md-6 col-12">
            <label class="text-muted" for="password">mot de passe</label>
            <input type="password" required name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($pass) ? 'is-valid' : '') ?>" id="password" />
            <?php if (isset($formErrors['password'])) { ?>
              <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
            <?php } ?>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <label class="text-muted" for="passConfirm">Confirmez votre mot de passe</label>
            <input type="password" required name="passConfirm" value="<?= isset($_POST['passConfirm']) ? $_POST['passConfirm'] : '' ?>" class="form-control <?= isset($formErrors['passConfirm']) ? 'is-invalid' : (isset($passConfirm) ? 'is-valid' : '') ?>" id="passConfirm" />
            <?php if (isset($formErrors['passConfirm'])) { ?>
              <div class="invalid-feedback"><?= $formErrors['passConfirm'] ?></div>
            <?php } ?>
          </div>
        </div>
        <!-- <div class="form-group row">
          <div class="g-recaptcha" data-sitekey="your_site_key"></div>
        </div> -->
        </fieldset>
        <div class="text-center"><input type="submit" name="send" class="btn btn-outline-secondary btContact" value="Me connecter"/></div>
      </form>
    <?php } else { ?>
      <div class="card border-secondary mb-3">
        <div class="card-header">Bonjour <?= strtoupper($users->lastname) . ' ' . $users->firstname ?>, vous êtes bien inscrit(e)</div>
        <div class="card-body">
          <p class="card-text">
            <span class="font-weight-bold">Date de naissance :</span> <?= $users->birthdate ?><br />
            <span class="font-weight-bold">Numéro de téléphone :</span> <?= $users->phone ?><br />
            <span class="font-weight-bold">Email :</span> <?= $users->mail ?><br />
          </p>
        </div>
      </div>
    <?php } ?>
  </div>

  <?php require_once('footer.php') ?>
