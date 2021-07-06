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
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>File Manager</title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
	</head>
	<body style="height:100vh;">
		<div class="container m-0 m-auto w-75 p-5 bg-dark text-light" style="height:100vh;">
			<?php if ($MyManager->getList("Dir", $address) > 0) { ?>
				<?php foreach($MyManager->getList("Dir", $address) as $dir) { ?>
					<div class="row m-0 mb-3 w-50 bg-primary text-light rounded p-2">
						<?php if (count($dir->getList()) > 0) { ?>
							<a class="text-light p-0 m-0" href="index.php?dir=<?php echo  $address . $dir->getName() ?>">
								<?php echo $dir->getName($address); ?>
							</a>
						<?php } else { 
							echo $dir->getName($address);
						}
						?>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="row m-0 w-50 mb-3 border-bottom border-2 border-light">
			</div>
			<?php if ($MyManager->getList("Executeable", $address) > 0) { ?>
				<?php foreach($MyManager->getList("Executeable", $address) as $file) { ?>
					<div class="row m-0 mb-3 w-50 bg-success text-light rounded p-2">
						<?php echo $file->getName($address); ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</body>
</html>