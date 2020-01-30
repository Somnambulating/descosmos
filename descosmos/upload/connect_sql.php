<?php
session_start();

// Encrypt the password and transmitting it by MD5()
// Return the string after MD5.
function encyrptionPassword($aPassword){
    $aPassword = $aPassword."descosmos";
    $aPassword = md5($aPassword);
    return $aPassword;
}

// SQL user
$sqlIp = "192.168.133.130";
$sqlUser = "root";
$sqlPassword = "@Fibonacci1248";
$sqlWorkDb = "descosmos";
$sqlId = 0;

// SQL login
if(  !($sqlId = mysql_connect($sqlIp, $sqlUser, $sqlPassword)) ){
    // SQL Login in unsuccessfully
    echo "<script>alter('服务器拒绝访问');</script>"
    die("Mysql connection error, ".mysql_error());
}

mysql_select_db($sqlWorkDb, $sqlId);

?>