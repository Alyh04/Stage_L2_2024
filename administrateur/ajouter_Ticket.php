<?php
include '../connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les autres données du formulaire
    $id_utilisateur = $_POST['id_utilisateur'];
    $statut = $_POST['statut'];
    $description = $_POST['description'];
    $observation = $_POST['observation'];

    // Préparer la requête pour insérer un nouveau ticket avec la date de création automatique et date_resolution NULL
    $requete = "INSERT INTO `ticket` (`id_utilisateur`, `date_creation`, `statut`, `date_resolution`, `description`, `observations`) 
                VALUES (?, NOW(), ?, NULL, ?, ?)";
    $stmt = $con->prepare($requete);
    $stmt->bind_param("isss", $id_utilisateur, $statut, $description, $observation);

    if ($stmt->execute()) {
        echo "Ticket ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du ticket.";
    }
}
?>
