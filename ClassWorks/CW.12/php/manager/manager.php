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
                $parts = explode("/", $single);
                $name = $parts[count($parts)-1];
                $path = "";
                unset($parts[count($parts)-1]);
                if (count($parts) != 0)
                {
                    $path = implode("/", $parts);
                }
                $this->addDirectory($name, $path);
                $this->loadFiles($list[$single]['content']);
            } else {
                $type = explode(".", $single);
                $parts = explode("/", $single);
                $path = "";
                unset($parts[count($parts)-1]);
                if (count($parts) != 0)
                {
                    $path = implode("/", $parts);
                }
                $content = file_get_contents("assets/data/" . $single);
                if (ImgFile::isImage($type[count($type)-1]))
                {
                    $this->addImgFile($list[$single]['content'], $content, $path);
                } else {
                    $this->addTextFile($list[$single]['content'], $content, $path);
                }
            }
        }
    }

    public function search($input)
    {
        return $this->root->search($input);
    }

    public function getFilesTree()
    {
        $this->root->printTree(1);
    }

    public function __debugInfo()
    {
        return ["Type" => "Root", "Content" => var_export($this->root, true)];
    }
}

?>