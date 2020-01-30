<?php
/******************************************
 *  checkLogin.php
 ******************************************
 * The file stores some functions' definition,
 * supplying an interface to other file to operate.
 * 
 */

// Judge the way server choose to login in, 
// and return a string describing the method,
// if aLoginType cannot match any kind then error and exit.
function checkLoginType($aLoginType){
    if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$aLoginType)) {
        return "email";
    }
    else if(is_int($aLoginType)){
        return "Id";
    }
    else{
        return "else";
    }
}

// Check the server exists in SQL or not.
// Judge the way server login in, and
// checking the validity of account.
// Return true if account exists, false if account is non-existent
function ckeckServerExist($aLogin, $aPassword, $aLoginType){
if( $_SERVER["REQUEST_METHOD"] == "POST"){
    $status = true;

    if( $loginType == "else" ){
        echo "<script  type='text/javascript'> alter("登录账号/邮箱格式错误");</script>";
        return ($status = false);
    }
    else if( $loginType == "email" ){
        // Reset $aLogin as aId according to author email
        $aId = mysql_query("SELECT aId FROM athor_page WHERE aEmail='$aLogin' AND aPassword='$aPassword' LIMIT 1");
        $_POST["aLogin"] = htmlspecialchars($aId);
        $status = $aId==NULL? false: true;      //  Set status as true if server exists, flase if it's non-existent.
    }
    else if( $loginType == "Id"){
        $aLogin = (int)$aLogin;
        $status = mysql_query("SELECT aId FROM author_page WHERE aEmail='$aLogin' AND aPassword='$aPassword' LIMIT 1");
    }
    else{}

    return $status;
}

// The connection between SQL and php has established,
// the getAuthorName return the author's name
function getAuthorName($aLogin){
    $result = mysql_query("SELECT aName FROM author_page WHERE aID='$aLogin'");
    return $result;
}


?>