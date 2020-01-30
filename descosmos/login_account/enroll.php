<?php

/******************************************
 *  login.php
 ******************************************
 * The file is used to login account and opearate Session, Cookie.
 * 
 */

// Without valid submit, it's a invalid access.
if(!isset($_POST['submit'])){
    exit('非法访问!');
}

// Include files
header("Content-type:text/html; charset=utf-8");
include("connect_sql.php");
include("checkLogin.php");
include("enroll_account.php");

// account logined cannot login twice.
if(!isset($_SESSION['aId'])){
    echo "<script language='javascript'type='text/javascript'>"; 
    echo "window.location.href='../descosmos.html'"; 
    echo "</script>";
		exit();
}

// aLogin is server account
$aEmail = htmlspecialchars($_POST["aEmail"]);
$aName = $_POST["aName"];
$aPassword = encryption($_POST["aPassword"]);

// connect to SQL
$sqlIp = "192.168.133.130";
$sqlUser = "root";
$sqlPassword = "@Fibonacci1248";
$sqlWorkDb = "descosmos";
$sqlId = 0;

// SQL login
if(  !($sqlId = mysql_connect($sqlIp, $sqlUser, $sqlPassword)) ){
    // SQL Login in unsuccessfully
    echo "<script>alter('服务器拒绝访问');window.location.replace('./enroll.html');</script>"
    die("Mysql connection error, ".mysql_error());
}
// Use the database descosmos
mysql_select_db($sqlWorkDb, $sqlId);

// if account exists then exit 
if( ckeckServerExist($aEmail, $aPassword, $aLoginType) ){
    echo "<script>alter('账户已存在');</script>"
    exit();
}

// if account enrollment is failed
if( ($aId = enrollAccount($aEmail, $aName, $aPassword) ) == false ){
    echo "<script>alter('注册失败');window.location.replace('./enroll.html');</script>";
}

// Jump to main page
echo "<script>alter('您的账号: $aId');sleep(10);window.location.replace('./enroll.html');</script>";


?>
