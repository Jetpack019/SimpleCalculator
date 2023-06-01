<?php
session_start();
if (isset($_SESSION['result'])) {
    $result = $_SESSION['result'];
    unset($_SESSION['result']);
} else {
    $result = 0;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Web App Calculator - Result</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Web App Calculator</h1>
        <p class="result">Result: <?php echo $result; ?></p>
        <a href="index.php" class="button">Back</a>
    </div>
</body>

</html>