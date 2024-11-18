<?php
include '../connexion.php';

// Vérifiez si un id_ticket a été passé dans la requête GET
if (isset($_GET['id_ticket'])) {
    $id_ticket = $_GET['id_ticket'];

    // Préparer la requête pour récupérer un ticket spécifique
    $requete_ticket = "SELECT * FROM `ticket` WHERE `id_ticket` = ?";
    $stmt = $con->prepare($requete_ticket);
    $stmt->bind_param("i", $id_ticket); // Assurez-vous que l'ID est un entier
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
        // Renvoyer les données du ticket en JSON
        header('Content-Type: application/json');
        echo json_encode($ticket);
    } else {
        // Si aucun ticket n'est trouvé, renvoyer un message d'erreur
        header('HTTP/1.1 404 Not Found');
        echo json_encode(["message" => "Ticket non trouvé."]);
    }
} else {
    // Récupérer tous les tickets si aucun id_ticket n'est spécifié
    $requete_cli = "SELECT * FROM `ticket`";
    $retour = mysqli_query($con, $requete_cli);
    $tickets = [];

    while ($donnees = mysqli_fetch_array($retour)) {
        $tickets[] = $donnees;
    }

    // Renvoyer les données en JSON
    header('Content-Type: application/json');
    echo json_encode($tickets);
}

mysqli_close($con);
?>
