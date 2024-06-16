<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Swiftqueue School' ?></title>
    <link rel="stylesheet" href="/public/assets/css/styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/courses">Courses</a></li>
            <?php if (\App\Core\Auth::check()): ?>
                <li><a href="/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <?php if (isset($content)) echo $content; ?>
</main>

<footer>
    <p>&copy; 2024 Swiftqueue School of High Tech</p>
</footer>

<script src="/public/assets/js/app.js"></script>
</body>
</html>
