<?php $title = 'Edit Course'; ?>

<h1>Edit Course</h1>
<form method="post" action="/user_courses/edit?id=<?php echo $course->id; ?>">
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
        <p>Status: <?php echo htmlspecialchars($course->status); ?></p>
    </div>
    <div>
        <button type="submit">Update</button>
    </div>
</form>
<a href="/user_courses">Back to Courses</a>
