<!DOCTYPE html>
<html>

<head>
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #444444;
        }

        .container {
            margin: auto;
            padding: 20px;
            width: 300px;
            background-color: #ffffff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            background-color: #f2f2f2;
            color: #444444;
            text-align: right;
        }

        button[type="submit"],
        button[type="reset"] {
            width: 45%;
            padding: 10px;
            box-sizing: border-box;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        button[type="submit"] {
            background-color: #4CAF50;
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        button[type="reset"] {
            background-color: #f44336;
        }

        button[type="reset"]:hover {
            background-color: #c9302c;
        }

        button {
            width: 22%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            color: #ffffff;
            cursor: pointer;
            background-color: #444444;
            transition: all 0.2s ease-in-out;
        }

        button:hover {
            background-color: #333333;
        }

        .clear {
            width: 92%;
            background-color: #f44336;
        }

        .clear:hover {
            background-color: #c9302c;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Calculator</h1>
        <form method="post" name="calculator">
            <input type="text" name="num1" placeholder="Enter number">
            <div>
                <button type="button" onclick="document.calculator.num1.value += '1'">1</button>
                <button type="button" onclick="document.calculator.num1.value += '2'">2</button>
                <button type="button" onclick="document.calculator.num1.value += '3'">3</button>
                <button type="button" onclick="document.calculator.num1.value += '+'">+</button>

                <button type="button" onclick="document.calculator.num1.value += '4'">4</button>
                <button type="button" onclick="document.calculator.num1.value += '5'">5</button>
                <button type="button" onclick="document.calculator.num1.value += '6'">6</button>
                <button type="button" onclick="document.calculator.num1.value += '-'">-</button>

                <button type="button" onclick="document.calculator.num1.value += '7'">7</button>
                <button type="button" onclick="document.calculator.num1.value += '8'">8</button>
                <button type="button" onclick="document.calculator.num1.value += '9'">9</button>
                <button type="button" onclick="document.calculator.num1.value += '*'">*</button>

                <button type="button" onclick="document.calculator.num1.value += '0'">0</button>
                <button type="button" onclick="document.calculator.num1.value += '/'">/</button>

                <button type="submit">=</button>
                <button type="button" class="clear" onclick="document.calculator.result.value = '' ">Reset</button>


            </div>
            <?php
            if (isset($_POST['num1'])) {
                $num1 = $_POST['num1'];
                $result = eval('return ' . $num1 . ';');
            ?>
                <input type="text" placeholder="Answer" name="result" value="<?php echo $result; ?>">
            <?php } ?>
        </form>
    </div>
</body>

</html>