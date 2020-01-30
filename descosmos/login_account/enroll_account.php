<?php

/******************************************
 *  enroll_account.php
 ******************************************
 * Create a account in SQL, and return the unique Id
 * 
 */
// Create a account in SQL, and return the unique Id,
// In case the enrollment is failed then return false.
function enrollAccount($aEmail, $aName, $aPassword){
    $SQL = "INSERT INTO author_page(aName, aPassword, aEmail) VALUES($aName, $aPassword, $aEmail)";
    if( !mysql_query($SQL) ){
        return false;
    }

    // return the user's unique Id 
    $SQL = "SELECT aId FROM author_page WHERE aEmail=$aEmail LIMIT 1";
    $aId = mysql_query($SQL);
    return $aId;
}

?>