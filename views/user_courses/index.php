<?php $title = 'My Courses'; ?>

<h1>My Courses</h1>
<a href="/user_courses/create">Create New Course</a>
<form method="get" action="/user_courses">
    <label for="status">Filter by status:</label>
    <select name="status" id="status">
        <option value="">All</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
    <button type="submit">Filter</button>
</form>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?php echo htmlspecialchars($course->name); ?></td>
                <td><?php echo htmlspecialchars($course->start_date); ?></td>
                <td><?php echo htmlspecialchars($course->end_date); ?></td>
                <td><?php echo htmlspecialchars($course->status); ?></td>
                <td>
                    <a href="/user_courses/edit?id=<?php echo $course->id; ?>">Edit</a>
                    <form method="post" action="/user_courses/delete" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $course->id; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
