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

if ((isset($_POST['code'])) && ($_POST['code'] != "")) {
  $deleteSQL = "DELETE FROM udata WHERE code= :code";
  $stmt = $pdo->prepare($deleteSQL);
  $stmt->bindParam(':code', $_POST['code'], PDO::PARAM_INT);
  $stmt->execute();

  $deleteGoTo = "./delete_item_admin_ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
  exit();
}

$colname_Recordset1 = "-1";
if (isset($_GET['code'])) {
  $colname_Recordset1 = $_GET['code'];
}

$query_Recordset1 = "SELECT * FROM udata WHERE code = :code";
$stmt = $pdo->prepare($query_Recordset1);
$stmt->bindParam(':code', $colname_Recordset1, PDO::PARAM_INT);
$stmt->execute();
$row_Recordset1 = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRows_Recordset1 = $stmt->rowCount();

$currentPage = $_SERVER["PHP_SELF"];

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
<title>حذف</title>
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
.black {	color: #000;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="93%" border="0" align="center">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner"></iframe></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#314ECE">&nbsp;</td>
  </tr>
  <tr>
    <td width="76%">&nbsp;</td>
    <td width="24%" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><iframe src="menu_side.php" name="menu_side" width="200" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><h1><strong>سوف يتم الحذف للتأكيد اضغط حذف</strong>
    </h1>
      <table width="95%" border="1" align="center">
        <tr class="gr">
          <td align="center" valign="middle" bgcolor="#F70D11"><form id="form1" name="form1" method="post" action="">
            <p>
              <label for="code"></label>
              <input name="code" type="text" id="code" value="<?php echo $row_Recordset1['code']; ?>" />
              </p>
            <p><a href="view_all.php"><img src="back.png" alt="rr" width="47" height="16" /></a>
              <input type="submit" name="delok" id="delok" value="حـــــذف" />
              </p>
          </form></td>
        </tr>
        <tr>
          <td><hr /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
    <td align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html>
