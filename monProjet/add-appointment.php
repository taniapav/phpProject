<?php
session_start();
require_once 'regex.php';
require_once 'models/database.php';
require_once 'models/users.php';
require_once 'models/appointments.php';
require_once 'controller/addAppointmentsCtrl.php';
require_once 'navbar.php';
?>

<div class="pres">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8 offset-2">
            <?php if (isset($formErrors['add'])) { ?>
              <p><?= $formErrors['add'] ?></p>
            <?php } elseif (isset($formSuccess)) { ?>
              <p><?= $formSuccess ?></p>
            <?php } ?>
            <form action="add-appointment.php?id=<?= isset($appointments->id_users) ? $appointments->id_users : ''?>" method="POST">
              <fieldset>
                <legend class="text-center"><h2>Ajouter RDV pour <?= $user->firstname . ' ' . $user->lastname ?></h2></legend>
                <div class="form-group">
                  <div class="col-lg-6 col-md-6 col-12">
                    <label for="date">Date</label>
                    <input type="date" min="<?= date('Y-m-d' )?>" name="date" id="date" <?= isset($_GET['date']) ? 'value="' . $_GET['date'] . '"' : '' ?>/>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <label for="hour">Heures</label>
                    <select name="hour" class="form-control" id="hour">
                      <option value="0" disabled selected>Choisir une heure de rendez-vous</option>
                      <?php foreach ($hours as $hour) { ?>
                        <option value="<?= $hour . ':00' ?>"><?= $hour . 'h00' ?></option>
                        <option value="<?= $hour . ':30' ?>"><?= $hour . 'h30' ?></option>
                      <?php } ?>
                    </select>
                    <?php if (isset($formErrors['hour'])) { ?>
                      <div class="invalid-feedback"><?= $formErrors['hour'] ?></div>

                    <?php } elseif (isset($formErrors['check'])) { ?>
                      <div class="invalid-feedback"><?= $formErrors['check'] ?></div>
                    <?php } ?>
                  </div>
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
<?php require_once('footer.php') ?>
