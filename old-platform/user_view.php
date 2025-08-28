<?php require_once('user_view_logic.php'); ?>
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
      <?php foreach ($Recordset1 as $row_Recordset1) { ?>
        
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
        <?php } ?></td>
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
