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

</script>
<?php
session_start();
require_once("connect_db.php");


if ($_POST["typecode"] != $_SESSION["check_code"]){
    echo "<script>checktypecode();</script>";
    return;
}

if ($_POST["account"]) {
    $account = $_POST["account"];
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

}

if (($account != "") && ($password != "")) {   
    $sql = "SELECT * FROM manager WHERE manager_account = '$account' AND manager_password = '$password'";
    
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        $_SESSION["manager_account"] = $row["manager_account"];
        header("Location: backend.php");
    }else{
        echo "帳號或密碼錯誤<br>";
    }
}
?>