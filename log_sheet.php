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

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = "SELECT * FROM udata ORDER BY log_date DESC";
$Recordset1 = mysql_query($query_Recordset1, $goodnews1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>قاعدة بيانات العقارات</title>
</head>

<body>
<table width="91%" border="0">
  <tbody>
    <tr>
      <td colspan="2" align="center"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
    </tr>
    <tr>
      <td width="74%" align="right" valign="top"><table border="1" align="center" bordercolor="#0066FF" cellpadding="0" cellspacing="0" >
        <tr>
          <td colspan="8" align="center" valign="middle" bgcolor="#CCCCCC"><strong>الادخال والتعديل التاريخى للعقارات من قبل جميع المستخدمين</strong></td>
        </tr>
        <tr>
         
          <td width="93" align="center" valign="middle" bgcolor="#F0EDEE"><strong>تم التعديل فى عقار </strong></td>
          <td width="87" align="center" valign="middle" bgcolor="#F0EDEE"><strong>تاريخ التعديل</strong></td>
          <td width="68" align="center" valign="middle" bgcolor="#F0EDEE"><strong>تاريخ الادخال</strong></td>
          <td width="141" align="center" valign="middle" bgcolor="#F0EDEE"><strong>مدخل البيانات</strong></td>
          <td width="8" align="center" valign="middle" bgcolor="#F0EDEE">&nbsp;</td>
          <td width="135" align="center" valign="middle" bgcolor="#F0EDEE"><strong>اسم المستخدم</strong></td>
          <td width="141" align="center" valign="middle" bgcolor="#F0EDEE"><strong>تاريخ الدخول</strong></td>
        </tr>
        <?php do { ?>
        <tr>
          <td align="center" valign="middle"><a href="./print_sheet_new.php?code=<?php echo $row_Recordset1['code']; ?>" target="_top"><?php echo $row_Recordset1['code']; ?></a></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['update_date']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['entry_date']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['modkhel']; ?></td>
          <td align="center" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['updater']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['log_date']; ?></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table></td>
      <td width="26%" height="100%" align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
