<?php
/**************************************
 * 
 *          checkFile.php
 * 
 * ************************************
 *  Definition of some functions which checking 
 *  the type of file being uploaded to descosmos.
 */

function ckeckFile(){
    // empty file checking defined in javascript

    // ckeck the type of file is image or not
    $fileIndex = '1';       // The limitation of uploaded file is 12
    $fileUploaded = '13';
    $fileSizeLimit = 200000000;     // 20MB
    $fileNum = 0;
    
    // Empty position cann't be counted. 
    for($i='1';$i<$fileUploaded;$i=$i+1){
        if(!empty[$i]){
            $fileNum++;
        }
    }

    // Rename image name and move it into stored directory.
    for($i='1';$i<=$fileNum;$i=$i+1){
        if( ($_FILES[$i]["type"] != "iamge/") && ($_FILES[$i]["size"] >= $fileSizeLimit) ){
            continue;
        }

        if(!storeImage($index)){
            continue;
        }
        
    }
    echo "<script>alter('上传成功');window.location.reload();</script>";

}

// Store file into SQL and stored director.
function storeImage($index){
    $storedFileName = "../stored_photo/"time().rand(0,10000)."jpg";
    

    // Copy file-link to SQL and storing file into directory.
    $SQL = "INSERT INTO photo_stored(aId, pStyle, pLink, uploadedTime) VALUES((int)$_SESSION["aId"], 'nascar', $storedFileName, NOW())"
    if( (!mysql_query(SQL)) && (!move_uploaded_file($_FILES[$index]["tmp_name"], $storedFileName)) ){
        return flase;
    }

    return true;
}


?>