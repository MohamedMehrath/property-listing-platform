<?php require_once('index_offices_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>تفاصيل العقار</title>
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
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<table width="99%" border="0">
    <tr>
      <td width="93%" colspan="3" align="center"><iframe src="Banner.php" name="Banner" width="900" height="160" align="top" scrolling="no" frameborder="0" id="Banner">Banner</iframe></td>
      <td width="4%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#FFFEDC"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">مكاتب العقارات</span></strong></td>
    </tr>
    <tr>
      <td rowspan="2" valign="top">&nbsp;</td>
      <td rowspan="2" valign="top"><?php foreach ($Recordset1 as $row_Recordset1) { ?>
        <div class="panel-group" id="accordion" dir="rtl">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3">بيانــــــــات المكــتب</a>                <img src="offices.jpeg" width="40" height="40" alt=""/></h4>
              <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFEBF">
                <tbody>
                  <tr>
                    <td width="26%"><span style="font-size: 16pt"><?php echo $row_Recordset1['emp']; ?></span></td>
                    <td width="74%"><span style="font-size: 16pt"><?php echo $row_Recordset1['notes']; ?></span></td>
                  </tr>
                </tbody>
              </table>
              <table width="98%" border="0">
                <tbody>
                  <tr>
                    <td width="8%"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">الكود</span></strong></td>
                    <td width="15%"><h4><?php echo $row_Recordset1['id']; ?></h4></td>
                    <td width="7%"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">المكتب</span></strong></td>
                    <td width="24%"><?php echo $row_Recordset1['name']; ?></td>
                    <td width="30%">&nbsp;</td>
                    <td width="8%"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif"><a href="update_office.php?id=<?php echo $row_Recordset1['id'];?>"><img src="edit.gif" width="70" height="22" alt=""/></a></span></td>
                    <td width="8%"><a href="./print_office.php?id=<?php echo $row_Recordset1['id']; ?>" target="_new"><img src="./print-icon.png" alt="ewre" width="70" height="28" /></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <table width="99%" border="0" align="center" dir="ltr">
                  <tbody>
                    <tr>
                      <td width="10%" align="right" valign="middle" bgcolor="#FFFFFF"><table width="875%" border="0" align="right" cellpadding="0" bordercolor="#327900">
                          <tbody>
                            <tr>
                              <td width="11%" align="right" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">&nbsp;</td>
                              <td width="18%" align="right" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">&nbsp;</td>
                              <td width="71%" align="right" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">&nbsp;</td>
                            </tr>
                          </tbody>
                      </table></td>
                      <td width="76%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><?php echo $row_Recordset1['com_no']; ?></td>
                      <td width="10%" align="right" valign="middle" bgcolor="#FFFEDC" style="font-size: 16pt"><strong style="color: #17036B; font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;"><span class="yelow">للتواصل</span></strong></td>
                      <td width="4%"><img src="tel.png" width="40" height="40" alt=""/></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
          <?php } ?>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td rowspan="2" valign="top"><p><strong><a href="insert_office.php" target="new">ادخال مكتب جديد</a></strong></p></td>
      <td align="center" valign="top"><iframe src="menu_side.php" name="menu_side" width="250" height="1000" align="top" scrolling="auto" frameborder="0" id="menu_side">Banner</iframe></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><iframe src="copyright.php" name="copyright" width="900" align="top" scrolling="no" frameborder="0" sandbox="allow-top-navigation" id="copyright">Banner</iframe></td>
      <td>&nbsp;</td>
    </tr>
</table>
<p><script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.js" type="text/javascript"></script>
</p>
</body>
</html>
