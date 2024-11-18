<?php
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['prenom'])) {
    header('Location: ../Login/index.php'); // Redirigez vers la page de connexion si non connecté
    exit();
}

// Code pour l'interface administrateur
// echo "Bienvenue, " . $_SESSION['prenom'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Gestion de Ticket | Utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" href="image/logo.png" type="image/x-icon">
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
      <a class="navbar-brand" href="#myPage">Gestion de Ticket | Utilisateur</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#accueil">ACCUEIL</a></li>
        <li><a href="#ticket">TICKET</a></li>
        <li><a href="#ajout">AJOUT D'UN TICKET</a></li>
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
  <!-- <h4>Tous les tickets</h4> -->
  <br>
  <div class="records table-responsive">

    <div class="record-header">

 
</div>

<div>
<form class="form-inline">
    <input type="text" id="searchInput" class="form-control" size="50" placeholder="Recherche par Description ou par Observation" required>
</form>
<div id="searchResults"></div> <!-- Pour afficher les résultats de la recherche -->

<br>

<div class="records table-responsive">
    <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID_UTILISATEUR</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">STATUT</th>
                    <th scope="col">OBSERVATION</th>
                    <th scope="col">ACTIONS</th>
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
  <br><br><br><br><br><br><br>
</div>



<!-- Container (ajout Section) -->
<form method="POST" id="insertForm">
    <div id="ajout" class="container-fluid bg-grey">
        <h2 class="text-center">Veuillez remplir les informations</h2>
        <div class="row">
            <div>
                <div class="row">
                    <input type="hidden" id="id_ticket" name="id_ticket" value="">
                    <div class="col-sm-6 form-group">
                        <label for="id_utilisateur">Identifiant de l'utilisateur</label>
                        <select class="select2" style="width: 100%;" name="id_utilisateur" id="id_utilisateur">
                            <option value="0">Sélectionner votre nom</option>
                            <?php     
                                include '../connexion.php';
                                $selection_nom = "SELECT * from utilisateur";
                                $affichage_des_noms = mysqli_query($con, $selection_nom);
                                while ($donnes_noms = mysqli_fetch_array($affichage_des_noms)) {
                            ?>
                                <option value="<?php echo $donnes_noms['id_utilisateur']; ?>"><?php echo $donnes_noms['nom']; ?></option>
                            <?php
                                }   
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="statut">Statut</label>
                        <select class="select2" style="width: 100%;" name="statut" id="statut">
                            <option value="En attente" selected>En attente</option>
                            <option value="Résolu">Résolu</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="description">Description du problème</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description du problème" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit" id="insertBtn"><img src="image/plus.png" alt="plus"> Ajouter</button>
                        <button class="btn btn-default pull-right" type="submit" id="editBtn"><img src="image/edit.png" alt="edit"> Modifier</button>
                        <button class="btn btn-default pull-left" type="button" id="clearBtn"><img src="image/rien.png" alt=""> Vider les champs</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <br><br><br><br>
</form>

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

  function reset_input()
    {
        document.getElementById("id_utilisateur").value = '';
        document.getElementById("date_creation").value = '';
        document.getElementById("statut").value = '';
        document.getElementById("date_resolution").value = '';
        document.getElementById("observation").value = '';
         $('html, body').animate({
        scrollTop: $("#ajout").offset().top
    }, 1500);
    }
})
</script>

<script>
function fetchTickets() {
    $.ajax({
        url: 'affichage.php', // URL de votre fichier PHP
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
                        <td style="text-align: center; vertical-align: middle;">${ticket.statut}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.observations}</td>
                        <td style="text-align: center; vertical-align: middle; width: 15%;">
                            <button onclick='editTicket(${ticket.id_ticket})'><img src="image/pen-square.png" alt=""></button>
                            <button onclick="deleteTicket(${ticket.id_ticket})"><img src="image/person-dragging-bag.png" alt="Supprimer"></button>
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

function editTicket(id_ticket) {
    $.ajax({
        url: 'affichage.php?id_ticket=' + id_ticket, // Récupère les données du ticket
        method: 'GET',
        success: function(data) {
            // Remplissez les champs du formulaire avec les données du ticket
            $('#id_ticket').val(data.id_ticket);
            $('#id_utilisateur').val(data.id_utilisateur);
            $('#date_creation').val(data.date_creation);
            $('#statut').val(data.statut);
            $('#date_resolution').val(data.date_resolution);
            $('#description').val(data.description);
            $('#observation').val(data.observations);
            
            // Affichez le bouton Modifier et cachez le bouton Ajouter
            $('#insertBtn').hide();
            $('#editBtn').show();

            document.getElementById('ajout').scrollIntoView({ behavior: 'smooth' });
        },
        error: function() {
            console.error('Erreur lors de la récupération des données du ticket.');
        }
    });
}

$(document).ready(function() {
    $('#insertForm').on('submit', function(e) {
        e.preventDefault(); // Empêcher l'envoi normal du formulaire

        // Vérifiez si le bouton Modifier est visible
        if ($('#editBtn').is(':visible')) {
            // Modification
            $.ajax({
                url: 'modifier.php', // Le fichier PHP pour traiter la modification
                method: 'POST',
                data: $(this).serialize(), // Sérialise les données du formulaire
                success: function(response) {
                    alert(response); // Affichez un message de succès ou d'erreur
                    fetchTickets(); // Rechargez les tickets
                    $('#insertForm')[0].reset(); // Réinitialisez le formulaire
                    $('#editBtn').hide(); // Cachez le bouton Modifier
                    $('#insertBtn').show(); // Affichez le bouton Ajouter

                    document.getElementById('ticket').scrollIntoView({ behavior: 'smooth' });
                }
            });
        } else {
            // Ajout
            $.ajax({
                url: 'ajouter.php', // Le fichier PHP pour traiter l'ajout
                method: 'POST',
                data: $(this).serialize(), // Sérialise les données du formulaire
                success: function(response) {
                    alert(response); // Affichez un message de succès ou d'erreur
                    fetchTickets(); // Rechargez les tickets
                    $('#insertForm')[0].reset(); // Réinitialisez le formulaire

                    document.getElementById('ticket').scrollIntoView({ behavior: 'smooth' });
                }
            });
        }
    });

    // Cachez le bouton Modifier au départ
    $('#editBtn').hide();
});



function deleteTicket(id_ticket) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')) {
        $.ajax({
            url: 'supprimer.php', // URL de votre fichier PHP pour supprimer
            method: 'POST',
            data: { id_ticket: id_ticket },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    alert('Ticket supprimé avec succès.');
                    fetchTickets(); // Actualiser le tableau après la suppression
                } else {
                    alert('Erreur lors de la suppression : ' + result.error);
                }
            },
            error: function() {
                console.error('Erreur lors de la requête de suppression.');
            }
        });
    }
}

        // Appeler fetchTickets toutes les 200 ms
        setInterval(fetchTickets, 200);
    </script>

<script>
  document.getElementById('searchInput').addEventListener('input', function() {
    const searchInput = this.value; // Récupère la valeur de l'input

    if (searchInput.length > 0) { // Ne lance la recherche que si l'input n'est pas vide
        searchTickets(searchInput);
    } else {
        document.getElementById('searchResults').innerHTML = ''; // Vide les résultats si l'input est vide
    }
});

function searchTickets(searchInput) {
    $.ajax({
        url: 'recherche.php', // Le fichier PHP qui gère la recherche
        method: 'POST',
        data: { search: searchInput }, // Envoie la recherche au fichier PHP
        dataType: 'json',
        success: function(response) {
            displaySearchResults(response); // Appelle la fonction pour afficher les résultats
        },
        error: function() {
            alert('Erreur lors de la recherche des tickets.');
        }
    });
}

function displaySearchResults(tickets) {
    const resultsDiv = document.getElementById('searchResults');
    resultsDiv.innerHTML = ''; // Vide les résultats précédents

    if (tickets.length > 0) {
        // Crée un tableau pour afficher les résultats
        let html = '<table class="table table-bordered" width="100%"><thead><tr><th>#</th><th>ID_UTILISATEUR</th><th>DESCRIPTION</th><th>STATUT</th></tr></thead><tbody>';
        tickets.forEach(ticket => {
            html += `<tr>
                        <td style="text-align: center; vertical-align: middle;">${ticket.id_ticket}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.id_utilisateur}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.description}</td>
                        <td style="text-align: center; vertical-align: middle;">${ticket.statut}</td>
                     </tr>`;
        });
        html += '</tbody></table>';
        resultsDiv.innerHTML = html; // Affiche les résultats
    } else {
        resultsDiv.innerHTML = '<p>Aucun résultat trouvé.</p>'; // Message si aucun résultat
    }
}

</script>

</body>
</html>

