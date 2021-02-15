<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>提領</title>
</head>
<body>
<?php
    include("beckend_menu.php");
?>
<table border="1">
			<tr>
				<td text-align="center">提領編號</td>
				<td text-align="center">提領帳號</td>
				<td text-align="center">提領金額</td>
				<td text-align="center">銀行</td>
				<td text-align="center">提領後金額</td>
				<td text-align="center">提領時間</td>
				<td text-align="center">是否完成提領</td>
		
				
			</tr>
			<?php
            require_once("connect_db.php");
			$sql_query01 = "SELECT * FROM withdraw";
			
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			while($row01 = mysqli_fetch_array($result01)){
			    $withdraw_id = $row01["withdraw_id"];
			    $member_account = $row01["member_account"];
			    $withdraw_number = $row01["withdraw_number"];	
                $withdraw_bank = $row01["withdraw_bank"];
			    $withdraw_number_finish = $row01["withdraw_number_finish"];
			    $withdraw_time = $row01["withdraw_time"];
			    $withdraw_done = $row01["withdraw_done"];
			    
            ?>
            <tr>
                <td><?php echo $withdraw_id;?></td>	<!-- 顯示提領編號 -->
                <td><?php echo $member_account;?></td>	<!-- 顯示提領帳號 -->
                <td><?php echo $withdraw_number;?></td>	<!-- 顯示提領金額 -->
                <td><?php echo $withdraw_bank;?></td>	<!-- 顯示銀行 -->
                <td><?php echo nl2br($withdraw_number_finish);?></td>	<!-- 顯示提領後金額 -->
                <td><?php echo $withdraw_time;?></td>	<!-- 提領時間 -->
                <td><?php echo $withdraw_done;?></td><!-- 顯示是否完成提領 -->
               
                <?php
                if ($withdraw_done != 'yes'){
                ?>
                <td><a href="backend_withdraw_check.php?withdraw_id=<?php echo $withdraw_id;?>">提領</a></td>
				<input type="hidden" id="withdraw_id" name="withdraw_id" value="<?php echo $withdraw_id;?>">	</td>
            <?php } ?>
            </tr>
            <?php }?>
		</table>
</body>
</html>