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

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = "SELECT * FROM udata";
$Recordset1 = mysql_query($query_Recordset1, $goodnews1) or die(mysql_error());
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
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>قائمة العملاء</title>
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
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<table width="99%" border="0">
    <tr>
      <td width="93%" colspan="3" align="center"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
      <td width="4%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#FFFEDC"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">قائمة بعملاء المكتب</span></strong></td>
    </tr>
    <tr>
      <td rowspan="2" valign="top">&nbsp;</td>
      <td rowspan="2" valign="top"><?php do { ?>
        <div class="panel-group" id="accordion" dir="rtl">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3">بيانــــــــات العميل</a>                <img src="user.png" width="44" height="46" alt=""/></h4>
              <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFEBF">
                <tbody>
                  <tr>
                    <td width="26%"><strong><?php echo $row_Recordset1['cust_name']; ?></strong></td>
                    <td width="74%"><strong><?php echo $row_Recordset1['email']; ?></strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <table width="99%" border="0" align="center" dir="ltr">
                  <tbody>
                    <tr>
                      <td align="right" valign="middle" bgcolor="#FFFFFF"><table width="875%" border="0" align="right" cellpadding="0" bordercolor="#327900">
                          <tbody>
                            <tr>
                              <td width="11%" align="right" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">&nbsp;</td>
                              <td width="18%" align="right" bgcolor="#FFFEDC" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">&nbsp;</td>
                              <td width="71%" align="right" bgcolor="#FFFEDC" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif"><strong><?php echo $row_Recordset1['telephone']; ?></strong><img src="tel.png" width="40" height="40" alt=""/></td>
                            </tr>
                          </tbody>
                      </table></td>
                      <td width="24%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><?php echo $row_Recordset1['mobile']; ?><img src="mob.png" width="40" height="40" alt=""/></td>
                      <td width="32%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><?php echo $row_Recordset1['whatsapp']; ?><img src="whatsapp.png" width="40" height="40" alt=""/></td>
                      <td width="9%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">للتواصل</span></strong></td>
                      <td width="4%">&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td rowspan="2" valign="top"><p>&nbsp;</p></td>
      <td align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
      <td>&nbsp;</td>
    </tr>
</table>
<p><script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.js" type="text/javascript"></script>
</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
