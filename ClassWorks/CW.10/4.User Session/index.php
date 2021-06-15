<!DOCTYPE html>
<?php
    session_start();

    $font_website = "Arial";
    $font_size = 16;
    $site_direction = "ltr";

    function sendRequest() {
        $_SESSION['font'] = $_GET['font'];
        $_SESSION['size'] = $_GET['size'];
        $_SESSION['dir'] = $_GET['dir'];
    }

    if (isset($_GET['font']))
        sendRequest();

    if(isset($_SESSION['font']))
        $font_website = $_SESSION['font'];
    
    if(isset($_SESSION['size']))
        $font_size = $_SESSION['size'];

    if(isset($_SESSION['dir']))
        $site_direction = $_SESSION['dir'];
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            * {
                font-family: <?php echo $font_website ?>;
                font-size: <?php echo $font_size . "px" ?>;
                direction: <?php echo $site_direction ?>;
            }
        </style>
    </head>
    <body>
        <form action="" method="GET" class="container m-0 mr-auto mt-5 mb-5 w-25">
            <div class="form-group">
              <label for="font">Font :</label>
              <select id="font" name="font" class="form-control form-control-lg">
                <option value="arial" <?php if($font_website == "arial") echo "selected"; ?>>Arial</option>
                <option value="Serif" <?php if($font_website == "Serif") echo "selected"; ?>>Serif</option>
                <option value="Sans-serif" <?php if($font_website == "Sans-serif") echo "selected"; ?>>Sans-serif</option>
                <option value="Monospace" <?php if($font_website == "Monospace") echo "selected"; ?>>Monospace</option>
                <option value="Fantasy" <?php if($font_website == "Fantasy") echo "selected"; ?>>Fantasy</option>
              </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="dir" id="exampleRadios1" value="ltr" <?php if($site_direction == "ltr") echo "checked"; ?>>
                <label class="form-check-label" for="exampleRadios1">
                  Left to Right
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="dir" id="exampleRadios2" value="rtl" <?php if($site_direction == "rtl") echo "checked"; ?>>
                <label class="form-check-label" for="exampleRadios2">
                  Right to Left
                </label>
              </div>
            </div>
            <div class="form-group">
                <label for="size">Size :</label>
                <input type="number" id="size" class="form-control" value="<?php echo $font_size; ?>" name="size" />
            </div>
            <input type="submit" class="btn btn-secondary" value="UPDATE" />
        </form>
        <div class="text-center mt-5 pt-5" style="padding-top:30px;">
            <div>Font: <span class="badge bg-secondary"><?php echo $font_website ?></span></div>
            <div>Direction: <span class="badge bg-secondary"><?php echo $site_direction ?></span></div>
            <div>Size: <span class="badge bg-secondary"><?php echo $font_size ?></span></div>
        </div>
    </body>
</html>