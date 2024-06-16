<div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Create Course</h2>
    <form method="post" action="/user_courses/create">
        <div class="mb-4">
            <label for="course_id" class="block text-gray-700 text-sm font-bold mb-2">Template Course</label>
            <select name="course_id" id="course_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <?php foreach ($courses as $c): ?>
                    <option value="<?php echo $c->id; ?>" <?php echo ($c->id == $course->course_id) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($c->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Course Name</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date</label>
            <input type="datetime-local" id="start_date" name="start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date</label>
            <input type="datetime-local" id="end_date" name="end_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
            <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
        </div>
    </form>
</div>
