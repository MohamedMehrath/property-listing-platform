<?php require_once('Connections/goodnews1.php'); ?>
<?php
mysql_query("SET NAMES 'utf8'");
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = "SELECT * FROM aqar_need WHERE remember = 1 and found = 0 ORDER BY entry_date DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $goodnews1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset2 = "SELECT * FROM udata WHERE remember = 1 ORDER BY entry_date DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $goodnews1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.accordion.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
.yelow {	color: #17036B;
	font-style: normal;
}
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.accordion.min.js" type="text/javascript"></script>
</head>

<body>
<table width="250" border="0" align="left">
  <tbody>
    <tr>
      <td width="320"><div id="Accordion1">
        <h3><a href="#">بحث متخصص</a></h3>
        <div>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
            <tbody>
              <tr>
                <td width="18%"><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td width="82%"><a href="custom_search.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">شاشة البحث السريع</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_code.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">كود العقار</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"><a href="view_madena.php" target="_top">المدينة</a></span></strong></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_aqar_type.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">نوع العقار</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"><a href="view_namozg.php" target="_top">النموذج</a></span></strong></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"><a href="view_tashteeb.php" target="_top">التشطيب</a></span></strong></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_amalya_type.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">نوع العملية</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"><a href="view_status.php" target="_top">الحــــالة</a></span></strong></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_customer.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">بيانات العمـــيل</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_price_mesaha.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">السعر / المساحة</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"><a href="view_marhala.php" target="_top">المرحـــــــلة</a></span></strong></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_all.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">عرض بيانات العقارات</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_images.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">عرض صور العقارات</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_all_momz.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">العقارات المميزة</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="searching-for-a-house.png" width="25" height="25" alt=""/></td>
                <td><a href="view_customers.php" target="new"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">قائمة عملاء المكتب</span></strong></a></td>
              </tr>
            </tbody>
        </table>
        </div>
        <h3><a href="#">ادخال وتعديل البيانات</a></h3>
        <div>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
            <tbody>
              <tr>
                <td width="18%"><img src="aqarr.jpg" width="25" height="25" alt=""/></td>
                <td width="82%"><a href="insert.php" target="new"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">ادخال عقارات جديدة</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="aqarmatlob.jpg" width="25" height="25" alt=""/></td>
                <td><a href="insert_matlob.php" target="new"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">ادخال عقارات مطلوبة</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="offices.jpeg" width="25" height="25" alt=""/></td>
                <td><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"><a href="insert_office.php" target="_top">ادخال مكاتب عقارية</a></span></strong></td>
              </tr>
              <tr>
                <td><img src="user.png" width="25" height="25" alt=""/></td>
                <td><a href="user_insert.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">ادخال المستخدمين</span></strong></a></td>
              </tr>
            </tbody>
          </table>
          <p>&nbsp;</p>
        </div>
        <h3><a href="#">اعدادات البرنامج</a></h3>
        <div>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
            <tbody>
              <tr>
                <td width="18%"><img src="settings.jpg" width="25" height="25" alt=""/></td>
                <td width="82%"><a href="other_add.php" target="new"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">اعدادات عامة</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="xls.png" width="25" height="25" alt=""/></td>
                <td><a href="data_sheet.php" target="new"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">تصدير لملف اكسيل</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="backup.jpg" width="25" height="25" alt=""/></td>
                <td><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"><a href="data_backup.php" target="new">نسخة احتياطية</a></span></strong></td>
              </tr>
              <tr>
                <td><img src="log-icon.png" width="25" height="25" alt=""/></td>
                <td><a href="log_sheet.php" target="_top"><strong>History Log</strong></a></td>
              </tr>
              <tr>
                <td><img src="user.png" width="25" height="25" alt=""/></td>
                <td><a href="user_view.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"> مستخدمين البرنامج</span></strong></a></td>
              </tr>
              <tr>
                <td><img src="operator_support_boy-512.png" width="25" height="25" alt=""/></td>
                <td><a href="help.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">الدعم الفنى والترخيص</span></strong></a></td>
              </tr>
            </tbody>
          </table>
          <p>&nbsp;</p>
        </div>
        <h3><a href="#">قائمة التنبيهات</a></h3>
        <div>
          <table width="60%" border="0" align="left" cellpadding="0" cellspacing="0" dir="rtl">
            <tbody>
              <tr>
                <td width="18%" bgcolor="#FFFEDC"><img src="alarm.jpg" width="40" height="40" alt=""/></td>
                <td width="82%" bgcolor="#FFFEDC"><a href="index_matlob.php" target="_top"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">أحدث عقارات مطلوبة</span></strong></a></td>
              </tr>
              <tr>
                <td colspan="2"><?php do { ?>
                    <table width="60%" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td width="65%" align="center" valign="middle"><?php echo $row_Recordset1['aqar_type']; ?></td>
                          <td width="35%" align="center" valign="middle"><?php echo $row_Recordset1['madena']; ?></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><strong>اتصال يوم <?php echo $row_Recordset1['call_date']; ?></strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left" valign="middle"><strong><a href="./print_matlob.php?code=<?php echo $row_Recordset1['code']; ?>" target="_top">التفاصيل</a></strong></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="left" valign="middle"><img src="linebar.png" width="280" height="13" alt=""/></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></td>
                </tr>
              <tr>
                <td bgcolor="#D3FFB5"><img src="offices.jpeg" width="40" height="40" alt=""/></td>
                <td bgcolor="#D3FFB5"><a href="view_remember.php" target="_top"><strong>عقارات مهمة للمتابعة</strong></a></td>
              </tr>
              <tr>
                <td colspan="2"><?php do { ?>
                    <table width="60%" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td width="65%" align="center" valign="middle"><?php echo $row_Recordset2['aqar_type']; ?></td>
                          <td width="35%" align="center" valign="middle"><?php echo $row_Recordset2['madena']; ?></td>
                          </tr>
                        <tr>
                          <td colspan="2" align="center"><?php echo $row_Recordset2['cust_name']; ?></td>
                          </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left" valign="middle"><strong><a href="print_sheet.php?code=<?php echo $row_Recordset2['code'];?>" target="_top">التفاصيل</a></strong></td>
                          </tr>
                        <tr>
                          <td colspan="2" align="left" valign="middle"><img src="linebar.png" width="280" height="13" alt=""/></td>
                          </tr>
                        </tbody>
                    </table>
                    <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?></td>
                </tr>
            </tbody>
          </table>
          <p>&nbsp;</p>
        </div>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
$(function() {
	$( "#Accordion1" ).accordion({
		animate:{easing: "swing"},
		icons:{header: "ui-icon-plus"},
		collapsible:true,
		heightStyle:"content"
	}); 
});
</script>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
