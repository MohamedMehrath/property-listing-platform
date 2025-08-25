<?php require_once('menu_top_logic.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>menu_top</title>
<!-- <script src="jQueryAssets/SpryMenuBar.js" type="text/javascript"></script> -->
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<style type="text/css">
.yelow1 {color: #17036B;
	font-style: normal;
}
.yelow {color: #FF0;
}
body {
	background-color: #FFFEDC;
}
</style>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<table width="99%" border="0" align="center">
  <tr>
    <td colspan="2" align="left" valign="middle" bgcolor="#AEAEAE" class="green"><img src="web.png" width="41" height="37" alt=""/></td>
    <td width="60%" align="center" valign="middle" bgcolor="#AEAEAE"><marquee direction="right" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout= "this.setAttribute('scrollamount', 6, 0);">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <?php foreach ($Recordset9 as $row_Recordset9) { ?>
          <td align="right" valign="middle"><a href="<?php echo $row_Recordset9['url']; ?>" target="_blank"><?php echo $row_Recordset9['url']; ?></a></td>
          <td align="right" valign="middle" class="yelow"><?php echo $row_Recordset9['sitename']; ?></td>
          <?php } ?>
        </tr>
      </table>
    </marquee></td>
    <td width="1%" align="center" valign="middle" bgcolor="#A4D24E">&nbsp;</td>
    <td width="33%" align="right" valign="middle" bgcolor="#DEFFC7" class="green"><strong class="green">مواقع تسويق عقارى صديقة</strong></td>
    <td width="3%" align="right" valign="middle" bgcolor="#AEAEAE" class="green"><img src="web.png" width="41" height="37" alt=""/></td>
  </tr>
</table>
</body>
</html>
