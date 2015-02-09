<?php
error_reporting(E_All);
ini_set('display_errors', 1);
function echoPageHeader()
{
    echo '<!DOCTYPE html>
            <html>
            <head>
            <meta charset="UTF-8">
            <title>multtable</title>
            <style>
            td {border: 1px solid grey;}
            </style>
            </head>
            <body>
            <div>';
}

function echoPageFooter()
{
    echo '</div>
            </body>
            </html>';
}

function validP($param, &$paramError)
{
        if (isset($_GET[$param]))
        {
                if ((int)($_GET[$param]) != ($_GET[$param]) || !is_numeric($_GET[$param]))
                {
                        echo "Invalid input $param must be an integer.<br>";
                        echo "Entered $_GET[$param].<br>";
                        $paramError = true;
                }
        }
        else
        {
                echo "Missing parameter $param.<br>";
                $paramError = true;
        }
}
echoPageHeader();

$paramError = false;

validP('min-multiplicand', $paramError);
validP('max-multiplicand', $paramError);
validP('min-multiplier', $paramError);
validP('max-multiplier', $paramError);

if ($_GET['min-multiplicand'] > $_GET['max-multiplicand'])
{
        echo "Minimum multiplicand larger than maximum.<br>";
        $paramError = true;
}
if ($_GET['min-multiplier'] > $_GET['max-multiplier'])
{
        echo "Minimum multiplier larger than maximum.<br>";
        $paramError = true;
}
if (!$paramError)
{
        echo '<table>';
        echo '<tbody>';
        echo '<tr><td>';
        for ($j = $_GET['min-multiplier']; $j <= $_GET['max-multiplier']; $j++)
        {
                echo "<td>$j";
        }
        for ($i = $_GET['min-multiplicand']; $i <= $_GET['max-multiplicand']; $i++)
        {
                echo '<tr>';
                echo '<td>' . $i;
                for ($j = $_GET['min-multiplier']; $j <= $_GET['max-multiplier']; $j++)
                {
                        $result = $i * $j;
                        echo "<td>$result";
                }
        }
        echo '</tbody>';
        echo '</table>';
}

echoPageFooter();
?>