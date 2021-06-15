<?php 
    function removeFile($filename) {
        unlink($filename);
    }
    if (isset($_POST['action'])) {
        removeFile($_POST['filename']);
    }
?>