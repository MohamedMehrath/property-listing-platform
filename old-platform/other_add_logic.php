<?php
require_once('Connections/db.php');

if (!isset($_SESSION)) {
  session_start();
}

$MM_authorizedUsers = "admin";
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
    $pdo_utopia = get_db_connection('utopia');
    $pdo_goodnews1 = get_db_connection('goodnews1');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ((isset($_POST["MM_insert"]))) {
    $formName = $_POST["MM_insert"];
    $pdoconn = $pdo_utopia;
    $sql = "";
    $params = [];

    switch($formName) {
        case "form1":
            $sql = "INSERT INTO city (cityname) VALUES (?)";
            $params = [$_POST['cityname']];
            break;
        case "form2":
            $sql = "INSERT INTO aqar_type_t (aqar_type_name) VALUES (?)";
            $params = [$_POST['aqar_type_name']];
            break;
        case "form3":
            $sql = "INSERT INTO amalya_type_t (amalya_type_name) VALUES (?)";
            $params = [$_POST['amalya_type_name']];
            break;
        case "form4":
            $sql = "INSERT INTO tashteeb_t (tashteeb_name) VALUES (?)";
            $params = [$_POST['tashteeb_name']];
            break;
        case "form5":
            $sql = "INSERT INTO status_t (status_name) VALUES (?)";
            $params = [$_POST['statusname']];
            break;
        case "form6":
            $pdoconn = $pdo_goodnews1;
            $sql = "INSERT INTO website (url, sitename) VALUES (?, ?)";
            $params = [$_POST['url'], $_POST['sitename']];
            break;
        case "form8":
            $pdoconn = $pdo_goodnews1;
            $sql = "INSERT INTO namozg (namozgname) VALUES (?)";
            $params = [$_POST['namozg']];
            break;
        case "form9":
            $pdoconn = $pdo_goodnews1;
            $sql = "INSERT INTO marhala (marhalaname) VALUES (?)";
            $params = [$_POST['marhala']];
            break;
        case "form10":
            $pdoconn = $pdo_goodnews1;
            $sql = "INSERT INTO door (doorname) VALUES (?)";
            $params = [$_POST['door']];
            break;
        case "form11":
            $pdoconn = $pdo_goodnews1;
            $sql = "INSERT INTO viewvv (viewname) VALUES (?)";
            $params = [$_POST['view']];
            break;
        case "form12":
            $pdoconn = $pdo_goodnews1;
            $sql = "INSERT INTO laqab (laqab_name) VALUES (?)";
            $params = [$_POST['laqab']];
            break;
    }

    if ($sql) {
        $stmt = $pdoconn->prepare($sql);
        $stmt->execute($params);
    }

    $insertGoTo = "other_add.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
    exit;
}

$Qcity = $pdo_utopia->query("SELECT * FROM city")->fetchAll(PDO::FETCH_ASSOC);
$Qaqartype = $pdo_utopia->query("SELECT * FROM aqar_type_t")->fetchAll(PDO::FETCH_ASSOC);
$Qamalya_type = $pdo_utopia->query("SELECT * FROM amalya_type_t")->fetchAll(PDO::FETCH_ASSOC);
$Qtashteeb = $pdo_utopia->query("SELECT * FROM tashteeb_t")->fetchAll(PDO::FETCH_ASSOC);
$Qstatus = $pdo_utopia->query("SELECT * FROM status_t")->fetchAll(PDO::FETCH_ASSOC);

$Recordset2 = $pdo_goodnews1->query("SELECT * FROM website")->fetchAll(PDO::FETCH_ASSOC);
$Recordsetnamozg = $pdo_goodnews1->query("SELECT * FROM namozg ORDER BY namozgname ASC")->fetchAll(PDO::FETCH_ASSOC);
$Recordsetlaqab = $pdo_goodnews1->query("SELECT * FROM laqab ORDER BY laqab_name ASC")->fetchAll(PDO::FETCH_ASSOC);
$Recordsetview = $pdo_goodnews1->query("SELECT * FROM viewvv ORDER BY viewname ASC")->fetchAll(PDO::FETCH_ASSOC);
$Recordsetmarhala = $pdo_goodnews1->query("SELECT * FROM marhala ORDER BY marhalaname ASC")->fetchAll(PDO::FETCH_ASSOC);
$Recordsetdoor = $pdo_goodnews1->query("SELECT * FROM door ORDER BY doorname ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
