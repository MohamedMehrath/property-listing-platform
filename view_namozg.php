<?php require_once('Connections/db.php'); ?>
<?php
error_reporting( error_reporting() & ~E_NOTICE );
//initialize the session
if (!isset($_SESSION)) {
  session_start();
$_SESSION['namozg'] = $_POST['namozg'];
}

try {
    $pdo = get_db_connection('utopia');
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
if (isset($_POST['namozg'])) {
  $colname_Recordset1 = $_POST['namozg'];
}
$query_Recordset1 = "SELECT * FROM udata WHERE namozg = ? ORDER BY update_date DESC";
$stmt = $pdo->prepare($query_Recordset1 . " LIMIT ?, ?");
$stmt->execute([$colname_Recordset1, $startRow_Recordset1, $maxRows_Recordset1]);
$Recordset1 = $stmt->fetchAll();
$row_Recordset1 = $Recordset1[0] ?? null;


if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
    $count_query = "SELECT COUNT(*) FROM udata WHERE namozg = ?";
    $stmt_total = $pdo->prepare($count_query);
    $stmt_total->execute([$colname_Recordset1]);
    $totalRows_Recordset1 = $stmt_total->fetchColumn();
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$query_Recordset2 = "SELECT distinct namozg FROM udata ORDER BY namozg ASC";
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
<title>بحث بالنموذج</title>
<style type="text/css">
@import url("./blue.css");

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
.black {	color: #000;
}
</style>
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFEBF">&nbsp;</td>
    <td width="22%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة البحث بالنموذج</strong></td>
    <td width="5%" align="right" valign="middle" bgcolor="#FFFEBF"><a href="<?php echo $logoutAction ?>"><img src="logout.png" width="28" height="28" /></a></td>
  </tr>
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="77%" border="0" align="center">
        <tr>
          <td width="8%">&nbsp;</td>
          <td width="2%">&nbsp;</td>
          <td width="37%">&nbsp;</td>
          <td width="9%" align="right" valign="middle"><input type="submit" name="search" id="search" value="بحث" /></td>
          <td width="5%"><label for="code"></label>
            <label for="namozg"></label>
            <select name="namozg" id="namozg">
              <?php foreach($Recordset2 as $row_Recordset2): ?>
              <option value="<?php echo $row_Recordset2['namozg']?>"<?php if (!(strcmp($row_Recordset2['namozg'], $_SESSION['namozg']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset2['namozg']?></option>
              <?php endforeach; ?>
            </select></td>
          <td width="39%" class="gr"><strong>اختر نمــــوذج العقار</strong></td>
        </tr>
        <tr>
          <td colspan="6" bgcolor="#CCCCCC"><hr /></td>
          </tr>
      </table>
    </form></td>
    <td rowspan="3" align="center" valign="top" bgcolor="#FFFFFF"><iframe src="menu_side.php" name="menu_side" width="200" height="500" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><table width="25%" border="0">
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
    <table width="95%" border="0" align="center">
      <tr class="gr">
        <td colspan="3" rowspan="8" align="center" valign="middle">&nbsp;</td>
        <td width="10%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">تاريخ التعديل</strong></td>
        <td width="9%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">تاريخ الادخال</strong></td>
        <td width="8%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">المرحلة</strong></td>
        <td width="10%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">الحالة</strong></td>
        <td width="11%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow">التشطيب</strong></td>
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
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="black"><?php echo $row_Recordset1['code']; ?></td>
        </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>حجز</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>الوديعة</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>النادى</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>الحديقة</strong></td>
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
        <td colspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>العنوان</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>استلام</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>قسط شهرى</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>قسط سنوى</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>مدة القسط</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>المدفوع</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>أوفر</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>المطلوب</strong></td>
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>اجمالى العقد</strong></td>
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
        <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow" style="color: #17036B"><strong>المصدر</strong></td>
        <td width="10%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>موبايل</strong></td>
        <td width="9%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>تليفون</strong></td>
        <td align="right" valign="middle" bgcolor="#FFFFFF" class="gr"><span class="black"><?php echo $row_Recordset1['cust_name']; ?></span></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="gr"><span class="black"><?php echo $row_Recordset1['cust_title']; ?></span></td>
        <td align="right" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong>اسم العميل</strong></td>
        </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#666666" class="black"><table width="20%" border="0">
          <tr class="yelow">
            <td align="center" valign="middle"><a href="./print_sheet.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="./print-icon.png" alt="rrr" width="70" height="28" /></a></td>
            <td align="center" valign="middle"><a href="view_all.php"><img src="back.png" alt="rr" width="70" height="28" /></a></td>
            <td align="center" valign="middle"><a href="./delete_item_admin.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="delete.jpg" alt="rr" width="70" height="28" /></a></td>
            <td align="center" valign="middle"><a href="update.php?code=<?php echo $row_Recordset1['code']; ?>"><img src="edit.gif" alt="er" width="70" height="28" /></a></td>
            </tr>
          </table></td>
        <td align="center" valign="middle" bgcolor="#666666" class="black"><a href="view_images_code.php?code=<?php echo $row_Recordset1['code']; ?>" target="_blank"><img src="./view_images.png" alt="صور العقار" width="72" height="38" /></a></td>
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
    <td colspan="2"><table width="25%" border="0">
      <tr>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">الاخير</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السابق</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">التالى</a></td>
        <td bgcolor="#FFFFFF"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">الاول</a></td>
        <td align="right" bgcolor="#FFFFFF">يوجد <?php echo $totalRows_Recordset1 ?> بيان</td>
        </tr>
      </table>
      <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
        <table width="20%" border="0">
          <tr>
            <td align="center"><strong>عفوا لا توجد نتيجة للبحث الحالى</strong></td>
          </tr>
        </table>
    <?php } // Show if recordset empty ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
</body>
</html>
<?php
?>
