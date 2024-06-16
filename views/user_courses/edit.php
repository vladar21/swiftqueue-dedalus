<?php include __DIR__ . '/../layouts/main.php'; ?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Course</h1>

    <form method="post" action="/user_courses/edit?id=<?php echo $course->id; ?>" class="bg-white p-6 rounded shadow-md">
        <div class="mb-4">
            <label for="course_id" class="block text-gray-700">Template Course</label>
            <select name="course_id" id="course_id" required class="mt-1 block w-full border-gray-300 rounded">
                <?php foreach ($courses as $c): ?>
                    <option value="<?php echo $c->id; ?>" <?php echo ($c->id == $course->course_id ? 'selected' : ''); ?>><?php echo htmlspecialchars($c->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Course Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($course->name); ?>" required class="mt-1 block w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($course->start_date); ?>" required class="mt-1 block w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">End Date</label>
            <input type="date" id="end_date" name="end_date" value="<?php echo htmlspecialchars($course->end_date); ?>" required class="mt-1 block w-full border-gray-300 rounded">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </div>
    </form>
</div>
