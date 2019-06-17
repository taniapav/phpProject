<?php
  session_start();
  require_once 'models/database.php';
  require_once 'models/users.php';
  require_once 'controller/usersProfileCtrl.php';
  require_once 'navbar.php';
?>

<div class="pres">
  <div class="container-fluid">
   <div class="row">
     <div class="col-md-8 offset-2">
        <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>date de naissance</th>
            <th>Age</th>
            <th>Téléphone</th>
            <th>Mail</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $usersProfil->lastname ?></td>
            <td><?= $usersProfil->firstname ?></td>
            <td><?= date('d/m/Y', strtotime($usersProfil->birthdate)) ?></td>
            <td><?= $usersProfil->age ?></td>
            <td><a href="telto:<?= $usersProfil->phone ?>"><?= wordwrap($usersProfil->phone,2,' ',true); ?></a></td>
            <td><a href="mailto:<?= $usersProfil->mail ?>"><?= $usersProfil->mail ?></a></td>
          </tr>
        </tbody>
      </table>
          <div class="pres">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-12">
                 <div class="row">
                 <div class="col-md-8 offset-2">
                   <form action="users-profile.php?id=<?php echo $users->id ?>" method="POST">
                      <fieldset>
                        <legend class="text-center"><h2>MODIFICATION</h2></legend>
                    <div class="form-group">
                      <label for="lastname">Nom</label>
                      <input  maxlength="50" autocomplete="on" type="text" required name="lastname" value="<?= isset($formErrors) && count($formErrors) > 0 ? htmlspecialchars($_POST['lastname']) : $usersProfil->lastname ?>" class="form-control bg-transparent"  id="lastname" placeholder="ex : Dupont" />
                      <?php if (isset($formErrors['lastname'])) { ?>
                        <div classe="text-danger"><?= $formErrors['lastname'] ?></div>
                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="frstName">Prénom</label>
                        <input maxlength="50" autocomplete="on" type="text" required name="firstname" value="<?= isset($formErrors) && count($formErrors) > 0 ? htmlspecialchars($_POST['firstname']) : $usersProfil->firstname ?>" class="form-control bg-transparent" id="firstname" placeholder="ex : Jean" />
                        <?php if (isset($formErrors['firstname'])) { ?>
                          <div classe="text-danger"><?= $formErrors['firstname'] ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-6 col-md-6 col-12">
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" autocomplete="on" required name="birthdate" value="<?= isset($formErrors) && count($formErrors) > 0 ? htmlspecialchars($_POST['birthdate']) : $usersProfil->birthdate ?>" class="form-control" id="birthdate" />
                        <?php if (isset($formErrors['birthdate'])) { ?>
                          <div classe="text-danger"><?= $formErrors['birthdate'] ?></div>
                        <?php } ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-12">
                        <label for="phone">Numéro de téléphone</label>
                        <input type="text" autocomplete="on" required name="phone" value="<?= isset($formErrors) && count($formErrors) > 0 ? htmlspecialchars($_POST['phone']) : $usersProfil->phone ?>"  class="form-control" id="phone" placeholder="01 02 03 04 05" />
                         <?php if (isset($formErrors['phone'])) { ?>
                          <div classe="text-danger"><?= $formErrors['phone'] ?></div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="mail">Adresse mail</label>
                      <input type="email" class="form-control bg-transparent" name="mail" value="<?= isset($formErrors) && count($formErrors) > 0 ? htmlspecialchars($_POST['mail']) : $usersProfil->mail ?>"id="email" aria-describedby="emailHelp" placeholder="ex : adresse@mail.com" required>
                       <?php if (isset($formErrors['phone'])) { ?>
                          <div classe="text-danger"><?= $formErrors['mail'] ?></div>
                        <?php } ?>
                    </div>
                    </fieldset>
                      <div class="text-center"><input type="submit" name="send" class="btn btn-outline-secondary btContact" value="Envoyer"/></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('footer.php') ?>
