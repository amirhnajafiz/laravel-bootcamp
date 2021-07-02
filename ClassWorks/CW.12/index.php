<?php

require_once "php/manager/manager.php";
require "php/utils.php";

if(isset($_GET['dir']))
{
    $address = $_GET['dir'] . "/";
} else {
    $address = "";
}

$list = getTree('assets/data');

$MyManager = new Manager();

$MyManager->loadFiles($list);

?>

<!DOCTYPE html>
<html>
    <?php foreach($MyManager->getList("Dir", $address) as $dir) { ?>
        <div>
            <?php if (count($dir->getList()) > 0) { ?>
                <a href="index.php?dir=<?php echo  $address . $dir->getName() ?>">
                    <?php echo "** " . $dir->getName($address); ?>
                </a>
            <?php } else { 
                echo "** " . $dir->getName($address);
            }
            ?>
        </div>
    <?php } ?>
    <?php foreach($MyManager->getList("Executeable", $address) as $file) { ?>
        <div>
            <?php echo "$ " . $file->getName($address); ?>
        </div>
    <?php } ?>
</html>