<?php require_once('insert_office_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ادخال مكاتب العقارات</title>
<style type="text/css">
body,td,th {
	color: #17036B;
	font-size: medium;
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
<script type="text/javascript" src="./accounting.js"></script>
<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFEBF"><strong><?php echo $_SESSION['MM_Username'];?></strong></td>
    <td width="23%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة ادخال بيانات مكاتب التسويق</strong></td>
    <td width="5%" align="center" valign="middle" bgcolor="#FFFEBF"><a href="<?php echo $logoutAction ?>"><img src="logout.png" alt="logout" width="28" height="28" /></a></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFEBF"><hr /></td>
  </tr>
  <tr>
    <td colspan="9"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="7"><table width="93%" border="0" align="center">
            <tr>
              <td colspan="3" rowspan="4" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="4" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="4" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="7%" rowspan="8" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="14%" rowspan="8" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="28%" rowspan="3" align="right" bgcolor="#FFFFFF"><img src="offices.jpeg" width="102" height="86" alt=""/></td>
              <td width="28%" align="right" bgcolor="#FFFFFF"><span id="sprytextfield1">
              <label for="id"></label>
              <input name="id" type="text" id="id" tabindex="1" value="<?php echo $row_Recordset1['max(id)']+1; ?>"  />
              <span class="textfieldRequiredMsg">يلزم ادخال الكود.</span></span></td>
              <td width="18%" align="right" bgcolor="#FFFFFF"><strong>الكــــــود</strong></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF"><input name="name" type="text" id="name" size="50" /></td>
              <td align="right" bgcolor="#FFFFFF"><strong>اسم المكتب</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#F5F3F4"><strong>اسم  صاحب الشركة / الموظف</strong></td>
              </tr>
            <tr>
              <td colspan="3" align="right" bgcolor="#F5F3F4"><span id="sprytextfield26">
              <label for="cust_title"></label>
              <span class="textfieldRequiredMsg">يلزم ادخال اسم العميل بالكامل.</span>
              <input name="cust_name" tabindex="33" type="text" id="cust_name" size="30" />
              </span></td>
            </tr>
            <tr>
              <td width="1%" rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1%" rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td colspan="2" align="right" bgcolor="#FFFFFF"><span id="sprytextfield10">
                <label for="address3"></label>
                <input name="address" type="text" tabindex="14" id="address3" size="50" />
                <span class="textfieldRequiredMsg">يلزم ادخال العنوان.</span></span></td>
              <td align="right" bgcolor="#FFFFFF"><strong>العنــــــوان</strong></td>
            </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#F5F3F4"><textarea name="comm_no" id="comm_no" cols="90" rows="5"></textarea></td>
              <td align="right" bgcolor="#F5F3F4"><strong>بيانات التواصل</strong></td>
            </tr>
            <tr>
              <td colspan="3" align="right" bgcolor="#FFFFFF"><strong><img src="mob.png" width="30" height="30" alt=""/><img src="web.png" width="30" height="30" alt=""/><img src="whatsapp.png" width="30" height="30" alt=""/><img src="tel.png" width="30" height="30" alt=""/></strong></td>
              </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="#FFFFFF"><span id="sprytextfield25">
                <label for="notes3"></label>
                <input name="notes" type="text" id="notes3" tabindex="31" size="100" />
              </span></td>
              <td align="right" bgcolor="#FFFFFF"><strong>ملاحظــــات</strong></td>
            </tr>
            <tr>
              <td colspan="4" rowspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td rowspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="7"><hr /></td>
        </tr>
        <tr>
          <td colspan="7"><table width="100%" border="0" align="right">
            <tr>              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="7"><hr /></td>
        </tr>
        <tr>
          <td width="13%" class="blue">&nbsp;</td>
          <td width="19%" align="center" valign="middle"><input type="reset" name="cancel" tabindex="43" id="cancel" value="الغــــــــــاء" /></td>
          <td width="23%" align="center" valign="middle"><input type="submit" name="submit" tabindex="42" id="submit" value="ادخــــــــــال" /></td>
          <td width="0%"><label for="image1"></label>            <label for="image2"></label>            <label for="image3"></label></td>
          <td width="7%" align="right" valign="middle"><label for="momz"></label></td>
          <td width="17%" align="left" valign="middle" class="blue">&nbsp;</td>
          <td width="21%" align="right"><label for="updater"></label>
            <input name="updater" type="text" id="updater" value="<?php echo $_SESSION['MM_Username'];?>" size="10" /></td>
        </tr>
        </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form></td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield26 = new Spry.Widget.ValidationTextField("sprytextfield26", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield25 = new Spry.Widget.ValidationTextField("sprytextfield25", "none", {isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>
