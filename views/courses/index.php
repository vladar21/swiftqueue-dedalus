<?php $title = 'Courses'; ?>

<h1>Courses</h1>
<a href="/courses/create">Create New Course</a>
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
                <a href="/courses/edit?id=<?php echo $course->id; ?>">Edit</a>
                <form method="post" action="/courses/delete" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $course->id; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
