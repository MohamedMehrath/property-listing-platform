<?php require_once('Connections/goodnews1.php'); ?>
<?php require_once('Connections/goodnews.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
mysql_query("SET NAMES 'utf8'");
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = sprintf("SELECT * FROM offices WHERE id = %s ", GetSQLValueString($colname_Recordset1, "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $goodnews1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

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
<title>طباعة التفاصيل</title>
<style type="text/css">
body,td,th {
	color: #17036B;
	font-weight: normal;
	font-size: 16px;
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
.yelow {
	color: #17036B;
	font-style: normal;
}
</style>
<style type="text/css">
.black {	color: #000;
}
</style>
</head>

<body>
<table width="80%" border="0" align="center">
  <tbody>
    <tr>
      <td><span class="yelow"><strong style="color: #17036B">TOS</strong></span></td>
      <td align="center" valign="middle"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">كشف تفاصيل بيانات المكتب </span></strong></td>
      <td align="center" valign="middle"><img src="./goodnews 7.png" width="97" height="95" /></td>
    </tr>
    <tr>
      <td colspan="3"><hr /></td>
    </tr>
  </tbody>
</table>
<table width="99%" border="0" align="center">
  <tbody>
    <tr>
      <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="99%" border="0" align="center">
  <tbody>
    <tr>
      <td width="19%" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="14%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><h3><?php echo $row_Recordset1['id']; ?></h3></td>
      <td width="4%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">الكود</span></strong></td>
      <td width="35%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><table width="77%" border="0" align="right" cellpadding="0" bordercolor="#327900">
        <tbody>
          <tr>
            <td align="right" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif"><h2><strong><?php echo $row_Recordset1['name']; ?></strong></h2></td>
          </tr>
        </tbody>
      </table></td>
      <td width="24%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">بيـــــانـــــات المكتب</span></strong></td>
      <td width="4%"><img src="user.png" width="44" height="36" alt=""/></td>
    </tr>
    <tr>
      <td colspan="5"><table width="80%" border="0" align="right">
        <tbody>
          <tr>
            <td align="right"><?php echo $row_Recordset1['emp']; ?></td>
            <td width="9%" rowspan="2" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">للتواصل<img src="tel.png" width="40" height="40" alt=""/></span></strong></td>
          </tr>
          <tr>
            <td align="right"><?php echo $row_Recordset1['com_no']; ?></td>
            </tr>
        </tbody>
      </table>
        <p>&nbsp;</p>
        <table width="99%" border="1" align="right" cellpadding="0" cellspacing="0">
          <tbody>
          <tr>
            <td width="37%" align="right" bgcolor="#F5F3F4"><?php echo $row_Recordset1['notes']; ?></td>
            <td width="38%" align="right" bgcolor="#F5F3F4"><?php echo $row_Recordset1['address']; ?></td>
            <td width="25%" align="right" bgcolor="#F5F3F4">&nbsp;</td>
          </tr>
        </tbody>
    </table>
      <p>&nbsp;</p>
<table width="99%" border="0" align="center">
  <tbody>
          <tr>
            <td width="6%"><a href="<?php echo $logoutAction ?>">Log out</a></td>
            <td width="4%"><strong class="yelow"><a href="./index_offices.php">رجــــوع</a></strong></td>
            <td width="7%"><span class="black"><img src="./print.jpg" width="74" height="61" onclick="window.print() " /></span></td>
            <td width="47%">&nbsp;</td>
            <td width="36%" align="right"><span class="black"><span class="green"><?php echo date("l"); ?></span> _<?php echo date("d/m/Y h:i:s a") ?></span></td>
          </tr>
        </tbody>
    </table></td>
      <td><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
  </tbody>
</table>
<table width="99%" border="0">
  <tbody>
    <tr>
      <td align="center"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright2">Banner</iframe></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
