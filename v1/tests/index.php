<?php
include_once "array.util.test.php";
include_once "request.util.test.php";
include_once "util.test.php";

$requestUtilTest = new RequestUtilTest();
$arrayTest = new ArrayUtilTest();
$utilTest = new UtilTest();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .red {
            background-color: red;
        }
        .green {
            background-color: green;
        }
    </style>
    <title>ws-afrind-market Tests</title>
</head>
<body>
    <?php
        echo $requestUtilTest->displayTests();
        echo $arrayTest->displayTests();
        echo $utilTest->displayTests();
    ?>
</body>
</html>