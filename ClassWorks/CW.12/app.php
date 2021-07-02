<?php

require_once "php/manager/manager.php";
require "php/utils.php";

function menu()
{
    $commands = ['search [input]', 'view all', 'tree', 'exit'];
    echo "+++++++++++++++++\n";
    echo "+++++++++++++++++\n";
    foreach($commands as $index => $command) {
        echo "[" . $index+1 . "]." . $command . "\n";
    }
}

function init()
{
    $list = getTree('assets/data');

    $MyManager = new Manager();
    $MyManager->loadFiles($list);
    $terminate = true;

    while($terminate)
    {
        menu();
        $input = readline("> ");
        switch(substr($input, 0, 1))
        {
            case "1":
                $out = $MyManager->search(substr($input, 2, strlen($input)));
                print_r($out);
                break;
            case "2":
                var_dump($MyManager);
                break;
            case "3":
                $MyManager->getFilesTree();
                break;
            case "4":
                $terminate = false;
                break;
            default:
                echo "< Wrong input";
        }
    }

    delTree('assets/data/');
    $MyManager->makeFiles();
}

init();

?>