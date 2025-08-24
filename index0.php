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
  $MM_redirectLoginSuccess = "index1.php";
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
	font-weight: bold;
}
body {
	background-color: #FFFFFF;
}
#form1 table tr td {
	color: #004000;
}
</style>
<style type="text/css">
.yelow {
	color: #FF0;
	font-family: sans-serif;
	font-style: normal;
	font-weight: 400;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/droid-sans:n4:default;aclonica:n4:default.js" type="text/javascript"></script>

</head>

<body onload="MM_preloadImages('L1_1.png','L2_1.png','L3_1.png')">
<table width="82%" border="0" align="center">
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"> <h2 style="font-family: aclonica; font-style: normal; font-weight: 400;"><img src="titleP.png" width="311" height="50" alt=""/></h2></td>
  </tr>
  <tr>
    <td bgcolor="#CFD0EB"><marquee align="middle" direction="right" style="color: #314ECE" dir="rtl"> برنامج ادارة التسويق العقارى يعمل على اكثر من جهاز من خلال الشبكات الداخلية او الانترنت .. للحصول على افضل اداء يرجى تشغيله على متصفح فايرفوكس اعلى من الاصدار 30 .. فى حالة توقف البرنامج لكثرة المستخدمين او البيانات او البحث الشامل قم بعمل تنشيط للصفحة ..</marquee></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="70%" border="0" align="center" dir="rtl">
      <tbody>
        <tr>
          <td align="center" valign="middle"><a href="index1.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','L1_1.png',1)"><img src="L1.png" alt="" width="311" height="347" id="Image4" /></a></td>
          <td align="center" valign="middle"><a href="index_offices.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','L2_1.png',1)"><img src="L2.png" alt="" width="311" height="347" id="Image5" /></a></td>
          <td align="center" valign="middle"><a href="index_matlob.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','L3_1.png',1)"><img src="L3.png" alt="" width="311" height="347" id="Image6" /></a></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
</body>
</html>
