<?php $title = 'Create Course'; ?>

<h1>Create Course</h1>
<form method="post" action="/courses/create">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="start_date">Start Date</label>
        <input type="datetime-local" name="start_date" id="start_date" required>
    </div>
    <div>
        <label for="end_date">End Date</label>
        <input type="datetime-local" name="end_date" id="end_date" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <div>
        <button type="submit">Create</button>
    </div>
</form>
<a href="/courses">Back to Courses</a>
