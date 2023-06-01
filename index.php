<?php
session_start();
$error = '';

if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    if (empty($num1) || empty($num2)) {
        $error = 'Please enter both numbers';
    } else {
        switch ($operator) {
            case '+':
                $result = add($num1, $num2);
                break;
            case '-':
                $result = subtract($num1, $num2);
                break;
            case '*':
                $result = multiply($num1, $num2);
                break;
            case '/':
                $result = divide($num1, $num2);
                break;
            default:
                $result = 0;
                break;
        }

        $_SESSION['result'] = $result;
        header('Location: result.php');
        exit();
    }
}

function add($num1, $num2)
{
    return $num1 + $num2;
}

function subtract($num1, $num2)
{
    return $num1 - $num2;
}

function multiply($num1, $num2)
{
    return $num1 * $num2;
}

function divide($num1, $num2)
{
    if ($num2 == 0) {
        return 'Infinity';
    } else {
        return $num1 / $num2;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Web App Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Web App Calculator</h1>
        <form method="post" action="">
            <input type="number" name="num1" placeholder="Enter first number">
            <select name="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="number" name="num2" placeholder="Enter second number">
            <input type="submit" name="submit" value="Calculate">
            <?php if (!empty($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
        </form>
    </div>
</body>

</html>