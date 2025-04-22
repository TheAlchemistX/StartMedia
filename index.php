<?php require __DIR__ . '/app/Controllers/CarRacingController.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets\css\style.css">
        <title>Тестовое задание для компании СТАРТМЕДИА</title>
    </head>
    <body>
        <div>
            <?php include __DIR__ . '/app/views/button.php';?>
        </div>
        <?php include __DIR__ . '/app/views/main_table.php';?>
        <?php include __DIR__ . '/app/views/attempts_table.php';?>
    </body>
    <footer>
        <script src="assets\js\scripts.js"></script>
    </footer>
</html>
