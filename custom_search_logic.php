<?php
error_reporting( error_reporting() & ~E_NOTICE );
error_reporting( error_reporting() & ~E_WARNING );
//initialize the session
if (!isset($_SESSION)) {
  session_start();
  $_SESSION['code'] = $_POST['code'];
  $_SESSION['aqar_type'] = $_POST['aqar_type'];
  $_SESSION['amalya_type'] = $_POST['amalya_type'];
  $_SESSION['tashteeb'] = $_POST['tashteeb'];
  $_SESSION['door'] = $_POST['door'];
  $_SESSION['geem'] = $_POST['geem'];
  $_SESSION['ain'] = $_POST['ain'];
  $_SESSION['wow'] = $_POST['wow'];
  $_SESSION['mobile'] = $_POST['mobile'];
  $_SESSION['cust_name'] = $_POST['customer_name'];
  $_SESSION['madena'] = $_POST['madena'];
  $_SESSION['marhala'] = $_POST['marhala'];
  $_SESSION['namozg'] = $_POST['namozg'];
  $_SESSION['price_from'] = $_POST['price_from'];
  $_SESSION['price_to'] = $_POST['price_to'];
  $_SESSION['mesaha_from'] = $_POST['mesaha_from'];
  $_SESSION['mesaha_to'] = $_POST['mesaha_to'];
  $_SESSION['status'] = $_POST['status'];
}

try {
    $pdo_utopia = get_db_connection('utopia');
    $pdo_goodnews1 = get_db_connection('goodnews1');
} catch (PDOException $e) {
    // Handle connection error gracefully
    die("Database connection failed: " . $e->getMessage());
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

$madena_Recordset1 = "-1";
$aqartype_Recordset1="-1";

// test top100
if(isset($_POST['top100']) && $_POST['top100'] != ""){
    $allowed_order_by = ['entry_date', 'update_date', 'code', 'matloob'];
    $allowed_order_type = ['ASC', 'DESC'];

    $order_by = $_POST['ordby'] ?? 'entry_date';
    $order_type = strtoupper($_POST['ordtype'] ?? 'DESC');
    $top_Recordset1 = (int)$_POST['top100'];

    if (in_array($order_by, $allowed_order_by) && in_array($order_type, $allowed_order_type)) {
        $query17 = "CREATE TEMPORARY TABLE twow as SELECT * FROM udata ORDER BY $order_by $order_type LIMIT ?";
        $stmt17 = $pdo_utopia->prepare($query17);
        $stmt17->execute([$top_Recordset1]);
    } else {
        // Fallback to a default, safe query if input is invalid
        $query17 = "CREATE TEMPORARY TABLE twow as SELECT * FROM udata ORDER BY entry_date DESC LIMIT ?";
        $stmt17 = $pdo_utopia->prepare($query17);
        $stmt17->execute([$top_Recordset1]);
    }
}else{

// 1- Tmadena
if (isset($_POST['madena']) && $_POST['madena'] !="") {

 $madena_Recordset1 = implode(',',$_POST['madena']);

  $query1 = "CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata WHERE FIND_IN_SET(madena,?) ";
  $stmt1 = $pdo_utopia->prepare($query1);
  $stmt1->execute([$madena_Recordset1]);
}else{
	$query1 = "CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata";
	$pdo_utopia->exec($query1);
	}
// 2- taqartype
if (isset($_POST['aqar_type']) && $_POST['aqar_type'] !="") {
	$aqartype_Recordset1 = implode(',',$_POST['aqar_type']);
  $query2 = "CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena WHERE FIND_IN_SET(aqar_type,?)";
  $stmt2 = $pdo_utopia->prepare($query2);
  $stmt2->execute([$aqartype_Recordset1]);
}else{
	$query2 = "CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena";
	$pdo_utopia->exec($query2);
	}
// 3- tamalyatype
if (isset($_POST['amalya_type']) && $_POST['amalya_type'] !="") {
  $amalyatype_Recordset1 = implode(',',$_POST['amalya_type']);

  $query3 = "CREATE TEMPORARY TABLE tamalyatype as SELECT * FROM taqartype WHERE FIND_IN_SET(amalya_type,?)";
  $stmt3 = $pdo_utopia->prepare($query3);
  $stmt3->execute([$amalyatype_Recordset1]);
}else{
	$query3 = "CREATE TEMPORARY TABLE tamalyatype as SELECT * FROM taqartype";
	$pdo_utopia->exec($query3);
	}
// 4- tstatus
if (isset($_POST['status']) && $_POST['status'] !="") {
  $status_Recordset1 = implode(',',$_POST['status']);
  $query4 = "CREATE TEMPORARY TABLE tstatus as SELECT * FROM tamalyatype WHERE FIND_IN_SET(status,?)";
  $stmt4 = $pdo_utopia->prepare($query4);
  $stmt4->execute([$status_Recordset1]);
}else{
	$query4 = "CREATE TEMPORARY TABLE tstatus as SELECT * FROM tamalyatype";
	$pdo_utopia->exec($query4);
	}
// 5- ttashteeb
if (isset($_POST['tashteeb']) && $_POST['tashteeb'] !="") {
  $tashteeb_Recordset1 = implode(',',$_POST['tashteeb']);
  $query5 = "CREATE TEMPORARY TABLE ttashteeb as SELECT * FROM tstatus WHERE FIND_IN_SET(tashteeb,?)";
  $stmt5 = $pdo_utopia->prepare($query5);
  $stmt5->execute([$tashteeb_Recordset1]);
}else{
	$query5 = "CREATE TEMPORARY TABLE ttashteeb as SELECT * FROM tstatus";
	$pdo_utopia->exec($query5);
	}
// 6- tmatloob
if ((isset($_POST['price_from']) && $_POST['price_from'] !="") && (isset($_POST['price_to']) && $_POST['price_to'] !="")) {
  $pricefrom_Recordset1 = $_POST['price_from'];
  $priceto_Recordset1 = $_POST['price_to'];
  $query6 = "CREATE TEMPORARY TABLE tmatloob as SELECT * FROM ttashteeb WHERE matloob BETWEEN ? AND ?";
  $stmt6 = $pdo_utopia->prepare($query6);
  $stmt6->execute([$pricefrom_Recordset1, $priceto_Recordset1]);
}else{
	$query6 = "CREATE TEMPORARY TABLE tmatloob as SELECT * FROM ttashteeb";
	$pdo_utopia->exec($query6);
	}
// 7- tmbnamesaha
if ((isset($_POST['mesaha_from']) && $_POST['mesaha_from'] !="") && (isset($_POST['mesaha_to']) && $_POST['mesaha_to'] !="")) {
  $mesahafrom_Recordset1 = $_POST['mesaha_from'];
  $mesahato_Recordset1 = $_POST['mesaha_to'];
  $query7 = "CREATE TEMPORARY TABLE tmbnamesaha as SELECT * FROM tmatloob WHERE mbna_mesaha BETWEEN ? AND ?";
  $stmt7 = $pdo_utopia->prepare($query7);
  $stmt7->execute([$mesahafrom_Recordset1, $mesahato_Recordset1]);
}else{
	$query7 = "CREATE TEMPORARY TABLE tmbnamesaha as SELECT * FROM tmatloob";
	$pdo_utopia->exec($query7);
	}
// 8- thadeka
if ((isset($_POST['hadeka_from']) && $_POST['hadeka_from'] !="") && (isset($_POST['hadeka_to']) && $_POST['hadeka_to'] !="")) {
  $hadekafrom_Recordset1 = $_POST['hadeka_from'];
  $hadekato_Recordset1 = $_POST['hadeka_to'];
  $query8 = "CREATE TEMPORARY TABLE thadeka as SELECT * FROM tmbnamesaha WHERE hadeka BETWEEN ? AND ?";
  $stmt8 = $pdo_utopia->prepare($query8);
  $stmt8->execute([$hadekafrom_Recordset1, $hadekato_Recordset1]);
}else{
	$query8 = "CREATE TEMPORARY TABLE thadeka as SELECT * FROM tmbnamesaha";
	$pdo_utopia->exec($query8);
	}
// 9- Tcode
if (isset($_POST['code']) && $_POST['code'] !="") {
  $code_Recordset1 = $_POST['code'];
  $query9 = "CREATE TEMPORARY TABLE tcode as SELECT * FROM thadeka WHERE code = ?";
  $stmt9 = $pdo_utopia->prepare($query9);
  $stmt9->execute([$code_Recordset1]);
}else{
	$query9 = "CREATE TEMPORARY TABLE tcode as SELECT * FROM thadeka";
	$pdo_utopia->exec($query9);
	}
// 10- Tmarhala
if (isset($_POST['marhala']) && $_POST['marhala'] !="") {
  $marhala_Recordset1 = implode(',',$_POST['marhala']);
  $query10 = "CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode WHERE FIND_IN_SET(marhala,?)";
  $stmt10 = $pdo_utopia->prepare($query10);
  $stmt10->execute([$marhala_Recordset1]);
}else{
	$query10 = "CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode";
	$pdo_utopia->exec($query10);
	}
// 11- Tnamozg
if (isset($_POST['namozg']) && $_POST['namozg'] !="") {
  $namozg_Recordset1 = implode(',',$_POST['namozg']);
  $query11 = "CREATE TEMPORARY TABLE tnamozg as SELECT * FROM tmarhala WHERE FIND_IN_SET(namozg,?)";
  $stmt11 = $pdo_utopia->prepare($query11);
  $stmt11->execute([$namozg_Recordset1]);
}else{
	$query11 = "CREATE TEMPORARY TABLE tnamozg as SELECT * FROM tmarhala";
	$pdo_utopia->exec($query11);
	}
// 12- Tcustomername
if (isset($_POST['customer_name']) && $_POST['customer_name'] !="") {
  $customer_name_Recordset1 = $_POST['customer_name'];
  $query12 = "CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tnamozg WHERE cust_name LIKE ?";
  $stmt12 = $pdo_utopia->prepare($query12);
  $stmt12->execute(["%".$customer_name_Recordset1."%"]);
}else{
	$query12 = "CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tnamozg";
	$pdo_utopia->exec($query12);
	}
// 13- Tmobile
if (isset($_POST['mobile']) && $_POST['mobile'] !="") {
  $mobile_Recordset1 = $_POST['mobile'];
  $query13 = "CREATE TEMPORARY TABLE tmobile as SELECT * FROM tcustomername WHERE mobile LIKE ? OR telephone LIKE ? OR whatsapp LIKE ?";
  $stmt13 = $pdo_utopia->prepare($query13);
  $stmt13->execute([$mobile_Recordset1, $mobile_Recordset1, $mobile_Recordset1]);
}else{
	$query13 = "CREATE TEMPORARY TABLE tmobile as SELECT * FROM tcustomername";
	$pdo_utopia->exec($query13);
	}

// 14- Tgeem
if (isset($_POST['geem']) && $_POST['geem'] !="") {
  $geem_Recordset1 = $_POST['geem'];
  $query14 = "CREATE TEMPORARY TABLE tgeem as SELECT * FROM tmobile WHERE geem = ?";
  $stmt14 = $pdo_utopia->prepare($query14);
  $stmt14->execute([$geem_Recordset1]);
}else{
	$query14 = "CREATE TEMPORARY TABLE tgeem as SELECT * FROM tmobile";
	$pdo_utopia->exec($query14);
	}

// 15- Tain
if (isset($_POST['ain']) && $_POST['ain'] !="") {
  $ain_Recordset1 = $_POST['ain'];
  $query15 = "CREATE TEMPORARY TABLE tain as SELECT * FROM tgeem WHERE ain = ?";
  $stmt15 = $pdo_utopia->prepare($query15);
  $stmt15->execute([$ain_Recordset1]);
}else{
	$query15 = "CREATE TEMPORARY TABLE tain as SELECT * FROM tgeem";
	$pdo_utopia->exec($query15);
	}
// 16- Tdoor
if (isset($_POST['door']) && $_POST['door'] !="") {
  $door_Recordset1 = implode(',',$_POST['door']);
  $query16 = "CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain WHERE FIND_IN_SET(door,?)";
  $stmt16 = $pdo_utopia->prepare($query16);
  $stmt16->execute([$door_Recordset1]);
}else{
	$query16 = "CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain";
	$pdo_utopia->exec($query16);
	}

// 17- Twow
if (isset($_POST['wow']) && $_POST['wow'] !="") {
  $wow_Recordset1 = $_POST['wow'];
  $query17 = "CREATE TEMPORARY TABLE twow as SELECT * FROM tdoor WHERE wow = ? ORDER BY update_date DESC";
  $stmt17 = $pdo_utopia->prepare($query17);
  $stmt17->execute([$wow_Recordset1]);
}else{

	$query17 = "CREATE TEMPORARY TABLE twow as SELECT * FROM tdoor ORDER BY update_date DESC";
	$pdo_utopia->exec($query17);
	}
}// end of top100
$query_Recordset1 = " SELECT * FROM twow";
$Recordset1_stmt = $pdo_utopia->query($query_Recordset1);
$Recordset1 = $Recordset1_stmt->fetchAll();
$row_Recordset1 = $Recordset1[0] ?? null;
$totalRows_Recordset1 = count($Recordset1);


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
