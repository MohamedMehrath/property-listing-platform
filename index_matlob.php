<?php require_once('index_matlob_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>العقارات المطلوبة</title>
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
.yelow {
	color: #17036B;
}
</style>
<style type="text/css">
.black {	color: #000;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow1 {color: #17036B;
	font-style: normal;
}
</style>
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFEBF">&nbsp;</td>
    <td width="20%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>العقارات المطلوبة</strong></td>
    <td width="8%" align="right" valign="middle" bgcolor="#FFFEBF"><a href="<?php echo $logoutAction ?>"><img src="logout.png" width="28" height="28" alt="خروج" /></a></td>
  </tr>
  <tr>
    <td colspan="2"><p><a href="insert_matlob.php"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">ادخال عقار مطلوب</span></strong></a></p>
      <table width="38%" border="0">
        <tr>
          <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
          <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
          <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
          <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
          <td align="right" bgcolor="#FFFFFF"><strong>يوجد <?php echo $totalRows_Recordset1 ?> بيان</strong></td>
        </tr>
      </table></td>
    <td rowspan="4" align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;
      <?php foreach ($Recordset1 as $row_Recordset1) { ?>
    <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
        <table width="95%" border="0" align="center">
        <tr class="gr">
          <td width="12%" align="center" valign="middle" bgcolor="#FFFFFF" class="yelow"><span class="black"><?php echo $row_Recordset1['budget']; ?></span></td>
          <td width="17%" align="left" valign="middle" bgcolor="#FFFFFF" class="yelow"><strong>السعر Budget</strong></td>
          <td width="17%" align="center" valign="middle" bgcolor="#FFFFFF" class="yelow"><span class="black"><?php echo $row_Recordset1['mesaha']; ?></span></td>
          <td width="13%" align="left" valign="middle" bgcolor="#FFFFFF" class="yelow"><strong>المســـاحـــة</strong></td>
          <td width="4%" rowspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="yelow">&nbsp;</td>
          <td width="18%" align="center" valign="middle" bgcolor="#FFFFFF" class="yelow"><?php echo $row_Recordset1['aqar_type_other']; ?></td>
          <td width="13%" align="center" valign="middle" bgcolor="#FFFFFF" class="yelow"><?php echo $row_Recordset1['aqar_type']; ?></td>
          <td width="5%" align="center" valign="middle" bgcolor="#FFFFFF" class="yelow"><strong class="yelow">نوع العقار</strong></td>
          <td width="1%" colspan="3" rowspan="5" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><p>&nbsp;</p>            <p>&nbsp;</p></td>
          </tr>
        <tr class="black">
          <td colspan="3" align="center" valign="middle" class="black"><?php echo $row_Recordset1['details']; ?></td>
          <td align="center" valign="middle" class="black"><?php echo $row_Recordset1['address']; ?></td>
          <td colspan="2" align="center" valign="middle" class="black"><?php echo $row_Recordset1['aqar_type_other']; ?></td>
          </tr>
        <tr>
          <td align="center" valign="middle" class="yelow"><span class="black"><?php echo $row_Recordset1['mobile']; ?></span></td>
          <td align="left" valign="middle" class="yelow"><strong>موبـــــــايل</strong></td>
          <td width="17%" align="center" valign="middle" class="yelow"><span class="black"><?php echo $row_Recordset1['telephone']; ?></span></td>
          <td colspan="2" align="left" valign="middle" class="yelow"><strong>تليفـــــــــون</strong></td>
          <td align="right" valign="middle" class="yelow"><span class="gr"><span class="black"><?php echo $row_Recordset1['cust_name']; ?></span></span></td>
          <td colspan="2" align="left" valign="middle" class="yelow"><strong>اســــــم العمــــــــيل</strong></td>
          </tr>
        <tr>
          <td colspan="2" rowspan="2" align="center" valign="middle" class="black"><table width="73%" border="0">
            <tr class="yelow">
              <td align="center" valign="middle"><a href="./print_matlob.php?code=<?php echo $row_Recordset1['code']; ?>" target="_new"><img src="./print-icon.png" alt="ewre" width="70" height="28" /></a></td>
              <td align="center" valign="middle"><a href="./update_matlob.php?code=<?php echo $row_Recordset1['code'];?>"><img src="alarm.jpg" width="40" height="40" alt=""/></a></td>
              <td align="center" valign="middle">&nbsp;</td>
              <td align="center" valign="middle"><a href="update_matlob.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="edit.gif" alt="er" width="70" height="28" /></a></td>
            </tr>
          </table></td>
          <td colspan="5" align="right" valign="middle" class="black"><?php echo $row_Recordset1['action_history']; ?></td>
          <td align="center" valign="middle" class="black"><strong class="yelow">المتابعة</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" class="yelow"><?php echo $row_Recordset1['tashteeb_other']; ?></td>
          <td align="center" valign="middle" class="yelow"><?php echo $row_Recordset1['tashteeb']; ?></td>
          <td align="center" valign="middle" class="yelow"><strong class="yelow">التشطيب</strong></td>
          <td align="center" valign="middle" class="yelow"><?php echo $row_Recordset1['madena_other']; ?></td>
          <td align="center" valign="middle" class="yelow"><?php echo $row_Recordset1['madena']; ?></td>
          <td align="center" valign="middle" class="yelow"><strong class="yelow">المدينة</strong></td>
        </tr>
        <tr>
          <td colspan="11"><hr /></td>
        </tr>
      </table>
      <?php } // Show if recordset not empty ?>
<?php } ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="38%" border="0">
      <tr>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
        <td align="right" bgcolor="#FFFFFF"><strong>يوجد <?php echo $totalRows_Recordset1 ?> بيان</strong></td>
        </tr>
      </table>
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
        <table width="20%" border="0">
          <tr>
            <td align="center"><strong>عفوا لا توجد نتيجة للبحث الحالى</strong></td>
          </tr>
        </table>
    <?php } // Show if recordset empty ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
</body>
</html>
