<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登出</title>
</head>

<body>
    <?php
        
        $_SESSION["memebers_name"] = "";
        unset($_SESSION["memebers_name"]);
        session_destroy();
        header("Location: index.php");
    ?>
</body>

</html>