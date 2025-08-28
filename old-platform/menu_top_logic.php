<?php
require_once('Connections/db.php');

try {
    $pdo = get_db_connection('goodnews1');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$query_Recordset9 = "SELECT * FROM website";
$stmt = $pdo->prepare($query_Recordset9);
$stmt->execute();
$Recordset9 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalRows_Recordset9 = $stmt->rowCount();
?>
