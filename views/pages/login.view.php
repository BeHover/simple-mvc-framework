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
        <section class="section authentication">
            <form action="/login" method="POST" class="form">
                <h2 class="section__title">Login Page</h2>
                <p class="section__subtitle">Please complete all fields of the form.</p>

                <?php if (isset($error)) {
                    echo "<p class='form__text'>$error</p>";
                } ?>

                <label class="form__label">
                    Email address
                    <input type="email" name="email" class="form__input" required>
                </label>

                <label class="form__label">
                    Password
                    <input type="password" name="password" class="form__input" required>
                </label>

                <a href="/register" class="form__href">Don't have an account?</a>

                <button class="btn btn--primary" type="submit" name="submit">Go to personal account</button>
            </form>
        </section>
    </main>
</body>
</html>