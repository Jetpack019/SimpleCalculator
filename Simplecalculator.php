<?php
session_start();

function calculate($input)
{
    if ($input !== "") {
        // Check if user input is valid
        if (preg_match('/^[\d\+\-\*\/\.]+$/', $input)) {
            // Check if user input ends with an operator
            if (preg_match('/[\+\-\*\/]$/', $input)) {
                return "Invalid input";
            }
            // Check if division by zero
            if (preg_match('/\/0/', $input)) {
                return "Cannot divide by zero";
            }
            // Check if there are two or more consecutive operators
            if (preg_match('/[\+\-\*\/]{2,}/', $input)) {
                return "Invalid input";
            }
            // Check if there are two or more consecutive decimal points
            if (preg_match('/\.{2,}/', $input)) {
                return "Invalid input";
            }
            eval("\$result = $input;");
            return $result;
        } else {
            return "Invalid input";
        }
    } else {
        return "";
    }
}

if (!isset($_SESSION['result'])) {
    $_SESSION['result'] = "";
}

if (isset($_POST['add'])) {
    $button_value = $_POST['add'];

    // Check if button value is a valid number or operator
    if (is_numeric($button_value) || in_array($button_value, array("+", "-", "*", "/", "."))) {
        // Clear invalid input text when another button is clicked
        if ($_SESSION['result'] == "Invalid input") {
            $_SESSION['result'] = "";
        }
        $_SESSION['result'] .= $button_value;
    }
}

if (isset($_POST['calculate'])) {
    $display = $_SESSION['result'];
    if ($display === "") {
        $_SESSION['result'] = "";
    } else {
        $_SESSION['result'] = calculate($display);
    }
}

if (isset($_POST['clear'])) {
    unset($_SESSION['result']);
    $_SESSION['result'] = "";
}

$buttons = array("1", "2", "3", "+", "-", "4", "5", "6", "/", "*", "7", "8", "9", "0",  ".");

?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Web Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #63A375;
        }

        h1 {
            text-align: center;
            color: #713E5A;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        td {
            text-align: center;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 20px;
            margin: 0 auto;
            width: 300px;
        }

        input[type="text"] {
            border: none;
            background-color: #EDC79B;
            padding: 10px;
            font-size: 24px;
            text-align: right;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 5px;
            height: 30px;
        }

        button {
            border: none;
            background-color: #D57A66;
            color: #fff;
            font-size: 24px;
            padding: 15px;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #713E5A;
        }

        button:active {
            background-color: #D57A66;
        }
    </style>
</head>

<body>
    <h1>PHP Web Calculator</h1>
    <form method="post">
        <input type="text" name="display" id="display" value="<?php echo $_SESSION['result']; ?>" readonly><br><br>
        <?php foreach ($buttons as $button) { ?>
            <table>
                <tr>
                    <button type="submit" name="add" value="<?php echo $button; ?>"><?php echo $button; ?></button>
                </tr>
            </table>

        <?php } ?>
        <table>
            <tr>
                <button type="submit" name="clear" value="Clear">Clear</button>
                <button type="submit" name="calculate" value="Calculate">=</button>
            </tr>
        </table>

    </form>
</body>

</html>