<?php
    $team_name = "Esteghlal";
?>

<html>
    <p>
        My favourite team is 
        <b style="color:<?php if ($team_name == 'Persepolis') echo 'red'; else if ($team_name == 'Esteghlal') echo 'blue'?>;">
            <?php echo $team_name ?>
        </b>
    </p>
</html>