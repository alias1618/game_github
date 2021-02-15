<?php
    session_start();

    $withdraw_id = $_GET['withdraw_id'];
    require_once("connect_db.php");
    //找出需要提領的帳號和金額
	$sql_query_01 = "SELECT * FROM withdraw WHERE withdraw_id = $withdraw_id";
    $result_01 = $conn->query($sql_query_01) or die('MySQL query error_01');
    $row01 = mysqli_fetch_array($result_01);
    $member_account = $row01["member_account"];
    $withdraw_number = $row01["withdraw_number"];//充值金額

    //找出現有帳號的金額
	$sql_query_02 = "SELECT * FROM member WHERE member_account = $member_account";
    $result_02 = $conn->query($sql_query_02) or die('MySQL query error_02');
    $row02 = mysqli_fetch_array($result_02);
    $member_wallet = $row02["member_wallet"];//目前帳戶金額

    

    //將要提領的金額扣掉會員帳戶的金額
    $total_number = $member_wallet - $withdraw_number;
    $sql_update_01 = "UPDATE member SET member_wallet='$total_number' WHERE member_account = $member_account";
    $sql_update_result_01 = $conn->query($sql_update_01) or die('MySQL update error 01');

    $sql_update_02 = "UPDATE withdraw SET withdraw_done='yes' WHERE member_account = $member_account and withdraw_id = $withdraw_id";
    $sql_update_result_02 = $conn->query($sql_update_02) or die('MySQL update error 02');    
    
    header("Location: backend_withdraw.php");
?>