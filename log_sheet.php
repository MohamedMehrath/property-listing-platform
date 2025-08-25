<?php require_once('log_sheet_logic.php'); ?>
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
        <?php foreach ($Recordset1 as $row_Recordset1) { ?>
        <tr>
          <td align="center" valign="middle"><a href="./print_sheet_new.php?code=<?php echo $row_Recordset1['code']; ?>" target="_top"><?php echo $row_Recordset1['code']; ?></a></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['update_date']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['entry_date']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['modkhel']; ?></td>
          <td align="center" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['updater']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['log_date']; ?></td>
        </tr>
        <?php } ?>
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
