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
//?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

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
	
  $logoutGoTo = "./index.php";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO offices (id, name, emp, address, com_no, notes) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['cust_name'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['comm_no'], "text"),
                       GetSQLValueString($_POST['notes'], "text"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "insert_office.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = "SELECT max(id) FROM offices";
$Recordset1 = mysql_query($query_Recordset1, $goodnews1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Qoffice = "SELECT * FROM offices";
$Qoffice = mysql_query($query_Qoffice, $goodnews1) or die(mysql_error());
$row_Qoffice = mysql_fetch_assoc($Qoffice);
$totalRows_Qoffice = mysql_num_rows($Qoffice);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ادخال مكاتب العقارات</title>
<style type="text/css">
body,td,th {
	color: #17036B;
	font-size: medium;
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
<script type="text/javascript" src="./accounting.js"></script>
<script>
function addfee(){
	s0=new Option("المطلوب = "+ accounting.formatMoney(matloob.value));
	s1=new Option("اجمالى العقد = "+accounting.formatMoney(aqd_total.value));
	s2=new Option("المدفوع = "+accounting.formatMoney(madfoo.value));
	s3=new Option("الاوفر = "+accounting.formatMoney(alover.value));
	s4=new Option("القسط السنوى = "+accounting.formatMoney(kest_year.value));
	s5=new Option("القسط الشهرى = "+accounting.formatMoney(kest_month.value));
	sellist[0]= s0;
	sellist[1]= s1;
	sellist[2]= s2;
	sellist[3]= s3;
	sellist[4]= s4;
	sellist[5]= s5;
	}
</script>
<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFEBF"><strong><?php echo $_SESSION['MM_Username'];?></strong></td>
    <td width="23%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة ادخال بيانات مكاتب التسويق</strong></td>
    <td width="5%" align="center" valign="middle" bgcolor="#FFFEBF"><a href="<?php echo $logoutAction ?>"><img src="logout.png" alt="logout" width="28" height="28" /></a></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFEBF"><hr /></td>
  </tr>
  <tr>
    <td colspan="9"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="7"><table width="93%" border="0" align="center">
            <tr>
              <td colspan="3" rowspan="4" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="4" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="4" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="7%" rowspan="8" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="14%" rowspan="8" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="28%" rowspan="3" align="right" bgcolor="#FFFFFF"><img src="offices.jpeg" width="102" height="86" alt=""/></td>
              <td width="28%" align="right" bgcolor="#FFFFFF"><span id="sprytextfield1">
              <label for="id"></label>
              <input name="id" type="text" id="id" tabindex="1" value="<?php echo $row_Recordset1['max(id)']+1; ?>"  />
              <span class="textfieldRequiredMsg">يلزم ادخال الكود.</span></span></td>
              <td width="18%" align="right" bgcolor="#FFFFFF"><strong>الكــــــود</strong></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF"><input name="name" type="text" id="name" size="50" /></td>
              <td align="right" bgcolor="#FFFFFF"><strong>اسم المكتب</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#F5F3F4"><strong>اسم  صاحب الشركة / الموظف</strong></td>
              </tr>
            <tr>
              <td colspan="3" align="right" bgcolor="#F5F3F4"><span id="sprytextfield26">
              <label for="cust_title"></label>
              <span class="textfieldRequiredMsg">يلزم ادخال اسم العميل بالكامل.</span>
              <input name="cust_name" tabindex="33" type="text" id="cust_name" size="30" />
              </span></td>
            </tr>
            <tr>
              <td width="1%" rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td colspan="2" align="right" bgcolor="#FFFFFF"><span id="sprytextfield10">
                <label for="address3"></label>
                <input name="address" type="text" tabindex="14" id="address3" size="50" />
                <span class="textfieldRequiredMsg">يلزم ادخال العنوان.</span></span></td>
              <td align="right" bgcolor="#FFFFFF"><strong>العنــــــوان</strong></td>
            </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#F5F3F4"><textarea name="comm_no" id="comm_no" cols="90" rows="5"></textarea></td>
              <td align="right" bgcolor="#F5F3F4"><strong>بيانات التواصل</strong></td>
            </tr>
            <tr>
              <td colspan="3" align="right" bgcolor="#FFFFFF"><strong><img src="mob.png" width="30" height="30" alt=""/><img src="web.png" width="30" height="30" alt=""/><img src="whatsapp.png" width="30" height="30" alt=""/><img src="tel.png" width="30" height="30" alt=""/></strong></td>
              </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#FFFFFF"><span id="sprytextfield25">
                <label for="notes3"></label>
                <input name="notes" type="text" id="notes3" tabindex="31" size="100" />
              </span></td>
              <td align="right" bgcolor="#FFFFFF"><strong>ملاحظــــات</strong></td>
            </tr>
            <tr>
              <td colspan="4" rowspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td rowspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="7"><hr /></td>
        </tr>
        <tr>
          <td colspan="7"><table width="100%" border="0" align="right">
            <tr>              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="7"><hr /></td>
        </tr>
        <tr>
          <td width="13%" class="blue">&nbsp;</td>
          <td width="19%" align="center" valign="middle"><input type="reset" name="cancel" tabindex="43" id="cancel" value="الغــــــــــاء" /></td>
          <td width="23%" align="center" valign="middle"><input type="submit" name="submit" tabindex="42" id="submit" value="ادخــــــــــال" /></td>
          <td width="0%"><label for="image1"></label>            <label for="image2"></label>            <label for="image3"></label></td>
          <td width="7%" align="right" valign="middle"><label for="momz"></label></td>
          <td width="17%" align="left" valign="middle" class="blue">&nbsp;</td>
          <td width="21%" align="right"><label for="updater"></label>
            <input name="updater" type="text" id="updater" value="<?php echo $_SESSION['MM_Username'];?>" size="10" /></td>
        </tr>
        </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form></td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield26 = new Spry.Widget.ValidationTextField("sprytextfield26", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield25 = new Spry.Widget.ValidationTextField("sprytextfield25", "none", {isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Qoffice);
?>
