<?php
include '../connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez l'id du ticket
    $id_ticket = $_POST['id_ticket'];

    // Définir le nouveau statut
    $statut = 'Résolu';

    // Préparer la requête pour mettre à jour le ticket en utilisant NOW() pour la date de résolution et vider les observations
    $requete = "UPDATE `ticket` SET `statut` = ?, `date_resolution` = NOW(), `observations` = '' WHERE `id_ticket` = ?";
    $stmt = $con->prepare($requete);
    $stmt->bind_param("si", $statut, $id_ticket);

    if ($stmt->execute()) {
        echo "Ticket résolu avec succès.";
    } else {
        echo "Erreur lors de la résolution du ticket : " . $stmt->error; // Affiche l'erreur pour le débogage
    }
}
?>
