<?php

require "../files/file.php";
require "../files/executeable.php";
require "../files/directory.php";
require "../files/textfile.php";
require "../files/imgfile.php";

class Manager
{
    protected $list;

    public function __construct()
    {
        $this->list = [];
    }

    public function addTextFile($path, $content)
    {
        $this->list[] = new TextFile($path, $content);
    }

    public function addImgFile($path, $content)
    {
        $this->list[] = new ImgFile($path, $content);
    }

    public function addDirectory($path)
    {
        $this->list[] = new Directory($path);
    }

    public function getList($filter = File)
    {
        $temp = [];
        foreach($this->list as $singleFile)
        {
            if ($singleFile instanceof $filter)
            {
                $temp[] = $singleFile;
            }
        }
        return $temp;
    }
}

?>