<?php
    $server="localhost";
    $db_user="game_123456";
    $db_password="Hh20190909!";
    $db_name="game_db";
    
    $conn = mysqli_connect($server, $db_user, $db_password, $db_name);
    //建立資料庫連線 實體化mysqli(資料庫主機位置, 登入帳號, 登入密碼, 資料庫名稱

    if  ($conn->connect_error){
        die("Connection failed");
    }
    $conn->query("SET NAMES 'utf8mb4'");
    //設定連線utf8編碼，防止中文亂碼
?>