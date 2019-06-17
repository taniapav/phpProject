<?php
session_start();
require_once 'models/database.php';
require_once 'models/users.php';
require_once 'controller/usersListCtrl.php';
require_once 'navbar.php';
 ?>
 <div class="pres">
   <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 offset-2">
       <table class="text-center">
         <thead>
           <tr>
             <th>Nom</th>
             <th>Prénom</th>
             <th>date de naissance</th>
             <th>Age</th>
             <th>Modification du profil</th>
             <th>Supprimer Compte</th>
           </tr>
         </thead>
         <tbody>

             <?php foreach ($usersList as $users) { ?>
             <tr>
               <td><?= $users->lastname ?></td>
               <td><?= $users->firstname ?></td>
               <td><?= $users->birthdate ?></td>
               <td><?= $users->age ?></td>
               <td><a href="users-profile.php?id=<?php echo $users->id; ?>">Modifier Compte</a></td>
               <td><i data-toggle="modal" data-target="#deleteModal" data-id="<?= $users->id; ?>" data-lastname="<?= $users->lastname ?>" data-firstname="<?= $users->firstname ?>" class="fas fa-trash text-primary"></i></td>
             </tr>
           <?php } ?>
           </tbody>
         </table>

         <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!--                 <form action="update-user.php" method="POST">
                 </form>-->
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
