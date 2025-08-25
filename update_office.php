<?php require_once('update_office_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل مكاتب العقارات</title>
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
    <td colspan="7" bgcolor="#FFFEBF"><strong>مكاتب العقارات</strong></td>
    <td width="23%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة تعديل البيانات</strong></td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FEC121"><hr /></td>
  </tr>
  <tr>
    <td colspan="7" valign="top"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <hr />
      <table width="90%" border="0" align="center">
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td width="16%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="17%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="7%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="15%" align="right" bgcolor="#FFFFFF"><label for="madena"></label></td>
              <td width="19%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#CCFF99">&nbsp;</td>
              <td align="right" bgcolor="#CCFF99">&nbsp;</td>
              </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF"><label for="aqar_type"></label></td>
              <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="20%" align="right" bgcolor="#DEFFC7"><input name="code" type="text" id="code" tabindex="2" value="<?php echo $row_Recordset1['id']; ?>" /></td>
              <td width="6%" align="right" bgcolor="#DEFFC7"><strong>الكود</strong></td>
              </tr>
            <tr>
              <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF"><label for="view_v"></label></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right"><label for="namozg2">
                <input name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>" size="50" />
              </label></td>
              <td align="right" bgcolor="#BBBBBB"><strong>اسم المكتب</strong></td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
              <td colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right"><strong>اسم  صاحب الشركة / الموظف</strong></td>
              <td align="right" bgcolor="#BBBBBB">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right"><label for="tashteeb"><span id="sprytextfield"> <span class="textfieldRequiredMsg">يلزم ادخال اسم العميل بالكامل.</span>
                    <input name="cust_name2" type="text" id="cust_name2" tabindex="33" value="<?php echo $row_Recordset1['emp']; ?>" size="30" />
              </span></label></td>
              <td align="right" bgcolor="#BBBBBB">&nbsp;</td>
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
              <td colspan="5" align="right"><textarea name="action_history" id="action_history" cols="90" rows="5"><?php echo $row_Recordset1['com_no']; ?></textarea></td>
              <td align="right" bgcolor="#BBBBBB"><strong>بيانات التواصل<img src="mob.png" width="30" height="30" alt=""/><img src="tel.png" width="30" height="30" alt=""/></strong></td>
            </tr>
            <tr>
              <td colspan="5" align="right"><span id="sprytextfield25">
                <label for="notes"></label>
                <input name="notes" type="text" tabindex="31" id="notes" value="<?php echo $row_Recordset1['notes']; ?>" size="100" />
</span></td>
              <td align="right" bgcolor="#BBBBBB"><strong>ملاحظات</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="5"><hr /></td>
        </tr>
        <tr>
          <td colspan="5"><table width="100%" border="0" align="center">
            <tr>
              <td colspan="5" align="right"><label for="cust_title2"></label></td>
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
    <td align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield25 = new Spry.Widget.ValidationTextField("sprytextfield25", "none", {isRequired:false});
var sprytextfield = new Spry.Widget.ValidationTextField("sprytextfield", "none", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
