<!DOCTYPE html>
<html>

<head>
    <title>My blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="bg-body-secondary">

    <header>
    <nav class="navbar bg-dark">
    <div class="container-fluid navbar-container">
        <span class="navbar-brand brand-name h1">MyBlog</span>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link link-name" href="/">Home</a></li>

            <?php if (Auth::isLoggedIn()): ?>

                <li class="nav-item"><a class="nav-link link-name" href="/admin/">Admin</a></li>
                <li class="nav.item"><a class="nav-link link-name" href="/contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link link-name" href="/logout.php">Log out</a></li>

            <?php else: ?>

                <li class="nav.item"><a class="nav-link link-name" href="/contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link link-name" href="/login.php">Log in</a></li>

            <?php endif; ?>
        </ul>
        </div>
    </nav>
    </header>
    <div class="container bg-body-secondary">
    <main>