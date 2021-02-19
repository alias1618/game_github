<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
<table >

<tr>
    <th>選項</th>
    <th>獲利%</th>
    <th>可交易量</th>
</tr>
    <?php
            require_once("connect_db.php");

			$sql_query01 = "SELECT * FROM boda WHERE gamelist_id = '1'";
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			$row01 = mysqli_fetch_array($result01);

            $sql_query02 = "SELECT * FROM profit WHERE gamelist_id = '1'";    
            $result02 = $conn->query($sql_query02) or die("MySQL query error");
            $row02 = mysqli_fetch_array($result02);

            for($i=0;$i<4;$i++){
                for($j=0;$j<4;$j++){?>
                <tr>
                <td><?php echo $i."-".$j;?></td>
                <td><?php echo $row02["profit_".$i."_".$j];?></td>

                <td><?php echo $row01["boda_".$i."_".$j];?></td>
                </tr>
            <?php    }
            }

            
    ?>
</table>
</body>

</html>