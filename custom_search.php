<?php require_once('Connections/utopia.php'); ?>
<?php require_once('Connections/goodnews.php'); ?>
<?php require_once('Connections/goodnews1.php'); ?>
<?php //virtual('Connections/utopia.php'); ?>
<?php //virtual('Connections/goodnews.php'); ?>
<?php //virtual('Connections/goodnews1.php'); ?>

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

mysql_query("SET NAMES 'utf8'");
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
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_utopia, $utopia);
$query_Qcity = "SELECT distinct cityname FROM city ORDER BY cityname DESC";
$Qcity = mysql_query($query_Qcity, $utopia) or die(mysql_error());
$row_Qcity = mysql_fetch_assoc($Qcity);
$totalRows_Qcity = mysql_num_rows($Qcity);

mysql_select_db($database_utopia, $utopia);
$query_Qmarhala = "SELECT distinct marhalaname FROM marhala ORDER BY marhalaname Asc";
$Qmarhala = mysql_query($query_Qmarhala, $utopia) or die(mysql_error());
$row_Qmarhala = mysql_fetch_assoc($Qmarhala);
$totalRows_Qmarhala = mysql_num_rows($Qmarhala);

mysql_select_db($database_utopia, $utopia);
$query_Qdoor = "SELECT distinct doorname FROM door ORDER BY doorname Asc";
$Qdoor = mysql_query($query_Qdoor, $utopia) or die(mysql_error());
$row_Qdoor = mysql_fetch_assoc($Qdoor);
$totalRows_Qdoor = mysql_num_rows($Qdoor);

mysql_select_db($database_utopia, $utopia);
$query_Qaqar_type = "SELECT distinct aqar_type_name FROM aqar_type_t";
$Qaqar_type = mysql_query($query_Qaqar_type, $utopia) or die(mysql_error());
$row_Qaqar_type = mysql_fetch_assoc($Qaqar_type);
$totalRows_Qaqar_type = mysql_num_rows($Qaqar_type);

mysql_select_db($database_utopia, $utopia);
$query_Qamalya_type = "SELECT distinct amalya_type_name FROM amalya_type_t";
$Qamalya_type = mysql_query($query_Qamalya_type, $utopia) or die(mysql_error());
$row_Qamalya_type = mysql_fetch_assoc($Qamalya_type);
$totalRows_Qamalya_type = mysql_num_rows($Qamalya_type);

mysql_select_db($database_utopia, $utopia);
$query_Qatatus = "SELECT distinct status_name FROM status_t";
$Qatatus = mysql_query($query_Qatatus, $utopia) or die(mysql_error());
$row_Qatatus = mysql_fetch_assoc($Qatatus);
$totalRows_Qatatus = mysql_num_rows($Qatatus);

mysql_select_db($database_utopia, $utopia);
$query_Qtashteeb = "SELECT distinct tashteeb_name FROM tashteeb_t";
$Qtashteeb = mysql_query($query_Qtashteeb, $utopia) or die(mysql_error());
$row_Qtashteeb = mysql_fetch_assoc($Qtashteeb);
$totalRows_Qtashteeb = mysql_num_rows($Qtashteeb);

$maxRows_Recordsetmomz = 5;
$pageNum_Recordsetmomz = 0;
if (isset($_GET['pageNum_Recordsetmomz'])) {
  $pageNum_Recordsetmomz = $_GET['pageNum_Recordsetmomz'];
}
$startRow_Recordsetmomz = $pageNum_Recordsetmomz * $maxRows_Recordsetmomz;

mysql_select_db($database_utopia, $utopia);
$query_Recordsetmomz = "SELECT * FROM udata WHERE momz = 1 ORDER BY entry_date DESC";
$query_limit_Recordsetmomz = sprintf("%s LIMIT %d, %d", $query_Recordsetmomz, $startRow_Recordsetmomz, $maxRows_Recordsetmomz);
$Recordsetmomz = mysql_query($query_limit_Recordsetmomz, $utopia) or die(mysql_error());
$row_Recordsetmomz = mysql_fetch_assoc($Recordsetmomz);

if (isset($_GET['totalRows_Recordsetmomz'])) {
  $totalRows_Recordsetmomz = $_GET['totalRows_Recordsetmomz'];
} else {
  $all_Recordsetmomz = mysql_query($query_Recordsetmomz);
  $totalRows_Recordsetmomz = mysql_num_rows($all_Recordsetmomz);
}
$totalPages_Recordsetmomz = ceil($totalRows_Recordsetmomz/$maxRows_Recordsetmomz)-1;

mysql_select_db($database_utopia, $utopia);
$query_Recordset9 = "SELECT * FROM website";
$Recordset9 = mysql_query($query_Recordset9, $goodnews1) or die(mysql_error());
$row_Recordset9 = mysql_fetch_assoc($Recordset9);
$totalRows_Recordset9 = mysql_num_rows($Recordset9);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetmomz_new = "SELECT * FROM udata WHERE momz = 1";
$Recordsetmomz_new = mysql_query($query_Recordsetmomz_new, $goodnews1) or die(mysql_error());
$row_Recordsetmomz_new = mysql_fetch_assoc($Recordsetmomz_new);
$totalRows_Recordsetmomz_new = mysql_num_rows($Recordsetmomz_new);

mysql_select_db($database_utopia, $utopia);
$madena_Recordset1 = "-1";
$aqartype_Recordset1="-1";
 
// test top100
if(isset($_POST['top100']) && $_POST['top100'] != ""){
  $top_Recordset1 = $_POST['top100'];
  $ord = $_POST['ordby'] . " " . $_POST['ordtype'];
  $query17 = sprintf("CREATE TEMPORARY TABLE twow as SELECT * FROM udata ORDER BY %s LIMIT %d",$ord, GetSQLValueString($top_Recordset1,"integer"));
  $R17 = mysql_query($query17, $utopia) or die(mysql_error());
		
	}else{
		
// 1- Tmadena
if (isset($_POST['madena']) && $_POST['madena'] !="") {

 $madena_Recordset1 = implode(',',$_POST['madena']);
 
  $query1 = sprintf("CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata WHERE FIND_IN_SET(madena,%s) ", GetSQLValueString($madena_Recordset1, "text"));
  $R1 = mysql_query($query1, $utopia) or die(mysql_error());
}else{
	$query1 = sprintf("CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata");
	$R1 = mysql_query($query1, $utopia) or die(mysql_error());
	}
// 2- taqartype
if (isset($_POST['aqar_type']) && $_POST['aqar_type'] !="") {
	$aqartype_Recordset1 = implode(',',$_POST['aqar_type']);
  $query2 = sprintf("CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena WHERE FIND_IN_SET(aqar_type,%s)", GetSQLValueString($aqartype_Recordset1, "text"));
  $R2 = mysql_query($query2, $utopia) or die(mysql_error());
}else{
	$query2 = sprintf("CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena");
	$R2 = mysql_query($query2, $utopia) or die(mysql_error());
	}
// 3- tamalyatype
if (isset($_POST['amalya_type']) && $_POST['amalya_type'] !="") {
  $amalyatype_Recordset1 = implode(',',$_POST['amalya_type']);
 
  $query3 = sprintf("CREATE TEMPORARY TABLE tamalyatype as SELECT * FROM taqartype WHERE FIND_IN_SET(amalya_type,%s)", GetSQLValueString($amalyatype_Recordset1, "text"));
  $R3 = mysql_query($query3, $utopia) or die(mysql_error());
}else{
	$query3 = sprintf("CREATE TEMPORARY TABLE tamalyatype as SELECT * FROM taqartype");
	$R3 = mysql_query($query3, $utopia) or die(mysql_error());
	}	
// 4- tstatus
if (isset($_POST['status']) && $_POST['status'] !="") {
  $status_Recordset1 = implode(',',$_POST['status']);
  $query4 = sprintf("CREATE TEMPORARY TABLE tstatus as SELECT * FROM tamalyatype WHERE FIND_IN_SET(status,%s)", GetSQLValueString($status_Recordset1, "text"));
  $R4 = mysql_query($query4, $utopia) or die(mysql_error());
}else{
	$query4 = sprintf("CREATE TEMPORARY TABLE tstatus as SELECT * FROM tamalyatype");
	$R4 = mysql_query($query4, $utopia) or die(mysql_error());
	}	
// 5- ttashteeb
if (isset($_POST['tashteeb']) && $_POST['tashteeb'] !="") {
  $tashteeb_Recordset1 = implode(',',$_POST['tashteeb']);
  $query5 = sprintf("CREATE TEMPORARY TABLE ttashteeb as SELECT * FROM tstatus WHERE FIND_IN_SET(tashteeb,%s)", GetSQLValueString($tashteeb_Recordset1, "text"));
  $R5 = mysql_query($query5, $utopia) or die(mysql_error());
}else{
	$query5 = sprintf("CREATE TEMPORARY TABLE ttashteeb as SELECT * FROM tstatus");
	$R5 = mysql_query($query5, $utopia) or die(mysql_error());
	}	
// 6- tmatloob
if ((isset($_POST['price_from']) && $_POST['price_from'] !="") && (isset($_POST['price_to']) && $_POST['price_to'] !="")) {
  $pricefrom_Recordset1 = $_POST['price_from'];
  $priceto_Recordset1 = $_POST['price_to'];
  $query6 = sprintf("CREATE TEMPORARY TABLE tmatloob as SELECT * FROM ttashteeb WHERE matloob BETWEEN %s AND %s", GetSQLValueString($pricefrom_Recordset1, "text"),GetSQLValueString($priceto_Recordset1, "text"));
  $R6 = mysql_query($query6, $utopia) or die(mysql_error());
}else{
	$query6 = sprintf("CREATE TEMPORARY TABLE tmatloob as SELECT * FROM ttashteeb");
	$R6 = mysql_query($query6, $utopia) or die(mysql_error());
	}	
// 7- tmbnamesaha
if ((isset($_POST['mesaha_from']) && $_POST['mesaha_from'] !="") && (isset($_POST['mesaha_to']) && $_POST['mesaha_to'] !="")) {
  $mesahafrom_Recordset1 = $_POST['mesaha_from'];
  $mesahato_Recordset1 = $_POST['mesaha_to'];
  $query7 = sprintf("CREATE TEMPORARY TABLE tmbnamesaha as SELECT * FROM tmatloob WHERE mbna_mesaha BETWEEN %s AND %s", GetSQLValueString($mesahafrom_Recordset1, "text"),GetSQLValueString($mesahato_Recordset1, "text"));
  $R7 = mysql_query($query7, $utopia) or die(mysql_error());
}else{
	$query7 = sprintf("CREATE TEMPORARY TABLE tmbnamesaha as SELECT * FROM tmatloob");
	$R7 = mysql_query($query7, $utopia) or die(mysql_error());
	}		
// 8- thadeka
if ((isset($_POST['hadeka_from']) && $_POST['hadeka_from'] !="") && (isset($_POST['hadeka_to']) && $_POST['hadeka_to'] !="")) {
  $hadekafrom_Recordset1 = $_POST['hadeka_from'];
  $hadekato_Recordset1 = $_POST['hadeka_to'];
  $query8 = sprintf("CREATE TEMPORARY TABLE thadeka as SELECT * FROM tmbnamesaha WHERE hadeka BETWEEN %s AND %s", GetSQLValueString($hadekafrom_Recordset1, "text"),GetSQLValueString($hadekato_Recordset1, "text"));
  $R8 = mysql_query($query8, $utopia) or die(mysql_error());
}else{
	$query8 = sprintf("CREATE TEMPORARY TABLE thadeka as SELECT * FROM tmbnamesaha");
	$R8 = mysql_query($query8, $utopia) or die(mysql_error());
	}
// 9- Tcode
if (isset($_POST['code']) && $_POST['code'] !="") {
  $code_Recordset1 = $_POST['code'];
  $query9 = sprintf("CREATE TEMPORARY TABLE tcode as SELECT * FROM thadeka WHERE code = %s", GetSQLValueString($code_Recordset1, "text"));
  $R9 = mysql_query($query9, $utopia) or die(mysql_error());
}else{
	$query9 = sprintf("CREATE TEMPORARY TABLE tcode as SELECT * FROM thadeka");
	$R9 = mysql_query($query9, $utopia) or die(mysql_error());
	}		
// 10- Tmarhala
if (isset($_POST['marhala']) && $_POST['marhala'] !="") {
  $marhala_Recordset1 = implode(',',$_POST['marhala']);
  $query10 = sprintf("CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode WHERE FIND_IN_SET(marhala,%s)", GetSQLValueString($marhala_Recordset1, "text"));
  $R10 = mysql_query($query10, $utopia) or die(mysql_error());
}else{
	$query10 = sprintf("CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode");
	$R10 = mysql_query($query10, $utopia) or die(mysql_error());
	}		
// 11- Tnamozg
if (isset($_POST['namozg']) && $_POST['namozg'] !="") {
  $namozg_Recordset1 = implode(',',$_POST['namozg']);
  $query11 = sprintf("CREATE TEMPORARY TABLE tnamozg as SELECT * FROM tmarhala WHERE FIND_IN_SET(namozg,%s)", GetSQLValueString($namozg_Recordset1, "text"));
  $R11 = mysql_query($query11, $utopia) or die(mysql_error());
}else{
	$query11 = sprintf("CREATE TEMPORARY TABLE tnamozg as SELECT * FROM tmarhala");
	$R11 = mysql_query($query11, $utopia) or die(mysql_error());
	}		
// 12- Tcustomername
if (isset($_POST['customer_name']) && $_POST['customer_name'] !="") {
  $customer_name_Recordset1 = $_POST['customer_name'];
  $query12 = sprintf("CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tnamozg WHERE cust_name LIKE %s", GetSQLValueString("%".$customer_name_Recordset1."%", "text"));
  $R12 = mysql_query($query12, $utopia) or die(mysql_error());
}else{
	$query12 = sprintf("CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tnamozg");
	$R12 = mysql_query($query12, $utopia) or die(mysql_error());
	}		
// 13- Tmobile
if (isset($_POST['mobile']) && $_POST['mobile'] !="") {
  $mobile_Recordset1 = $_POST['mobile'];
  $query13 = sprintf("CREATE TEMPORARY TABLE tmobile as SELECT * FROM tcustomername WHERE mobile LIKE %s OR telephone LIKE %s OR whatsapp LIKE %s", GetSQLValueString($mobile_Recordset1, "text"),GetSQLValueString($mobile_Recordset1, "text"),GetSQLValueString($mobile_Recordset1, "text"));
  $R13 = mysql_query($query13, $utopia) or die(mysql_error());
}else{
	$query13 = sprintf("CREATE TEMPORARY TABLE tmobile as SELECT * FROM tcustomername");
	$R13 = mysql_query($query13, $utopia) or die(mysql_error());
	}	

// 14- Tgeem
if (isset($_POST['geem']) && $_POST['geem'] !="") {
  $geem_Recordset1 = $_POST['geem'];
  $query14 = sprintf("CREATE TEMPORARY TABLE tgeem as SELECT * FROM tmobile WHERE geem = %s", GetSQLValueString($geem_Recordset1, "text"));
  $R14 = mysql_query($query14, $utopia) or die(mysql_error());
}else{
	$query14 = sprintf("CREATE TEMPORARY TABLE tgeem as SELECT * FROM tmobile");
	$R14 = mysql_query($query14, $utopia) or die(mysql_error());
	}
		
// 15- Tain
if (isset($_POST['ain']) && $_POST['ain'] !="") {
  $ain_Recordset1 = $_POST['ain'];
  $query15 = sprintf("CREATE TEMPORARY TABLE tain as SELECT * FROM tgeem WHERE ain = %s", GetSQLValueString($ain_Recordset1, "text"));
  $R15 = mysql_query($query15, $utopia) or die(mysql_error());
}else{
	$query15 = sprintf("CREATE TEMPORARY TABLE tain as SELECT * FROM tgeem");
	$R15 = mysql_query($query15, $utopia) or die(mysql_error());
	}
// 16- Tdoor
if (isset($_POST['door']) && $_POST['door'] !="") {
  $door_Recordset1 = implode(',',$_POST['door']);
  $query16 = sprintf("CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain WHERE FIND_IN_SET(door,%s)", GetSQLValueString($door_Recordset1, "text"));
  $R16 = mysql_query($query16, $utopia) or die(mysql_error());
}else{
	$query16 = sprintf("CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain");
	$R16 = mysql_query($query16, $utopia) or die(mysql_error());
	}
		
// 17- Twow
if (isset($_POST['wow']) && $_POST['wow'] !="") {
  $wow_Recordset1 = $_POST['wow'];
  $query17 = sprintf("CREATE TEMPORARY TABLE twow as SELECT * FROM tdoor WHERE wow = %s ORDER BY update_date DESC", GetSQLValueString($wow_Recordset1, "text"));
  $R17 = mysql_query($query17, $utopia) or die(mysql_error());
}else{
	
	$query17 = sprintf("CREATE TEMPORARY TABLE twow as SELECT * FROM tdoor ORDER BY update_date DESC");
	$R17 = mysql_query($query17, $utopia) or die(mysql_error());
	}	
}// end of top100
$query_Recordset1 = sprintf(" SELECT * FROM twow");
$Recordset1 = mysql_query($query_Recordset1, $utopia) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>البحث السريع</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
.black {
	color: #000;
}
</style>
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
<link href="green.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow1 {	color: #17036B;
	font-style: normal;
}
</style>
<link href="jQueryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="jQueryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="jQueryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="jQueryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>

<body>
<table width="99%" border="0" align="center">
  <tbody>
    <tr>
      <td colspan="2" align="center"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFEDC"><iframe src="menu_top.php" name="Banner" width="900" height="40" align="top" scrolling="no" frameborder="0" id="Banner2">Banner</iframe></td>
    </tr>
    <tr>
      <td width="82%" align="center" valign="top"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#327900">
        <tbody>
          <tr>
            <td align="center" valign="top" bgcolor="#E6FFD4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">العقارات المميزة</span></strong></td>
          </tr>
          <tr>
            <td valign="top" height="200"><marquee direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout= "this.setAttribute('scrollamount', 6, 0);"><?php do { ?>
               <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="right" bgcolor="#F5F3F4"><?php echo $row_Recordsetmomz_new['aqar_type']; ?></td>
                      <td colspan="2" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">نوع العقار</span></strong></td>
                      <td colspan="2" align="right" bgcolor="#F5F3F4"><?php echo $row_Recordsetmomz_new['madena']; ?></td>
                      <td colspan="2" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المدينة</span></strong></td>
                      </tr>
                    <tr>
                      <td align="center"><a href="./print_sheet_new.php?code=<?php echo $row_Recordsetmomz_new['code']; ?>"><?php echo $row_Recordsetmomz_new['code']; ?></a></td>
                      <td><?php echo $row_Recordsetmomz_new['status']; ?></td>
                      <td><strong>الحالة</strong></td>
                      <td><?php echo $row_Recordsetmomz_new['marhala']; ?></td>
                      <td><strong>المرحلة</strong></td>
                      <td><?php echo $row_Recordsetmomz_new['amalya_type']; ?></td>
                      <td><strong>نوع العملية</strong></td>
                      </tr>
                    <tr>
                      <td><a href="./print_sheet_new.php?code=<?php echo $row_Recordsetmomz_new['code']; ?>">ا لمزيد من التفاصيل<img src="aqarr.jpg" width="40" height="40" alt=""/></a></td>
                      <td><?php echo $row_Recordsetmomz_new['aqd_total']; ?></td>
                      <td><strong>اجمالى العقد</strong></td>
                      <td colspan="2" align="center"><?php echo $row_Recordsetmomz_new['matloob']; ?></td>
                      <td colspan="2"><strong>المطلوب</strong></td>
                      </tr>
                    </tbody>
                </table>
               <br />
               
                <?php } while ($row_Recordsetmomz_new = mysql_fetch_assoc($Recordsetmomz_new)); ?></marquee></td>
          </tr>
        </tbody>
    </table></td>
      <td width="18%" rowspan="2" align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="200" height="500" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
    </tr>
    <tr valign="top">
      <td><table width="99%" border="0">
        <tbody>
          <tr>
            <td><form id="form2" name="form2" method="post" action="">
              <table width="42%" border="0">
                <tr>
                  <td width="3%">&nbsp;</td>
                  <td width="23%" align="center" valign="middle"><input type="submit" name="tophandred" id="tophandred" value="عــــــرض" /></td>
                  <td width="8%"><span id="sprytextfield15">
                    <label for="top5"></label>
                    <input name="top100" type="text" id="top5" size="5" />
                    <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                  <td width="7%" align="left" valign="middle"><strong>أحدث</strong></td>
                  <td width="2%" align="left" valign="middle">&nbsp;</td>
                  <td width="12%" align="left" valign="middle"><label for="ordtype5"></label>
                    <select name="ordtype" id="ordtype5">
                      <option value="ASC" selected="selected">تصاعدى</option>
                      <option value="DESC">تنازلى</option>
                    </select></td>
                  <td width="18%" align="left" valign="middle"><label for="ordby5"></label>
                    <select name="ordby" id="ordby5">
                      <option value="entry_date" selected="selected">تاريخ الادخال</option>
                      <option value="update_date">تاريخ التعديل</option>
                      <option value="code">الكود</option>
                      <option value="matloob">السعر المطلوب</option>
                    </select></td>
                  <td width="27%" align="left" valign="middle"><strong>ترتيب حسب</strong></td>
                </tr>
</table>
              <table width="29%" border="0">
                <tr> </tr>
              </table>
            </form></td>
          </tr>
        </tbody>
      </table>
        <form id="form1" name="form1" method="post" action="">
        <table width="89%" border="0" align="center">
          <tr>
            <td colspan="2" align="right" valign="top" bgcolor="#FFFFFF" class="black"><select name="marhala[]" size="4" multiple="multiple" id="marhala"><option  value="">الكل</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Qmarhala['marhalaname']?>"><?php echo $row_Qmarhala['marhalaname']?></option>
                <?php
} while ($row_Qmarhala = mysql_fetch_assoc($Qmarhala));
  $rows = mysql_num_rows($Qmarhala);
  if($rows > 0) {
      mysql_data_seek($Qmarhala, 0);
	  $row_Qmarhala = mysql_fetch_assoc($Qmarhala);
  }
?>
            </select></td>
            <td colspan="2" align="center" valign="top" bgcolor="#F5F3F4" class="black"><strong>المرحــــــلة</strong></td>
            <td width="15%" colspan="2" align="right" valign="top" bgcolor="#FFFFFF"><label for="madena4">
              <select name="madena[]" size="3" multiple="multiple" id="madena">
                <option  value="">الكل</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Qcity['cityname']?>"><?php echo $row_Qcity['cityname']?></option>
                <?php
} while ($row_Qcity = mysql_fetch_assoc($Qcity));
  $rows = mysql_num_rows($Qcity);
  if($rows > 0) {
      mysql_data_seek($Qcity, 0);
	  $row_Qcity = mysql_fetch_assoc($Qcity);
  }
?>
                </select>
</label></td>
            <td width="13%" colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong>المــــديـنـــــــة</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield2">
              <label for="marhala4"></label>
              <input name="code" type="text" id="marhala4" value="<?php echo $_SESSION['code']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>الكـــــــود</strong></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF"><label for="aqar_type4"><span id="spryselect2">
              <select name="aqar_type[]" size="3" multiple="multiple" id="aqar_type2" title="<?php echo $_SESSION['aqar_type']; ?>">
                <option value="">الكل</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Qaqar_type['aqar_type_name']?>"><?php echo $row_Qaqar_type['aqar_type_name']?></option>
                <?php
} while ($row_Qaqar_type = mysql_fetch_assoc($Qaqar_type));
  $rows = mysql_num_rows($Qaqar_type);
  if($rows > 0) {
      mysql_data_seek($Qaqar_type, 0);
	  $row_Qaqar_type = mysql_fetch_assoc($Qaqar_type);
  }
?>
                </select>
            </span></label></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong>نوع العقــــــار</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield3">
              <label for="namozag4"></label>
              <input name="namozg" type="text" id="namozg" value="<?php echo $_SESSION['namozg']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>النموذج</strong></td>
            <td colspan="2" align="right" valign="top" bgcolor="#FFFFFF"><label for="amalua_type4">
              <select name="amalya_type[]" size="3" multiple="multiple" id="amalya_type">
                <option value="">الكل</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Qamalya_type['amalya_type_name']?>"><?php echo $row_Qamalya_type['amalya_type_name']?></option>
                <?php
} while ($row_Qamalya_type = mysql_fetch_assoc($Qamalya_type));
  $rows = mysql_num_rows($Qamalya_type);
  if($rows > 0) {
      mysql_data_seek($Qamalya_type, 0);
	  $row_Qamalya_type = mysql_fetch_assoc($Qamalya_type);
  }
?>
                </select>
</label></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong>نوع العملـــــية</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="right" valign="middle" bgcolor="#3F3C3C" class="black"><span id="sprytextfield4">
              <label for="customer_name4"></label>
              <input name="customer_name" type="text" id="customer_name4" value="<?php echo $_SESSION['cust_name']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#3F3C3C" class="black"><strong>اسم العميل</strong></td>
            <td colspan="2" align="right" valign="top" bgcolor="#FFFFFF"><label for="status4">
              <select name="status[]" size="3" multiple="multiple" id="status">
                <option value="">الكل</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Qatatus['status_name']?>"><?php echo $row_Qatatus['status_name']?></option>
                <?php
} while ($row_Qatatus = mysql_fetch_assoc($Qatatus));
  $rows = mysql_num_rows($Qatatus);
  if($rows > 0) {
      mysql_data_seek($Qatatus, 0);
	  $row_Qatatus = mysql_fetch_assoc($Qatatus);
  }
?>
                </select>
</label></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong>الحـــــــــالــــة</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="right" valign="middle" bgcolor="#3F3C3C" class="black"><span id="sprytextfield5">
              <label for="mobile4"></label>
              <input name="mobile" type="text" id="mobile4" value="<?php echo $_SESSION['mobile']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#3F3C3C" class="black"><strong>رقم الموبايل</strong></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF"><span id="spryselect5">
              <label for="tashteeb4"></label>
              <select name="tashteeb[]" multiple="multiple" id="tashteeb4" title="<?php echo $_SESSION['tashteeb']; ?>">
                <option value="">الكل</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Qtashteeb['tashteeb_name']?>"><?php echo $row_Qtashteeb['tashteeb_name']?></option>
                <?php
} while ($row_Qtashteeb = mysql_fetch_assoc($Qtashteeb));
  $rows = mysql_num_rows($Qtashteeb);
  if($rows > 0) {
      mysql_data_seek($Qtashteeb, 0);
	  $row_Qtashteeb = mysql_fetch_assoc($Qtashteeb);
  }
?>
                </select>
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong>التشـطــيــــــب</strong></td>
          </tr>
          <tr>
            <td width="15%" colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield7">
              <label for="price_to4"></label>
              <input name="price_to" type="text" id="price_to4" value="<?php echo $_SESSION['price_to']; ?>" />
            </span></td>
            <td width="15%" colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>الــــــى</strong></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield6">
              <label for="price_from4"></label>
              <input name="price_from" type="text" id="price_from4" value="<?php echo $_SESSION['price_from']; ?>" />
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong> الســــعـر من </strong></td>
          </tr>
          <tr>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield10">
              <label for="mesaha_to4"></label>
              <input name="mesaha_to" type="text" id="mesaha_to4" value="<?php echo $_SESSION['mesaha_to']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>الــــــى</strong></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield8">
              <label for="mesaha_from4"></label>
              <input name="mesaha_from" type="text" id="mesaha_from4" value="<?php echo $_SESSION['mesaha_from']; ?>" />
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong>المساحة من</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield11">
              <label for="hadeka_to4"></label>
              <input name="hadeka_to" type="text" id="hadeka_to4" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>الــــــى</strong></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield9">
              <label for="hadeka_from4"></label>
              <input name="hadeka_from" type="text" id="hadeka_from4" />
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4" class="black"><strong>الحـــديقة من </strong></td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>شــــــقــــــة</strong></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>عمــــــــــــارة</strong></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>مجمــــــــوعـة</strong></td>
            <td rowspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong><span id="sprytextfield16">
              <label for="door6"></label>
              <strong>الدور</strong>            </span></strong></td>
            <td rowspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFEDC" class="black"><strong>و</strong></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFEDC" class="black"><strong>ع</strong></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFEDC" class="black"><strong>ج</strong></td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><span id="sprytextfield14">
              <label for="wow4"></label>
              <input name="wow" type="text" id="wow4" value="<?php echo $_SESSION['wow']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><span id="sprytextfield13">
              <label for="ain4"></label>
              <input name="ain" type="text" id="ain4" value="<?php echo $_SESSION['ain']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><span id="sprytextfield12">
              <label for="geem4"></label>
              <input name="geem" type="text" id="geem4" value="<?php echo $_SESSION['geem']; ?>" />
            </span></td>
            <td rowspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="black"><select name="door[]" size="4" multiple="multiple" id="door"><option  value="">الكل</option>
              <?php
do {  
?>
              <option value="<?php echo $row_Qdoor['doorname']?>"><?php echo $row_Qdoor['doorname']?></option>
              <?php
} while ($row_Qdoor = mysql_fetch_assoc($Qdoor));
  $rows = mysql_num_rows($Qdoor);
  if($rows > 0) {
      mysql_data_seek($Qdoor, 0);
	  $row_Qdoor = mysql_fetch_assoc($Qdoor);
  }
?>
            </select></td>
            <td rowspan="3" align="left" valign="top" bgcolor="#FFFFFF" class="black"><?php echo $door_Recordset1;?></td>
          </tr>
          <tr>
            <td align="right">المرحلة<?php echo $marhala_Recordset1;?><strong></strong></td>
            <td align="right">نموذج<?php echo $namozg_Recordset1;?><strong></strong></td>
            <td align="right"><?php echo $amalyatype_Recordset1;?></td>
            <td align="right"><?php echo $tashteeb_Recordset1;?></td>
            <td align="right"><?php echo $aqartype_Recordset1;?></td>
            <td align="right">الحالة<?php echo $status_Recordset1;?><strong></strong></td>
            </tr>
          <tr>
            <td colspan="2" align="right">المدينة<?php echo $madena_Recordset1;?><strong></strong></td>
            <td colspan="2" align="center" valign="middle"><input type="reset" name="cancel" id="cancel" value="الغـــــــــــــاء" /></td>
            <td colspan="2" align="center" valign="middle"><input type="submit" name="search" id="search" value="بــحــــــــــــــــث" /></td>
            </tr>
        </table>
        <table width="89%" border="0" align="center">
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
      </table>
    </form>
    </tr>
  </tbody>
</table>
<table width="99%" border="0">
  <tbody>
    <tr>
      <td><table width="41%" border="0" align="left">
        <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
        <tr>
          <td colspan="5" align="center" valign="middle" bgcolor="#FFFFFF"><strong>عفواً لا توجد بيانات ينطبق عليها شروط البحث</strong></td>
        </tr>
        <?php } // Show if recordset empty ?>
        <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
        <tr>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
          <td align="right" valign="middle" bgcolor="#FFFEDC">يوجد عدد<?php echo $totalRows_Recordset1 ?> بيـــان</td>
        </tr>
        <?php } // Show if recordset not empty ?>
      </table></td>
    </tr>
  </tbody>
</table>
<table width="99%" border="0">
  <tbody>
    <tr>
      <td>
      <?php do{?>
      <table width="97%" border="0">
        <tbody>
          <tr>
            <td colspan="3" align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['geem']; ?></span></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">ج</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">تاريخ التعديل</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">الفيو View</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المرحلة</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">نوع العقار</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">العملية</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المدينة</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">الكود<a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" target="_blank"><img src="./view_images.png" alt="صور العقار" width="30" height="20" /></a></span></strong></td>
            <td align="center" valign="middle" bgcolor="#327900"><a href="./update.php?code=<?php echo $row_Recordset1['code'];?>"><img src="alarm.jpg" width="25" height="25" alt=""/></a></td>
            </tr>
          <tr>
            <td colspan="3" align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['ain']; ?></span></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">ع</span></strong></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['update_date']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['view_v']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['marhala']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['aqar_type']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['amalya_type']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['madena']; ?></span></td>
            <td colspan="2" align="center" valign="middle"><a href="./view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" title="عرض الصور" target="_blank"><strong><?php echo $row_Recordset1['code']; ?></strong></a></td>
            </tr>
          <tr>
            <td colspan="3" align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['wow']; ?></span></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">و</span></strong></td>
            <td align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">الحالة</span></strong></td>
            <td bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">اجمالى العقد</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المتبقى</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المطلوب</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">مساحة الأرض</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">مساحة المبانى</span></strong></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">نموذج</span></strong></td>
            </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#327900">&nbsp;</td>
            <td align="center" valign="middle" bgcolor="#FFFEDC"><strong><a href="./delete_item_admin.php?code=<?php echo $row_Recordset1['code']; ?>">حذف</a></strong></td>
            <td align="center" valign="middle" bgcolor="#FFFEDC"><strong><a href="./update.php?code=<?php echo $row_Recordset1['code']; ?>">تعديل</a></strong></td>
            <td align="center" valign="middle" bgcolor="#FFFEDC"><strong><a href="./print_sheet_new.php?code=<?php echo $row_Recordset1['code']; ?>">التفاصيل</a></strong></td>
            <td align="center"><span class="black"><?php echo $row_Recordset1['status']; ?></span></td>
            <td><span class="black"><?php echo number_format($row_Recordset1['aqd_total'])." ج.م. "; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo number_format($row_Recordset1['motabaqi'])." ج.م. "; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo number_format($row_Recordset1['matloob'])." ج.م. "; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['ard_mesaha']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['mbna_mesaha']; ?></span></td>
            <td colspan="2" align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['namozg']; ?></span></td>
            </tr>
          <tr>
            <td colspan="11" align="center" valign="middle"><img src="linebar.png" width="280" height="13" alt=""/><img src="linebar.png" width="280" height="13" alt=""/><img src="linebar.png" width="280" height="13" alt=""/></td>
            <td align="center" valign="middle" bgcolor="#2D6C01" onmouseover="bgcolor=#ECDC49">&nbsp;</td>
            </tr>
        </tbody>
      </table><?php }while ($row_Recordset1=mysql_fetch_assoc($Recordset1));?></td>
    </tr>
  </tbody>
</table>
<table width="99%" border="0">
  <tbody>
    <tr>
      <td align="center"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<script type="text/javascript">
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {isRequired:false});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {isRequired:false});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {isRequired:false});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {isRequired:false});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {isRequired:false});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15", "integer", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
<?php
mysql_free_result($Qcity);

mysql_free_result($Qaqar_type);

mysql_free_result($Qamalya_type);

mysql_free_result($Qatatus);

mysql_free_result($Qtashteeb);

mysql_free_result($Recordsetmomz);

mysql_free_result($Recordset9);

mysql_free_result($Recordsetmomz_new);

mysql_free_result($Qmarhala);

mysql_free_result($Recordset1);
?>
