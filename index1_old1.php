<?php //require_once('Connections/goodnews.php'); ?>
<?php //require_once('Connections/goodnews1.php'); ?>
<?php virtual('Connections/goodnews.php'); ?>
<?php virtual('Connections/goodnews1.php'); ?>

<?php
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
  $madena_Recordset1 = $_POST['madena'];
 
  $query1 = sprintf("CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata WHERE madena = %s ", GetSQLValueString($madena_Recordset1, "text"));
  $R1 = mysql_query($query1, $utopia) or die(mysql_error());
}else{
	$query1 = sprintf("CREATE TEMPORARY TABLE tmadena as SELECT * FROM udata");
	$R1 = mysql_query($query1, $utopia) or die(mysql_error());
	}
// 2- taqartype
if (isset($_POST['aqar_type']) && $_POST['aqar_type'] !="") {
  $aqartype_Recordset1 = $_POST['aqar_type'];
  $query2 = sprintf("CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena WHERE aqar_type = %s", GetSQLValueString($aqartype_Recordset1, "text"));
  $R2 = mysql_query($query2, $utopia) or die(mysql_error());
}else{
	$query2 = sprintf("CREATE TEMPORARY TABLE taqartype as SELECT * FROM tmadena");
	$R2 = mysql_query($query2, $utopia) or die(mysql_error());
	}
// 3- tamalyatype
if (isset($_POST['amalya_type']) && $_POST['amalya_type'] !="") {
  $amalyatype_Recordset1 = $_POST['amalya_type'];
  $query3 = sprintf("CREATE TEMPORARY TABLE tamalyatype as SELECT * FROM taqartype WHERE amalya_type = %s", GetSQLValueString($amalyatype_Recordset1, "text"));
  $R3 = mysql_query($query3, $utopia) or die(mysql_error());
}else{
	$query3 = sprintf("CREATE TEMPORARY TABLE tamalyatype as SELECT * FROM taqartype");
	$R3 = mysql_query($query3, $utopia) or die(mysql_error());
	}	
// 4- tstatus
if (isset($_POST['status']) && $_POST['status'] !="") {
  $status_Recordset1 = $_POST['status'];
  $query4 = sprintf("CREATE TEMPORARY TABLE tstatus as SELECT * FROM tamalyatype WHERE status = %s", GetSQLValueString($status_Recordset1, "text"));
  $R4 = mysql_query($query4, $utopia) or die(mysql_error());
}else{
	$query4 = sprintf("CREATE TEMPORARY TABLE tstatus as SELECT * FROM tamalyatype");
	$R4 = mysql_query($query4, $utopia) or die(mysql_error());
	}	
// 5- ttashteeb
if (isset($_POST['tashteeb']) && $_POST['tashteeb'] !="") {
  $tashteeb_Recordset1 = $_POST['tashteeb'];
  $query5 = sprintf("CREATE TEMPORARY TABLE ttashteeb as SELECT * FROM tstatus WHERE tashteeb = %s", GetSQLValueString($tashteeb_Recordset1, "text"));
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
  $marhala_Recordset1 = $_POST['marhala'];
  $query10 = sprintf("CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode WHERE marhala LIKE %s", GetSQLValueString("%".$marhala_Recordset1."%", "text"));
  $R10 = mysql_query($query10, $utopia) or die(mysql_error());
}else{
	$query10 = sprintf("CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode");
	$R10 = mysql_query($query10, $utopia) or die(mysql_error());
	}		
// 11- Tnamozag
if (isset($_POST['namozag']) && $_POST['namozag'] !="") {
  $namozag_Recordset1 = $_POST['namozag'];
  $query11 = sprintf("CREATE TEMPORARY TABLE tnamozag as SELECT * FROM tmarhala WHERE namozg = %s", GetSQLValueString($namozag_Recordset1, "text"));
  $R11 = mysql_query($query11, $utopia) or die(mysql_error());
}else{
	$query11 = sprintf("CREATE TEMPORARY TABLE tnamozag as SELECT * FROM tmarhala");
	$R11 = mysql_query($query11, $utopia) or die(mysql_error());
	}		
// 12- Tcustomername
if (isset($_POST['customer_name']) && $_POST['customer_name'] !="") {
  $customer_name_Recordset1 = $_POST['customer_name'];
  $query12 = sprintf("CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tnamozag WHERE cust_name LIKE %s", GetSQLValueString("%".$customer_name_Recordset1."%", "text"));
  $R12 = mysql_query($query12, $utopia) or die(mysql_error());
}else{
	$query12 = sprintf("CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tnamozag");
	$R12 = mysql_query($query12, $utopia) or die(mysql_error());
	}		
// 13- Tmobile
if (isset($_POST['mobile']) && $_POST['mobile'] !="") {
  $mobile_Recordset1 = $_POST['mobile'];
  $query13 = sprintf("CREATE TEMPORARY TABLE tmobile as SELECT * FROM tcustomername WHERE mobile = %s OR telephone = %s", GetSQLValueString($mobile_Recordset1, "text"),GetSQLValueString($mobile_Recordset1, "text"));
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
  $door_Recordset1 = $_POST['door'];
  $query16 = sprintf("CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain WHERE door = %s", GetSQLValueString($door_Recordset1, "text"));
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
<title>الشاشة الرئيسية</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #CCC;
}
.black {
	color: #000;
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="./SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="./SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="./SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="./SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
<link href="green.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="98%" border="0" align="center">
  <tr>
    <td width="3%" align="center" valign="middle" bgcolor="#C9C9C9"><?php echo date("d/m/Y h:i:s a") ?>&nbsp;</td>
    <td width="1%" bgcolor="#C9C9C9">&nbsp;</td>
    <th colspan="5" align="center" valign="middle" bgcolor="#C9C9C9"><h1><img src="./banner.png" alt="" width="600" height="124" /></h1></th>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#314ECE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="right" valign="middle" bgcolor="#FFFEBF"><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="index1.php">الرئيسية</a></li>
      <li><a class="MenuBarItemSubmenu" href="index1.php">بحث متخصص</a>
        <ul>
          <li><a href="view_code.php">كود العقار</a></li>
          <li><a href="view_madena.php">المدينة</a></li>
          <li><a href="view_aqar_type.php">نوع العقار</a></li>
          <li><a href="view_namozg.php">النموذج</a></li>
          <li><a href="view_tashteeb.php">التشطيب</a></li>
          <li><a href="view_amalya_type.php">نوع العملية</a></li>
          <li><a href="view_status.php">الحالة</a></li>
          <li><a href="view_customer.php">بيانات العميل</a></li>
          <li><a href="view_price_mesaha.php">السعر / المساحة</a></li>
          <li><a href="./view_marhala.php">المرحلة</a></li>
        </ul>
    </li>
<li><a href="view_all.php">عرض البيانات</a></li>
      <li><a href="insert.php">ادخال بيان جديد</a>        </li>
      <li><a href="user_view.php">المستخدمين</a></li>
      <li><a href="./help.php">المساعدة</a></li>
    </ul></td>
    <td width="11%" colspan="-2" align="center" valign="middle" bgcolor="#A4D24E" class="blue"><strong>الشاشة الرئيسية</strong></td>
    <td width="14%" colspan="-2" align="right" valign="middle" bgcolor="#A4D24E"><a href="./index.php"><img src="logout.png" width="28" height="28" alt="خروج من النظام" /></a></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#AEAEAE" class="green"><?php echo date("l"); ?>&nbsp;</td>
    <td width="57%" align="center" valign="middle" bgcolor="#AEAEAE">
        <marquee direction="right" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout= "this.setAttribute('scrollamount', 6, 0);"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr><?php do { ?>
            <td align="right" valign="middle"><a href="<?php echo $row_Recordset9['url']; ?>" target="_blank"><?php echo $row_Recordset9['url']; ?></a></td>
            <td align="right" valign="middle" class="yelow"><?php echo $row_Recordset9['sitename']; ?></td>
          <?php } while ($row_Recordset9 = mysql_fetch_assoc($Recordset9)); ?></tr>
        </table></marquee>
    </td>
    <td width="1%" align="center" valign="middle" bgcolor="#A4D24E">&nbsp;</td>
    <td colspan="2" align="left" valign="middle" bgcolor="#AEAEAE" class="green"><strong class="green">مواقع تسويق عقارى صديقة</strong></td>
    <td align="center" valign="middle" bgcolor="#AEAEAE"><strong style="color: #17036B">نموذج البحث الشامل </strong></td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#AEAEAE"><form id="form1" name="form1" method="post" action="">
      <table width="89%" border="0" align="center">
        <tr>
          <td colspan="4" rowspan="13"><label for="code"><img src="./1_3.jpg" width="534" height="357" /></label></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield1">
            <label for="code2"></label>
            <input name="code" type="text" id="code2" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الكـــــــود</strong></td>
          <td width="15%" align="right" valign="middle" bgcolor="#C9C9C9"><label for="madena"><span id="spryselect1">
            <select name="madena" id="madena2">
              <option value="">الكل</option>
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
</span></label></td>
          <td width="13%" align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>المــــديـنـــــــة</strong></td>
        </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield2">
            <label for="marhala"></label>
            <input name="marhala" type="text" id="marhala" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>المرحلة</strong></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9"><label for="aqar_type"><span id="spryselect2">
            <select name="aqar_type" id="aqar_type2">
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
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>نوع العقــــــار</strong></td>
        </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield3">
            <label for="namozag"></label>
            <input name="namozag" type="text" id="namozag" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>النموذج</strong></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9"><label for="amalua_type"><span id="spryselect3">
            <select name="amalya_type" id="amalya_type">
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
</span></label></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>نوع العملـــــية</strong></td>
        </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield4">
            <label for="customer_name"></label>
            <input name="customer_name" type="text" id="customer_name" value="" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>اسم العميل</strong></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9"><label for="status"><span id="spryselect4">
            <select name="status" id="status2">
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
</span></label></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الحـــــــــالــــة</strong></td>
        </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield5">
            <label for="mobile"></label>
            <input name="mobile" type="text" id="mobile" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>رقم الموبايل</strong></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9"><span id="spryselect5">
            <label for="tashteeb"></label>
            <select name="tashteeb" id="tashteeb">
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
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>التشـطــيــــــب</strong></td>
        </tr>
        <tr>
          <td width="15%" align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield7">
            <label for="price_to"></label>
            <input name="price_to" type="text" id="price_to" />
</span></td>
          <td width="15%" align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الــــــى</strong></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield6">
            <label for="price_from"></label>
            <input name="price_from" type="text" id="price_from" />
</span></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong> الســــعـر من </strong></td>
          </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield10">
            <label for="mesaha_to"></label>
            <input name="mesaha_to" type="text" id="mesaha_to" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الــــــى</strong></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield8">
            <label for="mesaha_from"></label>
            <input name="mesaha_from" type="text" id="mesaha_from" />
</span></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>المساحة من</strong></td>
          </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield11">
            <label for="hadeka_to"></label>
            <input name="hadeka_to" type="text" id="hadeka_to" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الــــــى</strong></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield9">
            <label for="hadeka_from"></label>
            <input name="hadeka_from" type="text" id="hadeka_from" />
</span></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الحـــديقة من </strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>شــــــقــــــة</strong></td>
          <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>عمــــــــــــارة</strong></td>
          <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>مجمــــــــوعـة</strong></td>
          <td rowspan="2" align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الدور</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>و</strong></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>ع</strong></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>ج</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield14">
            <label for="wow"></label>
            <input name="wow" type="text" id="wow" />
</span></td>
          <td align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield13">
            <label for="ain"></label>
            <input name="ain" type="text" id="ain" />
</span></td>
          <td align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield12">
            <label for="geem"></label>
            <input name="geem" type="text" id="geem" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><span id="sprytextfield16">
            <label for="door"></label>
            <input name="door" type="text" id="door" size="5" maxlength="20" />
</span></td>
          </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
          </tr>
        <tr>
          <td><table width="95%" border="0">
            <tr>
              <td colspan="2" align="center" valign="top">&nbsp;</td>
              </tr>
            <tr>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
          </table></td>
          <td align="center" valign="middle"><input type="reset" name="cancel" id="cancel" value="الغـــــــــــــاء" /></td>
          <td align="center" valign="middle"><input type="submit" name="search" id="search" value="بــحــــــــــــــــث" /></td>
          <td bgcolor="#000099" align="center" valign="middle" class="yelow"><a href="./custom_search.php"><strong class="yelow"> شاشة البحث السريع</strong></a></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#C9C9C9"><form id="form2" name="form2" method="post" action="">
      <table width="29%" border="0">
        <tr>
          <td width="3%">&nbsp;</td>
          <td width="23%" align="center" valign="middle"><input type="submit" name="tophandred" id="tophandred" value="عــــــرض" /></td>
          <td width="8%"><span id="sprytextfield15">
          <label for="top100"></label>
          <input name="top100" type="text" id="top100" size="5" />
<span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          <td width="7%" align="left" valign="middle"><strong>أحدث</strong></td>
          <td width="2%" align="left" valign="middle">&nbsp;</td>
          <td width="12%" align="left" valign="middle"><label for="ordtype"></label>
            <select name="ordtype" id="ordtype">
              <option value="ASC" selected="selected">تصاعدى</option>
              <option value="DESC">تنازلى</option>
            </select></td>
          <td width="18%" align="left" valign="middle"><label for="ordby"></label>
            <select name="ordby" id="ordby">
              <option value="entry_date" selected="selected">تاريخ الادخال</option>
              <option value="update_date">تاريخ التعديل</option>
              <option value="code">الكود</option>
              <option value="matloob">السعر المطلوب</option>
            </select></td>
          <td width="27%" align="left" valign="middle"><strong>ترتيب حسب</strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="7"><table width="37%" border="0" align="left">
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
      <tr>
        <td colspan="5" align="center" valign="middle" bgcolor="#9B9B9B"><strong>عفواً لا توجد بيانات ينطبق عليها شروط البحث</strong></td>
      </tr>
      <?php } // Show if recordset empty ?>
      <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
      <tr>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
        <td align="right" valign="middle" bgcolor="#9B9B9B">يوجد عدد<?php echo $totalRows_Recordset1 ?> بيـــان</td>
      </tr>
      <?php } // Show if recordset not empty ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">************عقــــــــــــــــــارات مميــــــــــــــــــــــــزة**********</strong></td>
    <td rowspan="2" align="right" bgcolor="#000099"><a href="./data_backup.php"><p><strong class="yelow">نسخة احتياطية من قاعدة البيانات</strong></p></a>
    <a href="./log_sheet.php"><p><strong class="yelow">History Log</strong></p></a>
    <p><a href="./view_all_momz.php"><strong class="yelow">المزيد من العقارات المميزة</strong></a></p>
    <p class="yelow"><a href="./view_images.php"><strong class="yelow">عرض صور العقارات</strong></a></p>
    <p class="yelow"><a href="./other_add.php"><strong class="yelow">اعدادات بيانات العقارات</strong></a></p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#B1B1B1"><marquee direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout= "this.setAttribute('scrollamount', 6, 0);"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <?php do { ?>
        <tr class="blue">
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">التفاصيل</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">المطلوب</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">اجمالى العقد</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">نوع العملية</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">نموذج</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">العنوان</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">نوع العقار</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">المدينة</td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="blue">كود العقار</td>
          </tr>
        <tr>
          <td align="center" valign="middle"><a href="./print_sheet.php?code=<?php echo $row_Recordsetmomz['code']; ?>">اضغط هنا لمزيد من التفاصيل</a></td>
          <td align="center" valign="middle"><?php echo number_format($row_Recordsetmomz['matloob'])."ج.م."; ?></td>
          <td align="center" valign="middle"><?php echo number_format($row_Recordsetmomz['aqd_total'])."ج.م."; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordsetmomz['amalya_type']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordsetmomz['namozg']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordsetmomz['address']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordsetmomz['aqar_type']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordsetmomz['madena']; ?></td>
          <td align="center" valign="middle"><a href="./view_images_code.php?code=<?php echo $row_Recordsetmomz['code']; ?>" title="عرض الصور" target="_blank"><?php echo $row_Recordsetmomz['code']; ?></a></td>
          </tr>
        <?php } while ($row_Recordsetmomz = mysql_fetch_assoc($Recordsetmomz)); ?>
    </table></marquee></td>
  </tr>
  <tr>
    <td colspan="7"><?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
        <table width="95%" border="0" align="center">
          <tr class="black">
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow">حذف</td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>التفاصيل</strong></td>
             <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>تعديل</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>تاريخ التعديل</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>view</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>اجمالى العقد</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>المتبقى</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>المطلوب</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>مدة الايجار</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>الحالة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>مساحة الارض</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>مساحة المبنى</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>نموذج</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>و</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>ع</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>ج</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">المرحلة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">نوع العقار</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>نوع العملية</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">المدينة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">الكود</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black">&nbsp;</td>
          </tr>
          <?php do { ?>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="./delete_item_admin.php?code=<?php echo $row_Recordset1['code']; ?>">حذف</a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="./print_sheet.php?code=<?php echo $row_Recordset1['code']; ?>">التفاصيل</a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="./update.php?code=<?php echo $row_Recordset1['code']; ?>">تعديل</a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['update_date']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['view_v']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['aqd_total'])." ج.م. "; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['motabaqi'])." ج.م. "; ?></td>

              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['matloob'])." ج.م. "; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['modah_ejar']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['status']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['ard_mesaha']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['mbna_mesaha']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['namozg']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['wow']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['ain']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['geem']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['marhala']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['aqar_type']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['amalya_type']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['madena']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><a href="./view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" title="عرض الصور" target="_blank"><?php echo $row_Recordset1['code']; ?></a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" target="_blank"><img src="./view_images.png" alt="صور العقار" width="30" height="20" /></a></td>
            </tr>
            <tr bgcolor="#9B9B9B">
              <td colspan="22" align="center" valign="middle"><hr /></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
    <?php } // Show if recordset not empty ?></td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" align="right" bgcolor="#314ECE"><span class="yelow">برنامج ادارة التسويق العقارى الاصدار الثانى V. 2.0 - 2015</span></td>
  </tr>
</table>
<p>&nbsp; </p>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {isRequired:false});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {isRequired:false});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {isRequired:false});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {isRequired:false});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {isRequired:false});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {isRequired:false});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {isRequired:false});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {isRequired:false});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {isRequired:false});
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15", "integer", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield16 = new Spry.Widget.ValidationTextField("sprytextfield16", "none", {isRequired:false, validateOn:["blur", "change"]});
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

mysql_free_result($Recordset1);
?>
