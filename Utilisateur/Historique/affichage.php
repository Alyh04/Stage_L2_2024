<?php
$host = 'localhost';
$dbname = 'gestion_de_ticket';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ticket";
    $stmt = $pdo->query($sql);

    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tickets);

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
