<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        table {
            width: 500px;
            margin: 0px auto;
        }

        table,
        td,
        th {
            border: 1px double #025173;
        }

        th {
            background-color: #015063;
            color: white;
            width: 30%;
        }
    </style>
</head>

<body>
    <?php
    $gamelist_id= $_GET['gamelist_id'];
    ?>
    <table >

        <tr>
            <th>選項</th>
            <th>獲利%</th>
            <th>可交易量</th>
            <th>交易</th>
        </tr>
        
			<?php
            require_once("connect_db.php");
			//$sql_query01 = "SELECT * FROM boda WHERE gamelist_id = $gamelist_id";

            $sql_query01 ="SELECT *
                            FROM boda
                            INNER JOIN profit 
                            ON boda.gamelist_id=profit.gamelist_id";
			
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			$row01 = mysqli_fetch_array($result01);

            //$sql_query02 = "SELECT * FROM profit WHERE gamelist_id = $gamelist_id";    
            //$result02 = $conn->query($sql_query02) or die("MySQL query error");
            //$row02 = mysqli_fetch_array($result02);

            for($i=0;$i<4;$i++){
                for($j=0;$j<4;$j++){?>
                <tr>
                <td><?php echo $i."-".$j;?></td>
                <td><?php echo $row01["profit_".$i."_".$j];?></td>

                <td><?php echo $row01["boda_".$i."_".$j];?></td>
                <td><a href="gamelist_detail_oder.php?gamelist_id=<?php echo $gamelist_id;?>&i=<?php echo $i;?>&j=<?php echo $j;?>">詳細資料</a></td>
                </tr>
            <?php    }
            }
            ?>
            </tr>
            <?php ?>
		</table>
    
</body>

</html>