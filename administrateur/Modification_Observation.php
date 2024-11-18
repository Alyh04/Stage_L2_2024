<?php
include '../connexion.php'; // Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_ticket = intval($_POST['id_ticket']); // Récupère l'ID du ticket
    $observation = $_POST['observation']; // Récupère la nouvelle observation

    // Préparez la requête pour éviter les injections SQL
    $requete_update = "UPDATE `ticket` SET observations = ? WHERE id_ticket = ?";
    $stmt = mysqli_prepare($con, $requete_update);
    mysqli_stmt_bind_param($stmt, 'si', $observation, $id_ticket);

    if (mysqli_stmt_execute($stmt)) {
        $response = array("success" => true, "message" => "Observation mise à jour avec succès.");
    } else {
        $response = array("success" => false, "message" => "Erreur lors de la mise à jour de l'observation.");
    }

    mysqli_stmt_close($stmt); // Ferme la déclaration préparée
    mysqli_close($con); // Ferme la connexion à la base de données

    // Retourne la réponse en JSON
    header('Content-Type: application/json');
    echo json_encode($response); // Envoie la réponse au format JSON
}
?>
