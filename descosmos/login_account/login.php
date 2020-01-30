<?Php
/******************************************
 *  login.php
 ******************************************
 * The file is used to login account and opearate Session, Cookie.
 * 
 */
session_start();
header("Content-type:text/html; charset=utf-8");


// Without valid submit, it's a invalid access.
if(!isset($_POST['submit'])){
    exit('非法访问!');
}

// user is logged in
if(isset($_SESSION[$_POST["aLogin"]]) ){
    echo "<script> alter('已登录,3s后跳转至主页');sleep(3);window.location.href='../descosmos.html';</script>";
		exit();
}

require("connect_sql.php");
require("checkLoginTools.php");

// aLogin is user Id
$aLogin = htmlspecialchars($_POST["aLogin"]);
$aPassword = encryption($_POST["aPassword"]);       // encryption defined in checkLogin.php

// The method user login in.
// After checkLoginType, $_POST["aLogin"] will be transfromed to aId.
$aLoginType = checkLoginType($_POST["aLogin"]);


// Function checkServerExist defined in checkLoginTools.php,
// once checkServerExist return true, then redirecting the page 
// to enroll.html
if( !ckeckServerExist($aLogin, $aPassword, $aLoginType) ){
    exit("<script>alter('用户不存在，跳转至注册页面');window.location.href='./enroll.html'");
}

// Get the name of clients logged in from their aId.
$aName = getAuthorName($aLogin);

// Set session by client's name and aId
$expire = time()+60*60;     // The period of validity of the session.
$_SESSION['aId'] = $aLogin;     // Session key-value

// Set cookie
setcookie("aId", $aLogin, $expire, "/");	

// Jump to main page
echo "<script> alter('登录成功,3s后跳转至主页');sleep(3);window.location.href='../descosmos.html';</script>";


?>
