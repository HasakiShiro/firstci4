<!DOCTYPE html>
<html>
<head>
    <title>tuto 04 q2</title>
    <style>
        .red-bg { background-color: red; }
        .yellow-bg { background-color: yellow; }
        .green-bg { background-color: green; }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Col 1</th>
                <th>Col 2</th>
                <th>Col 3</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tableData as $row): ?>
                <tr class="<?= $row['color']; ?>-bg">
                    <?php foreach ($row['data'] as $cell): ?>
                        <td><?= $cell; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>