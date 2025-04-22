<?php
$CarRacingController = new CarRacingController();
$attemptsData = $CarRacingController->getDataForAttemptsTable();
$place = 1;
$tableId = 1;
?>

<?php foreach ($attemptsData as $data) { ?>
    <?php $place = 1; ?>
    <table class="table" id="<?=$tableId++?>">
        <thead>
            <th>Place</th>
            <th>Name</th>
            <th>City</th>
            <th>Car</th>
            <th>Result</th>
        </thead>
        <tbody>
            <?php foreach ($data as $attempt) { ?>
                <tr>
                    <td><?= $place++ ?></td>
                    <td><?= $attempt['name'] ?></td>
                    <td><?= $attempt['city'] ?></td>
                    <td><?= $attempt['car'] ?></td>
                    <td><?= $attempt['result'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
