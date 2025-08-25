<?php require_once('insert_images_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تحميل صور العقار</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #FFFFFF;
}
</style>
<script src="./SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#C9C9C9"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#314ECE">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FEC121"><h2>تحميل الصور والمرفقات للعقار</h2></td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <td width="3%"><tr>
    <td colspan="8" bgcolor="#C9C9C9"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form2" id="form2">
      <table width="95%" border="1" bordercolor="#DEFFC7" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#666666">Code (كود العقار)</td>
          <td><span id="sprytextfield4">
          <label for="code3"></label>
          <input type="text" tabindex="1" name="code" id="code3" />
          <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldRequiredMsg">A value is required.</span></span></td>
          <td align="center" valign="middle" bgcolor="#FF0000" class="yelow"><strong>انتبه من فضلك</strong></td>
        </tr>
        <tr>
          <td width="38%" bgcolor="#666666">Image 1: (images/اسم الصورة بالامتداد)</td>
          <td width="32%"><span id="sprytextfield1">
            <label for="image1"></label>
            <input name="image1" type="text" tabindex="2" id="image1" value="images/1_1.jpg" size="50" />
</span></td>
          <td width="30%" align="right">لتحميل الصور بشكل صحيح يجب كتابتها على الشكل التالى:</td>
        </tr>
        <tr>
          <td bgcolor="#666666">Image 2: (images/اسم الصورة بالامتداد)</td>
          <td><label for="image2"><span id="sprytextfield2">
            <input name="image2" type="text" id="image2" tabindex="3" value="images/1_2.jpg" size="50" />
</span></label></td>
          <td align="center">images/Code_Image number.jpg</td>
        </tr>
        <tr>
          <td bgcolor="#666666">Image 3: (images/اسم الصورة بالامتداد)</td>
          <td><label for="image3"><span id="sprytextfield3">
            <input name="image3" type="text" id="image3" tabindex="4" value="images/1_2.jpg" size="50" />
</span></label></td>
          <td align="right">ويجب وضع الصور قبل الادخال فى مجلد imagesالموجود</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" id="Submit" tabindex="" value="تحميل وادخال الصور للعقار" /> <input type="reset" tabindex="6" name="Cancel" id="Cancel" value="الغــــــــــــــــــاء" /></td>
          <td align="right">على السيرفر</td>
                    <tr><td align="right">او كتابة رابط الفيديو على اليوتيوب</td></tr>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form2" />
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="14%"><strong><a href="./view_images.php" target="_blank">عرض كل صور العقارات</a></strong></td>
    <td width="17%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur", "change"]});
</script>
</body>
</html>