<script type="text/javascript">
	function noaccount()
	{
		alert('帳號錯誤');
		window.location.href='login.php';
		}
	function checktypecode()
	{
		alert('驗證碼錯誤');
		window.location.href='login.php';
		}
	function nopassword()
	{
		alert('密碼錯誤');
		window.location.href='login.php';
		}
	function login_two()
	{
		alert('重複登入');
		window.location.href='login.php';
		}
</script>
<?php
session_start();
require_once("connect_db.php");
$session_id = session_id();
$time = time();

if ($_POST["typecode"] != $_SESSION["check_code"]){
    echo "<script>checktypecode();</script>";
    return;
}

if ($_POST["account"]) {
    $username = $_POST["account"];
    $_SESSION['account'] = $_POST["account"];

}

if ($_POST["account"] == ""){
    echo "<script>noaccount();</script>";
    return;
}
if ($_POST["password"] == ""){
    echo "<script>nopassword();</script>";
    return;
}
if ($_POST["password"]) {
    $password = $_POST["password"];
    $password = md5($password);
}

if (($username != "") && ($password != "")) {   
    $sql = "SELECT * FROM member WHERE member_account = '$username' AND member_password = '$password'";
    
    $result = mysqli_query($conn, $sql);
    $row_cnt = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $member_id = $row['member_id'];
    if ($row_cnt == 0) {
        echo "帳號或密碼錯誤<br>";
    }else {

        $sql_query_02 = "SELECT * FROM login_data WHERE member_id = $member_id";
        $result_02 = $conn->query($sql_query_02) or die('MySQL query error');
        $row_02 = mysqli_fetch_array($result_02);
        $db_session_id = $row_02['login_session'];
        $db_login_time = $row_02['login_time'];
        
        if(empty($db_session_id)){      //第一次登入
            $sql_insert_01 = "INSERT INTO login_data(login_session, login_time, member_id) VALUES ('$session_id', $time,'$member_id')";

            $sql_insert_result_01 = $conn->query($sql_insert_01) or die('MySQL insert error_90');

            
        }else if($session_id == $db_session_id){    //有登入過而且同樣的session_id
            $sql_update_01 = "UPDATE login_data SET login_session='$session_id', login_time='$time', member_id='$member_id'";
            $sql_update_result_01 = $conn->query($sql_update_01) or die('MySQL update error');
        //重複登入 導回首頁
        }else if(($session_id != $db_session_id) && (($time - $db_login_time) < 1200)){ 
            echo "<script>login_two();</script>";
            return;
            header("Location: index.php");

        }else if(($session_id != $db_session_id) ){ //資料庫有帳號和seesion_id 但是和資料庫不一樣
            $sql_update_02 = "UPDATE login_data SET login_session='$session_id', login_time='$time', member_id='$member_id'";
            $sql_update_result_02 = $conn->query($sql_update_02) or die('MySQL update error');
            
        }

        $_SESSION['member_id'] = $row['member_id'];
        //$_SESSION['role_id'] = $row['role_id'];
        $_SESSION['user_name'] = $row['user_name'];
        header("Location: index.php");
        // if ($_SESSION['role_id'] == 1){

        //     header("Location: management.php");
        // }else if ($_SESSION['role_id'] == 2){
        //     header("Location: index.php");

        // }
        //echo 127;
    }
    }else {

    echo "帳號或密碼錯誤91";

}
?>