<?php
    session_start();
    require_once 'models/database.php';
    require_once 'models/users.php';
    require_once 'controller/loginCtrl.php';
    require_once 'navbar.php';
  ?>

<?php
if(isset($_SESSION['id_userRoles']) && ($_SESSION['id_userRoles'] == 1 || $_SESSION['id_userRoles'] == 3 || $_SESSION['id_userRoles'] == 2)){
  header('location: index.php?');

  }  ?>

  <div class="pres">
    <div class="container">
     <div class="row">
       <div class="col-md-8 offset-2">
          <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
            <form action="login.php" method="POST">
              <fieldset>
                <legend class="text-center"><h2 class="text-muted">RAVI DE VOUS REVOIR !</h2></legend>
                <div class="form-group">
                  <label for="mail" class="text-muted">Adresse mail</label>
                <input type="email" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                <?php if (isset($formErrors['mail'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                <?php } ?>
                </div>
                <div class="form-group">
                    <label for="pass" class="text-muted">Mot de passe</label>
                    <input type="password" required name="password" value="<?= isset($_POST['pass']) ? $_POST['pass'] : '' ?>" class="form-control <?= isset($formErrors['pass']) ? 'is-invalid' : (isset($pass) ? 'is-valid' : '') ?>" id="pass" />
                    <div class="text-muted">Pensez à changer régulièrement votre mot de passe !</div>
                    <?php if (isset($formErrors['pass'])) { ?>
                      <div class="invalid-feedback"><?= $formErrors['pass'] ?></div>
                    <?php } ?>
                </div>
                </fieldset>
                <div class="text-center">
                  <div><a class="motPass text-muted login-forgeten-pw" id="forget" href="">Mot de passe oublié ?</a></div>
                  <input type="submit" name="send" class="btn btn-outline-secondary btContact" value="Me connecter"/>
                </div>
                <div class="text-center text-muted inscrir"><hr/>Vous n'êtes pas encore inscrit ?</div>
                <div class="text-center"><a href="inscrire.php"><input type="submit" name="send" class="btn btn-outline-secondary btContact" value="M'inscrire"/></a></div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('footer.php') ?>
