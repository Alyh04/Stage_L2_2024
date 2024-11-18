<?php
$host = 'localhost';
$dbname = 'gestion_de_ticket';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vider la table traitement
    $sql = "TRUNCATE TABLE traitement";
    $pdo->exec($sql);
    echo "La table traitement a été vidée avec succès.";
    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
