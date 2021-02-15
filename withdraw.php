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

    <form action="withdraw_check.php" method="post">
                
        <label>提領金額</label>
            <p><input type="number" name="withdraw_number" id="withdraw_number" placeholder="提領金額"></p>
        <label>選擇銀行</label>
        <select name="bank_name">
            <?php
                //找出銀行名稱
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
            <button type="submit">提領</button> 
    </form>
    </body>
</html>