<!-- First creating a variable for the text color -->
<?php
    $textColor = "blue";
?>

<!-- Creating the HTML -->
<html lang="en">
    <head>
        <title>PHP text color exercise</title>
    </head>
    <body>
		<!-- Now setting the color attribute with our variable value -->
        <p style="color: <?php echo $textColor ?>;">Some text to see the color.</p>
    </body>
</html>
