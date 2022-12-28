<?php
include_once "test.logic.php";
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
    <title>Test article module</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Test Description</th>
                <th>Resultat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Should Get Request Method is correct</td>
                <td class="<?= $isGetRequestCorrect ? "green" : "red" ?>">
                </td>
            </tr>
            <tr>
                <td>Should table retrieve by empty query string is empty</td>
                <td class="<?= $isTableFromEmptyQueryStringCorrect ? "green" : "red" ?>">
                </td>
            </tr>
            <tr>
                <td>Should table retrieve by query string 'cle=valeur' is correct</td>
                <td class="<?= $isTableFromQueryString1Correct ? "green" : "red" ?>">
                </td>
            </tr>
            <tr>
                <td>Should table retrieve by query string 'cle1=valeur1&cle2=valeur2' is correct</td>
                <td class="<?= $isTableFromQueryString2Correct ? "green" : "red" ?>">
                </td>
            </tr>
            <tr>
                <td>Should getQueryString for empty request is empty</td>
                <td class="<?= $isQueryStringForEmptyRequestCorrect ? "green" : "red" ?>">
                </td>
            </tr>
            <tr>
                <td>Should getQueryString is correct</td>
                <td class="<?= $isQueryStringCorrect ? "green" : "red" ?>">
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>