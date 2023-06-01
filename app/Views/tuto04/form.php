<!DOCTYPE html>
<html>
<head>
    <title>Input Form</title>
</head>
<body>
    <form method="post" action="/save-credit-card">
        <?= session()->getFlashdata('error') ?>
        <?= csrf_field() ?>

        <label for="number">Card Number:</label>
        <input type="number" name="number" required>
        <br>
        <label for="month">Month:</label>
        <select name="month" required>
            <?php
            $months = array(
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            );
            foreach ($months as $month) {
                echo '<option value="' . $month . '">' . $month . '</option>';
            }
            ?>
        </select>
        <br>
        <label for="year">Year:</label>
        <select name="year" required>
            <?php
            $currentYear = date('Y');
            for ($year = 2023; $year <= 2063; $year++) {
                echo '<option value="' . $year . '">' . $year . '</option>';
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
