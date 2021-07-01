<?php

require_once "php/files/file.php";
require_once "php/files/executeable.php";
require_once "php/files/directory.php";
require_once "php/files/textfile.php";
require_once "php/files/imgfile.php";

class Manager
{
    protected $root;

    public function __construct()
    {
        $this->root = new Dir("/");
    }

    public function addTextFile($name, $content, $dir = "")
    {
        echo "Add text file in " . $dir . "\n";
        $this->root->addFile(new TextFile($name, $content), $dir);
    }

    public function addImgFile($name, $content, $dir = "")
    {
        $this->root->addFile(new ImgFile($name, $content), $dir);
    }

    public function addDirectory($name, $dir = "")
    {
        $this->root->addFile(new Dir($name), $dir);
    }

    public function removeFile($name, $dir = "")
    {
        $this->root->removeFile($name, $dir);
    }

    public function getList($filter = 'File', $dir = "")
    {
        return $this->root->getList($filter, $dir);
    }

    public function makeFiles()
    {
        $this->root->createFiles('assets/data');
    }

    public function loadFiles($list)
    {
        foreach(array_keys($list) as $single)
        {
            if ($list[$single]['isdir'])
            {
                $name = explode("/", $single);
                $path = "";
                for($i = 0; $i < count($name) - 2; $i++)
                    $path = $path . "/" . $name[$i];
                $this->addDirectory($name[count($name)-1], $path);
                $this->loadFiles($list[$single]['content']);
            } else {
                $type = explode(".", $list[$single]['content']);
                $name = explode("/", $single);
                $path = "";
                for($i = 0; $i < count($name) - 1; $i++)
                    $path = $path . "/" . $name[$i];
                $content = file_get_contents("assets/data/" . $single);
                if ($type[count($type)-1] == "png")
                {
                    $this->addImgFile($list[$single]['content'], $content, $path);
                } else {
                    $this->addTextFile($list[$single]['content'], $content, $path);
                }
            }
        }
    }

    public function __debugInfo()
    {
        return ["Type" => "Root", "Content" => var_export($this->root, true)];
    }
}

?>