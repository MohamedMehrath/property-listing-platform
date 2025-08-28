<?php
require_once('Connections/db.php');

if (!isset($_SESSION)) {
  session_start();
}

try {
    $pdo = get_db_connection('utopia');
} catch (PDOException $e) {
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

$dropdown_data = get_dropdown_data($pdo);
extract($dropdown_data);

$query_Recordset101 = "SELECT distinct marhala,door FROM udata";
$Recordset101 = $pdo->query($query_Recordset101)->fetchAll();


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
        $stmt17 = $pdo->prepare($query17);
        $stmt17->execute([$top_Recordset1]);
    } else {
        // Fallback to a default, safe query if input is invalid
        $query17 = "CREATE TEMPORARY TABLE twow as SELECT * FROM udata ORDER BY entry_date DESC LIMIT ?";
        $stmt17 = $pdo->prepare($query17);
        $stmt17->execute([$top_Recordset1]);
    }
}else{

// 1- Tmadena
if (isset($_POST['madena']) && $_POST['madena'] !="") {
 $madena_Recordset1 = $_POST['madena'];
  $query1 = "CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata WHERE madena = ? ";
  $stmt1 = $pdo->prepare($query1);
  $stmt1->execute([$madena_Recordset1]);
}else{
	$query1 = "CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata";
	$pdo->exec($query1);
	}
// 2- taqartype
if (isset($_POST['aqar_type']) && $_POST['aqar_type'] !="") {
  $aqartype_Recordset1 = $_POST['aqar_type'];
  $query2 = "CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena WHERE aqar_type = ?";
  $stmt2 = $pdo->prepare($query2);
  $stmt2->execute([$aqartype_Recordset1]);
}else{
	$query2 = "CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena";
	$pdo->exec($query2);
	}

// 4- tstatus
if (isset($_POST['status']) && $_POST['status'] !="") {
  $status_Recordset1 = $_POST['status'];
  $query4 = "CREATE TEMPORARY TABLE tstatus as SELECT * FROM taqartype WHERE status = ?";
  $stmt4 = $pdo->prepare($query4);
  $stmt4->execute([$status_Recordset1]);
}else{
	$query4 = "CREATE TEMPORARY TABLE tstatus as SELECT * FROM taqartype";
	$pdo->exec($query4);
	}

// 9- Tcode
if (isset($_POST['code']) && $_POST['code'] !="") {
  $code_Recordset1 = $_POST['code'];
  $query9 = "CREATE TEMPORARY TABLE tcode as SELECT * FROM tstatus WHERE code = ?";
  $stmt9 = $pdo->prepare($query9);
  $stmt9->execute([$code_Recordset1]);
}else{
	$query9 = "CREATE TEMPORARY TABLE tcode as SELECT * FROM tstatus";
	$pdo->exec($query9);
	}
// 10- Tmarhala
error_reporting( error_reporting() & ~E_NOTICE );
if((isset($_POST['m1']) && ($_POST['m1']!=-1))||(isset($_POST['m2']) && ($_POST['m2']!=-1))||(isset($_POST['m3']) && ($_POST['m3']!=-1))||(isset($_POST['m4']) && ($_POST['m4']!=-1))||(isset($_POST['m5']) && ($_POST['m5']!=-1))||(isset($_POST['m6']) && ($_POST['m6']!=-1))){
	$query10 = "CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode WHERE marhala=? OR marhala=? OR marhala=? OR marhala=? OR marhala=? OR marhala=?";
    $stmt10 = $pdo->prepare($query10);
    $stmt10->execute([$_POST['m1'],$_POST['m2'],$_POST['m3'],$_POST['m4'],$_POST['m5'],$_POST['m6']]);
}
else
{
if (isset($_POST['marhala']) && $_POST['marhala'] !="") {
  $marhala_Recordset1 = $_POST['marhala'];
  $query10 = "CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode WHERE marhala LIKE ?";
  $stmt10 = $pdo->prepare($query10);
  $stmt10->execute(["%".$marhala_Recordset1."%"]);
}else{
	$query10 = "CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode";
	$pdo->exec($query10);
	}
}
// 12- Tcustomername
if (isset($_POST['customer_name']) && $_POST['customer_name'] !="") {
  $customer_name_Recordset1 = $_POST['customer_name'];
  $query12 = "CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tmarhala WHERE cust_name LIKE ?";
  $stmt12 = $pdo->prepare($query12);
  $stmt12->execute(["%".$customer_name_Recordset1."%"]);
}else{
	$query12 = "CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tmarhala";
	$pdo->exec($query12);
	}
// 13- Tmobile
if (isset($_POST['mobile']) && $_POST['mobile'] !="") {
  $mobile_Recordset1 = $_POST['mobile'];
  $query13 = "CREATE TEMPORARY TABLE tmobile as SELECT * FROM tcustomername WHERE mobile = ? OR telephone = ?";
  $stmt13 = $pdo->prepare($query13);
  $stmt13->execute([$mobile_Recordset1, $mobile_Recordset1]);
}else{
	$query13 = "CREATE TEMPORARY TABLE tmobile as SELECT * FROM tcustomername";
	$pdo->exec($query13);
	}

// 14- Tgeem
if (isset($_POST['geem']) && $_POST['geem'] !="") {
  $geem_Recordset1 = $_POST['geem'];
  $query14 = "CREATE TEMPORARY TABLE tgeem as SELECT * FROM tmobile WHERE geem = ?";
  $stmt14 = $pdo->prepare($query14);
  $stmt14->execute([$geem_Recordset1]);
}else{
	$query14 = "CREATE TEMPORARY TABLE tgeem as SELECT * FROM tmobile";
	$pdo->exec($query14);
	}

// 15- Tain
if (isset($_POST['ain']) && $_POST['ain'] !="") {
  $ain_Recordset1 = $_POST['ain'];
  $query15 = "CREATE TEMPORARY TABLE tain as SELECT * FROM tgeem WHERE ain = ?";
  $stmt15 = $pdo->prepare($query15);
  $stmt15->execute([$ain_Recordset1]);
}else{
	$query15 = "CREATE TEMPORARY TABLE tain as SELECT * FROM tgeem";
	$pdo->exec($query15);
	}
// 16- Tdoor
if((isset($_POST['d1']) && ($_POST['d1']!=-1))||(isset($_POST['d2']) && ($_POST['d2']!=-1))||(isset($_POST['d3']) && ($_POST['d3']!=-1))||(isset($_POST['d4']) && ($_POST['d4']!=-1))||(isset($_POST['d5']) && ($_POST['d5']!=-1))||(isset($_POST['d6']) && ($_POST['d6']!=-1))||(isset($_POST['d0']) && ($_POST['d0']!=-1))){
	$query16 = "CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain WHERE door = ? OR door = ?  OR door = ? OR door = ? OR door = ? OR door = ? OR door = ? ";
    $stmt16 = $pdo->prepare($query16);
    $stmt16->execute([$_POST['d1'],$_POST['d2'],$_POST['d3'],$_POST['d4'],$_POST['d5'],$_POST['d6'],$_POST['d0']]);
}
else
{
if (isset($_POST['door']) && $_POST['door'] !="") {
  $door_Recordset1 = $_POST['door'];
  $query16 = "CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain WHERE door = ?";
  $stmt16 = $pdo->prepare($query16);
  $stmt16->execute([$door_Recordset1]);
}else{
	$query16 = "CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain";
	$pdo->exec($query16);
	}
}
// 17- Twow
if (isset($_POST['wow']) && $_POST['wow'] !="") {
  $wow_Recordset1 = $_POST['wow'];
  $query17 = "CREATE TEMPORARY TABLE twow as SELECT * FROM tdoor WHERE wow = ? ORDER BY update_date DESC";
  $stmt17 = $pdo->prepare($query17);
  $stmt17->execute([$wow_Recordset1]);
}else{

	$query17 = "CREATE TEMPORARY TABLE twow as SELECT * FROM tdoor ORDER BY update_date DESC";
	$pdo->exec($query17);
	}
}// end of top100
$query_Recordset1 = " SELECT * FROM twow";
$stmt = $pdo->prepare($query_Recordset1);
$stmt->execute();
$Recordset1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalRows_Recordset1 = $stmt->rowCount();


$maxRows_Recordset1 = 100;
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
