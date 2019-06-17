<?php
    session_start();
    require_once 'models/database.php';
    require_once 'models/users.php';
    require_once 'models/appointments.php';
    require_once 'controller/appointmentsListCtrl.php';
    require_once 'navbar.php';
  ?>
<div class="pres">
   <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 offset-2">
        <table>
          <thead>
            <tr>
            <!-- <th><a href="ajout-rendezvous.php?id=<?php echo $appointmentUsers->id; ?>">Création de RDV</a></th> -->
              <th>Date/Heure RDV</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Date de naissance</th>
              <th>Téléphone</th>
              <th>Créer RDV</th>
              <th>Modifier RDV</th>
              <th>Supprimer RDV</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($appointmentsList as $appointmentUsers) { ?>
            <tr>
              <td><?= $appointmentUsers->dateHour ?></td>
              <td><?= $appointmentUsers->lastname ?></td>
              <td><?= $appointmentUsers->firstname ?></td>
              <td><?= $appointmentUsers->birthdate ?></td>
              <td><?= wordwrap($appointmentUsers->phone, 2, ' ', true) ?></td>
              <td><a href="add-appointment.php?id=<?php echo $appointmentUsers->userId; ?>">Création RDV</a></td>
              <td><a href="update-appointment.php?id=<?php echo $appointmentUsers->id ?>">Modifier RDV</a></td>
              <td><i data-toggle="modal" data-target="#deleteRdvModal" data-id="<?= $appointmentUsers->id; ?>" data-lastname="<?= $appointmentUsers->lastname ?>" data-firstname="<?= $appointmentUsers->firstname ?>" class="fas fa-trash text-primary"></i></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <div class="modal fade" id="deleteRdvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<?php require_once('footer.php') ?>
