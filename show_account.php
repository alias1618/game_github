<?php
    if(isset($_SESSION['member_account'])){
        require_once("connect_db.php");
        $sql = "SELECT member_wallet FROM member WHERE member_account = $_SESSION[member_account]";
        $result = $conn->query($sql) or die("MySQL query error");
        $row = mysqli_fetch_array($result);
        $member_wallet = $row["member_wallet"];
        
    ?>
    <tr><td text-align="center">帳號</td>
        <td><?php echo $_SESSION['member_account'];?></td>
        <td text-align="center">金額</td>
        <td><?php echo $member_wallet;?></td>
    </tr>
        <a class="nav-link" href="logout.php">登出</a>
    <?php }else{
        ?>
        <a class="nav-link" href="login.php">登入</a>

    <?php } ?>

    
    