<?php
require_once('Connections/db.php');

if (!isset($_SESSION)) {
  session_start();
}

try {
    $pdo = get_db_connection('goodnews1');
} catch (PDOException $e) {
    // Handle connection error gracefully
    die("Database connection failed: " . $e->getMessage());
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

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "./index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $sql = "INSERT INTO udata (code, madena, madena_other, aqar_type, aqar_type_other, namozg, geem, ain, wow, address, ard_mesaha, mbna_mesaha, matloob, aqd_total, kest_modah, madfoo, alover, kest_year, kest_month, tashteeb, hagz, estlam, nady, wadyaa, notes, cust_title, cust_name, telephone, mobile, masdr, entry_date, modkhel, update_date, motabaa, amalya_type, status, marhala, hadeka, updater, door, modah_ejar, motabaqi, view_v, momz, rooms, WC, ways, meterprice, kmalyat, email, whatsapp, remember, details, office_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    $momz = isset($_POST['momz']) ? 1 : 0;
    $remember = isset($_POST['remember']) ? 1 : 0;

    $stmt->execute([
        $_POST['code'],
        $_POST['madena'],
        $_POST['madena_other'],
        $_POST['aqar_type'],
        $_POST['aqar_type_other'],
        $_POST['namozg'],
        $_POST['geem'],
        $_POST['ain'],
        $_POST['wow'],
        $_POST['address'],
        $_POST['ard_masaha'],
        $_POST['mbna_mesaha'],
        $_POST['matloob'],
        $_POST['aqd_total'],
        $_POST['kest_modah'],
        $_POST['madfoo'],
        $_POST['alover'],
        $_POST['kest_year'],
        $_POST['kest_month'],
        $_POST['tashteeb'],
        $_POST['hagz'],
        $_POST['estlam'],
        $_POST['nady'],
        $_POST['wadyaa'],
        $_POST['notes'],
        $_POST['laqab'],
        $_POST['cust_name'],
        $_POST['telephone'],
        $_POST['mobile'],
        $_POST['masdr'],
        $_POST['entry_date'],
        $_POST['modkhel'],
        $_POST['update_date'],
        $_POST['motabaa'],
        $_POST['amalya_type'],
        $_POST['status'],
        $_POST['marhala'],
        $_POST['hadeka'],
        $_POST['updater'],
        $_POST['door'],
        $_POST['modah_ejar'],
        $_POST['motabaqi'],
        $_POST['view_v'],
        $momz,
        $_POST['rooms'],
        $_POST['wc'],
        $_POST['ways'],
        $_POST['meterprice'],
        $_POST['kmalyat'],
        $_POST['email'],
        $_POST['whatsapp'],
        $remember,
        $_POST['details'],
        $_POST['officeid']
    ]);

  $insertGoTo = "insert.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  exit;
}

$dropdown_data = get_dropdown_data($pdo);
extract($dropdown_data);

$stmt_Recordset1 = $pdo->query("SELECT max(code) as max_code FROM udata");
$row_Recordset1 = $stmt_Recordset1->fetch();
?>
