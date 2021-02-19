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
echo "<p>post : day=".$_POST["day1"].", pwd=".$_POST["pwd"]."</p>".
     "<p>get :user=".$_GET["user"].", pwd=".$_GET["pwd"]."</p>".
     "<p>post : user=".$_POST["user"].", pwd=".$_POST["pwd"]."</p>".
     "<p style='font-weight:bold;'>Hello World!</p>".
     "<p id='normal'>Hello World!</p>";

echo 'day1 '.$_POST["day1"].'day2 '.$_POST["day2"];

?>
</body>

</html>