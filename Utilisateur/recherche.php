<?php
include "../connexion.php";

if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($con, $_POST['search']);
    
    // Requête pour rechercher les tickets
    $sql = "SELECT * FROM ticket WHERE description LIKE '%$search%' OR statut LIKE '%$search%'";
    $result = mysqli_query($con, $sql);

    // Initialise un tableau pour stocker les résultats
    $tickets = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tickets[] = $row; // Ajoute chaque ticket au tableau
        }
    }

    // Renvoie les résultats en format JSON
    echo json_encode($tickets);
}
?>


