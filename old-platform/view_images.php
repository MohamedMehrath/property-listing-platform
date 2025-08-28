<?php require_once('Connections/db.php'); ?>
<?php
try {
    $pdo = get_db_connection('utopia');
} catch (PDOException $e) {
    // Handle connection error gracefully
    die("Database connection failed: " . $e->getMessage());
}

$query_Recordset1 = "SELECT * FROM udata_images";
$Recordset1 = $pdo->query($query_Recordset1)->fetchAll();
$totalRows_Recordset1 = count($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>صور كل العقارات</title>
<style type="text/css">
body,td,th {
	color: #F00;
}
body {
	background-color: #CCC;
}
</style>
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#C9C9C9"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe>
&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#314ECE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" align="right" valign="middle" bgcolor="#FF0000">&nbsp;</td>
    <td width="10%" align="right" valign="middle" bgcolor="#FF0000">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FEC121"><h2>عرض الصور والمرفقات للعقار</h2></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <td width="19%"><tr>
    <td colspan="8"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr class="yelow">
        <td align="center" bgcolor="#000099" class="yelow"><strong>Code</strong></td>
        <td align="center" bgcolor="#000099" class="yelow"><strong>Image 1</strong></td>
        <td align="center" bgcolor="#000099" class="yelow"><strong>Image 2</strong></td>
        <td align="center" bgcolor="#000099" class="yelow"><strong>Image 3</strong></td>
        <td bgcolor="#000099" class="yelow"><strong>تعديل</strong></td>
      </tr>
      <?php foreach($Recordset1 as $row_Recordset1): ?>
        <tr>
          <td align="center" valign="middle"></td>
          <td align="center" valign="middle"><a href="<?php echo $row_Recordset1['image1']; ?>"><?php echo $row_Recordset1['image1']; ?></a></td>
          <td align="center" valign="middle"><a href="<?php echo $row_Recordset1['image2']; ?>"><?php echo $row_Recordset1['image2']; ?></a></td>
          <td align="center" valign="middle"><a href="<?php echo $row_Recordset1['image3']; ?>"><?php echo $row_Recordset1['image3']; ?></a></td>
          <td align="center" valign="middle"><a href="./update_images.php?code=<?php echo $row_Recordset1['code']; ?>">تعديل</a></td>
          
          <tr><td bgcolor="#000099" class="yelow" align="center" valign="middle"><a href="./print_sheet.php?code=<?php echo $row_Recordset1['code']; ?>"><?php echo $row_Recordset1['code']; ?></a></td>
          <td bgcolor="#6666aa" align="center" valign="middle"><a href="<?php echo $row_Recordset1['image1']; ?>"><img src="<?php echo $row_Recordset1['image1']; ?>" width="200" height="200" align="middle" /></a></td>
        <td bgcolor="#6666aa" align="center" valign="middle"><a href="<?php echo $row_Recordset1['image2']; ?>"><img src="<?php echo $row_Recordset1['image2']; ?>" width="200" height="200" align="middle" /></a></td>
        <td bgcolor="#6666aa" align="center" valign="middle"><a href="<?php echo $row_Recordset1['image3']; ?>"><img src="<?php echo $row_Recordset1['image3']; ?>" width="200" height="200" align="middle" /></a></td>
        <td bgcolor="#000099" class="yelow" align="center" valign="middle"><a href="./update_images.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="./edit.gif" width="100%" hight="100%"></a></td>
        </tr>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <?php endforeach; ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#C9C9C9"><form method="POST" enctype="multipart/form-data" name="form2" id="form2">
      <table width="95%" border="0" cellspacing="0" cellpadding="0">
      <tr>        </tr>
      <tr>        </tr>
      <tr>        </tr>
      <tr>        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#314ECE"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
</body>
</html>
<?php
?>
