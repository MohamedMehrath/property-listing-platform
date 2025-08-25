<?php require_once('update_matlob_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل المطلوب من العقارات</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
#form1 table tr td table tr td {
	color: #000;
}
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#314ECE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFEBF">&nbsp;</td>
    <td width="25%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة تعديل البيانات</strong></td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FEC121"><hr /></td>
  </tr>
  <tr>
    <td colspan="7"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <table width="90%" border="0" align="center">
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td width="16%" align="right"><span id="sprytextfield2">
              <input name="madena_other" type="text" id="madena_other" value="<?php echo $row_Recordset1['madena_other']; ?>" />
</span></td>
              <td width="17%" align="right">(حالة خاصة داخل المدن الفرعية)</td>
              <td width="7%" align="center" bgcolor="#BBBBBB"><strong>اخــــــرى</strong></td>
              <td width="15%" align="right"><label for="madena"></label>
                <select name="madena" id="madena" tabindex="1">
                  <?php
foreach($Recordsetmadena as $row_Recordsetmadena) {
?>
                  <option value="<?php echo $row_Recordsetmadena['cityname']?>"<?php if (!(strcmp($row_Recordsetmadena['cityname'], $row_Recordset1['madena']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsetmadena['cityname']?></option>
                  <?php
}
?>
                </select></td>
              <td width="19%" align="center" bgcolor="#BBBBBB"><strong>المــديــنــــــة</strong></td>
              <td align="right" bgcolor="#CCFF99"><span id="sprytextfield1">
              <label for="code"></label>
              <input name="call_date" type="text" id="code" tabindex="1" value="<?php echo $row_Recordset1['call_date']; ?>"  />
              <span class="textfieldRequiredMsg">يلزم ادخال الكود.</span></span></td>
              <td align="right" bgcolor="#CCFF99"><strong>تاريخ الاتصال</strong></td>
              </tr>
            <tr>
              <td align="right"><span id="sprytextfield3">
                <label for="aqar_type_other"></label>
                <input name="aqar_type_other" type="text" id="aqar_type_other" value="<?php echo $row_Recordset1['aqar_type_other']; ?>" />
</span></td>
              <td align="right">(حالة خاصة داخل العقارات الفرعية)</td>
              <td align="center" bgcolor="#BBBBBB"><strong>اخــــــرى</strong></td>
              <td align="right"><label for="aqar_type"></label>
                <select name="aqar_type" id="aqar_type" tabindex="3">
                  <?php
foreach($Recordsetaqar_type as $row_Recordsetaqar_type) {
?>
                  <option value="<?php echo $row_Recordsetaqar_type['aqar_type_name']?>"<?php if (!(strcmp($row_Recordsetaqar_type['aqar_type_name'], $row_Recordset1['aqar_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsetaqar_type['aqar_type_name']?></option>
                  <?php
}
?>
                </select></td>
              <td align="center" bgcolor="#BBBBBB"><strong>نوع العقار</strong></td>
              <td width="20%" align="right" bgcolor="#DEFFC7"><input name="code" type="text" id="code" tabindex="2" value="<?php echo $row_Recordset1['code']; ?>" /></td>
              <td width="6%" align="right" bgcolor="#DEFFC7"><strong>الكود</strong></td>
              </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td align="right"><label for="view_v"></label>
                <select name="view_v" id="view_v">
                  <?php
foreach($Recordsetview as $row_Recordsetview) {
?>
                  <option value="<?php echo $row_Recordsetview['viewname']?>"<?php if (!(strcmp($row_Recordsetview['viewname'], $row_Recordset1['view_v']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsetview['viewname']?></option>
                  <?php
}
?>
                </select></td>
              <td align="center" valign="middle" bgcolor="#BBBBBB"><strong>View</strong></td>
              <td align="right"><label for="namozg2"></label>
                <input name="namozg_other" type="text" id="namozg_other" value="<?php echo $row_Recordset1['namozg_other']; ?>" size="20" />
                <select name="namozg" id="namozg2">
                  <?php
foreach($Recordsetnamozg as $row_Recordsetnamozg) {
?>
                  <option value="<?php echo $row_Recordsetnamozg['namozgname']?>"<?php if (!(strcmp($row_Recordsetnamozg['namozgname'], $row_Recordset1['namozg']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsetnamozg['namozgname']?></option>
                  <?php
}
?>
              </select></td>
              <td align="right" bgcolor="#BBBBBB"><strong>النموذج</strong></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right"><span id="spryselect3">
                <input name="amalya_type_other" type="text" id="amalya_type_other" value="<?php echo $row_Recordset1['amalya_type_other']; ?>" size="20" />
                <label for="amalya_type"></label>
                <span class="selectRequiredMsg">اختر نوع العملية.</span>
                <label for="amalya_type2"></label>
                <select name="amalya_type" id="amalya_type2" tabindex="6">
                  <?php
foreach($Recordsetamalya as $row_Recordsetamalya) {
?>
                  <option value="<?php echo $row_Recordsetamalya['amalya_type_name']?>"<?php if (!(strcmp($row_Recordsetamalya['amalya_type_name'], $row_Recordset1['amalya_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsetamalya['amalya_type_name']?></option>
                  <?php
}
?>
                  </select>
              </span></td>
              <td align="right" bgcolor="#BBBBBB"><strong>نوع العملية</strong></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td align="right"><input name="rooms" type="text" id="rooms" value="<?php echo $row_Recordset1['rooms']; ?>" /></td>
              <td align="center" bgcolor="#9E9E9E"><strong>عدد الغرف</strong></td>
              <td align="right"><label for="tashteeb"></label>
                <input name="tashteeb_other" type="text" id="tashteeb_other" value="<?php echo $row_Recordset1['tashteeb_other']; ?>" size="20" />
                <select name="tashteeb" id="tashteeb" tabindex="7">
                  <?php
foreach($Recordsettashteeb as $row_Recordsettashteeb) {
?>
                  <option value="<?php echo $row_Recordsettashteeb['tashteeb_name']?>"<?php if (!(strcmp($row_Recordsettashteeb['tashteeb_name'], $row_Recordset1['tashteeb']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsettashteeb['tashteeb_name']?></option>
                  <?php
}
?>
              </select></td>
              <td align="right" bgcolor="#BBBBBB"><strong>التشطيب</strong></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td align="right"><input name="wc" type="text" id="wc" value="<?php echo $row_Recordset1['WC']; ?>" /></td>
              <td align="center" bgcolor="#9E9E9E"><strong>عدد الحمامات</strong></td>
              <td align="right"><label for="marhala2"></label>
                <input name="marhala_other" type="text" id="marhala_other" value="<?php echo $row_Recordset1['marhala_other']; ?>" size="20" />
                <select name="marhala" id="marhala2" tabindex="8">
                  <?php
foreach($Recordsetmarhala as $row_Recordsetmarhala) {
?>
                  <option value="<?php echo $row_Recordsetmarhala['marhalaname']?>"<?php if (!(strcmp($row_Recordsetmarhala['marhalaname'], 
$row_Recordset1['marhala']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsetmarhala['marhalaname']?></option>
                  <?php
}
?>
              </select></td>
              <td align="right" bgcolor="#BBBBBB"><strong>المرحلة</strong></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td align="center" valign="middle" bgcolor="#314ECE"><strong>المســـاحة</strong></td>
              <td align="center" valign="middle" bgcolor="#314ECE"><strong>Budget الســــعر </strong></td>
              <td align="center" valign="middle" bgcolor="#314ECE"><strong>الدور</strong></td>
              <td rowspan="2" align="center" valign="middle" bgcolor="#CCFF99"><img src="aqarr.jpg" width="61" height="64" alt=""/></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td align="center" valign="middle" bgcolor="#CCFF99"><span id="sprytextfield4">
              <label for="masaha"></label>
              <input name="masaha" type="text" id="masaha" tabindex="16" value="<?php echo $row_Recordset1['mesaha']; ?>" />
              <span class="textfieldInvalidFormatMsg">ادخل قيمة المساحة بالارقام.</span></span></td>
              <td align="center" valign="middle" bgcolor="#CCFF99"><span id="sprytextfield">
              <label for="budget3"></label>
              <input name="budget" type="text" id="budget3" tabindex="18" onchange="addfee();" value="<?php echo $row_Recordset1['budget']; ?>"/>
              <span class="textfieldRequiredMsg">يجب ادخال قيمة المطلوب.</span><span class="textfieldInvalidFormatMsg">ادخل قيمة صحيحة.</span></span></td>
              <td align="center" valign="middle" bgcolor="#CCFF99"><select name="door" id="door2">
                <?php
foreach($Recordsetdoor as $row_Recordsetdoor) {
?>
                <option value="<?php echo $row_Recordsetdoor['doorname']?>"<?php if (!(strcmp($row_Recordsetdoor['doorname'], $row_Recordset1['door']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsetdoor['doorname']?></option>
                <?php
}
?>
              </select></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td align="center" bgcolor="#CCFF99">&nbsp;</td>
              <td align="center" bgcolor="#CCFF99">&nbsp;</td>
              <td align="center" bgcolor="#CCFF99">&nbsp;</td>
              <td align="center" valign="middle" bgcolor="#CCFF99"><span id="sprytextfield31">
                <label for="door"></label>
                </span>
                <label for="door2"></label></td>
            </tr>
            <tr>
              <td colspan="6" align="right"><input name="kmalyat" type="text" id="kmalyat" value="<?php echo $row_Recordset1['kmalyat']; ?>" size="120" /></td>
              <td align="right" bgcolor="#9E9E9E"><strong>الكماليات</strong></td>
            </tr>
            <tr>
              <td colspan="6" align="right"><input name="details" type="text" id="details" value="<?php echo $row_Recordset1['details']; ?>" size="120" /></td>
              <td align="right" bgcolor="#9E9E9E"><strong>تفاصيل العقار</strong></td>
            </tr>
            <tr>
              <td colspan="6" align="right"><span id="sprytextfield10">
                <label for="address"></label>
                <input name="address" type="text" id="address" tabindex="14" value="<?php echo $row_Recordset1['address']; ?>" size="100" />
                <span class="textfieldRequiredMsg">يلزم ادخال العنوان.</span></span></td>
              <td align="right" bgcolor="#BBBBBB"><strong>العنــــوان</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td colspan="5" align="right" bgcolor="#F5F3F4"><textarea name="action_history" id="action_history" cols="90" rows="5"><?php echo $row_Recordset1['action_history']; ?></textarea></td>
              <td align="right" bgcolor="#F5F3F4"><strong>ماذا حدث للطلب ؟</strong></td>
            </tr>
            <tr>
              <td colspan="5" align="right" bgcolor="#F5F3F4"><span id="sprytextfield25">
                <label for="notes"></label>
                <input name="notes" type="text" tabindex="31" id="notes" value="<?php echo $row_Recordset1['notes']; ?>" size="100" />
</span></td>
              <td align="right" bgcolor="#F5F3F4"><strong>ملاحظـــــــــــــات</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td width="35%" align="right"><input name="whatsapp" type="text" id="whatsapp" value="<?php echo $row_Recordset1['whatsapp']; ?>" /></td>
              <td width="7%" align="left"><strong><img src="whatsapp.png" width="40" height="40" alt=""/></strong></td>
              <td width="41%" align="right"><span id="sprytextfield26">
                <label for="cust_title"></label>
                <span class="textfieldRequiredMsg">يلزم ادخال اسم العميل بالكامل.</span>
                <input name="cust_name" type="text" tabindex="33" id="cust_name" value="<?php echo $row_Recordset1['cust_name']; ?>" size="55" />
              </span></td>
              <td colspan="2" align="left"><label for="cust_title2"></label>                
                <strong>اسم العمـــــيل</strong></td>
              </tr>
            <tr>
              <td align="right"><input name="email" type="text" id="email" value="<?php echo $row_Recordset1['email']; ?>" /></td>
              <td align="left"><strong><img src="web.png" width="30" height="40" alt=""/></strong></td>
              <td colspan="2" align="right"><span id="sprytextfield28">
                <label for="telephone"></label>
                <input name="telephone" type="text" tabindex="34" id="telephone" value="<?php echo $row_Recordset1['telephone']; ?>" />
                <span class="textfieldInvalidFormatMsg">ادخل رقم التليفون بشكل صحيح.</span></span></td>
              <td width="6%" align="right" bgcolor="#BBBBBB"><strong><img src="tel.png" width="30" height="30" alt=""/></strong></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
              <td colspan="2" align="right"><span id="sprytextfield29">
                <label for="mobile"></label>
                <input name="mobile" type="text" tabindex="35" id="mobile" value="<?php echo $row_Recordset1['mobile']; ?>" />
                <span class="textfieldInvalidFormatMsg">ادخل رقم الموبايل بشكل صحيح.</span></span></td>
              <td align="right" bgcolor="#BBBBBB"><strong><img src="mob.png" width="30" height="30" alt=""/></strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td colspan="5"><table width="100%" border="0" align="right">
            <tr>
              <td rowspan="4" align="right"><table width="98%" border="0" align="center">
                <tbody>
                  <tr>
                    <td><input <?php if (!(strcmp($row_Recordset1['remember'],1))) {echo "checked=\"checked\"";} ?> name="remember" type="checkbox" tabindex="41" id="remember" /> </td>
                    <td><strong>تنبيه؟</strong></td>
                    <td><input <?php if (!(strcmp($row_Recordset1['found'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="found"  tabindex="41" id="found" /></td>
                    <td><span class="blue">تم الحصول عليه؟</span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="2"><input name="officeid" type="text" id="officeid" value="<?php echo $row_Recordset1['office_id']; ?>" /></td>
                    <td><strong>مضاف من قبل مكتب تسويق</strong></td>
                  </tr>
                </tbody>
              </table></td>
              <td width="17%" align="center" bgcolor="#CCFF99"><strong>تاريخ التعديل</strong></td>
              <td width="18%" align="center" bgcolor="#CCFF99"><span id="sprytextfield30">
                <label for="masdr"></label>
              </span><strong>تاريخ الادخال</strong></td>
              <td width="8%" rowspan="2" align="right" bgcolor="#CCFF99">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" bgcolor="#CCFF99"><input name="update_date" type="text" tabindex="37" id="update_date" value="<?php echo date("Y-m-d") ?>" /></td>
              <td align="center" bgcolor="#CCFF99"><input name="entry_date" type="text" tabindex="36" id="entry_date" value="<?php echo $row_Recordset1['entry_date']; ?>" /></td>
              </tr>
            <tr>
              <td align="center"><strong>تم التعديل بواسطة</strong></td>
              <td align="center"><input name="masdr" type="text" id="masdr" tabindex="38" value="<?php echo $row_Recordset1['masdr']; ?>" /></td>
              <td align="right" bgcolor="#BBBBBB"><strong>المصــــــدر</strong></td>
            </tr>
            <tr>
              <td align="center"><label for="updater"></label>
                <input name="updater" type="text" id="updater" value="<?php echo $_SESSION['MM_Username'];?>" /></td>
              <td align="center"><span id="sprytextfield32">
                <label for="entry_date"></label>
                <span class="textfieldRequiredMsg">يلزم الادخال.</span><span class="textfieldInvalidFormatMsg">ادخل التاريخ بالشكل dd/mm/yyyy.</span>
                <input name="modkhel" type="text" tabindex="39" id="modkhel" value="<?php echo $row_Recordset1['modkhel']; ?>" />
              </span></td>
              <td align="right" bgcolor="#BBBBBB"><strong>مدخل البيان</strong></td>
            </tr>
            <tr>
              <td colspan="3" align="right"><span id="sprytextfield34">
                <label for="motabaa"></label>
                <input name="motabaa" type="text" tabindex="40" id="motabaa" value="<?php echo $row_Recordset1['motabaa']; ?>" size="100" />
</span></td>
              <td align="right" bgcolor="#BBBBBB"><strong>المتـــــابــعة</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td width="1%" rowspan="2">&nbsp;</td>
          <td width="26%" rowspan="2" align="center" valign="middle">&nbsp;</td>
          <td width="20%" rowspan="2" align="center" valign="middle"><input type="submit" name="submit" tabindex="42" id="submit" value="تعــديــل" /></td>
          <td align="right" valign="middle"><label for="image1"></label><label for="image2"></label></td>
          <td align="left" class="blue">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="middle" class="blue">&nbsp;</td>
        </tr>
        </table>
      <input type="hidden" name="MM_update" value="form1" />
    </form></td>
    <td rowspan="2" align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="36%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["change", "blur"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield25 = new Spry.Widget.ValidationTextField("sprytextfield25", "none", {isRequired:false});
var sprytextfield26 = new Spry.Widget.ValidationTextField("sprytextfield26", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield28 = new Spry.Widget.ValidationTextField("sprytextfield28", "integer", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield29 = new Spry.Widget.ValidationTextField("sprytextfield29", "integer", {isRequired:false});
var sprytextfield30 = new Spry.Widget.ValidationTextField("sprytextfield30", "none", {isRequired:false});
var sprytextfield32 = new Spry.Widget.ValidationTextField("sprytextfield32", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield34 = new Spry.Widget.ValidationTextField("sprytextfield34", "none", {isRequired:false});
var sprytextfield31 = new Spry.Widget.ValidationTextField("sprytextfield31", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield = new Spry.Widget.ValidationTextField("sprytextfield", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
