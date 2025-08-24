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
//?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE udata_images SET image1=%s, image2=%s, image3=%s WHERE code=%s",
                       GetSQLValueString($_POST['image1'], "text"),
                       GetSQLValueString($_POST['image2'], "text"),
                       GetSQLValueString($_POST['image3'], "text"),
                       GetSQLValueString($_POST['code'], "text"));

  mysql_select_db($database_utopia, $utopia);
  $Result1 = mysql_query($updateSQL, $utopia) or die(mysql_error());

  $updateGoTo = "./view_images.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['code'])) {
  $colname_Recordset1 = $_GET['code'];
}
mysql_select_db($database_utopia, $utopia);
$query_Recordset1 = sprintf("SELECT * FROM udata_images WHERE code = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $utopia) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل صور المعاينة</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
</style>
<script src="./SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FEC121"><h2>تعديل الصور والمرفقات للعقار</h2></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <td width="3%"><tr>
    <td colspan="8" bgcolor="#C9C9C9"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form2" id="form2">
      <table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>Code (كود العقار)</td>
          <td><span id="sprytextfield4">
          <label for="code3"></label>
          <input name="code" tabindex="1" type="text" id="code3" value="<?php echo $row_Recordset1['code']; ?>" />
          <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldRequiredMsg">A value is required.</span></span></td>
          <td align="center" valign="middle" bgcolor="#FF0000" class="yelow"><strong>انتبه من فضلك</strong></td>
        </tr>
        <tr>
          <td width="38%">Image 1: (images/اسم الصورة بالامتداد)</td>
          <td width="32%"><span id="sprytextfield1">
            <label for="image1"></label>
            <input name="image1" tabindex="2" type="text" id="image1" value="<?php echo $row_Recordset1['image1']; ?>" size="50" />
</span></td>
          <td width="30%" align="right">لتحميل الصور بشكل صحيح يجب كتابتها على الشكل التالى:</td>
        </tr>
        <tr>
          <td>Image 2: (images/اسم الصورة بالامتداد)</td>
          <td><label for="image2"><span id="sprytextfield2">
            <input name="image2" type="text" id="image2" tabindex="3" value="<?php echo $row_Recordset1['image2']; ?>" size="50" />
</span></label></td>
          <td align="center">images/Code_Image number.jpg</td>
        </tr>
        <tr>
          <td>Image 3: (images/اسم الصورة بالامتداد)</td>
          <td><label for="image3"><span id="sprytextfield3">
            <input name="image3" tabindex="4" type="text" id="image3" value="<?php echo $row_Recordset1['image3']; ?>" size="50" />
</span></label></td>
          <td align="right">ويجب وضع الصور قبل الادخال فى مجلد imagesالموجود</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" tabindex="5" name="Submit" id="Submit" value="تعديل الصور للعقار" />
            <a href="./view_images.php"><img src="./back.png" alt="تراجع" width="28" height="23" /></a></td>
          <td align="right">على السيرفر</td>
          <tr><td align="right">او كتابة رابط الفيديو على اليوتيوب</td></tr>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form2" />
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="14%"><a href="./view_images.php" target="_blank">عرض كل صور العقارات</a></td>
    <td width="17%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
