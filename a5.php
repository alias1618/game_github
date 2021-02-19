<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
        date_default_timezone_set('asia/taipei');
        echo date('Y-m-d H:i:s', strtotime('+1 hours'))."<br>";

        echo date('Y-m-d H:i', strtotime("now"))."<br>";

        echo "今天"."<br>";
        echo date('Y-m-d H:i', strtotime("now"))."<br>";
        echo "明天"."<br>";
        echo date('Y-m-d H:i', strtotime("+1 day"))."<br>";

        echo $from = (string)(date('Y-m-d', strtotime("now"))."<br>");
        echo $to = (string)(date('Y-m-d', strtotime("+1 day"))."<br>");
        echo  gettype('2020-02-20');
        echo  gettype($from) ;
    ?>

</body>

</html>