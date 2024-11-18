<?php
// access.php
session_start();

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
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $password = $_POST['password'];

    // Vérification dans la table administrateur
    $sql_admin = "SELECT * FROM administrateur WHERE nom = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $nomUtilisateur);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
        $admin = $result_admin->fetch_assoc();
        
        // Vérification du mot de passe (sans hachage)
        if ($password === $admin['mdp_admin']) {
            $_SESSION['prenom'] = $admin['prenom'];
            $_SESSION['statut'] = 'Administrateur'; // Statut fixé manuellement
            
            // Redirection vers l'interface administrateur
            header("Location: ../administrateur/Administrateur.php");
            exit();
        } else {
            echo "Mot de passe incorrect pour l'administrateur.";
        }
    } else {
        // Si non trouvé dans la table administrateur, vérifier dans la table utilisateur
        $sql_user = "SELECT * FROM utilisateur WHERE nom = ?";
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bind_param("s", $nomUtilisateur);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            $user = $result_user->fetch_assoc();
            
            // Vérification du mot de passe (sans hachage)
            if ($password === $user['Mdp_utilisateur']) {
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['statut'] = 'Utilisateur'; // Statut fixé manuellement
                
                // Redirection vers l'interface utilisateur
                header("Location: ../Utilisateur/Utilisateur.php");
                exit();
            } else {
                echo "Mot de passe incorrect pour l'utilisateur.";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }

        $stmt_user->close();
    }

    $stmt_admin->close();
    $conn->close();
}
?>
