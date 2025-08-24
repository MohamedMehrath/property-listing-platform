<?php require_once('Connections/db.php'); ?>
<?php
error_reporting( error_reporting() & ~E_NOTICE );
//initialize the session
if (!isset($_SESSION)) {
  session_start();
  $_SESSION['tashteeb'] = $_POST['tashteeb'];
}

try {
    $pdo = get_db_connection('goodnews1');
} catch (PDOException $e) {
    // Handle connection error gracefully
    die("Database connection failed: " . $e->getMessage());
}

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
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_POST['tashteeb'])) {
  $colname_Recordset1 = $_POST['tashteeb'];
}
$query_Recordset1 = "SELECT * FROM udata WHERE tashteeb = ? ORDER BY update_date DESC";
$stmt = $pdo->prepare($query_Recordset1 . " LIMIT ?, ?");
$stmt->execute([$colname_Recordset1, $startRow_Recordset1, $maxRows_Recordset1]);
$Recordset1 = $stmt->fetchAll();
$row_Recordset1 = $Recordset1[0] ?? null;


if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
    $stmt_total = $pdo->prepare($query_Recordset1);
    $stmt_total->execute([$colname_Recordset1]);
  $totalRows_Recordset1 = $stmt_total->rowCount();
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$query_Recordset2 = "SELECT distinct tashteeb FROM udata";
$Recordset2 = $pdo->query($query_Recordset2)->fetchAll();
$totalRows_Recordset2 = count($Recordset2);

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
<title>بحث بتشطيب العقار</title>
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
<style type="text/css">
.yelow {
	color: #17036B;
}
.black {
	color: #000;
}
.blue {
	color: #000080;
}
</style>
</head>

<body>
<table width="900" border="0" align="center">
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><iframe name="Banner" height="160" width="900" scrolling="no" align="top" src="Banner.php" frameborder="0">Banner</iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFEBF">&nbsp;</td>
    <td width="24%" align="center" valign="middle" bgcolor="#FFFEBF"><strong class="blue">شاشة البحث بتشطيب العقار</strong></td>
    <td width="3%" align="right" valign="middle" bgcolor="#FFFEBF"><a href="<?php echo $logoutAction ?>"><img src="logout.png" alt="خروج" width="28" height="28" /></a></td>
  </tr>
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="77%" border="0" align="center">
        <tr>
          <td>&nbsp;</td>
          <td width="9%" align="right" valign="middle"><input type="submit" name="search" id="search" value="بحث" /></td>
          <td width="5%"><label for="code"></label>
            <label for="tashteeb"></label>
            <select name="tashteeb" id="tashteeb">
              <?php foreach($Recordset2 as $row_Recordset2): ?>
              <option value="<?php echo $row_Recordset2['tashteeb']?>"<?php if (!(strcmp($row_Recordset2['tashteeb'], $_SESSION['tashteeb']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset2['tashteeb']?></option>
              <?php endforeach; ?>
            </select></td>
          <td width="39%" class="gr"><strong>اختر حالة التشطيب</strong></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#CCCCCC"><hr /></td>
          </tr>
      </table>
    </form></td>
    <td rowspan="3" valign="top"><iframe name="menu_side" width="200" height="500" scrolling="auto" align="top" src="menu_side.php" frameborder="0">Banner</iframe>
</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><table width="28%" border="0">
      <tr>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
        <td align="right" bgcolor="#FFFFFF">يوجد <?php echo $totalRows_Recordset1 ?> بيان</td>
        </tr>
      </table>
      &nbsp;
      <?php foreach($Recordset1 as $row_Recordset1): ?>
  <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
    <table width="95%" border="0" align="center" style="color: #17036B;">
      <tr class="gr">
        <td colspan="3" rowspan="8" align="center" valign="middle">&nbsp;</td>
        <td width="10%" align="center" valign="middle" bgcolor="#F0EDEE" class="black"><strong class="yelow">تاريخ التعديل</strong></td>
        <td width="9%" align="center" valign="middle" bgcolor="#F0EDEE" class="black"><strong class="yelow">تاريخ الادخال</strong></td>
        <td width="8%" align="center" valign="middle" bgcolor="#F0EDEE" class="black"><strong class="yelow">المرحلة</strong></td>
        <td width="10%" align="center" valign="middle" bgcolor="#F0EDEE" class="black"><strong class="yelow">الحالة</strong></td>
        <td width="11%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow" style="color: #17036B">التشطيب</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">نوع العملية</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">النموذج</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">نوع العقار</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">المدينة</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">الكود</strong></td>
        </tr>
      <tr class="black">
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['update_date']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['entry_date']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['marhala']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['status']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['tashteeb']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['amalya_type']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['namozg']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['aqar_type_other']; ?><?php echo $row_Recordset1['aqar_type']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['madena_other']; ?><?php echo $row_Recordset1['madena']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" target="_blank"><?php echo $row_Recordset1['code']; ?></a></td>
        </tr>
      <tr class="yelow">
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>حجز</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>الوديعة</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>النادى</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>الحديقة</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>مساحة المبانى</strong></td>
        <td colspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>مساحة الارض</strong></td>
        <td width="12%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>و</strong></td>
        <td width="11%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>ع</strong></td>
        <td width="9%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>ج</strong></td>
        </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['hagz']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['wadyaa']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><span class="black"><?php echo $row_Recordset1['nady']; ?></span></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['hadeka']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['mbna_mesaha']; ?></td>
        <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['ard_mesaha']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['wow']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['ain']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['geem']; ?></td>
        </tr>
      <tr>
        <td colspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="blue"><strong>العنوان</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="blue"><strong>استلام</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="blue"><strong>قسط شهرى</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #F0EDEE"><strong>قسط سنوى</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #F0EDEE"><strong>مدة القسط</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #F0EDEE"><strong>المدفوع</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #F0EDEE"><strong>أوفر</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #F0EDEE"><strong>المطلوب</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #F0EDEE"><strong>اجمالى العقد</strong></td>
        </tr>
      <tr>
        <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['address']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['estlam']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['kest_month']); ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['kest_year']); ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['kest_modah']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['madfoo']); ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['alover']); ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['matloob']); ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo number_format($row_Recordset1['aqd_total']); ?></td>
        </tr>
      <tr>
        <td colspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="gr" style="color: #17036B"><strong class="yelow">العمليات المتاحة</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>مدخل البيانات</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>المتابعة</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>المصدر</strong></td>
        <td width="10%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>موبايل</strong></td>
        <td width="9%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>تليفون</strong></td>
        <td align="right" valign="middle" bgcolor="#FFFFFF" class="gr"><span class="black"><?php echo $row_Recordset1['cust_name']; ?></span></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="gr"><span class="black"><?php echo $row_Recordset1['cust_title']; ?></span></td>
        <td align="right" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>اسم العميل</strong></td>
        </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#666666" class="black"><table width="20%" border="0">
          <tr class="yelow">
            <td align="center" valign="middle"><a href="/goodnews/print_sheet.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="/aqarmarket/print-icon.png" width="50" height="50" /></a></td>
            <td align="center" valign="middle"><a href="view_all.php"><img src="back.png" alt="rr" width="70" height="28" /></a></td>
            <td align="center" valign="middle"><a href="/goodnews/delete_item_admin.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="delete.jpg" alt="rr" width="70" height="28" /></a></td>
            <td align="center" valign="middle"><a href="update.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="edit.gif" alt="er" width="70" height="28" /></a></td>
            </tr>
          </table></td>
        <td align="center" valign="middle" bgcolor="#666666" class="black"><a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" target="_blank"><img src="/aqarmarket/view_images.png" alt="صور العقار" width="103" height="65" /></a></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['modkhel']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['motabaa']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['masdr']; ?></td>
        <td align="right" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['mobile']; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['telephone']; ?></td>
        <td colspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['notes']; ?></td>
        <td align="right" valign="middle" bgcolor="#F0EDEE" class="yelow"><span class="black"><strong class="yelow">ملاحظات</strong></span></td>
        </tr>
      <tr>
        <td colspan="13"><hr /></td>
        </tr>
      </table>
    <?php } // Show if recordset not empty ?>
  <?php endforeach; ?></td>
  </tr>
  <tr>
    <td colspan="2"><table width="28%" border="0">
      <tr>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
        <td align="right" bgcolor="#FFFFFF">يوجد <?php echo $totalRows_Recordset1 ?> بيان</td>
        </tr>
      </table>
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
        <table width="25%" border="0">
          <tr>
            <td align="center"><strong>عفوا لا توجد نتيجة للبحث الحالى</strong></td>
          </tr>
        </table>
    <?php } // Show if recordset empty ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF" class="yelow"><iframe name="copyright" width="900" scrolling="no" align="top" src="copyright.php" frameborder="0" sandbox="allow-top-navigation">Banner</iframe></td>
  </tr>
</table>
</body>
</html>
<?php
?>
