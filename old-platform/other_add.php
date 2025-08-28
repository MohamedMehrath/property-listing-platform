<?php require_once('other_add_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اعدادات العقارات</title>
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">
.yelow {color: #FF0;
}
.black {	color: #000;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="5" align="right" valign="middle" bgcolor="#FFFEDC">&nbsp;</td>
    <td width="18%" colspan="-2" align="center" valign="middle" bgcolor="#FFFEDC" class="blue"><strong>اعدادات بيانات العقارات</strong></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
    <td rowspan="8" align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="5"><table width="95%" border="0" align="center">
      <tr class="black">
        <td width="22%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة حالة عقار</strong></td>
        <td width="19%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة حالة تشطيب جديدة</strong></td>
        <td width="22%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة نوع عملية</strong></td>
        <td width="19%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة نوع عقار</strong></td>
        <td width="18%" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة مدينة جديدة</strong></td>
        </tr>
      <tr align="center" valign="top">
        <td bgcolor="#FFFFFF"><form id="form5" name="form5" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><label for="statusname"></label>
                <input type="text" tabindex="9" name="statusname" id="statusname" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><strong class="black">حالة العقار</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" tabindex="10" name="ok5" id="ok5" value="اضافة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form5" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form4" name="form4" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><label for="tashteeb_name"></label>
                <input type="text" tabindex="7" name="tashteeb_name" id="tashteeb_name" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><strong class="black">التشطيب</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" tabindex="8" name="ok4" id="ok4" value="اضافة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form4" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form3" name="form3" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><label for="amalya_type_name"></label>
                <input type="text" tabindex="5" name="amalya_type_name" id="amalya_type_name" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>نوع العملية</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" tabindex="6" name="ok3" id="ok3" value="اضافة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form3" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form2" name="form2" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input type="text" tabindex="3" name="aqar_type_name" id="aqar_type_name" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>نوع العقار</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><label for="aqar_type_name">
                <input type="submit" tabindex="4" name="ok2" id="ok2" value="اضافة" />
                </label></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form2" />
          </form></td>
        <td bgcolor="#FFFFFF"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center">
            <tr>
              <td width="47%" align="center" valign="middle" bgcolor="#FFFFFF"><input type="text" tabindex="1" name="cityname" id="cityname" /></td>
              <td width="17%" align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>اسم المدينة</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><label for="cityname">
                <input type="submit" tabindex="2" name="ok" id="ok" value="اضافة" />
                </label></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form1" />
          </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><form id="form12" name="form12" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة القاب العملاء</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="laqab"></label>
                <input type="text" name="laqab" id="laqab" /></td>
              <td align="center" bgcolor="#FFFFFF" class="black"><strong>اللقب</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok11" id="ok11" value="اضــــافــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form12" />
          </form></td>
        <td><form id="form11" name="form11" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة View العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="view"></label>
                <input type="text" name="view" id="view" /></td>
              <td align="center" bgcolor="#FFFFFF" class="black"><strong>View</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok10" id="ok10" value="اضــــافــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form11" />
          </form></td>
        <td><form id="form10" name="form10" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة ادوار العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="door"></label>
                <input type="text" name="door" id="door" /></td>
              <td align="center" bgcolor="#FFFFFF"><strong class="black">الدور</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok9" id="ok9" value="اضــــافـــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form10" />
          </form></td>
        <td><form id="form9" name="form9" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة مراحل العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="marhala"></label>
                <input type="text" name="marhala" id="marhala" /></td>
              <td align="center" bgcolor="#FFFFFF" class="black"><strong>المرحلة</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok8" id="ok8" value="اضــــافـــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form9" />
          </form></td>
        <td><form id="form8" name="form8" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" valign="middle" bgcolor="#F5F3F4" class="black"><strong>اضافة نماذج العقارات</strong></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><label for="namozg"></label>
                <input type="text" name="namozg" id="namozg" /></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><strong>النموذج</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="ok7" id="ok7" value="اضــــافــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form8" />
          </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="53%">&nbsp;</td>
        <td width="37%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black">اضافة مواقع تسويق عقارات صديقة</strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><form id="form6" name="form6" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFEDC"><span id="sprytextfield1">
                <label for="sitename"></label>
                <input name="sitename" type="text" id="sitename" size="30" />
  </span></td>
              <td align="right" valign="middle" bgcolor="#FFFEDC" class="black"><strong>اسم الموقع /الوصف</strong></td>
              </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFEDC"><span id="sprytextfield2">
                <label for="url"></label>
                <input name="url" type="text" id="url" size="30" />
                <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
              <td align="right" valign="middle" bgcolor="#FFFEDC" class="black"><strong>رابط الموقع URL</strong></td>
              </tr>
            <tr align="center" valign="middle">
              <td colspan="2" bgcolor="#FFFEDC"><input type="submit" name="ok6" id="ok6" value="اضــــــــــــافـــــــــــة" /></td>
              </tr>
            </table>
          <input type="hidden" name="MM_insert" value="form6" />
          </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><table width="80%" border="0" align="center">
      <tr>
        <td colspan="5" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="blue">البـــــيـــانـــــــــــــــــــــــــات الحـــــــــــــــــــالـــــيـــــــة</strong></td>
        </tr>
      <tr align="center" valign="top" bgcolor="#CFD0EB">
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">حالات العقارات</strong></td>
            </tr>
          <?php foreach ($Qstatus as $row_Qstatus) { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qstatus['status_name']; ?></td>
              </tr>
            <?php } ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">حالات التشطيب</strong></td>
            </tr>
          <?php foreach ($Qtashteeb as $row_Qtashteeb) { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qtashteeb['tashteeb_name']; ?></td>
              </tr>
            <?php } ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">انواع عمليات العقارات</strong></td>
            </tr>
          <?php foreach ($Qamalya_type as $row_Qamalya_type) { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qamalya_type['amalya_type_name']; ?></td>
              </tr>
            <?php } ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">انواع العقارات</strong></td>
            </tr>
          <?php foreach ($Qaqartype as $row_Qaqartype) { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qaqartype['aqar_type_name']; ?></td>
              </tr>
            <?php } ?>
          </table></td>
        <td><table width="95%" border="0" align="center">
          <tr>
            <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">المدن الحالية</strong></td>
            </tr>
          <?php foreach ($Qcity as $row_Qcity) { ?>
            <tr>
              <td align="center" valign="middle"><?php echo $row_Qcity['cityname']; ?></td>
              </tr>
            <?php } ?>
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr valign="top">
    <td width="14%" rowspan="2" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">الألقاب الحالية</strong></td>
      </tr>
      <?php foreach ($Recordsetlaqab as $row_Recordsetlaqab) { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetlaqab['laqab_name']; ?></td>
        </tr>
        <?php } ?>
    </table></td>
    <td width="12%" rowspan="2" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">View الحالية</strong></td>
      </tr>
      <?php foreach ($Recordsetview as $row_Recordsetview) { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetview['viewname']; ?></td>
        </tr>
        <?php } ?>
    </table></td>
    <td width="13%" rowspan="2" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">الأدوار الحالية</strong></td>
      </tr>
      <?php foreach ($Recordsetdoor as $row_Recordsetdoor) { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetdoor['doorname']; ?></td>
        </tr>
        <?php } ?>
    </table></td>
    <td width="15%" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">المراحل الحالية</strong></td>
      </tr>
      <?php foreach ($Recordsetmarhala as $row_Recordsetmarhala) { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetmarhala['marhalaname']; ?></td>
        </tr>
        <?php } ?>
    </table></td>
    <td width="28%" align="center" class="gr"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#314ECE"><strong class="yelow">النماذج الحالية</strong></td>
        </tr>
      <?php foreach ($Recordsetnamozg as $row_Recordsetnamozg) { ?>
        <tr>
          <td align="center" bgcolor="#CFD0EB"><?php echo $row_Recordsetnamozg['namozgname']; ?></td>
          </tr>
        <?php } ?>
    </table></td>
  </tr>
  <tr valign="top">
    <td colspan="2" align="center" class="gr">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center" valign="middle" class="gr"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="53%">&nbsp;</td>
        <td width="37%" align="center" valign="middle" bgcolor="#F5F3F4"><strong class="black"> مواقع تسويق عقارات صديقة</strong></td>
        </tr>
      <?php foreach ($Recordset2 as $row_Recordset2) { ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><form id="form7" name="form6" method="post" action="">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="right" valign="middle" bgcolor="#CFD0EB"><?php echo $row_Recordset2['sitename']; ?></td>
                </tr>
              <tr>
                <td align="left" valign="middle" bgcolor="#CFD0EB"><?php echo $row_Recordset2['url']; ?></td>
                </tr>
              </table>
            </form></td>
          </tr>
        <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" class="gr"><a href="./insert.php"><strong>رجــــــوع لشاشة الادخال الرئيسية</strong></a></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "url", {validateOn:["blur", "change"]});
</script>
</body>
</html>
