<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Course Management'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow-md p-4 mb-6">
    <div class="container mx-auto">
        <a href="/" class="text-xl font-bold">Course Management</a>
        <div class="float-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/logout" class="ml-4 text-blue-500">Logout</a>
            <?php else: ?>
                <a href="/login" class="ml-4 text-blue-500">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<main>
    <?php echo $content; ?>
</main>

</body>
</html>
