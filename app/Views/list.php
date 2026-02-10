<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

<h2>College Student List</h2>

<a href="/create">Add New Student</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>NIM</th>
        <th>Major</th>
    </tr>

    <?php if (!empty($students)): ?>
        <?php $no = 1; foreach ($students as $student): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($student['name']) ?></td>
            <td><?= esc($student['nim']) ?></td>
            <td><?= esc($student['major']) ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No data yet</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
