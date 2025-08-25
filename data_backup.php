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

function backup_tables($pdo, $tables = '*')
{
    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $stmt = $pdo->query('SHOW TABLES');
        while($row = $stmt->fetch(PDO::FETCH_NUM))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    $return='';
    //cycle through
    foreach($tables as $table)
    {
        $stmt = $pdo->query('SELECT * FROM `'.$table.'`');
        $num_fields = $stmt->columnCount();

        $return.= 'DROP TABLE IF EXISTS `'.$table.'`;';
        $row2 = $pdo->query('SHOW CREATE TABLE `'.$table.'`')->fetch(PDO::FETCH_NUM);
        $return.= "\n\n".$row2[1].";\n\n";

        while($row = $stmt->fetch(PDO::FETCH_NUM))
        {
            $return.= 'INSERT INTO `'.$table.'` VALUES(';
            $values = [];
            foreach ($row as $value) {
                $values[] = ($value === null) ? 'NULL' : $pdo->quote($value);
            }
            $return .= implode(',', $values);
            $return.= ");\n";
        }
        $return.="\n\n\n";
    }

    //save file
    $fileName = 'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
    $handle = fopen($fileName,'w+');
    fwrite($handle,$return);
    fclose($handle);
    return $fileName;
}

try {
    $pdo = get_db_connection('aqarmarket');
    $backup_file = backup_tables($pdo);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>النسخة الاحتياطية</title>
<style type="text/css">
body,td,th {
	color: #17036B;
}
body {
	background-color: #DDFBC8;
}
</style>
</head>

<body>
<p><a href="./index0.php"><strong>رجوع</strong></a></p>
<h2><em><strong>تم عمل نسخة احتياطية بنجاح .. الملف تجده فى المسار</strong></em></h2>
<p><strong><em>c:\xampp</em>\htdocs/aqarmarket/<?php echo $backup_file; ?></strong></p>
<p><strong>أو</strong></p>
<p><strong>localhost/aqarmarket/<?php echo $backup_file; ?></strong></p>
</body>
</html>
