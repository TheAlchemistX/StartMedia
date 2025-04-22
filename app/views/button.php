<?php
$CarRacingController = new CarRacingController();
$attemptsData = $CarRacingController->getDataForAttemptsTable();
?>
<input type="button" value="Main table" class="toggle-btn" id="0">
<?php for ($number = 0; $number < count($attemptsData); $number++) { ?>
    <input type="button" value="<?= $number + 1 ?> attempt table" class="toggle-btn" id="<?= $number + 1 ?>">
<?php } ?>
