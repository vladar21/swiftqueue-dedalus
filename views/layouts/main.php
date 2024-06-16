<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiftqueue School</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow mb-8 py-6">
    <div class="container mx-auto px-6 md:px-0">
        <div class="flex items-center justify-between">
            <div class="text-lg font-semibold text-gray-700">
                Swiftqueue School
            </div>
            <div>
                <a href="/user_courses" class="text-gray-600 hover:text-gray-900 mx-3">My Courses</a>
                <a href="/logout" class="text-gray-600 hover:text-gray-900 mx-3">Logout</a>
            </div>
        </div>
    </div>
</nav>
<main class="container mx-auto px-6 md:px-0">
    <?php echo $content; ?>
</main>
</body>
</html>
