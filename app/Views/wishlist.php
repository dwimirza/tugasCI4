<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?=  esc($title2) ?></h1>
    <ul>
        <?php foreach ($items2 as $item): ?>
            <li><?= esc($item) ?></li>
        <?php endforeach; ?>
    </ul>
    <h1><?= esc($title) ?></h1>
    <table>
        <tr>
            <th>Item</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= esc($item) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>