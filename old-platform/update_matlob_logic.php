<?php
require_once('Connections/db.php');

if (!isset($_SESSION)) {
  session_start();
}

$MM_authorizedUsers = "admin,editor";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  // For security, start by assuming the visitor is NOT authorized.
  $isValid = False;

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
  if (!empty($UserName)) {
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
    // Parse the strings into arrays.
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    // Or, you may restrict access to only certain users based on their username.
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
    $pdo = get_db_connection('goodnews1');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = "UPDATE aqar_need SET madena=?, madena_other=?, aqar_type=?, aqar_type_other=?, namozg=?, namozg_other=?, address=?, mesaha=?, budget=?, tashteeb=?, notes=?, cust_name=?, telephone=?, mobile=?, masdr=?, entry_date=?, modkhel=?, update_date=?, motabaa=?, amalya_type=?, marhala=?, updater=?, door=?, view_v=?, rooms=?, WC=?, kmalyat=?, email=?, whatsapp=?, remember=?, details=?, office_id=?, tashteeb_other=?, amalya_type_other=?, marhala_other=?, call_date=?, action_history=?, `found`=? WHERE code=?";

  $stmt = $pdo->prepare($updateSQL);

  $remember = isset($_POST['remember']) ? 1 : 0;
  $found = isset($_POST['found']) ? 1 : 0;

  $stmt->execute([
      $_POST['madena'],
      $_POST['madena_other'],
      $_POST['aqar_type'],
      $_POST['aqar_type_other'],
      $_POST['namozg'],
      $_POST['namozg_other'],
      $_POST['address'],
      $_POST['mesaha'],
      $_POST['budget'],
      $_POST['tashteeb'],
      $_POST['notes'],
      $_POST['cust_name'],
      $_POST['telephone'],
      $_POST['mobile'],
      $_POST['masdr'],
      $_POST['entry_date'],
      $_POST['modkhel'],
      $_POST['update_date'],
      $_POST['motabaa'],
      $_POST['amalya_type'],
      $_POST['marhala'],
      $_POST['updater'],
      $_POST['door'],
      $_POST['view_v'],
      $_POST['rooms'],
      $_POST['wc'],
      $_POST['kmalyat'],
      $_POST['email'],
      $_POST['whatsapp'],
      $remember,
      $_POST['details'],
      $_POST['officeid'],
      $_POST['tashteeb_other'],
      $_POST['amalya_type_other'],
      $_POST['marhala_other'],
      $_POST['call_date'],
      $_POST['action_history'],
      $found,
      $_POST['code']
  ]);

  $updateGoTo = "index1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
  exit();
}

$dropdown_data = get_dropdown_data($pdo);
extract($dropdown_data);

$colname_Recordset1 = "-1";
if (isset($_GET['code'])) {
  $colname_Recordset1 = $_GET['code'];
}

$query_Recordset1 = "SELECT * FROM aqar_need WHERE code = ?";
$stmt = $pdo->prepare($query_Recordset1);
$stmt->execute([$colname_Recordset1]);
$row_Recordset1 = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRows_Recordset1 = $stmt->rowCount();

$query_Recordsetmadena = "SELECT distinct cityname FROM city ORDER BY cityname ASC";
$Recordsetmadena = $pdo->query($query_Recordsetmadena)->fetchAll();

$query_Recordsetaqar_type = "SELECT * FROM aqar_type_t ORDER BY aqar_type_name ASC";
$Recordsetaqar_type = $pdo->query($query_Recordsetaqar_type)->fetchAll();

$query_Recordsetamalya = "SELECT * FROM amalya_type_t ORDER BY amalya_type_name ASC";
$Recordsetamalya = $pdo->query($query_Recordsetamalya)->fetchAll();

$query_Recordsettashteeb = "SELECT * FROM tashteeb_t ORDER BY tashteeb_name ASC";
$Recordsettashteeb = $pdo->query($query_Recordsettashteeb)->fetchAll();

$query_Recordsetstatus = "SELECT * FROM status_t ORDER BY status_name ASC";
$Recordsetstatus = $pdo->query($query_Recordsetstatus)->fetchAll();

$query_Recordsetview = "SELECT * FROM viewvv ORDER BY viewname ASC";
$Recordsetview = $pdo->query($query_Recordsetview)->fetchAll();

$query_Recordsetnamozg = "SELECT * FROM namozg ORDER BY namozgname ASC";
$Recordsetnamozg = $pdo->query($query_Recordsetnamozg)->fetchAll();

$query_Recordsetmarhala = "SELECT * FROM marhala ORDER BY marhalaname ASC";
$Recordsetmarhala = $pdo->query($query_Recordsetmarhala)->fetchAll();

$query_Recordsetdoor = "SELECT * FROM door ORDER BY doorname ASC";
$Recordsetdoor = $pdo->query($query_Recordsetdoor)->fetchAll();

$query_Recordsetlaqab = "SELECT * FROM laqab ORDER BY laqab_name ASC";
$Recordsetlaqab = $pdo->query($query_Recordsetlaqab)->fetchAll();
?>
