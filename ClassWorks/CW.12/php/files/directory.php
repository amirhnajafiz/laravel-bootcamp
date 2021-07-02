<?php

require_once "file.php";

/**
 * Directory class holdes the files
 * inside a list and has the search, add, remove
 * methods init.
 * 
 */
class Dir extends File
{
    protected $list;
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->list = [];
    }

    private function getDirectoryName($dir)
    {
        $myPath = explode("/", $dir, 2);
        if (count($myPath) == 1)
        {
            $myPath[] = "";
        }
        return $myPath;
    }

    public function getList($filter = 'File', $dir = "")
    {
        $temp = [];
        if ($dir == "")
        {
            foreach($this->list as $singleFile)
            {
                if ($singleFile instanceof $filter)
                {
                    $temp[] = $singleFile;
                }
            }
            return $temp;
        } else {
            $myPath = $this->getDirectoryName($dir);
            foreach($this->getList() as $dirs)
            {
                if ($dirs instanceof $this)
                {
                    if ($dirs->equals($myPath[0]))
                    {
                        return $dirs->getList($filter, $myPath[1]);
                    }
                }
            }
        }
    }

    public function addFile($file, $dir = "")
    {
        $myPath = $this->getDirectoryName($dir);
        foreach($this->getList("Dir") as $dirs)
        {
            if ($dirs->equals($myPath[0]))
            {
                $dirs->addFile($file, $myPath[1]);
                return;
            }
        }
        $this->list[] = $file;
    }

    public function removeFile($name, $dir = "")
    {
        $myPath = $this->getDirectoryName($dir);
        foreach($this->getList("Dir") as $dirs)
        {
            if ($dirs->equals($myPath[0]))
            {
                $dirs->removeFile($name, $myPath[1]);
                return;
            }
        }
        $index = 0;
        foreach($this->getList() as $file)
        {
            if ($file->equals($name))
            {
                unset($this->list[$index]);
                return;
            }
            $index++;
        }
    }

    private function createSingleFile($name, $content, $path)
    {
        $myFile = fopen($path . "/" . $name , "w");
        fwrite($myFile, $content);
        fclose($myFile);
    }

    public function createFiles($path = "")
    {
        mkdir($path . '/' . $this->getName(), 0777);
        $path = $path . "/" . $this->getName();
        foreach($this->getList("Executeable") as $singleFile)
        {
            $this->createSingleFile($singleFile->getName(), $singleFile->getContent(), $path);
        }
        foreach($this->getList("Dir") as $singleFile)
        {
            $singleFile->createFiles($path);
        }
    }

    public function search($input, $path = "")
    {
        $list = [];
        foreach($this->getList("Dir") as $dir)
        {
            $temp = $dir->search($input, $path . "/" . $dir->getName());
            if (count($temp) > 0)
                $list = array_merge($list, $temp);
        }
        foreach($this->getList() as $single)
        {
            if (strpos($single->getName(), $input) !== false)
                $list[] = $path . "/" . $single->getName();
            if ( !($single instanceof $this))
                if (strpos($single->getContent(), $input) !== false)
                    $list[] = $path . "/" . $single->getName() . " (In content)";
        }
        return $list;
    }

    public function getTabs($space)
    {
        $temp = " ";
        for ($i = 0; $i < $space; $i++)
        {
            if ($i % 6 == 0)
                $temp = $temp . "|";
            else    
                $temp = $temp . " ";
        }
        return $temp;
    }

    public function printTree($space = 0)
    {
        foreach($this->getList() as $file)
        {
            echo $this->getTabs($space);
            echo "\n";
            echo $this->getTabs($space);
            echo "____ ";
            echo $file->getName();
            echo "\n";
            if ($file instanceof $this)
            {
                $file->printTree($space + 6);
            }
        }
    }

    public function __debugInfo()
    {
        $temp = [];
        foreach($this->getList() as $file)
        {
            $temp[] = var_export($file, true);
        }
        return ["Directory:" => $this->getName(), "Files:" => count($this->getList()), "In:" => $temp,];
    }
}

?>