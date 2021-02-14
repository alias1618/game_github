<?php
        session_start();
        require_once("connect_db.php");
        $account=$_POST["account"];       
        $password =md5($_POST["password"]); 
        //$name =$_POST["name"];
        //$add =$_POST["add"];
        echo $_POST["phonenumber"];
        
        $phone = $_POST["phonenumber"];
            //設定cookie
            setcookie("account", "$account", time()+3600);
            //setcookie("name", "$name", time()+3600);
            //setcookie("add", "$add", time()+3600);
            setcookie("phonenumber", "$phone", time()+3600);
        
            $checkcode = $_POST["typecode"];
            if($checkcode != $_SESSION["check_code"]){
                echo "<script>alert('驗證碼錯誤');  </script>";
              echo "<script>window.location.href='regist.php'</script>";
              return;
            }
echo 22;
            //先查詢DB檢查member_account有沒有重複，沒有才能insert進入DB
            $sql_query = "SELECT * FROM member WHERE member_account = '$account'";
            
            $result = $conn->query($sql_query) or die('MySQL query error');
            $row = mysqli_fetch_array($result); //將陣列以欄位名索引
            if(isset($row)){
                ($db_account=$row['member_account']);                                          
                if($account == $db_account) {
                    //header('location:index.php');
                    echo $email;
                    echo $db_email;
                    echo "失敗";
                    $url = "index.php";
                    echo "<script>alert('註冊失敗');</script>?";
                    echo "<script>window.location.href='regist.php'</script>";
                }   
            }else { 
echo 40;
            $sql_insert = "INSERT INTO member (member_account, member_password, member_phone)
                                            VALUES ('$account','$password', '$phone')";
            //mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
            $result = $conn->query($sql_insert) or die('MySQL insert error');
            //mysqli_close($conn); //關閉資料庫連結
            
            //header('location:index.php');  //回index 
            echo "成功";
            //直接登入
echo 50;
            //搜尋資料庫找到member_id和member_account一起放入session
            $sql_query02 = "SELECT * FROM member WHERE member_account='$account' AND member_phone='$phone'";
            $result02 = $conn->query($sql_query02);
            $row02 = mysqli_fetch_array($result02);

            $_SESSION['member_id'] = $row02['member_id'];
            //$_SESSION['role_id'] = $row02['role_id'];
            $_SESSION['member_account'] = $account;
            
            
            
            echo "<script>window.location.href='index.php';alert('註冊成功');</script>";
            }
         ?>