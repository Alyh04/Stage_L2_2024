<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'gestion_de_ticket';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp_utilisateur = $_POST['mdp_utilisateur']; // Aucun hachage, juste le mot de passe brut
    $departement = $_POST['departement'];
    $statut = $_POST['statut'];

    if ($statut === 'Utilisateur') {
        // Insertion dans la table utilisateur
        $sql = "INSERT INTO utilisateur (nom, prenom, Mdp_utilisateur, departement, statut) VALUES (?, ?, ?, ?, ?)";
    } elseif ($statut === 'Administrateur') {
        // Insertion dans la table administrateur
        $sql = "INSERT INTO administrateur (nom, prenom, mdp_admin, departement, statut) VALUES (?, ?, ?, ?, ?)";
    } else {
        die("Statut non reconnu.");
    }

    // Préparer la requête SQL d'insertion
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nom, $prenom, $mdp_utilisateur, $departement, $statut);

    if ($stmt->execute()) {
        header("Location: index.php");
        echo "Utilisateur ajouté avec succès !";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Fermer la requête et la connexion
    $stmt->close();
    $conn->close();
}
?>
