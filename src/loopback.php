<?php

echo '<!DOCTYPE html>
            <html>
            <head>
            <meta charset="UTF-8">
            <title>loopback</title>
            </head>
            <body>
            <div>';

$jsonObj = array();
$parameters = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    foreach($_GET as $key=>$val)
    {
        $parameters[$key] = $val;

    }
    $jsonObj["Type"] = "[GET]";

}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    foreach($_POST as $key=>$val)
    {
        $parameters[$key] = $val;

    }
    $jsonObj["Type"] = "[POST]";
}
if (count($parameters) == 0)
{
    $jsonObj["parameters"] = null;
} else {
    $jsonObj["parameters"] = $parameters;
}

echo json_encode($jsonObj);

?>

</div>
</body>
</html>