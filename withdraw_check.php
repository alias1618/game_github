<script type="text/javascript">
	function pass()
	{
		alert('提領申請成功');
		window.location.href='index.php';
		}
    function notenuogh(){
        alert('提領金額大於帳戶金額');
		window.location.href='index.php';
    }
</script>
<?php
    session_start();
    
    $withdraw_number = $_POST['withdraw_number'];
    $bank_name = $_POST['bank_name']; 
     
    $member_account = $_SESSION['member_account'];

    require_once("connect_db.php");
    $sql = "SELECT	member_wallet FROM member WHERE member_account = $member_account";
    $result = $conn->query($sql) or die("MySQL query error");
    $row = mysqli_fetch_array($result);
    $member_wallet = $row["member_wallet"];
    if($withdraw_number > $member_wallet) {
        echo "<script>notenuogh();</script>";
        return;
    }else{
        $member_wallet;
        $withdraw_number_finish = $member_wallet - $withdraw_number;

        
        $sql_insert = "INSERT INTO withdraw (withdraw_number, member_account, withdraw_number_finish,  withdraw_bank) 
                    VALUES ('$withdraw_number', '$member_account', '$withdraw_number_finish', '$bank_name')";
        //來一段SQL的INSERT語法

        $result = $conn->query($sql_insert) or die('MySQL insert error');
        //執行上面那段SQL語法
        if ($result) {
            echo "<script>pass();</script>";
            return;
        } else {
            echo "錯誤: " . $sql_insert . "<br>" . $conn->error;
        }
    }
?>