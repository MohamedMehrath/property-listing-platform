<?php require_once('Connections/goodnews1.php'); ?>
<?php require_once('Connections/goodnews.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_query("SET NAMES 'utf8'");
$MM_authorizedUsers = "admin";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form6")) {
  $insertSQL = sprintf("INSERT INTO website (url, sitename) VALUES (%s, %s)",
                       GetSQLValueString($_POST['url'], "text"),
                       GetSQLValueString($_POST['sitename'], "text"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form12")) {
  $insertSQL = sprintf("INSERT INTO laqab (laqab_name) VALUES (%s)",
                       GetSQLValueString($_POST['laqab'], "text"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form11")) {
  $insertSQL = sprintf("INSERT INTO viewvv (viewname) VALUES (%s)",
                       GetSQLValueString($_POST['view'], "text"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form8")) {
  $insertSQL = sprintf("INSERT INTO namozg (namozgname) VALUES (%s)",
                       GetSQLValueString($_POST['namozg'], "text"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form9")) {
  $insertSQL = sprintf("INSERT INTO marhala (marhalaname) VALUES (%s)",
                       GetSQLValueString($_POST['marhala'], "text"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form10")) {
  $insertSQL = sprintf("INSERT INTO door (doorname) VALUES (%s)",
                       GetSQLValueString($_POST['door'], "text"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO city (cityname) VALUES (%s)",
                       GetSQLValueString($_POST['cityname'], "text"));

  mysql_select_db($database_utopia, $utopia);
  $Result1 = mysql_query($insertSQL, $utopia) or die(mysql_error());

  $insertGoTo = "./other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  //header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO aqar_type_t (aqar_type_name) VALUES (%s)",
                       GetSQLValueString($_POST['aqar_type_name'], "text"));

  mysql_select_db($database_utopia, $utopia);
  $Result1 = mysql_query($insertSQL, $utopia) or die(mysql_error());

  $insertGoTo = "./other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  //header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO amalya_type_t (amalya_type_name) VALUES (%s)",
                       GetSQLValueString($_POST['amalya_type_name'], "text"));

  mysql_select_db($database_utopia, $utopia);
  $Result1 = mysql_query($insertSQL, $utopia) or die(mysql_error());

  $insertGoTo = "./other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  //header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form4")) {
  $insertSQL = sprintf("INSERT INTO tashteeb_t (tashteeb_name) VALUES (%s)",
                       GetSQLValueString($_POST['tashteeb_name'], "text"));

  mysql_select_db($database_utopia, $utopia);
  $Result1 = mysql_query($insertSQL, $utopia) or die(mysql_error());

  $insertGoTo = "./other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  //header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form5")) {
  $insertSQL = sprintf("INSERT INTO status_t (status_name) VALUES (%s)",
                       GetSQLValueString($_POST['statusname'], "text"));

  mysql_select_db($database_utopia, $utopia);
  $Result1 = mysql_query($insertSQL, $utopia) or die(mysql_error());

  $insertGoTo = "./other_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  //header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_utopia, $utopia);
$query_Qcity = "SELECT * FROM city";
$Qcity = mysql_query($query_Qcity, $utopia) or die(mysql_error());
$row_Qcity = mysql_fetch_assoc($Qcity);
$totalRows_Qcity = mysql_num_rows($Qcity);

mysql_select_db($database_utopia, $utopia);
$query_Qaqartype = "SELECT * FROM aqar_type_t";
$Qaqartype = mysql_query($query_Qaqartype, $utopia) or die(mysql_error());
$row_Qaqartype = mysql_fetch_assoc($Qaqartype);
$totalRows_Qaqartype = mysql_num_rows($Qaqartype);

mysql_select_db($database_utopia, $utopia);
$query_Qamalya_type = "SELECT * FROM amalya_type_t";
$Qamalya_type = mysql_query($query_Qamalya_type, $utopia) or die(mysql_error());
$row_Qamalya_type = mysql_fetch_assoc($Qamalya_type);
$totalRows_Qamalya_type = mysql_num_rows($Qamalya_type);

mysql_select_db($database_utopia, $utopia);
$query_Qtashteeb = "SELECT * FROM tashteeb_t";
$Qtashteeb = mysql_query($query_Qtashteeb, $utopia) or die(mysql_error());
$row_Qtashteeb = mysql_fetch_assoc($Qtashteeb);
$totalRows_Qtashteeb = mysql_num_rows($Qtashteeb);

mysql_select_db($database_utopia, $utopia);
$query_Qstatus = "SELECT * FROM status_t";
$Qstatus = mysql_query($query_Qstatus, $utopia) or die(mysql_error());
$row_Qstatus = mysql_fetch_assoc($Qstatus);
$totalRows_Qstatus = mysql_num_rows($Qstatus);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset2 = "SELECT * FROM website";
$Recordset2 = mysql_query($query_Recordset2, $goodnews1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetnamozg = "SELECT * FROM namozg ORDER BY namozgname ASC";
$Recordsetnamozg = mysql_query($query_Recordsetnamozg, $goodnews1) or die(mysql_error());
$row_Recordsetnamozg = mysql_fetch_assoc($Recordsetnamozg);
$totalRows_Recordsetnamozg = mysql_num_rows($Recordsetnamozg);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetlaqab = "SELECT * FROM laqab ORDER BY laqab_name ASC";
$Recordsetlaqab = mysql_query($query_Recordsetlaqab, $goodnews1) or die(mysql_error());
$row_Recordsetlaqab = mysql_fetch_assoc($Recordsetlaqab);
$totalRows_Recordsetlaqab = mysql_num_rows($Recordsetlaqab);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetview = "SELECT * FROM viewvv ORDER BY viewname ASC";
$Recordsetview = mysql_query($query_Recordsetview, $goodnews1) or die(mysql_error());
$row_Recordsetview = mysql_fetch_assoc($Recordsetview);
$totalRows_Recordsetview = mysql_num_rows($Recordsetview);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetmarhala = "SELECT * FROM marhala ORDER BY marhalaname ASC";
$Recordsetmarhala = mysql_query($query_Recordsetmarhala, $goodnews1) or die(mysql_error());
$row_Recordsetmarhala = mysql_fetch_assoc($Recordsetmarhala);
$totalRows_Recordsetmarhala = mysql_num_rows($Recordsetmarhala);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetdoor = "SELECT * FROM door ORDER BY doorname ASC";
$Recordsetdoor = mysql_query($query_Recordsetdoor, $goodnews1) or die(mysql_error());
$row_Recordsetdoor = mysql_fetch_assoc($Recordsetdoor);
$totalRows_Recordsetdoor = mysql_num_rows($Recordsetdoor);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اعدادات العقارات</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
.gr {
	color: #008000;
}
.gr td {
	color: #008000;
}
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">
.yelow {color: #FF0;
}
.black {	color: #000;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="5" align="right" valign="middle" bgcolor="#FFFEDC">&nbsp;</td>
    <td width="18%" colspan="-2" align="center" valign="middle" bgcolor="#FFFEDC" class="blue"><strong>اعدادات بيانات العقارات</strong></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
    <td rowspan="8" align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="5"><table width="95%" border="0" align="center">
      <tr class="black">
        <td width="22%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة حالة عقار</strong></td>
        <td width="19%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة حالة تشطيب جديدة</strong></td>
        <td width="22%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة نوع عملية</strong></td>
        <td width="19%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة نوع عقار</strong></td>
        <td width="18%" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة مدينة جديدة</strong></td>
        </tr>
      <tr align="center" valign="top">
        <td bgcolor="#FFFFFF"><form id="form5" name="form5" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><label for="statusname"></label>
                <input type="text" tabindex="9" name="statusname" id="statusname" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><strong class="black">حالة العقار</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" tabindex="10" name="ok5" id="ok5" value="اضافة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form5" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form4" name="form4" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><label for="tashteeb_name"></label>
                <input type="text" tabindex="7" name="tashteeb_name" id="tashteeb_name" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><strong class="black">التشطيب</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" tabindex="8" name="ok4" id="ok4" value="اضافة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form4" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form3" name="form3" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><label for="amalya_type_name"></label>
                <input type="text" tabindex="5" name="amalya_type_name" id="amalya_type_name" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>نوع العملية</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" tabindex="6" name="ok3" id="ok3" value="اضافة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form3" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form2" name="form2" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input type="text" tabindex="3" name="aqar_type_name" id="aqar_type_name" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>نوع العقار</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><label for="aqar_type_name">
                <input type="submit" tabindex="4" name="ok2" id="ok2" value="اضافة" />
                </label></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form2" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td width="47%" align="center" valign="middle" bgcolor="#FFFFFF"><input type="text" tabindex="1" name="cityname" id="cityname" /></td>
              <td width="17%" align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>اسم المدينة</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><label for="cityname">
                <input type="submit" tabindex="2" name="ok" id="ok" value="اضافة" />
                </label></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form1" />
          </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><form id="form12" name="form12" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة القاب العملاء</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="laqab"></label>
                <input type="text" name="laqab" id="laqab" /></td>
              <td align="center" bgcolor="#FFFFFF" class="black"><strong>اللقب</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok11" id="ok11" value="اضــــافــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form12" />
          </form></td>
        <td><form id="form11" name="form11" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة View العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="view"></label>
                <input type="text" name="view" id="view" /></td>
              <td align="center" bgcolor="#FFFFFF" class="black"><strong>View</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok10" id="ok10" value="اضـــــافــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form11" />
          </form></td>
        <td><form id="form10" name="form10" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة ادوار العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="door"></label>
                <input type="text" name="door" id="door" /></td>
              <td align="center" bgcolor="#FFFFFF"><strong class="black">الدور</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok9" id="ok9" value="اضـــــافـــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form10" />
          </form></td>
        <td><form id="form9" name="form9" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة مراحل العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="marhala"></label>
                <input type="text" name="marhala" id="marhala" /></td>
              <td align="center" bgcolor="#FFFFFF" class="black"><strong>المرحلة</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok8" id="ok8" value="اضـــــافـــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form9" />
          </form></td>
        <td><form id="form8" name="form8" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة نماذج العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="namozg"></label>
                <input type="text" name="namozg" id="namozg" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>النموذج</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok7" id="ok7" value="اضــــافــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form8" />
          </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="53%">&nbsp;</td>
        <td width="37%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة مواقع تسويق عقارات صديقة</strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><form id="form6" name="form6" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFEDC"><span id="sprytextfield1">
                <label for="sitename"></label>
                <input name="sitename" type="text" id="sitename" size="30" />
  </span></td>
              <td align="right" valign="middle" bgcolor="#FFFEDC" class="black"><strong>اسم الموقع /الوصف</strong></td>
              </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFEDC"><span id="sprytextfield2">
                <label for="url"></label>
                <input name="url" type="text" id="url" size="30" />
                <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
              <td align="right" valign="middle" bgcolor="#FFFEDC" class="black"><strong>رابط الموقع URL</strong></td>
              </tr>
            <tr align="center" valign="middle">
              <td colspan="2" bgcolor="#FFFEDC"><input type="submit" name="ok6" id="ok6" value="اضــــــــــــافـــــــــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form6" />
          </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><table width="80%" border="0" align="center">
      <tr>
        <td colspan="5" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="blue">البـــــيـــانـــــــــــــــــــــــــات الحـــــــــــــــــــالـــــيـــــــة</strong></td>
        </tr>
      <tr align="center" valign="top" bgcolor="#CFD0EB">
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">حالات العقارات</strong></td>
            </tr>
          <?php do { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qstatus['status_name']; ?></td>
              </tr>
            <?php } while ($row_Qstatus = mysql_fetch_assoc($Qstatus)); ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">حالات التشطيب</strong></td>
            </tr>
          <?php do { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qtashteeb['tashteeb_name']; ?></td>
              </tr>
            <?php } while ($row_Qtashteeb = mysql_fetch_assoc($Qtashteeb)); ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">انواع عمليات العقارات</strong></td>
            </tr>
          <?php do { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qamalya_type['amalya_type_name']; ?></td>
              </tr>
            <?php } while ($row_Qamalya_type = mysql_fetch_assoc($Qamalya_type)); ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">انواع العقارات</strong></td>
            </tr>
          <?php do { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qaqartype['aqar_type_name']; ?></td>
              </tr>
            <?php } while ($row_Qaqartype = mysql_fetch_assoc($Qaqartype)); ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">المدن الحالية</strong></td>
            </tr>
          <?php do { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qcity['cityname']; ?></td>
              </tr>
            <?php } while ($row_Qcity = mysql_fetch_assoc($Qcity)); ?>
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr valign="top">
    <td width="14%" rowspan="2" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">الألقاب الحالية</strong></td>
      </tr>
      <?php do { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetlaqab['laqab_name']; ?></td>
        </tr>
        <?php } while ($row_Recordsetlaqab = mysql_fetch_assoc($Recordsetlaqab)); ?>
    </table></td>
    <td width="12%" rowspan="2" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">View الحالية</strong></td>
      </tr>
      <?php do { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetview['viewname']; ?></td>
        </tr>
        <?php } while ($row_Recordsetview = mysql_fetch_assoc($Recordsetview)); ?>
    </table></td>
    <td width="13%" rowspan="2" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">الأدوار الحالية</strong></td>
      </tr>
      <?php do { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetdoor['doorname']; ?></td>
        </tr>
        <?php } while ($row_Recordsetdoor = mysql_fetch_assoc($Recordsetdoor)); ?>
    </table></td>
    <td width="15%" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">المراحل الحالية</strong></td>
      </tr>
      <?php do { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetmarhala['marhalaname']; ?></td>
        </tr>
        <?php } while ($row_Recordsetmarhala = mysql_fetch_assoc($Recordsetmarhala)); ?>
    </table></td>
    <td width="28%" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">النماذج الحالية</strong></td>
        </tr>
      <?php do { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetnamozg['namozgname']; ?></td>
          </tr>
        <?php } while ($row_Recordsetnamozg = mysql_fetch_assoc($Recordsetnamozg)); ?>
    </table></td>
  </tr>
  <tr valign="top">
    <td colspan="2" align="center" class="gr">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center" valign="middle" class="gr"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="53%">&nbsp;</td>
        <td width="37%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black"> مواقع تسويق عقارات صديقة</strong></td>
        </tr>
      <?php do { ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><form id="form7" name="form6" method="post" action="">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="right" valign="middle" bgcolor="#CFD0EB"><?php echo $row_Recordset2['sitename']; ?></td>
                </tr>
              <tr>
                <td align="left" valign="middle" bgcolor="#CFD0EB"><?php echo $row_Recordset2['url']; ?></td>
                </tr>
              </table>
            </form></td>
          </tr>
        <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" class="gr"><a href="./insert.php"><strong>رجــــــوع لشاشة الادخال الرئيسية</strong></a></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "url", {validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
mysql_free_result($Qcity);

mysql_free_result($Qaqartype);

mysql_free_result($Qamalya_type);

mysql_free_result($Qtashteeb);

mysql_free_result($Qstatus);

mysql_free_result($Recordset2);

mysql_free_result($Recordsetnamozg);

mysql_free_result($Recordsetlaqab);

mysql_free_result($Recordsetview);

mysql_free_result($Recordsetmarhala);

mysql_free_result($Recordsetdoor);
?>
