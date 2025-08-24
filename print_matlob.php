<?php require_once('Connections/goodnews1.php'); ?>
<?php require_once('Connections/goodnews.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
mysql_query("SET NAMES 'utf8'");
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['code'])) {
  $colname_Recordset1 = $_GET['code'];
}
mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = sprintf("SELECT * FROM aqar_need WHERE code = %s ", GetSQLValueString($colname_Recordset1, "text"));
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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>طباعة التفاصيل</title>
<style type="text/css">
body,td,th {
	color: #17036B;
	font-weight: normal;
	font-size: 16px;
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
	font-style: normal;
}
</style>
<style type="text/css">
.black {	color: #000;
}
</style>
</head>

<body>
<table width="80%" border="0" align="center">
  <tbody>
    <tr>
      <td><span class="yelow"><strong style="color: #17036B">TOS</strong></span></td>
      <td align="center" valign="middle"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">كشف تفاصيل بيانات العقار المطلوب</span></strong></td>
      <td align="center" valign="middle"><img src="./goodnews 7.png" width="97" height="95" /></td>
    </tr>
    <tr>
      <td colspan="3"><hr /></td>
    </tr>
  </tbody>
</table>
<table width="80%" border="0" align="center">
  <tbody>
    <tr>
      <td width="19%" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="10%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><?php echo $row_Recordset1['code']; ?></td>
      <td width="5%" align="left" valign="middle" bgcolor="#FFFEDC"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">الكود</span></strong></td>
      <td align="right" valign="middle" bgcolor="#FFFEDC"><strong><?php echo $row_Recordset1['call_date']; ?></strong></td>
      <td align="left" valign="middle" bgcolor="#FFFEDC"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">تاريخ الاتصال</span></strong></td>
      <td align="right" valign="middle" bgcolor="#FFFEDC"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">بيانــــــات العقــــــارالمطلوب </span></strong></td>
      <td width="4%"><img src="searching-for-a-house.png" width="39" height="35" alt=""/></td>
    </tr>
    <tr>
      <td colspan="6"><table width="80%" border="0" align="right">
        <tbody>
          <tr>
            <td width="10%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="11%" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">المســـــاحة</span></strong></td>
            <td width="11%" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">الســــعر</span></strong></td>
            <td width="23%">&nbsp;</td>
            <td width="23%" align="right"><?php echo $row_Recordset1['aqar_type_other']; ?></td>
            <td width="13%" align="right"><?php echo $row_Recordset1['aqar_type']; ?></td>
            <td width="9%" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">نوع العقار</span></strong></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $row_Recordset1['mesaha']; ?></td>
            <td align="center"><?php echo $row_Recordset1['budget']; ?></td>
            <td>&nbsp;</td>
            <td align="right"><?php echo $row_Recordset1['madena_other']; ?></td>
            <td align="right"><?php echo $row_Recordset1['madena']; ?></td>
            <td align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">المدينة</span></strong></td>
          </tr>
        </tbody>
      </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table width="80%" border="0" align="right">
          <tbody>
          <tr>
            <td width="10%" align="center" bgcolor="#FFFFFF"><?php echo $row_Recordset1['tashteeb_other']; ?></td>
            <td width="11%" align="right" bgcolor="#FFFFFF"><?php echo $row_Recordset1['tashteeb']; ?></td>
            <td width="11%" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">التشطيب</span></strong></td>
            <td width="23%" align="right"><?php echo $row_Recordset1['amalya_type']; ?> - <?php echo $row_Recordset1['amalya_type_other']; ?></td>
            <td width="23%" align="left" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">نوع العملــيـــــــة</span></strong></td>
            <td width="13%" align="right"> <?php echo $row_Recordset1['namozg_other']; ?>- <?php echo $row_Recordset1['namozg']; ?></td>
            <td width="9%" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">نمـــوذج</span></strong></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right"><?php echo $row_Recordset1['marhala_other']; ?></td>
            <td align="right"><?php echo $row_Recordset1['marhala']; ?></td>
            <td align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">المرحــلة</span></strong></td>
          </tr>
          <tr>
            <td colspan="7"><table width="50%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#327900">
              <tbody>
                <tr>
                  <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">عدد الحمامات</span></strong></td>
                  <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">عدد الغرف</span></strong></td>
                  <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">الدور</span></strong></td>
                  </tr>
                <tr>
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row_Recordset1['WC']; ?></td>
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row_Recordset1['rooms']; ?></td>
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row_Recordset1['door']; ?></td>
                  </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td colspan="7" align="right" bgcolor="#F5F3F4"><strong>العنـــــــــــــــــــــــوان</strong></td>
          </tr>
          <tr>
            <td colspan="7" align="right" valign="middle"><?php echo $row_Recordset1['address']; ?></td>
            </tr>
        </tbody>
    </table></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="80%" border="0" align="center">
  <tbody>
    <tr>
      <td width="19%" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="59%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><span class="black"><?php echo $row_Recordset1['notes']; ?></span></td>
      <td width="18%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">مــــــلاحظــــــــــــــــات</span></strong></td>
      <td width="4%"><img src="aqarr.jpg" width="42" height="42" alt=""/></td>
    </tr>
    <tr>
      <td colspan="3"><table width="80%" border="0" align="right">
          <tbody>
            <tr>
              <td width="100%"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#327900">
                <tbody>
                  <tr>
                    <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">الكمـــــــاليـــــــــــات</span></strong><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"></span></strong></td>
                    </tr>
                  <tr>
                    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row_Recordset1['kmalyat']; ?></td>
                    </tr>
                  <tr>
                    <td align="center" valign="middle" bgcolor="#FFFFFF"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">التفـــاصـــــــــيل</span></strong><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow"></span></strong></td>
                    </tr>
                  <tr>
                    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row_Recordset1['details']; ?></td>
                    </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="80%" border="0" align="center">
  <tbody>
    <tr>
      <td width="19%" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="53%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><table width="80%" border="0" align="right" cellpadding="0" bordercolor="#327900">
        <tbody>
          <tr>
            <td align="right" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif"><span class="black"><?php echo $row_Recordset1['cust_name']; ?></span></td>
            </tr>
        </tbody>
      </table></td>
      <td width="24%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">بيـــــانـــــات العمــــــيل</span></strong></td>
      <td width="4%"><img src="user.png" width="44" height="36" alt=""/></td>
    </tr>
    <tr>
      <td colspan="3"><table width="80%" border="0" align="right">
        <tbody>
          <tr>
            <td align="center"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">ايميل<img src="web.png" width="40" height="40" alt=""/></span></strong></td>
            <td align="center"><img src="whatsapp.png" width="70" height="70" alt=""/></td>
            <td align="center"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">موبايل</span></strong><img src="mob.png" width="40" height="40" alt=""/></td>
            <td align="right"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">تليفون</span></strong><img src="tel.png" width="40" height="40" alt=""/></td>
            <td width="9%" rowspan="2" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">للتواصل</span></strong></td>
          </tr>
          <tr>
            <td align="center"><?php echo $row_Recordset1['email']; ?></td>
            <td width="24%" align="center"><?php echo $row_Recordset1['whatsapp']; ?></td>
            <td width="23%" align="center"><span class="black"><?php echo $row_Recordset1['mobile']; ?></span></td>
            <td width="22%" align="center"><span class="black"><?php echo $row_Recordset1['telephone']; ?></span></td>
            </tr>
        </tbody>
      </table>
      <p>&nbsp;</p></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td width="93%" align="right" bgcolor="#FFFEDC"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">بيانــــــات الادخال والمتابعــة</span></strong></td>
            <td width="7%" bgcolor="#FFFEDC"><img src="dataentry.jpg" width="50" height="46" alt=""/></td>
          </tr>
        </tbody>
      </table>
<tr>
  <td><table width="80%" border="0" align="center">
      <tbody>
        <tr>
          <td width="3%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="23%" align="center" bgcolor="#F5F3F4"><span class="black"><?php echo $row_Recordset1['entry_date']; ?></span></td>
          <td width="12%" align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">تاريخ الادخــال</span></strong></td>
          <td width="21%" align="right"><span class="black"><?php echo $row_Recordset1['log_date']; ?></span></td>
          <td width="18%" align="center"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">تاريخ الدخول</span></strong></td>
          <td width="14%" align="right"><span class="black"><?php echo $row_Recordset1['modkhel']; ?></span></td>
          <td width="9%" align="center" bgcolor="#FFFFFF"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">مدخل البيانات</span></strong></td>
          </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td align="center" bgcolor="#F5F3F4"><span class="black"><?php echo $row_Recordset1['update_date']; ?></span></td>
          <td align="center" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">تاريخ التعديل</span></strong></td>
          <td>&nbsp;</td>
          <td align="right"><span class="black"><?php echo $row_Recordset1['updater']; ?></span></td>
          <td colspan="2" align="right"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">آخر تعديل تم بواسطة </span></strong></td>
          </tr>
        </tbody>
      </table>
    <table width="80%" border="0" align="center">
      <tbody>
        <tr>
          <td colspan="5" align="right" bgcolor="#FFFFFF"><span class="black"><?php echo $row_Recordset1['masdr']; ?></span></td>
          <td width="37%" align="left" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">المصدر</span></strong></td>
        </tr>
        <tr>
          <td colspan="5" align="right"><span class="black"><?php echo $row_Recordset1['motabaa']; ?></span></td>
          <td align="left" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">المتابعة</span></strong></td>
        </tr>
        <tr>
          <td colspan="6"><table width="50%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#327900">
              <tbody>
                <tr>
                  <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">مكتب مصدر</span></strong></td>
                  <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">تنبيه ؟</span></strong></td>
                  <td align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">هل تم الحصول عليه؟</span></strong></td>
                  <td rowspan="2" align="center" valign="middle" bgcolor="#F5F3F4"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">سمـــــــــــــــات</span></strong></td>
                  </tr>
                <tr>
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="print_office.php?id=<?php echo $row_Recordset1['office_id'];?>"><?php echo $row_Recordset1['office_id']; ?></a></td>
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="update_matlob.php?code=<?php echo $row_Recordset1['code'];?>"><?php echo $row_Recordset1['remember']; ?></a></td>
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="update_matlob.php?code=<?php echo $row_Recordset1['code'];?>"><?php echo $row_Recordset1['found']; ?></a></td>
                  </tr>
                </tbody>
          </table></td>
        </tr>
        <tr>
          <td width="6%" align="right" bgcolor="#F5F3F4"><a href="<?php echo $logoutAction ?>">Log out</a></td>
          <td width="5%" align="right" bgcolor="#F5F3F4"><strong class="yelow"><a href="./index_matlob.php?code=<?php echo $row_Recordset1['code']; ?>">رجــــوع</a></strong></td>
          <td width="9%" align="center" bgcolor="#F5F3F4"><span class="black"><img src="./print.jpg" width="74" height="61" onclick="window.print() " /></span></td>
          <td colspan="3" align="right" bgcolor="#F5F3F4"><?php echo $row_Recordset1['action_history']; ?></td>
        </tr>
        <tr>
          <td colspan="6" align="right" valign="middle"><span class="black"><span class="green"><?php echo date("l"); ?></span>  _<?php echo date("d/m/Y h:i:s a") ?></span></td>
        </tr>
        <tr>
          <td colspan="4" align="center" valign="middle">&nbsp;</td>
          <td width="36%" align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6" align="center" valign="middle"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
        </tr>
      </tbody>
    </table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
