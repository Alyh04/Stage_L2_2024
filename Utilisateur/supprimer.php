<?php
include '../connexion.php';

if (isset($_POST['id_ticket'])) {
    $id_ticket = $_POST['id_ticket'];
    $requete_delete = "DELETE FROM `ticket` WHERE `id_ticket` = ?";
    $stmt = mysqli_prepare($con, $requete_delete);
    mysqli_stmt_bind_param($stmt, 'i', $id_ticket);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>
