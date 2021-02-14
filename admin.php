<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
</head>

<body>
    <form method="post" action="admin_login_check.php">
            <div class="col-lg-12 text-center">
                <label>帳號</label>
                    <p><input type="text" name="account" id="account" placeholder="帳號"></p>
                <label>密碼</label>
                    <p><input type="password" name="password" id="password" placeholder="密碼"></p>
                <label>驗證碼</label>
                <div>
                    <img id="captCode" src="verification_code.php" onclick="refresh_code()">
                    <input type=button value="更換驗證碼" onclick="refresh_code()">
                </div>
                <br>
                <p><input type="text" name="typecode" id="typecode" placeholder="驗證碼"></p>
                    
                <input type="submit" >
            </div>         
    </form>
      <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		function refresh_code(){
			document.getElementById("captCode").src="verification_code.php";
			}
	</script>
</body>

</html>