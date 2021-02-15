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
    include("show_account.php");
    ?>

    <form action="add_wallet_check.php" method="post">
                
        <label>充值金額</label>
            <p><input type="number" name="add_number" id="add_number" placeholder="加值金額"></p>
        <label>選擇銀行</label>
        <select name="bank_name">
            <?php
                require_once("connect_db.php");
                $sql = "SELECT bank_name FROM bank";
                $result = $conn->query($sql) or die("MySQL query error");
                while($row = mysqli_fetch_array($result)){
                    $bank_name = $row["bank_name"];
                    ?>
                    <option value="<?php echo $bank_name; ?>"><?php echo $bank_name; ?></option>
            <?php    
                }; 
            ?>
        </select>
        <br><br>
            <button type="submit">充值</button> 
    </form>
</body>

</html>