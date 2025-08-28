<?php
require_once('Connections/db.php');

if (!isset($_SESSION)) {
  session_start();
}

$MM_authorizedUsers = "admin,editor";
$MM_donotCheckaccess = "false";

function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  $isValid = False;
  if (!empty($UserName)) {
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    if (in_array($UserGroup, $arrGroups)) {
      $isValid = true;
    }
    if (($strUsers == "") && false) {
      $isValid = true;
    }
  }
  return $isValid;
}

$MM_restrictGoTo = "./not_access.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0)
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo);
  exit;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

try {
    $pdo = get_db_connection('utopia');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = "UPDATE udata_images SET image1=?, image2=?, image3=? WHERE code=?";

  $stmt = $pdo->prepare($updateSQL);

  $stmt->execute([
      $_POST['image1'],
      $_POST['image2'],
      $_POST['image3'],
      $_POST['code']
  ]);

  $updateGoTo = "./view_images.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
  exit();
}

$colname_Recordset1 = "-1";
if (isset($_GET['code'])) {
  $colname_Recordset1 = $_GET['code'];
}

$query_Recordset1 = "SELECT * FROM udata_images WHERE code = ?";
$stmt = $pdo->prepare($query_Recordset1);
$stmt->execute([$colname_Recordset1]);
$row_Recordset1 = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRows_Recordset1 = $stmt->rowCount();
?>
