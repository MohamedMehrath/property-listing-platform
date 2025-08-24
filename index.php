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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "index0.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_utopia, $utopia);
  	
  $LoginRS__query=sprintf("SELECT username, password, level FROM users WHERE username=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $utopia) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'level');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>برنامج التسويق العقارى</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
#form1 table tr td {
	color: #008C00;
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
<table width="99%" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" valign="middle"><img src="aqarr.jpg" width="289" height="214" alt=""/></td>
    </tr>
  </tbody>
</table>
<table width="82%" border="0" align="center" style="box-shadow:#A4D24E">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#C9C9C9"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td width="94%" align="center" valign="middle" bgcolor="#314ECE" class="yelow"> <h2><span style="font-family: aclonica; font-style: normal; font-weight: 400;"><img src="titleP.png" width="311" height="50" alt=""/></span></h2></td>
    <td width="6%" align="center" valign="middle" bgcolor="#314ECE" class="yelow"><span style="color: #314ECE"><a href="www.tagoutsource.com"><img src="logo TOS.png" width="53" height="50" alt=""/></a></span></td>
  </tr>
  <tr>
    <td colspan="2" align="right" valign="middle" bgcolor="#C9C9C9"><marquee align="middle" direction="right" style="color: #314ECE" dir="rtl">
  برنامج ادارة التسويق العقارى يعمل على اكثر من جهاز من خلال الشبكات الداخلية او الانترنت .. للحصول على افضل اداء يرجى تشغيله على متصفح فايرفوكس اعلى من الاصدار 30 .. فى حالة توقف البرنامج لكثرة المستخدمين او البيانات او البحث الشامل قم بعمل تنشيط للصفحة ..
    </marquee></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#C9C9C9"><form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
      <table width="90%" border="0" align="center">
        <tr>
          <td width="23%" rowspan="4" align="center" valign="middle">&nbsp;</td>
       
        </tr>
        <tr>
          <td colspan="2" rowspan="3"><img src="user.png" width="126" height="122" /></td>
          <td width="32%" colspan="2" align="center" valign="middle"><span id="sprytextfield1">
            <label for="username"></label>
            <input name="username" type="text" tabindex="1" id="username" size="50" />
            <span class="textfieldRequiredMsg">ادخل اسم المستخدم.</span></span></td>
          <td width="17%" align="center"><strong>اسم المستخدم</strong></td>
          <td width="4%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center" valign="middle"><span id="sprytextfield2">
            <label for="password"></label>
            <input name="password" type="password" tabindex="2" id="password" size="50" />
            <span class="textfieldRequiredMsg">ادخل كلمة المرور.</span></span></td>
          <td align="center"><strong>كلمة السر</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center" valign="middle"><input type="reset" name="cancel" id="cancel" tabindex="4" value="إعـــادة إدخـــال" /></td>
          <td align="center" valign="middle"><input type="submit" name="ok" tabindex="3" id="ok" value="دخـــــــــــــــــــــول" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
    </table>
    </form>
  </tr>
  <table width="82%" border="0" align="center">
  <tr>
  <td width="4%" colspan="-2" align="right" valign="middle" bgcolor="#70AD47">&nbsp;</td>
 <td colspan="2" align="right" valign="middle" bgcolor="#314ECE"><span class="blue">برنامج إدارة التسويق العقارى الاصدار الثالث - جميع الحقوق محفوظة </span></td>
    <td width="15%" colspan="-2" align="right" valign="middle" bgcolor="#314ECE">V. 3.0 (2016)</td>
    <td width="4%" colspan="-2" align="right" valign="middle" bgcolor="#70AD47">&nbsp;</td>
  </tr></table>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
</script>
</body>
</html>