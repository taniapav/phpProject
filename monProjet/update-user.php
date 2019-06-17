<?php
session_start();
require_once 'models/database.php';
require_once 'models/users.php';
require_once 'controller/updateUserCtrl.php';
require_once 'navbar.php';
?>
<?php if(isset($deleteError)) {
  echo $deleteError;
}
?>
<div class="pres">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table>
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>date de naissance</th>
              <th>Age</th>
              <th>Téléphone</th>
              <th>Mail</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $usersProfil->lastname ?></td>
              <td><?= $usersProfil->firstname ?></td>
              <td><?= date('d/m/Y', strtotime($usersProfil->birthdate)) ?></td>
              <td><?= $usersProfil->age ?></td>
              <td><a href="telto:<?= $usersProfil->phone ?>"><?= wordwrap($usersProfil->phone, 2, ' ', true); ?></a></td>
              <td><a href="mailto:<?= $usersProfil->mail ?>"><?= $usersProfil->mail ?></a></td>
              <td><i data-toggle="modal" data-target="#deleteUserModal" data-id="<?= $usersProfil->id; ?>" data-lastname="<?= $usersProfil->lastname ?>" data-firstname="<?= $usersProfil->firstname ?>" class="fas fa-trash text-primary"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <form action="update-user.php?id=<?php echo $users->id ?>" method="POST">
              <fieldset>
                <legend class="text-center"><h2>MODIFIER VOTRE COMPTE</h2></legend>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-12">
                    <label for="lastname">Nom</label>
                    <input  maxlength="50" autocomplete="on" type="text" required name="lastname" value="<?= isset($formErrors) && count($formErrors) > 0 ? htmlspecialchars($_POST['lastname']) : $usersProfil->lastname ?>" class="form-control bg-transparent"  id="lastname" placeholder="ex : Dupont" />
                    <?php if (isset($formErrors['lastname'])) { ?>
                      <div classe="text-danger"><?= $formErrors['lastname'] ?></div>
                    <?php } ?>
                 </div>
                    <div class="col-lg-6 col-md-6 col-12">
                    <label for="frstName">Prénom</label>
                    <input maxlength="50" autocomplete="on" type="text" required name="firstname" value="<?= isset($formErrors) && count($formErrors) > 0 ? htmlspecialchars($_POST['firstname']) : $usersProfil->firstname ?>" class="form-control bg-transparent" id="firstname" placeholder="ex : Jean" />
                    <?php if (isset($formErrors['firstname'])) { ?>
                      <div classe="text-danger"><?= $formErrors['firstname'] ?></div>
                    <?php } ?>
                  </div>
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
            <!--
            Je crée ma modale.
            Je n'en fait qu'une pour l'ensemble de mes patients grâce à l'attribut data-id de l'élément qui permettra l'ouverture de ma modale.
            Il s'agit d'une modale Bootstrap 4.3 : https://getbootstrap.com/docs/4.3/components/modal/
            Je ne mets rien dans le footer de la modale car je vais créer un bouton à l'aide du javascript
            -->
            <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  </div>
                  <div class="modal-footer">

                  </div>
                </div>
              </div>
            </div>
            <?php
            /**
             * Affichage de ma variable de succès ou de ma variable d'erreur dans des alertes
             */
            if (isset($deleteSuccess)) {
              ?>
              <div class="alert alert-success" role="alert">
                <?= $deleteSuccess ?>
              </div>
              <?php
            } else if (isset($deleteError)) {
              ?>
              <div class="alert alert-danger" role="alert">
                <?= $deleteError ?>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('footer.php') ?>
