<?php require_once('Connections/db.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

$MM_authorizedUsers = "admin";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "./not_access.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}

// New PDO connection
try {
    $pdo = get_db_connection('aqarmarket');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ((isset($_GET['username'])) && ($_GET['username'] != "")) {
  $deleteSQL = "DELETE FROM users WHERE username=:username";
  $stmt = $pdo->prepare($deleteSQL);
  $stmt->bindParam(':username', $_GET['username'], PDO::PARAM_STR);
  $stmt->execute();

  $deleteGoTo = "user_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
  exit();
}

$currentPage = $_SERVER["PHP_SELF"];

$colname_Recordset1 = "-1";
if (isset($_GET['username'])) {
  $colname_Recordset1 = $_GET['username'];
}

$query_Recordset1 = "SELECT * FROM users WHERE username = :username ORDER BY username ASC";
$stmt = $pdo->prepare($query_Recordset1);
$stmt->bindParam(':username', $colname_Recordset1, PDO::PARAM_STR);
$stmt->execute();
$row_Recordset1 = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRows_Recordset1 = $stmt->rowCount();

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
<title>حذف مستخدم</title>
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
.yelow {color: #FF0;
}
</style>
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner"></iframe></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FEC121"><h2>التأكد من حذف المستخدم</h2></td>
  </tr>
  
  
  
  <tr>
    <td bgcolor="#C9C9C9">&nbsp;
      <table width="100%" border="1" align="right">
        <tr class="gr">
          <td colspan="4" align="center" valign="middle">&nbsp;</td>
          <td width="13%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow" style="color: #17036B">ملاحظات</strong></td>
          <td align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow" style="color: #17036B">مستوى الحماية</strong></td>
          <td width="19%" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow" style="color: #17036B">كلمة السر</strong></td>
          <td width="15%" colspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="yelow"><strong class="yelow" style="color: #17036B">اسم المستخدم</strong></td>
        </tr>
        <tr>
          <td align="center" valign="middle">&nbsp;</td>
          <td width="5%" align="center" valign="middle"><a href="user_view.php"><img src="back.png" alt="rr" width="70" height="28" /></a></td>
          <td width="5%" align="center" valign="middle"><img src="delete.jpg" alt="rr" width="70" height="28" /></td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['notes']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['level']; ?></td>
          <td align="center" valign="middle"><?php echo $row_Recordset1['password']; ?></td>
          <td colspan="2" align="center" valign="middle"><?php echo $row_Recordset1['username']; ?></td>
        </tr>
        <tr>
          <td colspan="9"><hr /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright"></iframe></td>
  </tr>
</table>
</body>
</html>
