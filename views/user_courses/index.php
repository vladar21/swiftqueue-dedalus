<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-full bg-white">
        <thead>
        <tr>
            <th class="py-2 px-4 bg-gray-200">Name</th>
            <th class="py-2 px-4 bg-gray-200">Start Date</th>
            <th class="py-2 px-4 bg-gray-200">End Date</th>
            <th class="py-2 px-4 bg-gray-200">Status</th>
            <th class="py-2 px-4 bg-gray-200">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200"><?php echo htmlspecialchars($course->name); ?></td>
                <td class="py-2 px-4 border-b border-gray-200"><?php echo htmlspecialchars($course->start_date); ?></td>
                <td class="py-2 px-4 border-b border-gray-200"><?php echo htmlspecialchars($course->end_date); ?></td>
                <td class="py-2 px-4 border-b border-gray-200"><?php echo htmlspecialchars($course->status); ?></td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <a href="/user_courses/edit?id=<?php echo $course->id; ?>" class="bg-yellow-500 hover:bg-yellow-700
                    text-white font-bold py-1 px-3 rounded">Edit</a>
                    <form method="post" action="/user_courses/delete" class="inline-block">
                        <input type="hidden" name="id" value="<?php echo $course->id; ?>">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<a href="/user_courses/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New
    Course</a>
