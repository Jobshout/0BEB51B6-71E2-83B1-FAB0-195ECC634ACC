<?php
require_once("connect.php");
if (isset($_GET['GUID'])) {
    $fileid = $_GET['GUID'];
    try {
      $sql = "SELECT * FROM `jobapplications` WHERE `GUID` = '".$fileid."'";
        $results = $db->get_row($sql);
        
            $filename = $results->CVFileName;
            $mimetype = $results->CVFileType;
            $filedata = $results->zCV;
            header("Content-length: ".strlen($filedata));
            header("Content-type: $mimetype");
            header("Content-disposition: download; filename=$filename"); //disposition of download forces a download
            echo $filedata; 
            // die();
       
    } //try
    catch (Exception $e) {
        $error = '<br>Database ERROR fetching requested file.';
        echo $error;
        die();    
    } //catch
} //isset
?>