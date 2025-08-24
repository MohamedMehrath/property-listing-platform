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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO users (username, password, `level`, notes) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['level'], "text"),
                       GetSQLValueString($_POST['notes'], "text"));

  mysql_select_db($database_utopia, $utopia);
  $Result1 = mysql_query($insertSQL, $utopia) or die(mysql_error());

  $insertGoTo = "user_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$currentPage = $_SERVER["PHP_SELF"];

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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>انشاء مستخدم جديد</title>
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
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<style type="text/css">
.yelow {color: #FF0;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFEBF">&nbsp;</td>
    <td width="17%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة ادخال بيانات المستخدمين</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC"><hr /></td>
  </tr>
  
  
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF">&nbsp;
      <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="80%" border="0" align="right">
          <tr class="gr">
            <td colspan="4" rowspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><img src="user.png" width="128" height="89" alt=""/></td>
            <td width="14%" align="center" valign="middle" bgcolor="#FFFFFF" class="gr"><strong>مستوى الحماية</strong></td>
            <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF"><input name="username" tabindex="1" type="text" id="username" size="30" /></td>
            <td width="8%" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="gr"><strong>اسم المستخدم</strong><strong></strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><select name="level" tabindex="3" id="level">
              <option value="admin">admin</option>
              <option value="editor">editor</option>
              <option value="visitor">visitor</option>
            </select></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="password" tabindex="2" type="password" id="password" size="30" /></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><span class="gr"><strong>كلمة السر</strong></span></td>
          </tr>
          <tr>
            <td width="10%" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="7%" align="center" valign="middle" bgcolor="#FFFFFF"><input type="reset" name="cancel" tabindex="6" id="cancel" value="الغـــاء" /></td>
            <td width="14%" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" tabindex="5" name="ok" id="ok" value="انشاء مستخدم" /></td>
            <td colspan="3" align="right" valign="middle" bgcolor="#FFFFFF"><label for="notes"></label>              <span id="spryselect1">
              <label for="level"></label>
            <span class="selectRequiredMsg">Please select an item.</span></span><span id="sprytextfield2">
              <label for="password"></label>
              <span class="textfieldRequiredMsg">A value is required.</span>
              <textarea name="notes" tabindex="4" id="notes" cols="46" rows="5"></textarea>
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><span id="sprytextfield1">
              <label for="username"></label>
              <span class="textfieldRequiredMsg">A value is required.</span><strong>ملاحظات</strong></span></td>
          </tr>
          <tr>
            <td colspan="8"><hr /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1" />
      </form></td>
    <td align="center" valign="top" bgcolor="#FFFFFF"><iframe src="menu_side.php" name="menu_side" width="200" height="500" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"]});
</script>
</body>
</html>

