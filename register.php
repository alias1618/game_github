<?php 
session_start();

$account ="";
$email = "";
$phone = "";
$name = "";
$postcode ="";
$add="";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>註冊</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

 <?php 
include("menu.php");
?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5"></h1>
        <p class="lead"></p>
        <ul class="list-unstyled">
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
  <?php 
  
  if(isset($_SESSION['user_id'])){
      
      echo "<script>window.location.href='index.php';alert('已經註冊過了');</script>";
  }
  

?>
<div class="col-lg-12 text-center">
	<form name="reg_form" action="regist_insert.php" method="post" onsubmit="return allCheck();" >
						註冊<br>
						<label>帳號</label>
						<input type="text" name="account" id="account" placeholder="帳號至少5個英文字母或數字" style="width:15em" onblur="checkRepAccount()" 
							  value=<?php if(isset($_COOKIE["account"])){
							      echo $_COOKIE["account"];
							  }
                        ?>> 
					<br>
						<div id="accountAlert">	</div>
					<br>
						<div>						
                            <label>密碼</label>
                            <input type="password" name="password" id="password" placeholder="密碼	至少6個英文或數字" style="width:15em"> 
                            <div id="passwordAlert"></div>
						</div>
					<br>
						<div>					
                            <label>密碼確認</label>
                            <input  type="password" name="password_check" id="password_check" placeholder="密碼確認" style="width:15em">
                            <div id="confirm_passwordAlert"></div>
						</div>
					<br>
						<label>手機號碼</label>
						<input  type="text" name="phonenumber" id="phonenumber" placeholder="手機號碼 格式 09xxxxxxxx" style="width:15em"
						onblur="checkRepNumber()" value=<?php  if(isset($_COOKIE["phonenumber"])){    
						    echo $_COOKIE["phonenumber"];
						}?>>

						<div id="nnAlert"></div>			
						<div id="numberdAlert"></div>
						<br>
					<div><img id="captCode" src="verification_code.php" > <input type=button value="更換驗證碼" onclick="refresh_code()"></div>
					
						<label>驗證碼</label>
						<input type="text" name="typecode" id="typecode" placeholder="驗證碼">
						<br>
					
					<input type="submit" value="送出">			
    </form>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
					<script type="text/javascript">
					function refresh_code(){
						document.getElementById("captCode").src="verification_code.php";
						}

					var xmlHTTP;

					function $_xmlHttpRequest()
					{   
					    if(window.ActiveXObject)
					    {
					        xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
					    }
					    else if(window.XMLHttpRequest)
					    {
					        xmlHTTP=new XMLHttpRequest();
					    }
					};
					function checkRepAccount()
					{  
					    var account=document.getElementById("account").value;
						var data = "account=" + account;
					    $_xmlHttpRequest();
					    xmlHTTP.open("POST","checkRepAccount.php",true);
					    
					        xmlHTTP.onreadystatechange=function ()
					        {
					            if(xmlHTTP.readyState == 4)
					            {
					                if(xmlHTTP.status == 200)
					                {
					                    var str=xmlHTTP.responseText;
					                    document.getElementById("accountAlert").innerHTML=str;
					                }
					            }
					        }
					        xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					        xmlHTTP.send(data);
					    };
				    
						function checkRepNumber()
						{  
						    var phonenumber=document.getElementById("phonenumber").value;
							var data = "phonenumber=" + phonenumber;
						    $_xmlHttpRequest();
						    xmlHTTP.open("POST","checkRepNumber.php",true);
						    
						        xmlHTTP.onreadystatechange=function ()
						        {
						            if(xmlHTTP.readyState == 4)
						            {
						                if(xmlHTTP.status == 200)
						                {
						                    var str=xmlHTTP.responseText;
						                    document.getElementById("numberdAlert").innerHTML=str;
						                }
						            }
						        }
						        xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						        xmlHTTP.send(data);
						    };

				function allCheck(){
					if (accountCheck() == false){
						return false;
					}else 	if (checkPassword() == false) {
						return false;
					}else	if (checkTwoPasswords() == false) {
						return false;
					}else	if (checkPhone() == false) {
						return false;
					}else	if (check() == false) {
						return false;
					}
					return true;
					};
			
				//檢查帳號
    			function accountCheck(){
    				var account = document.getElementById("account").value;
    				var accountpatten = new RegExp(/^[A-Za-z0-9_.]{5,10}$/);
    				
    				if (account == ""){
    					//顯示帳號錯誤在文字下方

    					//跳出顯示"不能為空白"
    					alert('帳號不能為空白');
						return false;
    				}else if (!(account.match(accountpatten))){
    					//顯示帳號錯誤在文字下方

    					//跳出顯示"帳號錯誤"
    					alert('帳號格式錯誤');
						return false;
    					}
    				return true;
    			};
	    		
				//檢查密碼
				function checkPassword() {
					password = document.getElementById("password").value;
					var passwordpatten = new RegExp(/^[A-Za-z0-9]{6,18}$/);
					
					if (password == "") {

						alert('密碼不能為空白');
						return false;
					}else if(!(password.match(passwordpatten))){
	    				alert('密碼格式錯誤');
						return false;
	    			}
					return true;
				};
				
				//檢查密碼兩次輸入是否相同
				function checkTwoPasswords() {
					password = document.getElementById("password").value;
					confirm_password = document.getElementById("password_check").value;
	
					if(password != confirm_password){
						alert('兩個密碼必須相同');
						return false;
					}
					return true;
				};
				    			
    				function checkPhone() {
        				var phonenumber = document.getElementById("phonenumber").value;
        				if (phonenumber == ""){
        					alert('請填入手機號碼');
        					return false;
            				}else {

							//台灣手機號碼檢查
    						var patten = new RegExp(/^[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{3}$/);
							if (!(phonenumber.match(patten))){

    							alert('不符合台灣手機格式');
    							return false;
							}else{
							return true;
							}
    					}
            		};   				

		</script>
</body>

</html>
