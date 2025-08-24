<?php require_once('Connections/goodnews.php'); ?>
<?php
error_reporting( error_reporting() & ~E_NOTICE );

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
<?php require_once('Connections/goodnews.php'); ?>
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
$query_Recordset1 = "SELECT * FROM users ORDER BY username ASC";
$Recordset1 = mysql_query($query_Recordset1, $utopia) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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
<title>بيانات المستخدمين</title>
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
<style type="text/css">
.yelow {color: #FF0;
}
.black {
	color: #000;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFEBF">&nbsp;</td>
    <td width="16%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة بيانات المستخدمين</strong></td>
  </tr>
  <tr>
    <td align="left" valign="middle" bgcolor="#FFFFFF"><p><a href="user_insert.php">ادخـــال مستخدم جديد للنظام </a></p>
      <table width="31%" border="0">
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><strong>يوجد <?php echo $totalRows_Recordset1 ?>مستخدم </strong></td>
        </tr>
      </table>     
    </td>
    <td rowspan="3" align="left" valign="middle" bgcolor="#FFFFFF"><iframe src="menu_side.php" name="menu_side" width="200" height="500" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  
  
  
  <tr>
    <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;
      <?php do { ?>
        
        <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
            <br />
        <table width="20%" border="0">
          <tr>
            <td align="center"><strong>عفوا لا توجد نتيجة للبحث الحالى</strong></td>
          </tr>
      </table>
        <?php } // Show if recordset empty ?>
        <table width="90%" border="0" align="center">
          <tr class="yelow">
            <td colspan="3" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>التحكم العام</strong></td>
            <td width="26%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>ملاحظات</strong></td>
            <td width="12%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>مستوى الحماية</strong></td>
            <td width="21%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>كلمة السر</strong></td>
            <td width="17%" colspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>اسم المستخدم</strong><strong></strong></td>
            <td width="17%" rowspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><img src="user.png" width="44" height="50" alt=""/></td>
          </tr>
          <tr>
            <td width="8%" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="8%" align="center" valign="middle" bgcolor="#FFFFFF"><a href="user_delete.php?username=<?php echo $row_Recordset1['username']; ?>"><img src="delete.jpg" alt="rr" width="70" height="28" /></a></td>
            <td width="8%" align="center" valign="middle" bgcolor="#FFFFFF"><a href="user_update.php?username=<?php echo $row_Recordset1['username']; ?>"><img src="edit.gif" alt="er" width="70" height="28" /></a></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row_Recordset1['notes']; ?></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['level']; ?></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo crypt($row_Recordset1['password']); ?></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['username']; ?></td>
          </tr>
          <tr>
            <td colspan="9"><hr /></td>
          </tr>
        </table>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></td>
  </tr>
  <tr>
    <td><table width="31%" border="0">
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">يوجد <?php echo $totalRows_Recordset1 ?>مستخدم</td>
        </tr>
      </table>
      <a href="user_insert.php">ادخـــال مستخدم جديد للنظام </a>
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
        <table width="20%" border="0">
          <tr>
            <td align="center"><strong>عفوا لا توجد نتيجة للبحث الحالى</strong></td>
          </tr>
  </table>
    <?php } // Show if recordset empty ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);


?>
