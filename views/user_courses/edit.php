<div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Edit User Course</h2>
    <form method="post" action="/user_courses/edit?id=<?php echo $course->id; ?>">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">User Course Name</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo htmlspecialchars($course->name); ?>" required>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date</label>
            <input type="datetime-local" id="start_date" name="start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo htmlspecialchars($course->start_date); ?>" required>
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date</label>
            <input type="datetime-local" id="end_date" name="end_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo htmlspecialchars($course->end_date); ?>" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
        </div>
    </form>
</div>
