<?php
use App\Application\Views\View;
?>
<!doctype html>
<html lang="en">
<head>
    <?php View::component('head'); ?>
    <title>Simple MVC - PHP Framework</title>
</head>
<body class="body-padding">
    <main class="container">
        <section class="section manage card">
            <h2 class="section__title">Thanks for logging in, <b><?= $user['email'] ?></b></h2>

            <ul class="manage__list">
                <li class="manage__item">
                    <button onclick="getPost(<?php echo '\'' . $user['position'] . '\''; ?>, 'Boss Button')" type="button" class="btn btn--secondary" <?php if ($user['position'] !== 'Boss') { echo 'disabled'; } ?>>Boss Button</button>
                </li>
                <li class="manage__item">
                    <button onclick="getPost(<?php echo '\'' . $user['position'] . '\''; ?>, 'Manager Button')" type="button" class="btn btn--secondary" <?php if ($user['position'] !== 'Boss' && $user['position'] !== 'Manager') { echo 'disabled'; } ?>>Manager Button</button>
                </li>
                <li class="manage__item">
                    <button onclick="getPost(<?php echo '\'' . $user['position'] . '\''; ?>, 'Performer Button')" type="button" class="btn btn--secondary">Performer Button</button>
                </li>
            </ul>

            <ul class="card__list">
                <div>
                    <h3 class="card__title">Unfortunately no data</h3>
                    <p class="card__text">Choose one of the buttons above.</p>
                </div>
            </ul>

            <button onclick="pullPosts()" type="button" class="btn btn--primary" disabled>Save all entries</button>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        var count = 1;
        var flag = false;
        var posts = [];
        var block = document.querySelector('.card__list');
        var lockBtn = document.querySelector('.btn--primary');

        async function getPost(user, button) {
            var response = await fetch('https://jsonplaceholder.typicode.com/posts/' + count);
            var data = await response.json();

            var post = {
                title: data['title'],
                body: data['body'],
                user: user,
                button: button
            };

            if (flag === false) {
                flag = true;
                block.innerHTML = '';
                lockBtn.removeAttribute('disabled');
            }

            block.innerHTML += '<li class="card__item"><h3 class="card__title">' + post['title'] + '</h3><p class="card__text">' + post['body'] + '</p></li>';
            posts.push(post);

            count === 100 ? count = 1 : count++;
        }

        async function pullPosts() {
            await fetch('/panel', {
                method: 'POST',
                body: JSON.stringify({
                    posts: posts
                }),
                contentType: 'application/json',
            });

            posts = [];
            flag = false;
            block.innerHTML = '<div><h3 class="card__title">Unfortunately no data</h3><p class="card__text">Choose one of the buttons above.</p></div>';
            lockBtn.setAttribute('disabled', 'disabled');
        }
    </script>
</body>
</html>