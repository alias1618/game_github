<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>加值</title>
</head>
<body>
<table border="1">
			<tr>
				<td align="center">充值編號</td>
				<td align="center">充值帳號</td>
				<td align="center">充值金額</td>
				<td align="center">銀行</td>
				<td align="center">充值後金額</td>
				<td align="center">充值時間</td>
				<td align="center">是否完成充值</td>
				<!-- <td align="center">修改/刪除圖片</td>
				<td align="center">修改商品資料</td> -->
				<form action="product_delete.php" method="post">
				
			</tr>
			<?php
            require_once("connect_db.php");
			$sql_query01 = "SELECT * FROM addwallet";
			
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			while($row01 = mysqli_fetch_array($result01)){
			    $addwallet_id = $row01["addwallet_id"];
			    $member_account = $row01["member_account"];
			    $addwallet_number = $row01["addwallet_number"];
			    $addwallet_number_finish = $row01["addwallet_number_finish"];
			    $addwallet_time = $row01["addwallet_time"];
			    $addwallet_done = $row01["addwallet_done"];
			    //$product_category_id = $row01["product_category_id"];
			
            ?>
            <tr>
                <td><?php echo $addwallet_id;?></td>	<!-- 顯示充值編號 -->
                <td><?php echo $member_account;?></td>	<!-- 顯示充值帳號 -->
                <td><?php echo $addwallet_number;?></td>	<!-- 顯示充值金額 -->
                <td><?php echo $bank_name;?></td>	<!-- 顯示銀行 -->
                <td><?php echo nl2br($addwallet_number_finish);?></td>	<!-- 顯示加值後金額 -->
                <td><?php echo $addwallet_time;?></td>	<!-- 充值時間 -->
                <td><?php echo $addwallet_number_finish;?>?></td><!-- 顯示是否完成充值 -->
               
                
                
                <td><a href="product_edit.php?addwallet_id=<?php echo $addwallet_id;?>">修改商品資料</a></td>
                <!--  <td><label><input type="checkbox"  name="product_status_id[]" value="<?php //echo $product_id;?>" <?php //if($product_status_id == "3") echo("checked")?>> 停止販賣</label>-->
				<input type="hidden" id="addwallet_id" name="addwallet_id" value="<?php echo $addwallet_id;?>">	</td>
            </tr>
            <?php }?>
		</table>
</body>
</html>