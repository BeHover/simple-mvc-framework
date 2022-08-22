<?php
use App\Application\Views\View;
?>
<!doctype html>
<html lang="en">
<head>
    <?php View::component('head'); ?>
    <?php View::component('styles'); ?>
    <title>Simple MVC - PHP framework</title>
</head>
<body>
<h2>Error page</h2>
<p><?= $message ?></p>
<pre><?= $trace ?></pre>
</body>
</html>