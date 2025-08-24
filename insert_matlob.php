<?php require_once('Connections/goodnews1.php'); ?>
<?php require_once('Connections/goodnews.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_query("SET NAMES 'utf8'");
$MM_authorizedUsers = "admin,editor";
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
//?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
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
	
  $logoutGoTo = "./index.php";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO aqar_need (code, madena, madena_other, aqar_type, aqar_type_other, namozg, namozg_other, address, mesaha, budget, tashteeb, notes, cust_name, telephone, mobile, masdr, entry_date, modkhel, update_date, motabaa, amalya_type, marhala, updater, door, view_v, rooms, WC, kmalyat, email, whatsapp, remember, details, office_id, tashteeb_other, amalya_type_other, marhala_other, call_date, action_history, `found`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['code'], "text"),
                       GetSQLValueString($_POST['madena'], "text"),
                       GetSQLValueString($_POST['madena_other'], "text"),
                       GetSQLValueString($_POST['aqar_type'], "text"),
                       GetSQLValueString($_POST['aqar_type_other'], "text"),
                       GetSQLValueString($_POST['namozg'], "text"),
                       GetSQLValueString($_POST['namozg_other'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['masaha'], "text"),
                       GetSQLValueString($_POST['budget'], "text"),
                       GetSQLValueString($_POST['tashteeb'], "text"),
                       GetSQLValueString($_POST['notes'], "text"),
                       GetSQLValueString($_POST['cust_name'], "text"),
                       GetSQLValueString($_POST['telephone'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['masdr'], "text"),
                       GetSQLValueString($_POST['entry_date'], "date"),
                       GetSQLValueString($_POST['modkhel'], "text"),
                       GetSQLValueString($_POST['update_date'], "date"),
                       GetSQLValueString($_POST['motabaa'], "text"),
                       GetSQLValueString($_POST['amalya_type'], "text"),
                       GetSQLValueString($_POST['marhala'], "text"),
                       GetSQLValueString($_POST['updater'], "text"),
                       GetSQLValueString($_POST['door'], "text"),
                       GetSQLValueString($_POST['view_v'], "text"),
                       GetSQLValueString($_POST['rooms'], "int"),
                       GetSQLValueString($_POST['wc'], "int"),
                       GetSQLValueString($_POST['kmalyat'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['whatsapp'], "text"),
                       GetSQLValueString(isset($_POST['remember']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['details'], "text"),
                       GetSQLValueString($_POST['officeid'], "int"),
                       GetSQLValueString($_POST['tashteeb_other'], "text"),
                       GetSQLValueString($_POST['amalya_type_other'], "text"),
                       GetSQLValueString($_POST['marhala_other'], "text"),
                       GetSQLValueString($_POST['call_data'], "text"),
                       GetSQLValueString($_POST['action_history'], "text"),
                       GetSQLValueString(isset($_POST['found']) ? "true" : "", "defined","1","0"));

  mysql_select_db($database_goodnews1, $goodnews1);
  $Result1 = mysql_query($insertSQL, $goodnews1) or die(mysql_error());

  $insertGoTo = "insert_matlob.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_goodnews1, $goodnews1);
$query_Qcity = "SELECT distinct cityname FROM city ORDER BY city.cityname desc";
$Qcity = mysql_query($query_Qcity, $goodnews1) or die(mysql_error());
$row_Qcity = mysql_fetch_assoc($Qcity);
$totalRows_Qcity = mysql_num_rows($Qcity);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Qaqar_type = "SELECT distinct aqar_type_name FROM aqar_type_t";
$Qaqar_type = mysql_query($query_Qaqar_type, $goodnews1) or die(mysql_error());
$row_Qaqar_type = mysql_fetch_assoc($Qaqar_type);
$totalRows_Qaqar_type = mysql_num_rows($Qaqar_type);

mysql_select_db($database_goodnews1, $goodnews1);
$query_QQamalya_type = "SELECT distinct amalya_type_name FROM amalya_type_t";
$QQamalya_type = mysql_query($query_QQamalya_type, $goodnews1) or die(mysql_error());
$row_QQamalya_type = mysql_fetch_assoc($QQamalya_type);
$totalRows_QQamalya_type = mysql_num_rows($QQamalya_type);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Qtashteeb = "SELECT distinct tashteeb_name FROM tashteeb_t";
$Qtashteeb = mysql_query($query_Qtashteeb, $goodnews1) or die(mysql_error());
$row_Qtashteeb = mysql_fetch_assoc($Qtashteeb);
$totalRows_Qtashteeb = mysql_num_rows($Qtashteeb);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Qstatus = "SELECT distinct status_name FROM status_t";
$Qstatus = mysql_query($query_Qstatus, $goodnews1) or die(mysql_error());
$row_Qstatus = mysql_fetch_assoc($Qstatus);
$totalRows_Qstatus = mysql_num_rows($Qstatus);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordset1 = "SELECT max(code) FROM aqar_need";
$Recordset1 = mysql_query($query_Recordset1, $goodnews1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetmarhala = "SELECT distinct marhalaname FROM marhala ORDER BY marhalaname ASC";
$Recordsetmarhala = mysql_query($query_Recordsetmarhala, $goodnews1) or die(mysql_error());
$row_Recordsetmarhala = mysql_fetch_assoc($Recordsetmarhala);
$totalRows_Recordsetmarhala = mysql_num_rows($Recordsetmarhala);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetdoor = "SELECT distinct doorname FROM door ORDER BY doorname ASC";
$Recordsetdoor = mysql_query($query_Recordsetdoor, $goodnews1) or die(mysql_error());
$row_Recordsetdoor = mysql_fetch_assoc($Recordsetdoor);
$totalRows_Recordsetdoor = mysql_num_rows($Recordsetdoor);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetnamozg = "SELECT distinct namozgname FROM namozg ORDER BY namozgname ASC";
$Recordsetnamozg = mysql_query($query_Recordsetnamozg, $goodnews1) or die(mysql_error());
$row_Recordsetnamozg = mysql_fetch_assoc($Recordsetnamozg);
$totalRows_Recordsetnamozg = mysql_num_rows($Recordsetnamozg);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetview = "SELECT distinct viewname FROM viewvv ORDER BY viewname ASC";
$Recordsetview = mysql_query($query_Recordsetview, $goodnews1) or die(mysql_error());
$row_Recordsetview = mysql_fetch_assoc($Recordsetview);
$totalRows_Recordsetview = mysql_num_rows($Recordsetview);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Recordsetlaqab = "SELECT distinct laqab_name FROM laqab ORDER BY laqab_name ASC";
$Recordsetlaqab = mysql_query($query_Recordsetlaqab, $goodnews1) or die(mysql_error());
$row_Recordsetlaqab = mysql_fetch_assoc($Recordsetlaqab);
$totalRows_Recordsetlaqab = mysql_num_rows($Recordsetlaqab);

mysql_select_db($database_goodnews1, $goodnews1);
$query_Qoffice = "SELECT * FROM offices";
$Qoffice = mysql_query($query_Qoffice, $goodnews1) or die(mysql_error());
$row_Qoffice = mysql_fetch_assoc($Qoffice);
$totalRows_Qoffice = mysql_num_rows($Qoffice);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ادخال مطلوب العقارات</title>
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
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.yelow {	color: #FF0;
}
</style>
<link href="./blue.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="./accounting.js"></script>
<script>
function addfee(){
	s0=new Option("المطلوب = "+ accounting.formatMoney(matloob.value));
	s1=new Option("اجمالى العقد = "+accounting.formatMoney(aqd_total.value));
	s2=new Option("المدفوع = "+accounting.formatMoney(madfoo.value));
	s3=new Option("الاوفر = "+accounting.formatMoney(alover.value));
	s4=new Option("القسط السنوى = "+accounting.formatMoney(kest_year.value));
	s5=new Option("القسط الشهرى = "+accounting.formatMoney(kest_month.value));
	sellist[0]= s0;
	sellist[1]= s1;
	sellist[2]= s2;
	sellist[3]= s3;
	sellist[4]= s4;
	sellist[5]= s5;
	}
</script>
<body>
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFEBF"><strong><?php echo $_SESSION['MM_Username'];?></strong></td>
    <td width="27%" align="center" valign="middle" bgcolor="#FFFEBF" class="blue"><strong>شاشة ادخال بيانات العقارات المطلوبة</strong></td>
    <td width="5%" align="center" valign="middle" bgcolor="#FFFEBF"><a href="<?php echo $logoutAction ?>"><img src="logout.png" alt="logout" width="28" height="28" /></a></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFEBF"><hr /></td>
  </tr>
  <tr>
    <td colspan="9"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="7"><table width="100%" border="0" align="center">
            <tr>
              <td width="17%" align="right"><span id="sprytextfield2">
                <label for="madena_other"></label>
                <input type="text" name="madena_other" id="madena_other" />
</span></td>
              <td width="18%" align="right" bgcolor="#CFD0EB">فى حالة احتياج اكثر من مدينة</td>
              <td width="7%" align="center" bgcolor="#9E9E9E"><strong>مدن أخرى</strong></td>
              <td width="17%" align="right"><span id="spryselect1">
                <label for="madena"></label>
                <select name="madena" tabindex="2" id="madena">
                  <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Qcity['cityname']?>"><?php echo $row_Qcity['cityname']?></option>
                  <?php
} while ($row_Qcity = mysql_fetch_assoc($Qcity));
  $rows = mysql_num_rows($Qcity);
  if($rows > 0) {
      mysql_data_seek($Qcity, 0);
	  $row_Qcity = mysql_fetch_assoc($Qcity);
  }
?>
                </select>
                <span class="selectRequiredMsg">اختر المدينة.</span></span></td>
              <td width="16%" align="center" bgcolor="#9E9E9E"><strong>المــديـــــنــــة</strong></td>
              <td width="17%" align="right" bgcolor="#CCFF99"><span id="sprytextfield1">
                <label for="code"></label>
                <input name="code" type="text" id="code" tabindex="1" value="<?php echo $row_Recordset1['max(code)']+1; ?>"  />
                <span class="textfieldRequiredMsg">يلزم ادخال الكود.</span></span></td>
              <td width="8%" align="right" bgcolor="#CCFF99"><strong>الكــــــود</strong></td>
            </tr>
            <tr>
              <td align="right"><span id="sprytextfield3">
                <label for="aqar_type_other"></label>
                <input type="text" name="aqar_type_other" id="aqar_type_other" />
</span></td>
              <td align="right" bgcolor="#CFD0EB">فى حالة احتياج اكثر من عقار</td>
              <td align="center" bgcolor="#9E9E9E"><strong>عقارات أخرى</strong></td>
              <td align="right"><span id="spryselect2">
                <label for="aqar_type"></label>
                <select name="aqar_type" tabindex="3" id="aqar_type">
                  <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Qaqar_type['aqar_type_name']?>"><?php echo $row_Qaqar_type['aqar_type_name']?></option>
                  <?php
} while ($row_Qaqar_type = mysql_fetch_assoc($Qaqar_type));
  $rows = mysql_num_rows($Qaqar_type);
  if($rows > 0) {
      mysql_data_seek($Qaqar_type, 0);
	  $row_Qaqar_type = mysql_fetch_assoc($Qaqar_type);
  }
?>
                </select>
                <span class="selectRequiredMsg">اختر نوع العقار.</span></span></td>
              <td align="center" bgcolor="#9E9E9E"><strong>نوع العقار</strong></td>
              <td align="right" bgcolor="#CCFF99"><input name="call_data" type="text" tabindex="38" id="call_data" value="<?php echo date("Y-m-d") ?>" /></td>
              <td align="right" bgcolor="#CCFF99"><strong>تاريخ الاتصال</strong></td>
              </tr>
            <tr>
              <td colspan="3" rowspan="5" align="center" valign="middle"><img src="aqarmatlob.jpg" width="310" height="165" alt=""/></td>
              <td align="right"><span id="spryselect7">
                <label for="view_v2"></label>
                <select name="view_v" id="view_v2">
                <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recordsetview['viewname']?>"><?php echo $row_Recordsetview['viewname']?></option>
                  <?php
} while ($row_Recordsetview = mysql_fetch_assoc($Recordsetview));
  $rows = mysql_num_rows($Recordsetview);
  if($rows > 0) {
      mysql_data_seek($Recordsetview, 0);
	  $row_Recordsetview = mysql_fetch_assoc($Recordsetview);
  }
?>
                </select>
</span></td>
              <td align="center" valign="middle" bgcolor="#9E9E9E"><strong>View الفيو</strong></td>
              <td align="right"><span id="spryselect6">
                <input name="namozg_other" type="text" id="namozg_other" size="20" />
                <label for="namozg"></label>
                <select name="namozg" id="namozg">
                  <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recordsetnamozg['namozgname']?>"><?php echo $row_Recordsetnamozg['namozgname']?></option>
                  <?php
} while ($row_Recordsetnamozg = mysql_fetch_assoc($Recordsetnamozg));
  $rows = mysql_num_rows($Recordsetnamozg);
  if($rows > 0) {
      mysql_data_seek($Recordsetnamozg, 0);
	  $row_Recordsetnamozg = mysql_fetch_assoc($Recordsetnamozg);
  }
?>
                </select>
</span></td>
              <td align="right" bgcolor="#9E9E9E"><strong>النمــــــوذج</strong></td>
            </tr>
            <tr>
              <td colspan="2" align="right">&nbsp;</td>
              <td align="right"><span id="spryselect3">
                <input name="amalya_type_other" type="text" id="amalya_type_other" size="20" />
                <label for="amalya_type"></label>
                <select name="amalya_type" tabindex="5" id="amalya_type">
                  <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_QQamalya_type['amalya_type_name']?>"><?php echo $row_QQamalya_type['amalya_type_name']?></option>
                  <?php
} while ($row_QQamalya_type = mysql_fetch_assoc($QQamalya_type));
  $rows = mysql_num_rows($QQamalya_type);
  if($rows > 0) {
      mysql_data_seek($QQamalya_type, 0);
	  $row_QQamalya_type = mysql_fetch_assoc($QQamalya_type);
  }
?>
                  </select>
                <span class="selectRequiredMsg">اختر نوع العملية.</span></span></td>
              <td align="right" bgcolor="#9E9E9E"><strong>نوع العملية</strong></td>
            </tr>
            <tr>
              <td align="right"><input type="text" name="rooms" id="rooms" /></td>
              <td align="center" bgcolor="#9E9E9E"><strong>عدد الغرف</strong></td>
              <td align="right"><span id="spryselect4">
                <input name="tashteeb_other" type="text" id="tashteeb_other" size="20" />
                <label for="tashteeb"></label>
                <select name="tashteeb" tabindex="6" id="tashteeb">
                  <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Qtashteeb['tashteeb_name']?>"><?php echo $row_Qtashteeb['tashteeb_name']?></option>
                  <?php
} while ($row_Qtashteeb = mysql_fetch_assoc($Qtashteeb));
  $rows = mysql_num_rows($Qtashteeb);
  if($rows > 0) {
      mysql_data_seek($Qtashteeb, 0);
	  $row_Qtashteeb = mysql_fetch_assoc($Qtashteeb);
  }
?>
                </select>
                <span class="selectRequiredMsg">اختر نظام التشطيب.</span></span></td>
              <td align="right" bgcolor="#9E9E9E"><strong>التشــطــــيب</strong></td>
            </tr>
            <tr>
              <td align="right"><input type="text" name="wc" id="wc" /></td>
              <td align="center" bgcolor="#9E9E9E"><strong>عدد الحمامات</strong></td>
              <td align="right"><span id="spryselect8">
                <input name="marhala_other" type="text" id="marhala_other" size="20" />
                <label for="marhala2"></label>
                <select name="marhala" id="marhala2">
                <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recordsetmarhala['marhalaname']?>"><?php echo $row_Recordsetmarhala['marhalaname']?></option>
                  <?php
} while ($row_Recordsetmarhala = mysql_fetch_assoc($Recordsetmarhala));
  $rows = mysql_num_rows($Recordsetmarhala);
  if($rows > 0) {
      mysql_data_seek($Recordsetmarhala, 0);
	  $row_Recordsetmarhala = mysql_fetch_assoc($Recordsetmarhala);
  }
?>
                </select>
</span></td>
              <td align="right" bgcolor="#9E9E9E"><strong>المــــرحـلة</strong></td>
            </tr>
            <tr>
              <td rowspan="2" align="center" bgcolor="#DEFFC7"><strong>المســـاحة</strong></td>
              <td rowspan="2" align="center" bgcolor="#DEFFC7"><strong>Budget الســــعر </strong></td>
              <td rowspan="2" align="center" bgcolor="#DEFFC7"><strong>الدور</strong></td>
              <td rowspan="3" align="right" bgcolor="#DEFFC7"><img src="aqarr.jpg" width="61" height="64" alt=""/></td>
            </tr>
            <tr>
              <td colspan="3" rowspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#CCFF99"><span id="sprytextfield11">
              <label for="masaha"></label>
              <input type="text" name="masaha" tabindex="16" id="masaha" />
              <span class="textfieldInvalidFormatMsg">ادخل قيمة المساحة بالارقام.</span></span></td>
              <td align="center" valign="middle" bgcolor="#CCFF99"><span id="sprytextfield14">
              <label for="budget3"></label>
              <input type="text" name="budget" tabindex="18" id="budget3" onchange="addfee();"/>
              <span class="textfieldRequiredMsg">يجب ادخال قيمة المطلوب.</span><span class="textfieldInvalidFormatMsg">ادخل قيمة صحيحة.</span></span></td>
              <td align="center" valign="middle" bgcolor="#CCFF99"><span id="spryselect9">
              <label for="door3"></label>
              <select name="door" id="door3">
                <option value=""></option>
                <?php
do {  
?>
                <option value="<?php echo $row_Recordsetdoor['doorname']?>"><?php echo $row_Recordsetdoor['doorname']?></option>
                <?php
} while ($row_Recordsetdoor = mysql_fetch_assoc($Recordsetdoor));
  $rows = mysql_num_rows($Recordsetdoor);
  if($rows > 0) {
      mysql_data_seek($Recordsetdoor, 0);
	  $row_Recordsetdoor = mysql_fetch_assoc($Recordsetdoor);
  }
?>
              </select>
              </span></td>
              </tr>
            <tr>
              <td colspan="6" align="right"><input name="kmalyat" type="text" id="kmalyat" size="120" /></td>
              <td align="right" bgcolor="#9E9E9E"><strong>الكماليات</strong></td>
            </tr>
            <tr>
              <td colspan="6" align="right"><input name="details" type="text" id="details" size="120" /></td>
              <td align="right" bgcolor="#9E9E9E"><strong>تفاصيل العقار</strong></td>
            </tr>
            <tr>
              <td colspan="6" align="right"><span id="sprytextfield10">
                <label for="address"></label>
                <input name="address" type="text" tabindex="14" id="address" size="70" />
                <span class="textfieldRequiredMsg">يلزم ادخال العنوان.</span></span></td>
              <td align="right" bgcolor="#9E9E9E"><strong>العنوان</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="7"><hr /></td>
        </tr>
        <tr>
          <td colspan="7"><table width="100%" border="0" align="center">
            <tr>
              <td colspan="2" align="right" valign="middle"><label for="sellist"></label></td>
            </tr>
            <tr>
              <td align="right"><textarea name="action_history" id="action_history" cols="90" rows="5"></textarea></td>
              <td align="center" bgcolor="#9E9E9E"><strong>ماذا حدث للطلب ؟</strong></td>
            </tr>
            <tr>
              <td align="right"><span id="sprytextfield25">
                <label for="notes"></label>
                <input name="notes" type="text" id="notes" tabindex="31" size="99" />
</span></td>
              <td align="center" bgcolor="#9E9E9E"><strong>ملاحظــــات</strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="7"><hr /></td>
        </tr>
        <tr>
          <td colspan="7"><table width="100%" border="0" align="center">
            <tr>
              <td width="27%" align="right"><input type="text" name="whatsapp" id="whatsapp" /></td>
              <td width="11%" align="left"><strong><img src="whatsapp.png" width="40" height="40" alt=""/></strong></td>
              <td width="48%" align="right"><span id="sprytextfield26">
                <label for="cust_title"></label>
                <span class="textfieldRequiredMsg">يلزم ادخال اسم العميل بالكامل.</span>
                <input name="cust_name" tabindex="33" type="text" id="cust_name" size="45" />
              </span></td>
              <td width="5%" align="right"><label for="laqab"></label></td>
              <td width="9%" align="right" bgcolor="#9E9E9E"><strong>اسم العمـــــيل</strong></td>
            </tr>
            <tr>
              <td align="right"><input type="text" name="email" id="email" /></td>
              <td align="left"><strong><img src="web.png" width="30" height="40" alt=""/></strong></td>
              <td colspan="2" align="right"><span id="sprytextfield28">
                <label for="telephone"></label>
                <input type="text" name="telephone" tabindex="34" id="telephone" />
                <span class="textfieldInvalidFormatMsg">ادخل رقم التليفون بشكل صحيح.</span></span></td>
              <td align="left" bgcolor="#FFFFFF"><strong><img src="tel.png" width="30" height="30" alt=""/></strong></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
              <td colspan="2" align="right"><span id="sprytextfield29">
                <label for="mobile"></label>
                <input type="text" name="mobile" tabindex="35" id="mobile" />
                <span class="textfieldInvalidFormatMsg">ادخل رقم الموبايل بشكل صحيح.</span></span></td>
              <td align="left" bgcolor="#FFFFFF"><strong><img src="mob.png" width="30" height="30" alt=""/></strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="7"><hr /></td>
        </tr>
        <tr>
          <td colspan="7"><table width="100%" border="0" align="right">
            <tr>
              <td width="59%" colspan="4" align="right"><span id="sprytextfield31">
                <label for="modkhel"></label>
                <input name="modkhel" type="text" id="modkhel" tabindex="37" value="<?php echo $_SESSION['MM_Username'];?>" />
                <span class="textfieldRequiredMsg">ادخل مدخل البيان الحالى.</span></span></td>
              <td width="16%" align="center" bgcolor="#9E9E9E"><strong>مدخل البيان</strong></td>
              <td width="17%" align="right"><span id="sprytextfield30">
                <label for="masdr"></label>
                <input type="text" name="masdr" tabindex="36" id="masdr" />
</span></td>
              <td width="8%" align="right" bgcolor="#9E9E9E"><strong>المصدر</strong></td>
            </tr>
            <tr>
              <td align="right"><input name="remember" type="checkbox" tabindex="41" id="remember" value="1" /></td>
              <td bgcolor="#9E9E9E"><strong>تنبيه؟</strong></td>
              <td align="right"><input name="found" type="checkbox" tabindex="41" id="found" /></td>
              <td bgcolor="#9E9E9E"><span class="blue">تم الحصول عليه؟</span></td>
              <td align="center" bgcolor="#CCFF99"><strong>تاريخ التعديل</strong></td>
              <td align="center" bgcolor="#CCFF99"><strong>تاريخ الادخال</strong></td>
              <td rowspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="2" align="right"><label for="officeid">:</label>
                <select name="officeid" id="officeid">
                  <option value=""></option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Qoffice['id']?>"><?php echo $row_Qoffice['name']?></option>
                  <?php
} while ($row_Qoffice = mysql_fetch_assoc($Qoffice));
  $rows = mysql_num_rows($Qoffice);
  if($rows > 0) {
      mysql_data_seek($Qoffice, 0);
	  $row_Qoffice = mysql_fetch_assoc($Qoffice);
  }
?>
                </select></td>
              <td bgcolor="#9E9E9E"><strong>مضاف من قبل مكتب تسويق</strong></td>
              <td align="center" bgcolor="#CCFF99"><span id="sprytextfield33">
                <label for="update_date"></label>
                <input name="update_date" type="text" tabindex="39" id="update_date" value="<?php echo date("Y-m-d") ?>" />
                <span class="textfieldRequiredMsg">يلزم الادخال.</span><span class="textfieldInvalidFormatMsg">ادخل التاريخ بالشكل dd-mm-yyyy.</span></span></td>
              <td align="center" bgcolor="#CCFF99"><span id="sprytextfield32">
                <label for="entry_date"></label>
                <input name="entry_date" type="text" tabindex="38" id="entry_date" value="<?php echo date("Y-m-d") ?>" />
                <span class="textfieldRequiredMsg">يلزم الادخال.</span><span class="textfieldInvalidFormatMsg">ادخل التاريخ بالشكل dd-mm-yyyy.</span></span></td>
              </tr>
            <tr>
              <td colspan="6" align="right"><span id="sprytextfield34">
                <label for="motabaa"></label>
                <input name="motabaa" type="text" tabindex="40" id="motabaa" size="100" />
</span></td>
              <td align="right" bgcolor="#9E9E9E"><strong>المتابعة</strong></td>
            </tr>
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
    <td width="11%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle" bgcolor="#FFFFFF"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"], isRequired:false});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["change", "blur"], isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["change", "blur"], isRequired:false});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield25 = new Spry.Widget.ValidationTextField("sprytextfield25", "none", {isRequired:false});
var sprytextfield26 = new Spry.Widget.ValidationTextField("sprytextfield26", "none", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield28 = new Spry.Widget.ValidationTextField("sprytextfield28", "integer", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield29 = new Spry.Widget.ValidationTextField("sprytextfield29", "integer", {isRequired:false});
var sprytextfield30 = new Spry.Widget.ValidationTextField("sprytextfield30", "none", {isRequired:false});
var sprytextfield31 = new Spry.Widget.ValidationTextField("sprytextfield31", "none", {validateOn:["blur", "change"]});
var sprytextfield32 = new Spry.Widget.ValidationTextField("sprytextfield32", "date", {validateOn:["blur", "change"], format:"yyyy-mm-dd"});
var sprytextfield33 = new Spry.Widget.ValidationTextField("sprytextfield33", "date", {validateOn:["blur", "change"], format:"yyyy-mm-dd"});
var sprytextfield34 = new Spry.Widget.ValidationTextField("sprytextfield34", "none", {isRequired:false});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6", {isRequired:false, validateOn:["blur", "change"]});
var spryselect7 = new Spry.Widget.ValidationSelect("spryselect7", {isRequired:false, validateOn:["blur", "change"]});
var spryselect8 = new Spry.Widget.ValidationSelect("spryselect8", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {validateOn:["blur", "change"]});
var spryselect9 = new Spry.Widget.ValidationSelect("spryselect9", {isRequired:false, validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
mysql_free_result($Qcity);

mysql_free_result($Qaqar_type);

mysql_free_result($QQamalya_type);

mysql_free_result($Qtashteeb);

mysql_free_result($Qstatus);

mysql_free_result($Recordset1);

mysql_free_result($Recordsetmarhala);

mysql_free_result($Recordsetdoor);

mysql_free_result($Recordsetnamozg);

mysql_free_result($Recordsetview);

mysql_free_result($Recordsetlaqab);

mysql_free_result($Qoffice);
?>
