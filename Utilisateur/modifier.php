<?php
include '../connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les données du formulaire
    $id_ticket = $_POST['id_ticket'];
    $id_utilisateur = $_POST['id_utilisateur'];
    // $date_creation = $_POST['date_creation']; // Ne pas récupérer ni utiliser
    // $date_resolution = $_POST['date_resolution']; // Ne pas récupérer ni utiliser
    $statut = $_POST['statut'];
    $description = $_POST['description'];
    
    // Définir une valeur pour observations
    $observation = "Aucune observation";

    // Préparer la requête pour mettre à jour le ticket sans modifier date_creation et date_resolution
    $requete = "UPDATE `ticket` SET `id_utilisateur` = ?, `statut` = ?, `description` = ?, `observations` = ? WHERE `id_ticket` = ?";
    $stmt = $con->prepare($requete);
    
    // Lier les paramètres, y compris la valeur d'observation
    $stmt->bind_param("ssssi", $id_utilisateur, $statut, $description, $observation, $id_ticket);

    if ($stmt->execute()) {
        echo "Ticket mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du ticket : " . $stmt->error; // Affiche l'erreur pour le débogage
    }
}
?>
