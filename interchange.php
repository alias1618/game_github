<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>互轉</title>
</head>

<body>
    <?php
    include("show_account.php");
    $account_name = $_SESSION['member_account'];
    ?>

    <form action="interchange_check.php" method="post">
                
        <label>轉出金額</label>
            <p><input type="number" name="out_number" id="out_number" placeholder="轉出金額"></p>
        <label>轉入帳號</label>
            <p><input type="text" name="Interchange_in" id="Interchange_in" placeholder="轉入帳號"></p>
        <br>
            <button type="submit">互轉</button> 

            <p><input type="hidden" name="account_name" id="account_name" value="<?php echo $account_name?>"></p>
    </form>
</body>

</html>