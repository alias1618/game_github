<script type="text/javascript">
	function pass()
	{
		alert('互轉申請成功');
		window.location.href='index.php';
		}
    function notenuogh(){
        alert('互轉金額大於帳戶金額');
		window.location.href='interchange.php';
    }
    function no_out_number(){
        alert('需要填寫轉出金額');
		window.location.href='interchange.php';
    }    
    function no_Interchange_in(){
        alert('需要填寫轉入帳號');
		window.location.href='interchange.php';
    }    
    function no_account(){
        alert('沒有這個轉入帳號');
		window.location.href='interchange.php';
    } 
</script>
<?php
    session_start();
    if($_POST['out_number'] != "" ){
        $Interchange_out_number = $_POST['out_number']; //轉出金額
    }else{
        echo "<script>no_out_number();</script>"; 
    }
    if($_POST['Interchange_in'] != "" ){
        $Interchange_in_account = $_POST['Interchange_in'];//轉入帳號
    }else{
        echo "<script>no_Interchange_in();</script>"; 
    }

    $Interchange_out_account = $_POST['account_name'];//轉出帳號

    
    

    //找出轉出帳號中的帳戶金額
    require_once("connect_db.php");
    $sql = "SELECT	member_wallet FROM member WHERE member_account = $Interchange_out_account";
    $result = $conn->query($sql) or die("MySQL query error");
    $row = mysqli_fetch_array($result);
    $out_member_wallet = $row["member_wallet"];

    //找出轉入帳號中的帳戶金額
    $sql = "SELECT	* FROM member WHERE member_account = $Interchange_in_account";
    $result_01 = $conn->query($sql) or die("MySQL query error");
    $row = mysqli_fetch_array($result);
    $in_member_wallet = $row["member_wallet"];
    $in_member_account = $row["member_account"];

    if (empty($in_member_account)) {
        echo "<script>no_account();</script>";
        return;   
    } else {
        echo "錯誤: " . $sql_insert . "<br>" . $conn->error;
    }

    //判斷轉出的金額有沒有大於轉出帳號的帳戶金額
    if($Interchange_out_number > $out_member_wallet) {
        echo "<script>notenuogh();</script>";
        return;
    }else{
        //轉出金額完成 = 轉出帳號的帳戶金額 - 轉出金額
        echo 'Interchange_out_number'.$Interchange_out_number_finish = $out_member_wallet - $Interchange_out_number;
        //轉入金額完成 = 轉入帳號的帳戶金額 + 轉出金額
        echo 'Interchange_in_number_finish'.$Interchange_in_number_finish = $in_member_wallet + $Interchange_out_number;
        //寫入interchange資料庫
        $sql_insert = "INSERT INTO interchange (interchange_out_account, interchange_in_account, interchange_out_number, interchange_out_number_finish, interchange_in_number_finish) 
                    VALUES ('$Interchange_out_account', '$Interchange_in_account', '$Interchange_out_number', '$Interchange_out_number_finish', '$Interchange_in_number_finish')";
        
        $result_02 = $conn->query($sql_insert) or die('MySQL insert error');
        //執行上面那段SQL語法
        if ($result_02) {
            echo "<script>pass();</script>";   
        } else {
            echo "錯誤: " . $sql_insert . "<br>" . $conn->error;
        }

        //轉出金額更新到會員帳戶
        $sql_update_01 = "UPDATE member SET member_wallet = '$Interchange_out_number_finish' WHERE member_account = $Interchange_out_account";
        $sql_update_result_01 = $conn->query($sql_update_01) or die('MySQL update error 01');
        //轉入金額更新到會員帳戶
        $sql_update_02 = "UPDATE member SET member_wallet='$Interchange_in_number_finish' WHERE member_account = $Interchange_in_account";
        $sql_update_result_02 = $conn->query($sql_update_02) or die('MySQL update error 02');    
        
        //header("Location: index.php");

    }
?>