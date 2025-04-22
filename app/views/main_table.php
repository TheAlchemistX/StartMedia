<?php
$CarRacingController = new CarRacingController();
$mainData = $CarRacingController->getDataForMainTable();
$place = 1;
?>
<table class="table" id="0">
    <thead>
        <th>Place</th>
        <th>Name</th>
        <th>City</th>
        <th>Car</th>
        <th>Sum attempts</th>
    </thead>
    <tbody>
        <?php foreach ($mainData as $data) { ?>
            <tr>
                <td><?= $place++ ?></td>
                <td><?= $data['name'] ?></td>
                <td><?= $data['city'] ?></td>
                <td><?= $data['car'] ?></td>
                <td><?= $data['sum_attempts'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
