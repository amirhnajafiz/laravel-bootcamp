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
        $parts = explode("/", $dir);
        $path = "";
        for($i = 2; $i < count($parts); $i++)
            $path = $path . $parts[$i];
        if (is_dir("$dir/$file")) {
            $list["$path/$file"]["content"] = getTree("$dir/$file");
            $list["$path/$file"]["isdir"] = true;
        } else {
            $list["$path/$file"]["content"] = $file;
            $list["$path/$file"]["isdir"] = false;
        }
    }
    return $list;
}

?>