<?php require_once('Connections/goodnews.php'); ?>
<?php
mysql_query("SET NAMES 'utf8'");
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
<title>صور العقار</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
</style>
<style type="text/css">
.yelow {	color: #FF0;
}
.yelow1 {	color: #17036B;
	font-style: normal;
}
</style>
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FEC121"><h2>عرض الصور والمرفقات للعقار</h2></td>
    <td width="10%" colspan="-4" align="center" valign="middle" bgcolor="#FEC121"><h1><?php echo $row_Recordset1['code']; ?></h1></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr class="yelow">
        <td align="center" bgcolor="#000099" class="yelow"><strong>Image 1</strong></td>
        <td align="center" bgcolor="#000099" class="yelow"><strong>Image 2</strong></td>
        <td align="center" bgcolor="#000099" class="yelow"><strong>Image 3</strong></td>
        <td bgcolor="#000099" class="yelow"><strong>تعديل</strong></td>
      </tr>
      <tr>
        <td align="center" valign="middle"><a href="<?php echo $row_Recordset1['image1']; ?>"><img src="<?php echo $row_Recordset1['image1']; ?>" width="200" height="200" align="middle" /></a></td>
        <td align="center" valign="middle"><a href="<?php echo $row_Recordset1['image2']; ?>"><img src="<?php echo $row_Recordset1['image2']; ?>" width="200" height="200" align="middle" /></a></td>
        <td align="center" valign="middle"><a href="<?php echo $row_Recordset1['image3']; ?>"><img src="<?php echo $row_Recordset1['image3']; ?>" width="200" height="200" align="middle" /></a></td>
        <td align="center" valign="middle"><a href="./update_images.php?code=<?php echo $row_Recordset1['code']; ?>"><strong>تعديـــل</strong></a></td>
      </tr>
      <tr>
        <td colspan="4"><hr /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#C9C9C9"><form method="POST" enctype="multipart/form-data" name="form2" id="form2">
      <table width="95%" border="0" cellspacing="0" cellpadding="0">
      <tr>        </tr>
      <tr>        </tr>
      <tr>        </tr>
      <tr>        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><strong><a href="./view_images.php" target="_blank">عرض كل صور العقارات</a></strong></td>
    <td><strong class="yelow1"><a href="./print_sheet_new.php?code=<?php echo $row_Recordset1['code']; ?>" target="_blank">رجـــــــوع</a></strong></td>
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
