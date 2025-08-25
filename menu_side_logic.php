<?php
require_once('Connections/db.php');

if (!isset($_SESSION)) {
  session_start();
}

try {
    $pdo = get_db_connection('goodnews1');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$query_Recordset1 = "SELECT * FROM aqar_need WHERE remember = 1 and found = 0 ORDER BY entry_date DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$stmt1 = $pdo->prepare($query_limit_Recordset1);
$stmt1->execute();
$Recordset1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$all_Recordset1 = $pdo->query($query_Recordset1);
$totalRows_Recordset1 = $all_Recordset1->rowCount();

$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$query_Recordset2 = "SELECT * FROM udata WHERE remember = 1 ORDER BY entry_date DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$stmt2 = $pdo->prepare($query_limit_Recordset2);
$stmt2->execute();
$Recordset2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$all_Recordset2 = $pdo->query($query_Recordset2);
$totalRows_Recordset2 = $all_Recordset2->rowCount();

$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>
