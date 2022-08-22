<?php
use App\Application\Views\View;
?>
<!doctype html>
<html lang="en">
<head>
    <?php View::component('head'); ?>
    <title>Simple MVC - PHP Framework</title>
</head>
<body class="body-flex">
    <main class="container">
        <section class="section">
            <h2 class="section__title">Main Page</h2>
            <p class="section__subtitle">Please login to your account to continue.</p>

            <div class="section__buttons">
                <a href="/login" class="btn btn--primary">Go to personal account</a>
                <a href="/register" class="btn btn--primary">Create an account</a>
            </div>
        </section>
    </main>
</body>
</html>