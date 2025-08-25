<?php
require_once('Connections/db.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

ini_set('max_execution_time', 0);
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

  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

$currentPage = $_SERVER["PHP_SELF"];

try {
    $pdo_utopia = get_db_connection('utopia');
    $pdo_goodnews1 = get_db_connection('goodnews1');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$dropdown_data = get_dropdown_data($pdo_utopia);
extract($dropdown_data);

// Featured properties
$maxRows_Recordsetmomz = 5;
$pageNum_Recordsetmomz = 0;
if (isset($_GET['pageNum_Recordsetmomz'])) {
  $pageNum_Recordsetmomz = $_GET['pageNum_Recordsetmomz'];
}
$startRow_Recordsetmomz = $pageNum_Recordsetmomz * $maxRows_Recordsetmomz;

$query_Recordsetmomz = "SELECT * FROM udata WHERE momz = 1 ORDER BY entry_date DESC";
$stmt_momz = $pdo_utopia->prepare($query_Recordsetmomz . " LIMIT :start, :max");
$stmt_momz->bindParam(':start', $startRow_Recordsetmomz, PDO::PARAM_INT);
$stmt_momz->bindParam(':max', $maxRows_Recordsetmomz, PDO::PARAM_INT);
$stmt_momz->execute();
$Recordsetmomz = $stmt_momz->fetchAll(PDO::FETCH_ASSOC);

$query_all_momz = "SELECT * FROM udata WHERE momz = 1";
$stmt_all_momz = $pdo_utopia->query($query_all_momz);
$totalRows_Recordsetmomz = $stmt_all_momz->rowCount();
$totalPages_Recordsetmomz = ceil($totalRows_Recordsetmomz/$maxRows_Recordsetmomz)-1;

// Website info
$query_Recordset9 = "SELECT * FROM website";
$Recordset9 = $pdo_goodnews1->query($query_Recordset9)->fetchAll(PDO::FETCH_ASSOC);
$row_Recordset9 = $Recordset9[0] ?? null;
$totalRows_Recordset9 = count($Recordset9);

// New featured properties
$query_Recordsetmomz_new = "SELECT * FROM udata WHERE momz = 1";
$Recordsetmomz_new = $pdo_goodnews1->query($query_Recordsetmomz_new)->fetchAll(PDO::FETCH_ASSOC);
$row_Recordsetmomz_new = $Recordsetmomz_new[0] ?? null;
$totalRows_Recordsetmomz_new = count($Recordsetmomz_new);

// Main search query
$sql = "SELECT * FROM udata";
$conditions = [];
$parameters = [];

if (!empty($_POST['madena'])) { $conditions[] = "madena = ?"; $parameters[] = $_POST['madena']; }
if (!empty($_POST['aqar_type'])) { $conditions[] = "aqar_type = ?"; $parameters[] = $_POST['aqar_type']; }
if (!empty($_POST['amalya_type'])) { $conditions[] = "amalya_type = ?"; $parameters[] = $_POST['amalya_type']; }
if (!empty($_POST['status'])) { $conditions[] = "status = ?"; $parameters[] = $_POST['status']; }
if (!empty($_POST['tashteeb'])) { $conditions[] = "tashteeb = ?"; $parameters[] = $_POST['tashteeb']; }
if (!empty($_POST['price_from']) && !empty($_POST['price_to'])) { $conditions[] = "matloob BETWEEN ? AND ?"; $parameters[] = $_POST['price_from']; $parameters[] = $_POST['price_to']; }
if (!empty($_POST['mesaha_from']) && !empty($_POST['mesaha_to'])) { $conditions[] = "mbna_mesaha BETWEEN ? AND ?"; $parameters[] = $_POST['mesaha_from']; $parameters[] = $_POST['mesaha_to']; }
if (!empty($_POST['hadeka_from']) && !empty($_POST['hadeka_to'])) { $conditions[] = "hadeka BETWEEN ? AND ?"; $parameters[] = $_POST['hadeka_from']; $parameters[] = $_POST['hadeka_to']; }
if (!empty($_POST['code'])) { $conditions[] = "code = ?"; $parameters[] = $_POST['code']; }
if (!empty($_POST['marhala'])) { $conditions[] = "marhala LIKE ?"; $parameters[] = "%".$_POST['marhala']."%"; }
if (!empty($_POST['namozag'])) { $conditions[] = "namozg = ?"; $parameters[] = $_POST['namozag']; }
if (!empty($_POST['customer_name'])) { $conditions[] = "cust_name LIKE ?"; $parameters[] = "%".$_POST['customer_name']."%"; }
if (!empty($_POST['mobile'])) { $conditions[] = "mobile = ? OR telephone = ?"; $parameters[] = $_POST['mobile']; $parameters[] = $_POST['mobile']; }
if (!empty($_POST['geem'])) { $conditions[] = "geem = ?"; $parameters[] = $_POST['geem']; }
if (!empty($_POST['ain'])) { $conditions[] = "ain = ?"; $parameters[] = $_POST['ain']; }
if (!empty($_POST['door'])) { $conditions[] = "door = ?"; $parameters[] = $_POST['door']; }
if (!empty($_POST['wow'])) { $conditions[] = "wow = ?"; $parameters[] = $_POST['wow']; }

if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(' AND ', $conditions);
}

if(isset($_POST['top100']) && $_POST['top100'] != ""){
    $allowed_order_by = ['entry_date', 'update_date', 'code', 'matloob'];
    $order_by = $_POST['ordby'] ?? 'entry_date';
    $order_type = strtoupper($_POST['ordtype'] ?? 'DESC');
    if (in_array($order_by, $allowed_order_by)) {
        $sql .= " ORDER BY $order_by $order_type";
    }
    $sql .= " LIMIT ?";
    $parameters[] = (int)$_POST['top100'];
} else {
    $sql .= " ORDER BY update_date DESC";
}

$stmt_Recordset1 = $pdo_utopia->prepare($sql);
$stmt_Recordset1->execute($parameters);
$Recordset1 = $stmt_Recordset1->fetchAll(PDO::FETCH_ASSOC);
$row_Recordset1 = $Recordset1[0] ?? null;
$totalRows_Recordset1 = $stmt_Recordset1->rowCount();

// Pagination
$maxRows_Recordset1 = 50;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false &&
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
