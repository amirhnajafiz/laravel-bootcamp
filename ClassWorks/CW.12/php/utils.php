<?php

function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

function getTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    $list = [];
    foreach ($files as $file) {
        if (is_dir("$dir/$file")) {
            $list["$dir/$file"]["content"] = getTree("$dir/$file");
            $list["$dir/$file"]["isdir"] = true;
        } else {
            $list["$dir/$file"]["content"] = $file;
            $list["$dir/$file"]["isdir"] = false;
        }
    }
    return $list;
}

?>