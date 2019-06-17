$(function(){
   $('.caption, .navbar').hide(0).delay(0).fadeIn(3000);

});

//Carousel de postures
new Vue({
  el: '#carousel',
  data: {
    slides: 7
  },
  components: {
    'carousel-3d': Carousel3d.Carousel3d,
    'slide': Carousel3d.Slide
  }
});

$(function() {
     $('a[href=#top]').click(function(){
          $('html, body').animate({scrollTop:0}, 'slow');
          return false;
     });
});


$('#phone').mask('00 00 00 00 00');
$('#post').mask('00000');

$(function () {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteModal').on('show.bs.modal', function (event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
        var userId = button.data('id');
        var userLastname = button.data('lastname');
        var userFirstname = button.data('firstname');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').empty().append('<p>Êtes-vous sûr de vouloir supprimer ' + userLastname + ' ' + userFirstname + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="users-list.php?deleteId=' + userId + '" class="btn btn-danger">Supprimer ce compte ?</a>');
    })
})

$(function () {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteProfModal').on('show.bs.modal', function (event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
        var userId = button.data('id');
        var userLastname = button.data('lastname');
        var userFirstname = button.data('firstname');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').empty().append('<p>Êtes-vous sûr de vouloir supprimer ' + userLastname + ' ' + userFirstname + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="professors-list.php?deleteId=' + userId + '" class="btn btn-danger">Supprimer ce compte ?</a>');
    })
})

$(function () {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteUserModal').on('show.bs.modal', function (event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
        var userId = button.data('id');
        var userLastname = button.data('lastname');
        var userFirstname = button.data('firstname');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').empty().append('<p>Êtes-vous sûr de vouloir supprimer ' + userLastname + ' ' + userFirstname + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="update-user.php?deleteId=' + userId + '" class="btn btn-danger">Supprimer ce compte</a>');
    })
})

$(function () {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteProffesorModal').on('show.bs.modal', function (event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
        var userId = button.data('id');
        var userLastname = button.data('lastname');
        var userFirstname = button.data('firstname');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').empty().append('<p>Êtes-vous sûr de vouloir supprimer ' + userLastname + ' ' + userFirstname + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="update-prof.php?deleteId=' + userId + '" class="btn btn-danger">Supprimer ce compte</a>');
    })
})

$(function () {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteRdvModal').on('show.bs.modal', function (event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
        var userId = button.data('id');
        var userLastname = button.data('lastname');
        var userFirstname = button.data('firstname');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').empty().append('<p>Êtes-vous sûr de vouloir supprimer ce RDV pour ' + userLastname + ' ' + userFirstname + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="appointments-list.php?deleteId=' + userId + '" class="btn btn-danger">Supprimer ce RDV</a>');
    })
})
