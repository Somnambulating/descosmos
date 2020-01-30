<?php
/************************************
 * 
 *      upload.php
 * 
 ************************************
 * The user can upoad photos by the file.
 */
session_start();


 // Exit when Illegal accessing happens.
if(!isset($_POST['submit'])){
    echo "<script>alter('非法访问');sleep(3);window.location.href='../descosmos.html';</script>"
    exit('非法访问!');
}

// Connected to SQL
require_once "connect_sql.php"





?>