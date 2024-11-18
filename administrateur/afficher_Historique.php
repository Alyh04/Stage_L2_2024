<?php
include '../connexion.php';

$requete_cli = "SELECT * FROM `ticket` WHERE statut = 'Resolu'";
$retour = mysqli_query($con, $requete_cli);

$utilisateurs = array();

while ($donnees = mysqli_fetch_assoc($retour)) {
    $utilisateurs[] = $donnees;
}

mysqli_close($con);

// Retourne les données en format JSON
echo json_encode($utilisateurs);
?>
