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
?>
<?php
try {
    $pdo = get_db_connection('utopia');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
    $updateSQL = "UPDATE users SET `level`=?, notes=? WHERE username=?";
    $params = [
        $_POST['level'],
        $_POST['notes'],
        $_POST['username']
    ];

    if (!empty($_POST['password'])) {
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $updateSQL = "UPDATE users SET password=?, `level`=?, notes=? WHERE username=?";
        $params = [
            $hashed_password,
            $_POST['level'],
            $_POST['notes'],
            $_POST['username']
        ];
    }

    $stmt = $pdo->prepare($updateSQL);
    $stmt->execute($params);

  $updateGoTo = "user_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
  exit;
}

$colname_Recordset1 = "-1";
if (isset($_GET['username'])) {
  $colname_Recordset1 = $_GET['username'];
}
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$colname_Recordset1]);
$row_Recordset1 = $stmt->fetch();
$totalRows_Recordset1 = $stmt->rowCount();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل بيانات المستخدم</title>
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<style type="text/css">
.yelow {color: #FF0;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFEBF">&nbsp;</td>
    <td width="17%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة تعديل بيانات المستخدمين</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC"><hr /></td>
  </tr>
  
  
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF">&nbsp;
      <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
        <table width="100%" border="0" align="right">
          <tr class="gr">
            <td width="7%" align="center" valign="middle" bgcolor="#F0EDEE">&nbsp;</td>
            <td width="5%" align="center" valign="middle" bgcolor="#F0EDEE">&nbsp;</td>
            <td width="14%" align="center" valign="middle" bgcolor="#F0EDEE">&nbsp;</td>
            <td width="34%" align="center" valign="middle" bgcolor="#F0EDEE" style="color: #17036B"><strong>ملاحظات</strong></td>
            <td width="7%" align="center" valign="middle" bgcolor="#F0EDEE" class="gr" style="color: #17036B"><strong>مستوى الحماية</strong></td>
            <td width="17%" align="center" valign="middle" bgcolor="#F0EDEE" style="color: #17036B"><strong>كلمة السر</strong></td>
            <td width="16%" colspan="2" align="center" valign="middle" bgcolor="#F0EDEE" class="gr" style="color: #17036B"><strong>اسم المستخدم</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle"><a href="user_view.php"><img src="back.png" alt="Back" width="70" height="28" /></a></td>
            <td align="center" valign="middle"><input type="reset"  tabindex="6"name="cancel" id="cancel" value="الغـــاء" /></td>
            <td align="center" valign="middle"><input type="submit"  tabindex="5"name="ok" id="ok" value="تعديل مستخدم" /></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"><label for="notes"></label>
            <textarea name="notes" tabindex="4" id="notes" cols="30" rows="5"><?php echo $row_Recordset1['notes']; ?></textarea></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"><span id="spryselect1">
              <label for="level"></label>
              <select name="level"  tabindex="3"id="level">
                <option value="admin" <?php if (!(strcmp("admin", $row_Recordset1['level']))) {echo "selected=\"selected\"";} ?>>admin</option>
                <option value="editor" <?php if (!(strcmp("editor", $row_Recordset1['level']))) {echo "selected=\"selected\"";} ?>>editor</option>
                <option value="visitor" <?php if (!(strcmp("visitor", $row_Recordset1['level']))) {echo "selected=\"selected\"";} ?>>visitor</option>
              </select>
            <span class="selectRequiredMsg">Please select an item.</span></span></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"><span id="sprytextfield2">
              <label for="password"></label>
              <input name="password" type="password"  tabindex="2" id="password" value="" size="20" />
            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#CCFFFF"><span id="sprytextfield1">
              <label for="username"></label>
              <input name="username" type="text" readonly="readonly" tabindex="1" id="username" value="<?php echo $row_Recordset1['username']; ?>" size="20" />
            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr>
            <td colspan="8"><hr /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form1" />
      </form></td>
    <td align="center" valign="top" bgcolor="#FFFFFF"><iframe src="menu_side.php" name="menu_side" width="200" height="500" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"], isRequired:false});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
unset($stmt);
?>
