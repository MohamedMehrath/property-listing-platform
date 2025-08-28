<?php require_once('index1_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>الشاشة الرئيسية</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
.black {
	color: #000;
}
</style>
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
<link href="green.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow1 {	color: #17036B;
	font-style: normal;
}
</style>
<link href="jQueryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="jQueryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="jQueryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="jQueryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>

<body>
<table width="99%" border="0" align="center">
  <tbody>
    <tr>
      <td colspan="2" align="center"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#E4FFD2"><iframe src="menu_top.php" name="Banner" width="900" height="40" align="top" scrolling="no" frameborder="0" id="Banner2">Banner</iframe></td>
    </tr>
    <tr>
      <td width="82%" align="center" valign="top" bgcolor="#F5F3F4"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#327900">
        <tbody>
          <tr>
            <td align="center" valign="top" bgcolor="#B7A7FC"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">العقـــــــــارات المميــــــزة</span></strong></td>
          </tr>
          <tr>
            <td height="200" valign="top" bgcolor="#E3DDFE"><marquee direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout= "this.setAttribute('scrollamount', 6, 0);"><?php foreach($Recordsetmomz_new as $row_Recordsetmomz_new) { ?>
               <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="right" valign="middle" bgcolor="#F5F3F4"><a href="./print_sheet_new.php?code=<?php echo $row_Recordsetmomz_new['code']; ?>"><strong><a href="./print_sheet_new.php?code=<?php echo $row_Recordsetmomz_new['code']; ?>"><?php echo $row_Recordsetmomz_new['code']; ?></a></strong><img src="aqarr.jpg" width="40" height="40" alt="Property"/></a></td>
                      <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4"><img src="hot.jpg" width="50" height="50" alt="Hot property"/></td>
                      <td colspan="2" align="right" valign="middle" bgcolor="#F5F3F4"><?php echo $row_Recordsetmomz_new['madena']; ?></td>
                      <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المدينة</span></strong></td>
                      </tr>
                    <tr>
                      <td align="center"><?php echo $row_Recordsetmomz_new['aqar_type']; ?></td>
                      <td><?php echo $row_Recordsetmomz_new['status']; ?></td>
                      <td><strong>الحالة</strong></td>
                      <td><?php echo $row_Recordsetmomz_new['marhala']; ?></td>
                      <td><strong>المرحلة</strong></td>
                      <td><?php echo $row_Recordsetmomz_new['amalya_type']; ?></td>
                      <td><strong>نوع العملية</strong></td>
                      </tr>
                    <tr>
                      <td><a href="./print_sheet_new.php?code=<?php echo $row_Recordsetmomz_new['code']; ?>">ا لمزيد من التفاصيل</a></td>
                      <td><?php echo $row_Recordsetmomz_new['aqd_total']; ?></td>
                      <td><strong>اجمالى العقد </strong></td>
                      <td colspan="2" align="center"><?php echo $row_Recordsetmomz_new['matloob']; ?></td>
                      <td colspan="2"><strong>المطلـــــــوب<a href="./print_sheet_new.php?code=<?php echo $row_Recordsetmomz_new['code']; ?>"></a></strong></td>
                      </tr>
                    </tbody>
                </table>
            
               
                <?php } ?></marquee></td>
          </tr>
        </tbody>
    </table></td>
      <td width="18%" rowspan="2" align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="500" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
    </tr>
    <tr valign="top">
      <td bgcolor="#F5F3F4"><table width="99%" border="0">
        <tbody>
          <tr>
            <td><form id="form2" name="form2" method="post" action="">
              <table width="47%" border="0">
                <tr>
                  <td width="3%">&nbsp;</td>
                  <td width="23%" align="center" valign="middle"><input type="submit" name="tophandred" id="tophandred" value="عــــــرض" /></td>
                  <td width="8%"><span id="sprytextfield15">
                    <label for="top5"></label>
                    <input name="top100" type="text" id="top5" size="5" />
                    <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                  <td width="7%" align="left" valign="middle"><strong>أحدث</strong></td>
                  <td width="2%" align="left" valign="middle">&nbsp;</td>
                  <td width="12%" align="left" valign="middle"><label for="ordtype5"></label>
                    <select name="ordtype" id="ordtype5">
                      <option value="ASC" selected="selected">تصاعدى</option>
                      <option value="DESC">تنازلى</option>
                    </select></td>
                  <td width="18%" align="left" valign="middle"><label for="ordby5"></label>
                    <select name="ordby" id="ordby5">
                      <option value="entry_date" selected="selected">تاريخ الادخال</option>
                      <option value="update_date">تاريخ التعديل</option>
                      <option value="code">الكود</option>
                      <option value="matloob">السعر المطلوب</option>
                    </select></td>
                  <td width="27%" align="left" valign="middle"><strong>ترتيب حسب</strong></td>
                </tr>
</table>
              <table width="29%" border="0">
                <tr> </tr>
              </table>
            </form></td>
          </tr>
        </tbody>
      </table>
        <form id="form1" name="form1" method="post" action="">
        <table width="89%" border="0" align="center">
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield1">
              <label for="code7"></label>
              <input name="code" type="text" id="code7" value="<?php echo $_SESSION['code']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>الكـــــــود</strong></td>
            <td width="15%" align="right" valign="middle" bgcolor="#FFFFFF"><label for="madena4"><span id="spryselect1">
              <select name="madena" id="madena2" title="<?php echo $_SESSION['madena']; ?>">
                <option value="" <?php if (!(strcmp("", $_SESSION['madena']))) {echo "selected=\"selected\"";} ?>>الكل</option>
                <?php foreach($Qcity_rows as $row_Qcity) { ?>
                <option value="<?php echo $row_Qcity['cityname']?>"<?php if (!(strcmp($row_Qcity['cityname'], $_SESSION['madena']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Qcity['cityname']?></option>
                <?php } ?>
              </select>
            </span></label></td>
            <td width="13%" colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong>المــــديـنـــــــة</strong></td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield2">
              <label for="marhala4"></label>
              <input name="marhala" type="text" id="marhala4" value="<?php echo $_SESSION['marhala']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>المرحلة</strong></td>
            <td align="right" valign="middle" bgcolor="#FFFFFF"><label for="aqar_type4"><span id="spryselect2">
              <select name="aqar_type" id="aqar_type2" title="<?php echo $_SESSION['aqar_type']; ?>">
                <option value="" <?php if (!(strcmp("", $_SESSION['aqar_type']))) {echo "selected=\"selected\"";} ?>>الكل</option>
                <?php foreach($Qaqar_type_rows as $row_Qaqar_type) { ?>
                <option value="<?php echo $row_Qaqar_type['aqar_type_name']?>"<?php if (!(strcmp($row_Qaqar_type['aqar_type_name'], $_SESSION['aqar_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Qaqar_type['aqar_type_name']?></option>
                <?php } ?>
              </select>
            </span></label></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong>نوع العقــــــار</strong></td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield3">
              <label for="namozag4"></label>
              <input name="namozag" type="text" id="namozag4" value="<?php echo $_SESSION['namozg']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>النموذج</strong></td>
            <td align="right" valign="middle" bgcolor="#FFFFFF"><label for="amalua_type4"><span id="spryselect3">
              <select name="amalya_type" id="amalya_type" title="<?php echo $_SESSION['amalya_type']; ?>">
                <option value="" <?php if (!(strcmp("", $_SESSION['amalya_type']))) {echo "selected=\"selected\"";} ?>>الكل</option>
                <?php foreach($QQamalya_type_rows as $row_Qamalya_type) { ?>
                <option value="<?php echo $row_Qamalya_type['amalya_type_name']?>"<?php if (!(strcmp($row_Qamalya_type['amalya_type_name'], $_SESSION['amalya_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Qamalya_type['amalya_type_name']?></option>
                <?php } ?>
              </select>
            </span></label></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong>نوع العملـــــية</strong></td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield4">
              <label for="customer_name4"></label>
              <input name="customer_name" type="text" id="customer_name4" value="<?php echo $_SESSION['cust_name']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>اسم العميل</strong></td>
            <td align="right" valign="middle" bgcolor="#FFFFFF"><label for="status4"><span id="spryselect4">
              <select name="status" id="status2" title="<?php echo $_SESSION['status']; ?>">
                <option value="" <?php if (!(strcmp("", $_SESSION['status']))) {echo "selected=\"selected\"";} ?>>الكل</option>
                <?php foreach($Qstatus_rows as $row_Qatatus) { ?>
                <option value="<?php echo $row_Qatatus['status_name']?>"<?php if (!(strcmp($row_Qatatus['status_name'], $_SESSION['status']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Qatatus['status_name']?></option>
                <?php } ?>
              </select>
            </span></label></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong>الحـــــــــالــــة</strong></td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield5">
              <label for="mobile4"></label>
              <input name="mobile" type="text" id="mobile4" value="<?php echo $_SESSION['mobile']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>رقم الموبايل</strong></td>
            <td align="right" valign="middle" bgcolor="#FFFFFF"><span id="spryselect5">
              <label for="tashteeb4"></label>
              <select name="tashteeb" id="tashteeb4" title="<?php echo $_SESSION['tashteeb']; ?>">
                <option value="" <?php if (!(strcmp("", $_SESSION['tashteeb']))) {echo "selected=\"selected\"";} ?>>الكل</option>
                <?php foreach($Qtashteeb_rows as $row_Qtashteeb) { ?>
                <option value="<?php echo $row_Qtashteeb['tashteeb_name']?>"<?php if (!(strcmp($row_Qtashteeb['tashteeb_name'], $_SESSION['tashteeb']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Qtashteeb['tashteeb_name']?></option>
                <?php } ?>
              </select>
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong>التشـطــيــــــب</strong></td>
          </tr>
          <tr>
            <td width="15%" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield7">
              <label for="price_to4"></label>
              <input name="price_to" type="text" id="price_to4" value="<?php echo $_SESSION['price_to']; ?>" />
            </span></td>
            <td width="15%" align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>الــــــى</strong></td>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield6">
              <label for="price_from4"></label>
              <input name="price_from" type="text" id="price_from4" value="<?php echo $_SESSION['price_from']; ?>" />
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong> الســــعـر من </strong></td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield10">
              <label for="mesaha_to4"></label>
              <input name="mesaha_to" type="text" id="mesaha_to4" value="<?php echo $_SESSION['mesaha_to']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>الــــــى</strong></td>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield8">
              <label for="mesaha_from4"></label>
              <input name="mesaha_from" type="text" id="mesaha_from4" value="<?php echo $_SESSION['mesaha_from']; ?>" />
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong>المساحة من</strong></td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield11">
              <label for="hadeka_to4"></label>
              <input name="hadeka_to" type="text" id="hadeka_to4" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>الــــــى</strong></td>
            <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><span id="sprytextfield9">
              <label for="hadeka_from4"></label>
              <input name="hadeka_from" type="text" id="hadeka_from4" />
            </span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#CCCCCC" class="black"><strong>الحـــديقة من </strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>شــــــقــــــة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>عمــــــــــــارة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>مجمــــــــوعـة</strong></td>
            <td rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong><span id="sprytextfield16">
            <label for="door6"></label>
            <input name="door" type="text" id="door6" value="<?php echo $_SESSION['door']; ?>" size="15" maxlength="20" />
            </span></strong></td>
            <td rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="black"><strong>الدور</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#E3DDFE" class="black"><strong>و</strong></td>
            <td align="center" valign="middle" bgcolor="#E3DDFE" class="black"><strong>ع</strong></td>
            <td align="center" valign="middle" bgcolor="#E3DDFE" class="black"><strong>ج</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#E3DDFE"><span id="sprytextfield14">
              <label for="wow4"></label>
              <input name="wow" type="text" id="wow4" value="<?php echo $_SESSION['wow']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#E3DDFE"><span id="sprytextfield13">
              <label for="ain4"></label>
              <input name="ain" type="text" id="ain4" value="<?php echo $_SESSION['ain']; ?>" />
            </span></td>
            <td align="center" valign="middle" bgcolor="#E3DDFE"><span id="sprytextfield12">
              <label for="geem4"></label>
              <input name="geem" type="text" id="geem4" value="<?php echo $_SESSION['geem']; ?>" />
            </span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="black">&nbsp;</td>
</tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2" rowspan="2" align="center" valign="middle"><img src="searching-for-a-house.png" width="50" height="50" alt="Searching for a house icon"/></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="reset" name="cancel" id="cancel" value="الغـــــــــــــاء" /></td>
            <td align="center" valign="middle"><input type="submit" name="search" id="search" value="بــحــــــــــــــــث" /></td>
            </tr>
        </table>
        <table width="89%" border="0" align="center">
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
      </table>
    </form>
    </tr>
  </tbody>
</table>
<table width="99%" border="0">
  <tbody>
    <tr>
      <td><table width="41%" border="0" align="left">
        <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
        <tr>
          <td colspan="5" align="center" valign="middle" bgcolor="#FFFFFF"><strong>عفواً لا توجد بيانات ينطبق عليها شروط البحث</strong></td>
        </tr>
        <?php } // Show if recordset empty ?>
        <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
        <tr>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
          <td align="right" valign="middle" bgcolor="#FFFEDC">يوجد عدد<?php echo $totalRows_Recordset1 ?> بيـــان</td>
        </tr>
       
      </table></td>
    </tr>
  </tbody>
</table>
<table width="99%" border="0">
  <tbody>
    <tr>
      <td>
      <?php foreach($Recordset1 as $row_Recordset1) {?>
      <table width="97%" border="0">
        <tbody>
          <tr>
            <td colspan="3" align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['geem']; ?></span></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">ج</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">تاريخ التعديل</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">الفيو View</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المرحلة</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">نوع العقار</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">العملية</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المدينة</span></strong></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#E3DDFE"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1"> الكود</span></strong><a href="./update.php?code=<?php echo $row_Recordset1['code'];?>"><img src="alarm.jpg" alt="Add alert for property <?php echo $row_Recordset1['code']; ?>" width="25" height="25" title="اضافة تنبيه"/></a></td>
            </tr>
          <tr>
            <td colspan="3" align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['ain']; ?></span></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">ع</span></strong></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['update_date']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['view_v']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['marhala']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['aqar_type']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['amalya_type']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['madena']; ?></span></td>
            <td colspan="2" align="right" valign="middle" bgcolor="#E3DDFE"><a href="./view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" title="عرض الصور" target="_blank"><?php echo $row_Recordset1['code']; ?><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1"><a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" target="_blank"><img src="./view_images.png" alt="View images for property <?php echo $row_Recordset1['code']; ?>" width="30" height="23" title="صور العقار" /></a></span></strong></a></td>
            </tr>
          <tr>
            <td colspan="3" align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['wow']; ?></span></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">و</span></strong></td>
            <td align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">الحالة</span></strong></td>
            <td bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">مدة الايجار</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المتبقى</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">المطلوب</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">مساحة الأرض</span></strong></td>
            <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">مساحة المبانى</span></strong></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#E3DDFE"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow1">نموذج</span></strong></td>
            </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#327900">&nbsp;</td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong><a href="./delete_item_admin.php?code=<?php echo $row_Recordset1['code']; ?>">حذف</a></strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong><a href="./update.php?code=<?php echo $row_Recordset1['code']; ?>">تعديل</a></strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong><a href="./print_sheet_new.php?code=<?php echo $row_Recordset1['code']; ?>">التفاصيل</a></strong></td>
            <td align="center"><span class="black"><?php echo $row_Recordset1['status']; ?></span></td>
           <td align="center"><span class="black"><?php echo $row_Recordset1['modah_ejar']; ?></span></td>
         
            <td align="center" valign="middle"><span class="black"><?php echo number_format($row_Recordset1['motabaqi'])." ج.م. "; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo number_format($row_Recordset1['matloob'])." ج.م. "; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['ard_mesaha']; ?></span></td>
            <td align="center" valign="middle"><span class="black"><?php echo $row_Recordset1['mbna_mesaha']; ?></span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#E3DDFE"><span class="black"><?php echo $row_Recordset1['namozg']; ?></span></td>
            </tr>
          <tr>
            <td colspan="12" align="center" valign="middle" bgcolor="#CCCCCC"><img src="linebar.png" width="280" height="13" alt="Decorative line"/><img src="linebar.png" width="280" height="13" alt="Decorative line"/><img src="linebar.png" width="280" height="13" alt="Decorative line"/></td>
            </tr>
        </tbody>
      </table><?php } ?></td>
    </tr>
  </tbody>
</table> <?php } // Show if recordset not empty ?>
<table width="99%" border="0">
  <tbody>
    <tr>
      <td align="center"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<script type="text/javascript">
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {isRequired:false});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {isRequired:false});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {isRequired:false});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {isRequired:false});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {isRequired:false});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {isRequired:false});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {isRequired:false});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {isRequired:false});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15", "integer", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
