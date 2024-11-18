<?php
include '../connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_utilisateur = intval($_POST['id_utilisateur']); // Récupère l'ID de l'utilisateur à supprimer

    // Préparez la requête pour éviter les injections SQL
    $requete_supprimer = "DELETE FROM `utilisateur` WHERE id_utilisateur = ?";
    $stmt = mysqli_prepare($con, $requete_supprimer);
    mysqli_stmt_bind_param($stmt, 'i', $id_utilisateur);

    if (mysqli_stmt_execute($stmt)) {
        $response = array("success" => true, "message" => "Utilisateur supprimé avec succès.");
    } else {
        $response = array("success" => false, "message" => "Erreur lors de la suppression de l'utilisateur.");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    // Retourne la réponse en JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
