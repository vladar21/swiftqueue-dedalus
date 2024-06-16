<?php $title = 'Edit Course'; ?>

<h1>Edit Course</h1>
<form method="post" action="/courses/edit?id=<?php echo $course->id; ?>">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($course->name); ?>" required>
    </div>
    <div>
        <label for="start_date">Start Date</label>
        <input type="datetime-local" name="start_date" id="start_date" value="<?php echo htmlspecialchars($course->start_date); ?>" required>
    </div>
    <div>
        <label for="end_date">End Date</label>
        <input type="datetime-local" name="end_date" id="end_date" value="<?php echo htmlspecialchars($course->end_date); ?>" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="active" <?php if ($course->status == 'active') echo 'selected'; ?>>Active</option>
            <option value="inactive" <?php if ($course->status == 'inactive') echo 'selected'; ?>>Inactive</option>
        </select>
    </div>
    <div>
        <button type="submit">Update</button>
    </div>
</form>
<a href="/courses">Back to Courses</a>
