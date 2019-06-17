<?php
    session_start();
    require_once 'models/database.php';
    require_once 'models/users.php';
    require_once 'models/appointments.php';
    require_once 'controller/updateAppointmentCtrl.php';
    require_once 'navbar.php';
  ?>

    <?php if (isset($appointmentUsers) && is_object($appointmentUsers)) {
      ?>
<div class="pres">
      <div class="container">
       <div class="row">
       </div class="text-center">
         <div class="col-md-12">
             <?php if(isset ($formErrors['update'])) {
               echo 'pb';
             }
?>

           <form action="update-appointment.php?id=<?= $appointmentUsers->id ?>" method="POST">
                <fieldset>
                <legend class="text-center"><h2>Modifier RDV pour <?= $appointmentUsers->firstname . ' ' . $appointmentUsers->lastname ?></h2></legend>
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-12">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" value="<?= isset($_POST['date']) ? $_POST['date'] : date('Y-m-d', strtotime($appointmentUsers->dateHour)) ?>" />
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <label for="hour">Heures</label>
                <input type="text" name="hour" value="<?= isset($_POST['hour']) ? $_POST['hour'] : date('H:i', strtotime($appointmentUsers->dateHour)) ?>" class="form-control" id="hour" />

                <?php if (isset($formErrors['hour'])) { ?>
                   <div class="invalid-feedback"><?= $formErrors['hour'] ?></div>
                     <?php } ?>
              </div>
                <div class="col-lg-6 col-md-6 col-12">
                <select name="users" class="form-control" id="users">
                   <option disabled>Sélectionnez un patient</option>
                   <?php foreach ($usersList as $users) { ?>
                   <option <?= ($users->id == $appointmentUsers->id_users)? 'selected' : '' ; ?> value="<?= $users->id ?>"><?= $users->lastname . ' ' . $users->firstname . ' ' . $users->birthdate ?></option>
                  <?php } ?>
                  </select>
                  </div>
                 </div>
                </fieldset>
              <div class="text-center"><input type="submit" name="send" class="btn btn-outline-secondary btContact" value="Envoyer"/></div>
            </form>
<h2>LES AUTRES RENDEZ-VOUS DU PATIENT</h2>
          <table>
            <thead>
               <tr>
                  <th>Dates</th>
                  <th>heures</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($appointmentsList as $appointment) {?>
               <tr>
                  <td><?=$appointment->date;?></td>
                  <td><?=$appointment->hour;?></td>
               </tr>
               <?php   } ?>
            </tbody>
          </table>
        <?php } else { ?>
        <p>Veuillez vous rapprocher de votre administrateur</p>
        <?php } ?>
      </div>
    </div>
   </div>
  </div>
</div>

<?php require_once('footer.php') ?>
