<?php
include '../connexion.php'; // Connexion à la base de données

$selection_nom = "SELECT * FROM utilisateur";
$affichage_des_noms = mysqli_query($con, $selection_nom);

$options = '<option value="0">Selectionner votre nom</option>';
while ($donnes_noms = mysqli_fetch_array($affichage_des_noms)) {
    $options .= '<option value="' . $donnes_noms['id_utilisateur'] . '">' . $donnes_noms['nom'] . '</option>';
}

echo $options;
?>
