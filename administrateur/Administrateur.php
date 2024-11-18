<?php
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['prenom'])) {
    header('Location: ../Login/index.php'); // Redirigez vers la page de connexion si non connecté
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Gestion de Ticket | Administrateur </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" href="image/utilisateur.png" type="image/x-icon">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <style>
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">Gestion de Ticket | Administrateur</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#accueil">ACCUEIL</a></li>
        <li><a href="#ticket">TICKET</a></li>
        <li><a href="#utilisateur">UTILISATEUR</a></li>
        <li><a href="#historique">HISTORIQUE</a></li>
        <li><a href="../deconnexion.php">Déconnexion</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Gestion de Ticket</h1>
  <?php
  // Code pour l'interface administrateur
  echo "<p>Bienvenue " . $_SESSION['prenom'] . " sur notre plateforme </p>";
  ?>
  <!-- <p>Bienvenue sur notre plateforme </p> -->
</div>

<!-- Container (accueil Section) -->
<div id="accueil" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>SMMC <br><span>Port of Toamasina</span></h2>
      <br>
      <p>
      Bienvenue à la SMMC, le port de Toamasina, où l'engagement envers l'excellence et le service maritime se conjugue avec une riche histoire portuaire. En tant que point névralgique des échanges commerciaux à Madagascar, nous nous efforçons d'offrir une infrastructure moderne et des services adaptés aux besoins de nos partenaires. Notre équipe dévouée est prête à vous accompagner dans vos projets logistiques, garantissant efficacité et sécurité. Ensemble, construisons un avenir prospère et durable pour le développement économique de la région. Nous sommes ravis de vous accueillir et de partager notre passion pour le commerce maritime.</p>
    </div>
    <div class="col-sm-4">
      <img src="image/logo_smmc_port_toamasina.png" alt="logo" width="300" height="100">
    </div>
  </div>
</div>
<br><br><br><br><br><br><br>

<!-- Container (ticket Section) -->
<div id="ticket" class="container-fluid text-center">
  <h2>TICKETS</h2>
  <h4>Les tickets en attente sont là... Veuillez juste appuyer sur le boutton "Résoudre" après résolution.</h4>
  <br>
  <div class="records table-responsive">

    <div class="record-header">

 
</div>

    <div>
        <div class="records table-responsive">
            <table class="table table-bordered" width="100%">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID_UTILISATEUR</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">DATE DE CREATION</th>
                    <th scope="col">STATUT</th>
                    <th scope="col">DATE DE RESOLUTION</th>
                    <th scope="col">OBSERVATION</th>
                    <th scope="col">RESOUDRE</th>
                    <th scope="col">Mettre en attente</th>
                </tr>
              </thead>
              <tbody id="ticketsBody">
              <!-- Les données seront insérées ici par JavaScript -->
              </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</div>
<br><br><br><br><br><br><br>

<!-- Container (utilisateur Section) -->
<div id="utilisateur" class="container-fluid text-center bg-grey">
    <h2>UTILISATEUR</h2><br>
    <h4>LISTE DES UTILISATEUR INSCRITS</h4>

    <div class="records table-responsive">
        <div class="record-header"></div>
        <div>
            <table class="table table-bordered" width="100%" id="utilisateurTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOM</th>
                        <th scope="col">PRENOM</th>
                        <th scope="col">MOT DE PASSE</th>
                        <th scope="col">DEPARTEMENT</th>
                        <th scope="col">SUPPRIMER</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Les données des utilisateurs seront insérées ici par JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br>

<!-- Container (utilisateur Section) -->
<div id="historique" class="container-fluid text-center bg-grey">
    <h2>HISTORIQUE DES TICKETS RESOLU</h2><br>

    <div class="records table-responsive">
        <div class="record-header"></div>
        <div>
            <table class="table table-bordered" width="100%" id="HistoriqueTable">
              
                <thead>
                  
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID_UTILISATEUR</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">DATE DE CREATION</th>
                    <th scope="col">DATE DE RESOLUTION</th>
                    <th scope="col">OBSERVATION</th>
                </tr>
                </thead>
                <tbody>
                    <!-- Les données des utilisateurs seront insérées ici par JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br>

<script>
    $(document).ready(function() {
        // Fonction pour vider les champs du formulaire
        $("#clearBtn").on("click", function() {
            $("#insertForm")[0].reset(); // Réinitialise le formulaire
            $("#id_utilisateur").val(0).trigger('change'); // Réinitialiser le select2
        });
    });
</script>
<script>
var myCenter = new google.maps.LatLng(41.878114, -87.629798);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:12,
  scrollwheel:false,
  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script>
$(document).ready(function(){ 
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

<script>

function fetchTickets() {
    $.ajax({
        url: 'affichage_Ticket.php', // URL de votre fichier PHP
        method: 'GET',
        success: function(data) {
            const ticketsBody = $('#ticketsBody');
            ticketsBody.empty(); // Vider le corps du tableau avant d'ajouter les nouvelles données

            data.forEach(function(ticket) {
                const row = `
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">${ticket.id_ticket}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.id_utilisateur}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.description}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.date_creation}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.statut}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.date_resolution}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.observations}</td>
                        <td style="text-align: center; vertical-align: middle; width: 15%;">
                            <button onclick="resolveTicket(${ticket.id_ticket})"><img src="image/traiter.png" alt=""></button>
                        </td>
                        <td style="text-align: center; vertical-align: middle; width: 15%;">
                            <button onclick="editObservation(${ticket.id_ticket})"><img src="image/wait.png" alt=""></button>
                        </td>

                    </tr>
                `;
                ticketsBody.append(row);
            });
        },
        error: function() {
            console.error('Erreur lors de la récupération des tickets.');
        }
    });
}

// Fonction pour ouvrir le modal et charger l'observation
function editObservation(id_ticket, currentObservation) {
    $('#observationText').val(currentObservation); // Charger l'observation actuelle
    $('#saveObservationButton').data('id_ticket', id_ticket); // Stocker l'id_ticket dans le bouton
    $('#editObservationModal').modal('show'); // Ouvrir le modal
}

// Fonction pour valider la modification de l'observation
$('#saveObservationButton').on('click', function() {
    const id_ticket = $(this).data('id_ticket');
    const newObservation = $('#observationText').val();

    // Effectuer une requête AJAX pour mettre à jour l'observation dans la base de données
    $.ajax({
        url: 'update_observation.php', // URL de votre fichier PHP pour la mise à jour
        method: 'POST',
        data: {
            id_ticket: id_ticket,
            observation: newObservation
        },
        success: function(response) {
            // Mettre à jour l'affichage de l'observation dans le tableau
            fetchTickets(); // Recharger les tickets pour afficher les modifications
            $('#editObservationModal').modal('hide'); // Fermer le modal
            alert('Observation mise à jour avec succès !');
        },
        error: function() {
            console.error('Erreur lors de la mise à jour de l\'observation.');
        }
    });
});

// Fonction pour activer l'édition de l'observation
function editObservation(id_ticket) {
    const obsInput = $(`#obs_${id_ticket}`);
    const displayObs = $(`#displayObs_${id_ticket}`);
    const validateBtn = $(`#validate_${id_ticket}`);

    // Afficher le champ de saisie et masquer le texte affiché
    obsInput.show().val(displayObs.text());
    displayObs.hide();
    validateBtn.show();
}

// Fonction pour valider la modification de l'observation
function validateObservation(id_ticket) {
    const newObservation = $(`#obs_${id_ticket}`).val();

    // Effectuer une requête AJAX pour mettre à jour l'observation dans la base de données
    $.ajax({
        url: 'update_observation.php', // URL de votre fichier PHP pour la mise à jour
        method: 'POST',
        data: {
            id_ticket: id_ticket,
            observation: newObservation
        },
        success: function(response) {
            // Mettre à jour l'affichage et cacher le champ de saisie
            $(`#displayObs_${id_ticket}`).text(newObservation).show();
            $(`#obs_${id_ticket}`).hide();
            $(`#validate_${id_ticket}`).hide();
            alert('Observation mise à jour avec succès !');
        },
        error: function() {
            console.error('Erreur lors de la mise à jour de l\'observation.');
        }
    });
}


function resolveTicket(id_ticket) {
    $.ajax({
        url: 'resolu.php', // Nom du fichier PHP qui va traiter la requête
        method: 'POST',
        data: { id_ticket: id_ticket }, // Envoyer l'id du ticket
        success: function(response) {
            alert(response); // Afficher le message de succès ou d'erreur
            fetchTickets(); // Rechargez la liste des tickets
        },
        error: function() {
            console.error('Erreur lors de la résolution du ticket.');
        }
    });
}


        // Appeler fetchTickets toutes les 200 ms
        setInterval(fetchTickets, 200);
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


function editObservation(id_ticket) {
    // Message à mettre à jour
    const new_observation = "Veuillez patienter car le ticket est toujours en attente pour cause de sa complications.";

    // Confirmation avant de mettre à jour
    if (confirm("Êtes-vous sûr de vouloir mettre à jour l'observation de ce ticket ?")) {
        $.ajax({
            url: 'Modification_Observation.php', // L'URL de votre script PHP
            method: 'POST', // Méthode HTTP
            data: { id_ticket: id_ticket, observation: new_observation }, // Données à envoyer
            dataType: 'json', // Type de données attendues en retour
            success: function(response) {
                if (response.success) {
                    alert(response.message); // Affiche un message de succès
                    updateTickets(); // Met à jour la liste des tickets (assurez-vous que cette fonction est définie)
                } else {
                    alert('Erreur: ' + response.message); // Affiche un message d'erreur
                }
            },
            error: function() {
                alert('Erreur lors de la mise à jour de l\'observation.');
            }
        });
    }
}





    function updateUtilisateurs() {
        $.ajax({
            url: 'afficher_Utilisateur.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const tbody = $('#utilisateurTable tbody');
                tbody.empty(); // Efface les lignes existantes

                // Ajoute les nouvelles lignes
                data.forEach(function(utilisateur) {
                    tbody.append(`
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">${utilisateur.id_utilisateur}</td>
                            <td style="text-align: center; vertical-align: middle;">${utilisateur.nom}</td>
                            <td style="text-align: center; vertical-align: middle;">${utilisateur.prenom}</td>
                            <td style="text-align: center; vertical-align: middle;">${utilisateur.Mdp_utilisateur}</td>
                            <td style="text-align: center; vertical-align: middle;">${utilisateur.departement}</td>
                            <td style="text-align: center; vertical-align: middle; width: 15%;">
                                <button onclick="deleteUtilisateur(${utilisateur.id_utilisateur})"><img src="image/person-dragging-bag.png" alt=""></button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function() {
                console.error('Erreur lors de la récupération des données des utilisateurs.');
            }
        });
    }

    // Met à jour la liste des utilisateurs toutes les 0,2 secondes
    setInterval(updateUtilisateurs, 200);

    function updateHistorique() {
        $.ajax({
            url: 'afficher_Historique.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const tbody = $('#HistoriqueTable tbody');
                tbody.empty(); // Efface les lignes existantes

                // Ajoute les nouvelles lignes
                data.forEach(function(ticket) {
                    tbody.append(`
                        <tr>
                         <td style="text-align: center; vertical-align: middle;">${ticket.id_ticket}</td>
                         <td style="text-align: center; vertical-align: middle;">${ticket.id_utilisateur}</td>
                         <td style="text-align: center; vertical-align: middle;">${ticket.description}</td>
                         <td style="text-align: center; vertical-align: middle;">${ticket.date_creation}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.date_resolution}</td>
                         <td style="text-align: center; vertical-align: middle;">${ticket.observations}</td>
                        </tr>
                    `);
                });
            },
            error: function() {
                console.error('Erreur lors de la récupération des données des utilisateurs.');
            }
        });
    }

    // Met à jour la liste des utilisateurs toutes les 0,2 secondes
    setInterval(updateHistorique, 200);

</script>

<script>
  function deleteUtilisateur(id_utilisateur) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
        $.ajax({
            url: 'supprimer_utilisateur.php', // L'URL de votre script PHP
            method: 'POST', // Méthode HTTP
            data: { id_utilisateur: id_utilisateur }, // Données à envoyer
            dataType: 'json', // Type de données attendues en retour
            success: function(response) {
                if (response.success) {
                    alert(response.message); // Affiche un message de succès
                    updateUtilisateurs(); // Met à jour la liste des utilisateurs
                } else {
                    alert('Erreur: ' + response.message); // Affiche un message d'erreur
                }
            },
            error: function() {
                alert('Erreur lors de la suppression de l\'utilisateur.'); // Message d'erreur générique
            }
        });
    }
}
</script>


</body>
</html>

