<?php require_once('Connections/goodnews.php'); ?>
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

mysql_select_db($database_utopia, $utopia);
$query_Recordset101 = "SELECT distinct marhala,door FROM udata";
$Recordset101 = mysql_query($query_Recordset101, $utopia) or die(mysql_error());
$row_Recordset101 = mysql_fetch_assoc($Recordset101);
$totalRows_Recordset101 = mysql_num_rows($Recordset101);

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

// 4- tstatus
if (isset($_POST['status']) && $_POST['status'] !="") {
  $status_Recordset1 = $_POST['status'];
  $query4 = sprintf("CREATE TEMPORARY TABLE tstatus as SELECT * FROM taqartype WHERE status = %s", GetSQLValueString($status_Recordset1, "text"));
  $R4 = mysql_query($query4, $utopia) or die(mysql_error());
}else{
	$query4 = sprintf("CREATE TEMPORARY TABLE tstatus as SELECT * FROM taqartype");
	$R4 = mysql_query($query4, $utopia) or die(mysql_error());
	}	

// 9- Tcode
if (isset($_POST['code']) && $_POST['code'] !="") {
  $code_Recordset1 = $_POST['code'];
  $query9 = sprintf("CREATE TEMPORARY TABLE tcode as SELECT * FROM tstatus WHERE code = %s", GetSQLValueString($code_Recordset1, "text"));
  $R9 = mysql_query($query9, $utopia) or die(mysql_error());
}else{
	$query9 = sprintf("CREATE TEMPORARY TABLE tcode as SELECT * FROM tstatus");
	$R9 = mysql_query($query9, $utopia) or die(mysql_error());
	}		
// 10- Tmarhala
error_reporting( error_reporting() & ~E_NOTICE );
if((isset($_POST['m1']) && ($_POST['m1']!=-1))||(isset($_POST['m2']) && ($_POST['m2']!=-1))||(isset($_POST['m3']) && ($_POST['m3']!=-1))||(isset($_POST['m4']) && ($_POST['m4']!=-1))||(isset($_POST['m5']) && ($_POST['m5']!=-1))||(isset($_POST['m6']) && ($_POST['m6']!=-1))){
	$query10 = sprintf("CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode WHERE marhala=%d OR marhala=%d OR marhala=%d OR marhala=%d OR marhala=%d OR marhala=%d",$_POST['m1'],$_POST['m2'],$_POST['m3'],$_POST['m4'],$_POST['m5'],$_POST['m6']);
  $R10 = mysql_query($query10, $utopia) or die(mysql_error());
}
else
{
if (isset($_POST['marhala']) && $_POST['marhala'] !="") {
  $marhala_Recordset1 = $_POST['marhala'];
  $query10 = sprintf("CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode WHERE marhala LIKE %s", GetSQLValueString("%".$marhala_Recordset1."%", "text"));
  $R10 = mysql_query($query10, $utopia) or die(mysql_error());
}else{
	$query10 = sprintf("CREATE TEMPORARY TABLE tmarhala as SELECT * FROM tcode");
	$R10 = mysql_query($query10, $utopia) or die(mysql_error());
	}		
}
// 12- Tcustomername
if (isset($_POST['customer_name']) && $_POST['customer_name'] !="") {
  $customer_name_Recordset1 = $_POST['customer_name'];
  $query12 = sprintf("CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tmarhala WHERE cust_name LIKE %s", GetSQLValueString("%".$customer_name_Recordset1."%", "text"));
  $R12 = mysql_query($query12, $utopia) or die(mysql_error());
}else{
	$query12 = sprintf("CREATE TEMPORARY TABLE tcustomername as SELECT * FROM tmarhala");
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
if((isset($_POST['d1']) && ($_POST['d1']!=-1))||(isset($_POST['d2']) && ($_POST['d2']!=-1))||(isset($_POST['d3']) && ($_POST['d3']!=-1))||(isset($_POST['d4']) && ($_POST['d4']!=-1))||(isset($_POST['d5']) && ($_POST['d5']!=-1))||(isset($_POST['d6']) && ($_POST['d6']!=-1))||(isset($_POST['d0']) && ($_POST['d0']!=-1))){
	$query16 = sprintf("CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain WHERE door = %d OR door = %d  OR door = %d OR door = %d OR door = %d OR door = %d OR door = %d ",$_POST['d1'],$_POST['d2'],$_POST['d3'],$_POST['d4'],$_POST['d5'],$_POST['d6'],$_POST['d0']);
  $R16 = mysql_query($query16, $utopia) or die(mysql_error());
}
else
{
if (isset($_POST['door']) && $_POST['door'] !="") {
  $door_Recordset1 = $_POST['door'];
  $query16 = sprintf("CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain WHERE door = %s", GetSQLValueString($door_Recordset1, "text"));
  $R16 = mysql_query($query16, $utopia) or die(mysql_error());
}else{
	$query16 = sprintf("CREATE TEMPORARY TABLE tdoor as SELECT * FROM tain");
	$R16 = mysql_query($query16, $utopia) or die(mysql_error());
	}
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>شاشة البحث السريع</title>
<style type="text/css">
body,td,th {
	color: #F00;
}
body {
	background-color: #CCC;
}
.black {
	color: #000;
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script><script src="./SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="./SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td width="295" align="center" valign="middle" bgcolor="#C9C9C9"><?php echo date("d/m/Y h:i:s a") ?>&nbsp;</td>
    <td width="1785" align="right" valign="middle" bgcolor="#C9C9C9"><img src="./banner.png" alt="" width="600" height="124" /></td>
    <td colspan="7" bgcolor="#C9C9C9"><h1>&nbsp;</h1></td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#314ECE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" align="right" valign="middle" bgcolor="#FF0000"><ul id="MenuBar1" class="MenuBarHorizontal">
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
    <td width="279" align="center" valign="middle" bgcolor="#FF0000" class="blue"><strong>شاشة البحث السريع</strong></td>
    <td width="121" align="right" valign="middle" bgcolor="#FF0000"><a href="./index.php"><img src="logout.png" width="28" height="28" alt="خروج من النظام" /></a></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#AEAEAE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#AEAEAE"><form id="form1" name="form1" method="post" action="">
      <table width="90%" border="0" align="center">
        <tr>
          <td colspan="4" rowspan="13">&nbsp;</td>
          <td colspan="2" rowspan="3" align="right" valign="middle" bgcolor="#333333" class="black"><strong class="yelow">            بحــــــــــــــــــــــــــث ببيـــــــــــــــــــــانــــــات العمــــيــــــــــــــــــــــــــل
            </strong></td>
          <td colspan="3" align="right" valign="middle" bgcolor="#333333" class="yelow"><strong>بحــــــــث بالكــــــــــود</strong></td>
          </tr>
        <tr>
          <td width="19%" align="right" valign="middle" bgcolor="#C9C9C9">&nbsp;</td>
          <td width="6%" align="right" valign="middle" bgcolor="#C9C9C9"><span class="black">
            <input name="code" tabindex="1" type="text" id="code2" />
          </span></td>
          <td width="14%" align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الكـــــــود</strong></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" bgcolor="#333333" class="yelow"><strong>بحـــــــــــث بالعنــــــــوان</strong></td>
          </tr>
        <tr>
          <td width="25%" align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield4">
            <label for="customer_name"></label>
            <input name="customer_name" tabindex="10" type="text" id="customer_name" value="" />
</span></td>
          <td width="24%" align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>اسم العميل</strong></td>
          <td colspan="2" align="right" valign="middle" bgcolor="#C9C9C9"><select name="madena" tabindex="2" id="madena2">
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
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>المــــديـنـــــــة</strong></td>
        </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield5">
            <label for="mobile"></label>
            <input name="mobile" tabindex="11" type="text" id="mobile" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>رقم الموبايل</strong></td>
          <td colspan="2" align="right" valign="middle" bgcolor="#C9C9C9"><select name="aqar_type" tabindex="3" id="aqar_type2">
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
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>نوع العقــــــار</strong></td>
        </tr>
        <tr>
          <td colspan="2" rowspan="3" align="right" valign="middle" bgcolor="#C9C9C9" class="black"><p> - 
فلترالبحث
مدينة <?php echo GetSQLValueString($madena_Recordset1, "text"); ?> -
نوع العقار<?php echo GetSQLValueString($aqartype_Recordset1, "text"); ?> -
الحالة<?php echo GetSQLValueString($status_Recordset1, "text"); ?> -
المرحلة<?php echo GetSQLValueString($marhala_Recordset1, "text"); ?> - 
</p></td>
          <td colspan="2" align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield6">
            <label for="price_from"></label>
            <select name="status" tabindex="4" id="status2">
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
          </span></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الحـــــــــالــــة</strong></td>
          </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="11%" align="right" valign="middle" bgcolor="#669900"><input name="m6" type="checkbox" id="m6" value="6" />
                </td>
              <td width="4%" align="left" valign="middle" bgcolor="#669900"><strong>6</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#66CC66"><input name="m5" type="checkbox" id="m5" value="5" />
              </td>
              <td width="4%" align="left" valign="middle" bgcolor="#66CC66"><strong>5</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#66FF99"><input name="m4" type="checkbox" id="m4" value="4" />
               </td>
              <td width="4%" align="left" valign="middle" bgcolor="#66FF99"><strong>4</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#66FFFF"><input name="m3" type="checkbox" id="m3" value="3"  />
               </td>
              <td width="4%" align="left" valign="middle" bgcolor="#66FFFF"><strong>3</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#FFFF99"><input name="m2" type="checkbox" id="m2" value="2" />
                </td>
              <td width="4%" align="left" valign="middle" bgcolor="#FFFF99"><strong>2</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#FFFFCC"><input name="m1" type="checkbox" id="m1" value="1"  />
                </td>
              <td align="left" valign="middle" bgcolor="#FFFFCC"><strong>1</strong></td>
              </tr>
          </table>            <label for="marhala"></label></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><select name="marhala" tabindex="5" id="marhala">
            <option value="">الكل</option>
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset101['marhala']?>"><?php echo $row_Recordset101['marhala']?></option>
            <?php
} while ($row_Recordset101 = mysql_fetch_assoc($Recordset101));
  $rows = mysql_num_rows($Recordset101);
  if($rows > 0) {
      mysql_data_seek($Recordset101, 0);
	  $row_Recordset101 = mysql_fetch_assoc($Recordset101);
  }
?>
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>المرحلة</strong></td>
          </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="9%" align="right" valign="middle" bgcolor="#666666"><input name="d6" type="checkbox" id="d6" value="6" />
                <label for="d6"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#666666"><strong>6</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#990000"><input name="d5" type="checkbox" id="d5" value="5" />
                <label for="d5"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#990000"><strong>5</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#996633"><input name="d4" type="checkbox" id="d4" value="4" />
                <label for="d4"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#996633"><strong>4</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#9900FF"><input name="d3" type="checkbox" id="d3" value="3" />
                <label for="d3"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#9900FF"><strong>3</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#FF6633"><input name="d2" type="checkbox" id="d2" value="2" />
                <label for="d2"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#FF6633"><strong>2</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#FF6666"><input name="d1" type="checkbox" id="d1" value="1" />
                <label for="d1"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#FF6666"><strong>1</strong></td>
              <td width="15%" align="right" valign="middle" bgcolor="#FF99FF"><input name="d0" type="checkbox" id="d0" value="0" />
                <label for="d0"></label></td>
              <td width="13%" align="center" valign="middle" bgcolor="#FF99FF"><strong>ارضى</strong></td>
            </tr>
          </table>            <label for="door"></label></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><select name="door" tabindex="6" id="door">
            <option value="">الكل</option>
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset101['door']?>"><?php echo $row_Recordset101['door']?></option>
            <?php
} while ($row_Recordset101 = mysql_fetch_assoc($Recordset101));
  $rows = mysql_num_rows($Recordset101);
  if($rows > 0) {
      mysql_data_seek($Recordset101, 0);
	  $row_Recordset101 = mysql_fetch_assoc($Recordset101);
  }
?>
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الــــــدور</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>شــــــقــــــة</strong></td>
          <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>عمــــــــــــارة</strong></td>
          <td colspan="2" align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>مجمــــــــوعـة</strong></td>
          <td rowspan="2" align="center" valign="middle" bgcolor="#333333" class="yelow"><strong>بحـــــــث بالمجمــــــوعــــة / عمارة / شقـــــــة</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>و</strong></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>ع</strong></td>
          <td colspan="2" align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>ج</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield14">
            <label for="wow"></label>
            <input name="wow" tabindex="9" type="text" id="wow" />
</span></td>
          <td align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield13">
            <label for="ain"></label>
            <input name="ain" tabindex="8" type="text" id="ain" />
</span></td>
          <td colspan="2" align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield12">
            <label for="geem"></label>
            <input name="geem" tabindex="7" type="text" id="geem" />
</span></td>
          <td align="center" valign="middle" bgcolor="#C9C9C9" class="black">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle"><input type="reset" tabindex="16" name="cancel" id="cancel" value="الغـــــــــــــاء" /></td>
          <td colspan="2" align="center" valign="middle"><input type="submit" tabindex="15" name="search" id="search" value="بــحــــــــــــــــث" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#C9C9C9"><form id="form2" name="form2" method="post" action="">
      <table width="42%" border="0" align="center">
        <tr>
          <td width="3%">&nbsp;</td>
          <td width="23%" align="center" valign="middle"><input type="submit" tabindex="17" name="tophandred" id="tophandred" value="عــــــرض" /></td>
          <td width="8%"><span id="sprytextfield15">
          <label for="top100"></label>
          <input name="top100" type="text" tabindex="14" id="top100" size="5" />
<span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          <td width="7%" align="left" valign="middle"><strong>أحدث</strong></td>
          <td width="2%" align="left" valign="middle">&nbsp;</td>
          <td width="12%" align="left" valign="middle"><label for="ordtype"></label>
            <select name="ordtype" tabindex="13" id="ordtype">
              <option value="ASC" selected="selected">تصاعدى</option>
              <option value="DESC">تنازلى</option>
            </select></td>
          <td width="18%" align="left" valign="middle"><label for="ordby"></label>
            <select name="ordby" tabindex="12" id="ordby">
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
    <td colspan="9"><table width="37%" border="0" align="left">
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
    <td colspan="9"><?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
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
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="./view_images.png" alt="صور العقار" width="30" height="20" /></a></td>
            </tr>
            <tr bgcolor="#9B9B9B">
              <td colspan="22" align="center" valign="middle"><hr /></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
    <?php } // Show if recordset not empty ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" align="right" bgcolor="#314ECE"><span class="yelow">برنامج ادارة التسويق العقارى الاصدار الثانى V. 2.0 - 2015</span></td>
  </tr>
</table>
<p>&nbsp; </p>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {isRequired:false});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {isRequired:false});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {isRequired:false});
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

mysql_free_result($Recordset101);

mysql_free_result($Recordset1);
?>