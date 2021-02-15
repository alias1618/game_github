<?php
    session_start();
    echo $add_number = $_POST['add_number'];
    echo $bank_name = $_POST['bank_name']; 
     
    $member_account = $_SESSION['member_account'];

    require_once("connect_db.php");
    $sql = "SELECT	member_wallet FROM member WHERE $member_account";
    $result = $conn->query($sql) or die("MySQL query error");
    $row = mysqli_fetch_array($result);
    $member_wallet = $row["member_wallet"];
     
    echo $member_wallet;
    echo $addwallet_number_finish = $member_wallet + $add_number;

    
    $sql_insert = "INSERT INTO addwallet (addwallet_number, member_account, addwallet_number_finish,  addwallet_bank) 
                VALUES ('$add_number', '$member_account', '$addwallet_number_finish', '$bank_name')";
    //來一段SQL的INSERT語法

    $result = $conn->query($sql_insert) or die('MySQL insert error');
    //執行上面那段SQL語法
    if ($result) {
        echo '<br>充值申請成功<br>';
    } else {
        echo "錯誤: " . $sql_insert . "<br>" . $conn->error;
    }
    
?>