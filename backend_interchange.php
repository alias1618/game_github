<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>互轉</title>
</head>
<body>
<?php
    include("beckend_menu.php");
?>
<table border="1">
			<tr>
				<td text-align="center">互轉編號</td>
				<td text-align="center">轉出帳號</td>
				<td text-align="center">轉入帳號</td>
				<td text-align="center">轉出金額</td>
				<td text-align="center">轉出金額完成</td>
				<td text-align="center">轉入金額完成</td>
				<td text-align="center">互轉時間</td>
		
				
			</tr>
			<?php
            require_once("connect_db.php");
			$sql_query01 = "SELECT * FROM interchange";
			
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			while($row01 = mysqli_fetch_array($result01)){
			    $interchange_id = $row01["interchange_id"];
			    $Interchange_out_account = $row01["Interchange_out_account"];
			    $Interchange_in_account = $row01["Interchange_in_account"];
                $Interchange_out_number = $row01["Interchange_out_number"];	
                $Interchange_out_number_finish = $row01["Interchange_out_number_finish"];
			    $Interchange_in_number_finish = $row01["Interchange_in_number_finish"];
			    $Interchange_date = $row01["Interchange_date"];
			    
			    
            ?>
            <tr>
                <td><?php echo $interchange_id;?></td>	<!-- 顯示互轉編號 -->
                <td><?php echo $Interchange_out_account;?></td>	<!-- 顯示轉出帳號 -->
                <td><?php echo $Interchange_in_account;?></td>	<!-- 顯示轉入帳號 -->
                <td><?php echo $Interchange_out_number;?></td>	<!-- 顯示轉出金額 -->
                <td><?php echo $Interchange_out_number_finish;?></td>	<!-- 轉出金額完成 -->
                <td><?php echo $Interchange_in_number_finish;?></td>	<!-- 轉入金額完成 -->
                <td><?php echo $Interchange_date;?></td>	<!-- 互轉時間 -->
                
               
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