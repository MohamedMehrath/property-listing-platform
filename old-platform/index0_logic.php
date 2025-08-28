<?php
require_once('Connections/db.php');


// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "index1.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;

  try {
      $pdo = get_db_connection('utopia');
  } catch (PDOException $e) {
      die("Database connection failed: " . $e->getMessage());
  }

  $LoginRS__query="SELECT username, password, level FROM users WHERE username=? AND password=?";

  $stmt = $pdo->prepare($LoginRS__query);
  $stmt->execute([$loginUsername, $password]);

  $loginFoundUser = $stmt->rowCount();
  if ($loginFoundUser) {

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $loginStrGroup = $user['level'];

	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
