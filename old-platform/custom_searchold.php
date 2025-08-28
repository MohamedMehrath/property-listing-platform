<?php require_once('custom_searchold_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>شاشة البحث السريع</title>
<style type="text/css">
body,td,th {
	color: #F00;
}
body {
	background-color: #CCC;
}
.black {
	color: #000;
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script><script src="./SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="./SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td width="295" align="center" valign="middle" bgcolor="#C9C9C9"><?php echo date("d/m/Y h:i:s a") ?>&nbsp;</td>
    <td width="1785" align="right" valign="middle" bgcolor="#C9C9C9"><img src="./banner.png" alt="" width="600" height="124" /></td>
    <td colspan="7" bgcolor="#C9C9C9"><h1>&nbsp;</h1></td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#314ECE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" align="right" valign="middle" bgcolor="#FF0000"><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="index1.php">الرئيسية</a></li>
      <li><a class="MenuBarItemSubmenu" href="index1.php">بحث متخصص</a>
        <ul>
          <li><a href="view_code.php">كود العقار</a></li>
          <li><a href="view_madena.php">المدينة</a></li>
          <li><a href="view_aqar_type.php">نوع العقار</a></li>
          <li><a href="view_namozg.php">النموذج</a></li>
          <li><a href="view_tashteeb.php">التشطيب</a></li>
          <li><a href="view_amalya_type.php">نوع العملية</a></li>
          <li><a href="view_status.php">الحالة</a></li>
          <li><a href="view_customer.php">بيانات العميل</a></li>
          <li><a href="view_price_mesaha.php">السعر / المساحة</a></li>
          <li><a href="./view_marhala.php">المرحلة</a></li>
          </ul>
        </li>
      <li><a href="view_all.php">عرض البيانات</a></li>
      <li><a href="insert.php">ادخال بيان جديد</a>        </li>
      <li><a href="user_view.php">المستخدمين</a></li>
      <li><a href="./help.php">المساعدة</a></li>
    </ul></td>
    <td width="279" align="center" valign="middle" bgcolor="#FF0000" class="blue"><strong>شاشة البحث السريع</strong></td>
    <td width="121" align="right" valign="middle" bgcolor="#FF0000"><a href="./index.php"><img src="logout.png" width="28" height="28" alt="خروج من النظام" /></a></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#AEAEAE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#AEAEAE"><form id="form1" name="form1" method="post" action="">
      <table width="90%" border="0" align="center">
        <tr>
          <td colspan="4" rowspan="13">&nbsp;</td>
          <td colspan="2" rowspan="3" align="right" valign="middle" bgcolor="#333333" class="black"><strong class="yelow">            بحــــــــــــــــــــــــــث ببيـــــــــــــــــــــانــــــات العمــــيــــــــــــــــــــــــــل
            </strong></td>
          <td colspan="3" align="right" valign="middle" bgcolor="#333333" class="yelow"><strong>بحــــــــث بالكــــــــــود</strong></td>
          </tr>
        <tr>
          <td width="19%" align="right" valign="middle" bgcolor="#C9C9C9">&nbsp;</td>
          <td width="6%" align="right" valign="middle" bgcolor="#C9C9C9"><span class="black">
            <input name="code" tabindex="1" type="text" id="code2" />
          </span></td>
          <td width="14%" align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الكـــــــود</strong></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" bgcolor="#333333" class="yelow"><strong>بحـــــــــــث بالعنــــــــوان</strong></td>
          </tr>
        <tr>
          <td width="25%" align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield4">
            <label for="customer_name"></label>
            <input name="customer_name" tabindex="10" type="text" id="customer_name" value="" />
</span></td>
          <td width="24%" align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>اسم العميل</strong></td>
          <td colspan="2" align="right" valign="middle" bgcolor="#C9C9C9"><select name="madena" tabindex="2" id="madena2">
            <option value="">الكل</option>
            <?php foreach($Qcity_rows as $row_Qcity) { ?>
            <option value="<?php echo $row_Qcity['cityname']?>"><?php echo $row_Qcity['cityname']?></option>
            <?php } ?>
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>المــــديـنـــــــة</strong></td>
        </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield5">
            <label for="mobile"></label>
            <input name="mobile" tabindex="11" type="text" id="mobile" />
</span></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>رقم الموبايل</strong></td>
          <td colspan="2" align="right" valign="middle" bgcolor="#C9C9C9"><select name="aqar_type" tabindex="3" id="aqar_type2">
            <option value="">الكل</option>
            <?php foreach($Qaqar_type_rows as $row_Qaqar_type) { ?>
            <option value="<?php echo $row_Qaqar_type['aqar_type_name']?>"><?php echo $row_Qaqar_type['aqar_type_name']?></option>
            <?php } ?>
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>نوع العقــــــار</strong></td>
        </tr>
        <tr>
          <td colspan="2" rowspan="3" align="right" valign="middle" bgcolor="#C9C9C9" class="black"><p> - 
فلترالبحث
مدينة <?php echo $madena_Recordset1; ?> -
نوع العقار<?php echo $aqartype_Recordset1; ?> -
الحالة<?php echo $status_Recordset1; ?> -
المرحلة<?php echo $marhala_Recordset1; ?> -
</p></td>
          <td colspan="2" align="right" valign="middle" bgcolor="#C9C9C9" class="black"><span id="sprytextfield6">
            <label for="price_from"></label>
            <select name="status" tabindex="4" id="status2">
              <option value="">الكل</option>
              <?php foreach($Qstatus_rows as $row_Qatatus) { ?>
              <option value="<?php echo $row_Qatatus['status_name']?>"><?php echo $row_Qatatus['status_name']?></option>
              <?php } ?>
              </select>
          </span></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الحـــــــــالــــة</strong></td>
          </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="11%" align="right" valign="middle" bgcolor="#669900"><input name="m6" type="checkbox" id="m6" value="6" />
                </td>
              <td width="4%" align="left" valign="middle" bgcolor="#669900"><strong>6</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#66CC66"><input name="m5" type="checkbox" id="m5" value="5" />
              </td>
              <td width="4%" align="left" valign="middle" bgcolor="#66CC66"><strong>5</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#66FF99"><input name="m4" type="checkbox" id="m4" value="4" />
               </td>
              <td width="4%" align="left" valign="middle" bgcolor="#66FF99"><strong>4</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#66FFFF"><input name="m3" type="checkbox" id="m3" value="3"  />
               </td>
              <td width="4%" align="left" valign="middle" bgcolor="#66FFFF"><strong>3</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#FFFF99"><input name="m2" type="checkbox" id="m2" value="2" />
                </td>
              <td width="4%" align="left" valign="middle" bgcolor="#FFFF99"><strong>2</strong></td>
              <td width="11%" align="right" valign="middle" bgcolor="#FFFFCC"><input name="m1" type="checkbox" id="m1" value="1"  />
                </td>
              <td align="left" valign="middle" bgcolor="#FFFFCC"><strong>1</strong></td>
              </tr>
          </table>            <label for="marhala"></label></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><select name="marhala" tabindex="5" id="marhala">
            <option value="">الكل</option>
            <?php foreach($Recordset101 as $row_Recordset101) { ?>
            <option value="<?php echo $row_Recordset101['marhala']?>"><?php echo $row_Recordset101['marhala']?></option>
            <?php } ?>
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>المرحلة</strong></td>
          </tr>
        <tr>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="9%" align="right" valign="middle" bgcolor="#666666"><input name="d6" type="checkbox" id="d6" value="6" />
                <label for="d6"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#666666"><strong>6</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#990000"><input name="d5" type="checkbox" id="d5" value="5" />
                <label for="d5"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#990000"><strong>5</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#996633"><input name="d4" type="checkbox" id="d4" value="4" />
                <label for="d4"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#996633"><strong>4</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#9900FF"><input name="d3" type="checkbox" id="d3" value="3" />
                <label for="d3"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#9900FF"><strong>3</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#FF6633"><input name="d2" type="checkbox" id="d2" value="2" />
                <label for="d2"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#FF6633"><strong>2</strong></td>
              <td width="9%" align="right" valign="middle" bgcolor="#FF6666"><input name="d1" type="checkbox" id="d1" value="1" />
                <label for="d1"></label></td>
              <td width="3%" align="center" valign="middle" bgcolor="#FF6666"><strong>1</strong></td>
              <td width="15%" align="right" valign="middle" bgcolor="#FF99FF"><input name="d0" type="checkbox" id="d0" value="0" />
                <label for="d0"></label></td>
              <td width="13%" align="center" valign="middle" bgcolor="#FF99FF"><strong>ارضى</strong></td>
            </tr>
          </table>            <label for="door"></label></td>
          <td align="right" valign="middle" bgcolor="#C9C9C9" class="black"><select name="door" tabindex="6" id="door">
            <option value="">الكل</option>
            <?php foreach($Recordset101 as $row_Recordset101) { ?>
            <option value="<?php echo $row_Recordset101['door']?>"><?php echo $row_Recordset101['door']?></option>
            <?php } ?>
          </select></td>
          <td align="right" valign="middle" bgcolor="#9B9B9B" class="black"><strong>الــــــدور</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>شــــــقــــــة</strong></td>
          <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>عمــــــــــــارة</strong></td>
          <td colspan="2" align="center" valign="middle" bgcolor="#314ECE" class="black"><strong>مجمــــــــوعـة</strong></td>
          <td rowspan="2" align="center" valign="middle" bgcolor="#333333" class="yelow"><strong>بحـــــــث بالمجمــــــوعــــة / عمارة / شقـــــــة</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>و</strong></td>
          <td align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>ع</strong></td>
          <td colspan="2" align="center" valign="middle" bgcolor="#9B9B9B" class="black"><strong>ج</strong></td>
          </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield14">
            <label for="wow"></label>
            <input name="wow" tabindex="9" type="text" id="wow" />
</span></td>
          <td align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield13">
            <label for="ain"></label>
            <input name="ain" tabindex="8" type="text" id="ain" />
</span></td>
          <td colspan="2" align="center" valign="middle" bgcolor="#C9C9C9"><span id="sprytextfield12">
            <label for="geem"></label>
            <input name="geem" tabindex="7" type="text" id="geem" />
</span></td>
          <td align="center" valign="middle" bgcolor="#C9C9C9" class="black">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle"><input type="reset" tabindex="16" name="cancel" id="cancel" value="الغـــــــــــــاء" /></td>
          <td colspan="2" align="center" valign="middle"><input type="submit" tabindex="15" name="search" id="search" value="بــحــــــــــــــــث" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#C9C9C9"><form id="form2" name="form2" method="post" action="">
      <table width="42%" border="0" align="center">
        <tr>
          <td width="3%">&nbsp;</td>
          <td width="23%" align="center" valign="middle"><input type="submit" tabindex="17" name="tophandred" id="tophandred" value="عــــــرض" /></td>
          <td width="8%"><span id="sprytextfield15">
          <label for="top100"></label>
          <input name="top100" type="text" tabindex="14" id="top100" size="5" />
<span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          <td width="7%" align="left" valign="middle"><strong>أحدث</strong></td>
          <td width="2%" align="left" valign="middle">&nbsp;</td>
          <td width="12%" align="left" valign="middle"><label for="ordtype"></label>
            <select name="ordtype" tabindex="13" id="ordtype">
              <option value="ASC" selected="selected">تصاعدى</option>
              <option value="DESC">تنازلى</option>
            </select></td>
          <td width="18%" align="left" valign="middle"><label for="ordby"></label>
            <select name="ordby" tabindex="12" id="ordby">
              <option value="entry_date" selected="selected">تاريخ الادخال</option>
              <option value="update_date">تاريخ التعديل</option>
              <option value="code">الكود</option>
              <option value="matloob">السعر المطلوب</option>
            </select></td>
          <td width="27%" align="left" valign="middle"><strong>ترتيب حسب</strong></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="9"><table width="37%" border="0" align="left">
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
      <tr>
        <td colspan="5" align="center" valign="middle" bgcolor="#9B9B9B"><strong>عفواً لا توجد بيانات ينطبق عليها شروط البحث</strong></td>
      </tr>
      <?php } // Show if recordset empty ?>
      <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
      <tr>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
        <td align="center" valign="middle" bgcolor="#9B9B9B"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
        <td align="right" valign="middle" bgcolor="#9B9B9B">يوجد عدد<?php echo $totalRows_Recordset1 ?> بيـــان</td>
      </tr>
      <?php } // Show if recordset not empty ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="9"><?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
        <table width="95%" border="0" align="center">
          <tr class="black">
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow">حذف</td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>التفاصيل</strong></td>
             <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>تعديل</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>تاريخ التعديل</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>view</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>اجمالى العقد</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>المتبقى</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>المطلوب</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>مدة الايجار</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>الحالة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>مساحة الارض</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>مساحة المبنى</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>نموذج</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>و</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>ع</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>ج</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">المرحلة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">نوع العقار</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="yelow"><strong>نوع العملية</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">المدينة</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black"><strong class="yelow">الكود</strong></td>
            <td align="center" valign="middle" bgcolor="#314ECE" class="black">&nbsp;</td>
          </tr>
          <?php foreach ($Recordset1 as $row_Recordset1) { ?>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="./delete_item_admin.php?code=<?php echo $row_Recordset1['code']; ?>">حذف</a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="./print_sheet.php?code=<?php echo $row_Recordset1['code']; ?>">التفاصيل</a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="./update.php?code=<?php echo $row_Recordset1['code']; ?>">تعديل</a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['update_date']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['view_v']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['aqd_total'])." ج.م. "; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['motabaqi'])." ج.م. "; ?></td>

              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['matloob'])." ج.م. "; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['modah_ejar']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['status']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['ard_mesaha']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['mbna_mesaha']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['namozg']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['wow']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['ain']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['geem']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['marhala']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['aqar_type']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['amalya_type']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['madena']; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><a href="./view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" title="عرض الصور" target="_blank"><?php echo $row_Recordset1['code']; ?></a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="./view_images.png" alt="صور العقار" width="30" height="20" /></a></td>
            </tr>
            <tr bgcolor="#9B9B9B">
              <td colspan="22" align="center" valign="middle"><hr /></td>
            </tr>
            <?php } ?>
        </table>
    <?php } // Show if recordset not empty ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" align="right" bgcolor="#314ECE"><span class="yelow">برنامج ادارة التسويق العقارى الاصدار الثانى V. 2.0 - 2015</span></td>
  </tr>
</table>
<p>&nbsp; </p>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {isRequired:false});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {isRequired:false});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {isRequired:false});
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15", "integer", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
