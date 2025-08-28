<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

try {
    $pdo_utopia = get_db_connection('utopia');
    $pdo_goodnews1 = get_db_connection('goodnews1');
} catch (PDOException $e) {
    // Handle connection error gracefully
    die("Database connection failed: " . $e->getMessage());
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

  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

$currentPage = $_SERVER["PHP_SELF"];

$dropdown_data = get_dropdown_data($pdo_utopia);
extract($dropdown_data);

$maxRows_Recordsetmomz = 5;
$pageNum_Recordsetmomz = 0;
if (isset($_GET['pageNum_Recordsetmomz'])) {
  $pageNum_Recordsetmomz = $_GET['pageNum_Recordsetmomz'];
}
$startRow_Recordsetmomz = $pageNum_Recordsetmomz * $maxRows_Recordsetmomz;

$query_Recordsetmomz = "SELECT * FROM udata WHERE momz = 1 ORDER BY entry_date DESC";
$stmt_momz = $pdo_utopia->prepare($query_Recordsetmomz . " LIMIT ?, ?");
$stmt_momz->execute([$startRow_Recordsetmomz, $maxRows_Recordsetmomz]);
$Recordsetmomz = $stmt_momz->fetchAll();
$row_Recordsetmomz = $Recordsetmomz[0] ?? null;

if (isset($_GET['totalRows_Recordsetmomz'])) {
  $totalRows_Recordsetmomz = $_GET['totalRows_Recordsetmomz'];
} else {
  $all_Recordsetmomz = $pdo_utopia->query($query_Recordsetmomz);
  $totalRows_Recordsetmomz = $all_Recordsetmomz->rowCount();
}
$totalPages_Recordsetmomz = ceil($totalRows_Recordsetmomz/$maxRows_Recordsetmomz)-1;

$query_Recordset9 = "SELECT * FROM website";
$Recordset9 = $pdo_goodnews1->query($query_Recordset9)->fetchAll();
$row_Recordset9 = $Recordset9[0] ?? null;
$totalRows_Recordset9 = count($Recordset9);

$query_Recordsetmomz_new = "SELECT * FROM udata WHERE momz = 1";
$Recordsetmomz_new = $pdo_goodnews1->query($query_Recordsetmomz_new)->fetchAll();
$row_Recordsetmomz_new = $Recordsetmomz_new[0] ?? null;
$totalRows_Recordsetmomz_new = count($Recordsetmomz_new);

$base_sql = "SELECT * FROM udata";
$conditions = [];
$params = [];

if (!empty($_POST['madena'])) {
    $conditions[] = "FIND_IN_SET(madena, ?)";
    $params[] = implode(',', $_POST['madena']);
}
if (!empty($_POST['aqar_type'])) {
    $conditions[] = "FIND_IN_SET(aqar_type, ?)";
    $params[] = implode(',', $_POST['aqar_type']);
}
if (!empty($_POST['amalya_type'])) {
    $conditions[] = "FIND_IN_SET(amalya_type, ?)";
    $params[] = implode(',', $_POST['amalya_type']);
}
if (!empty($_POST['status'])) {
    $conditions[] = "FIND_IN_SET(status, ?)";
    $params[] = implode(',', $_POST['status']);
}
if (!empty($_POST['tashteeb'])) {
    $conditions[] = "FIND_IN_SET(tashteeb, ?)";
    $params[] = implode(',', $_POST['tashteeb']);
}
if (!empty($_POST['price_from']) && !empty($_POST['price_to'])) {
    $conditions[] = "matloob BETWEEN ? AND ?";
    $params[] = $_POST['price_from'];
    $params[] = $_POST['price_to'];
}
if (!empty($_POST['mesaha_from']) && !empty($_POST['mesaha_to'])) {
    $conditions[] = "mbna_mesaha BETWEEN ? AND ?";
    $params[] = $_POST['mesaha_from'];
    $params[] = $_POST['mesaha_to'];
}
if (!empty($_POST['hadeka_from']) && !empty($_POST['hadeka_to'])) {
    $conditions[] = "hadeka BETWEEN ? AND ?";
    $params[] = $_POST['hadeka_from'];
    $params[] = $_POST['hadeka_to'];
}
if (!empty($_POST['code'])) {
    $conditions[] = "code = ?";
    $params[] = $_POST['code'];
}
if (!empty($_POST['marhala'])) {
    $conditions[] = "FIND_IN_SET(marhala, ?)";
    $params[] = implode(',',$_POST['marhala']);
}
if (!empty($_POST['namozg'])) {
    $conditions[] = "FIND_IN_SET(namozg, ?)";
    $params[] = implode(',',$_POST['namozg']);
}
if (!empty($_POST['customer_name'])) {
    $conditions[] = "cust_name LIKE ?";
    $params[] = "%".$_POST['customer_name']."%";
}
if (!empty($_POST['mobile'])) {
    $conditions[] = "(mobile LIKE ? OR telephone LIKE ? OR whatsapp LIKE ?)";
    $params[] = $_POST['mobile'];
    $params[] = $_POST['mobile'];
    $params[] = $_POST['mobile'];
}
if (!empty($_POST['geem'])) {
    $conditions[] = "geem = ?";
    $params[] = $_POST['geem'];
}
if (!empty($_POST['ain'])) {
    $conditions[] = "ain = ?";
    $params[] = $_POST['ain'];
}
if (!empty($_POST['door'])) {
    $conditions[] = "FIND_IN_SET(door, ?)";
    $params[] = implode(',',$_POST['door']);
}
if (!empty($_POST['wow'])) {
    $conditions[] = "wow = ?";
    $params[] = $_POST['wow'];
}

if (!empty($conditions)) {
    $base_sql .= " WHERE " . implode(" AND ", $conditions);
}

if(isset($_POST['top100']) && $_POST['top100'] != ""){
    $allowed_order_by = ['entry_date', 'update_date', 'code', 'matloob'];
    $order_by = $_POST['ordby'] ?? 'entry_date';
    $order_type = strtoupper($_POST['ordtype'] ?? 'DESC');
    if (in_array($order_by, $allowed_order_by)) {
        $base_sql .= " ORDER BY $order_by $order_type";
    }
    $base_sql .= " LIMIT ?";
    $params[] = (int)$_POST['top100'];
} else {
    $base_sql .= " ORDER BY update_date DESC";
}

$stmt = $pdo_utopia->prepare($base_sql);
$stmt->execute($params);
$Recordset1 = $stmt->fetchAll();
$totalRows_Recordset1 = $stmt->rowCount();


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
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
