<?php require_once('Connections/goodnews1.php'); ?>
<?php require_once('Connections/goodnews.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_query("SET NAMES 'utf8'");
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE offices SET name=%s, emp=%s, address=%s, com_no=%s, notes=%s WHERE id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['cust_name2'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['action_history'], "text"),
                       GetSQLValueString($_POST['notes'], "text"),
                       GetSQLValueString($_POST['code'], "int"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($updateSQL, $goodnews1) or die(mysql_error());

  $updateGoTo = "index1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = sprintf("SELECT * FROM offices WHERE id= %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $goodnews1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل مكاتب العقارات</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
#form1 table tr td table tr td {
	color: #000;
}
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFEBF"><strong>مكاتب العقارات</strong></td>
    <td width="23%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة تعديل البيانات</strong></td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FEC121"><hr /></td>
  </tr>
  <tr>
    <td colspan="7" valign="top"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <hr />
      <table width="90%" border="0" align="center">
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td width="16%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="17%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="7%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="15%" align="right" bgcolor="#FFFFFF"><label for="madena"></label></td>
              <td width="19%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#CCFF99">&nbsp;</td>
              <td align="right" bgcolor="#CCFF99">&nbsp;</td>
              </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF"><label for="aqar_type"></label></td>
              <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="20%" align="right" bgcolor="#DEFFC7"><input name="code" type="text" id="code" tabindex="2" value="<?php echo $row_Recordset1['id']; ?>" /></td>
              <td width="6%" align="right" bgcolor="#DEFFC7"><strong>الكود</strong></td>
              </tr>
            <tr>
              <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF"><label for="view_v"></label></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right"><label for="namozg2">
                <input name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>" size="50" />
              </label></td>
              <td align="right" bgcolor="#BBBBBB"><strong>اسم المكتب</strong></td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
              <td colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right"><strong>اسم  صاحب الشركة / الموظف</strong></td>
              <td align="right" bgcolor="#BBBBBB">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right"><label for="tashteeb"><span id="sprytextfield"> <span class="textfieldRequiredMsg">يلزم ادخال اسم العميل بالكامل.</span>
                    <input name="cust_name2" type="text" id="cust_name2" tabindex="33" value="<?php echo $row_Recordset1['emp']; ?>" size="30" />
              </span></label></td>
              <td align="right" bgcolor="#BBBBBB">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="6" align="right"><span id="sprytextfield10">
                <label for="address"></label>
                <input name="address" type="text" id="address" tabindex="14" value="<?php echo $row_Recordset1['address']; ?>" size="100" />
                <span class="textfieldRequiredMsg">يلزم ادخال العنوان.</span></span></td>
              <td align="right" bgcolor="#BBBBBB"><strong>العنــــوان</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td colspan="5" align="right"><textarea name="action_history" id="action_history" cols="90" rows="5"><?php echo $row_Recordset1['com_no']; ?></textarea></td>
              <td align="right" bgcolor="#BBBBBB"><strong>بيانات التواصل<img src="mob.png" width="30" height="30" alt=""/><img src="tel.png" width="30" height="30" alt=""/></strong></td>
            </tr>
            <tr>
              <td colspan="5" align="right"><span id="sprytextfield25">
                <label for="notes"></label>
                <input name="notes" type="text" tabindex="31" id="notes" value="<?php echo $row_Recordset1['notes']; ?>" size="100" />
</span></td>
              <td align="right" bgcolor="#BBBBBB"><strong>ملاحظات</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td colspan="5" align="right"><label for="cust_title2"></label></td>
            </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td width="1%" rowspan="2">&nbsp;</td>
          <td width="26%" rowspan="2" align="center" valign="middle">&nbsp;</td>
          <td width="20%" rowspan="2" align="center" valign="middle"><input type="submit" name="submit" tabindex="42" id="submit" value="تعــديــل" /></td>
          <td align="right" valign="middle"><label for="image1"></label><label for="image2"></label></td>
          <td align="left" class="blue">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="middle" class="blue">&nbsp;</td>
        </tr>
        </table>
      <input type="hidden" name="MM_update" value="form1" />
    </form></td>
    <td align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield25 = new Spry.Widget.ValidationTextField("sprytextfield25", "none", {isRequired:false});
var sprytextfield = new Spry.Widget.ValidationTextField("sprytextfield", "none", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
