<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        table {
            width: 500px;
            margin: 0px auto;
        }

        table,
        td{
            vertical-align: middle;
            text-align: center;
        }
        th {
            border: 0px double #025173;
        }

        th {
            background-color: #015063;
            color: white;
            width: auto;
        }
    </style>
    <title></title>
</head>

<body>
<input type="button" id="all" value="All">
<input type="button" id="load" value="load">
<div id="result">This is a div container
<table >
        <tr>
            <th>比賽日期</th>
            <th>比賽聯盟</th>
            <th colspan="3">比賽隊伍名稱</th>
            <th>詳細資料</th>
        </tr>
        
			<?php
            require_once("connect_db.php");
			$sql_query01 = "SELECT * FROM gamelist";
			
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			while($row01 = mysqli_fetch_array($result01)){
			    $gamelist_id = $row01["gamelist_id"];
			    $gamelist_date = date_create($row01["gamelist_date"]);
			    $gamelist_team_a_name = $row01["gamelist_team_a_name"];	
                $gamelist_team_b_name = $row01["gamelist_team_b_name"];
			    $gamelist_team_a_number	 = $row01["gamelist_team_a_number"];
			    $gamelist_team_b_number = $row01["gamelist_team_b_number"];
			    $gamelist_alliance = $row01["gamelist_alliance"];
			    
            ?>
            <tr>
                <!-- <td><?php //echo $gamelist_id;?></td>	顯示提領編號 -->
                <td><?php echo date_format($gamelist_date, 'Y-m-d H:i');?></td>	<!-- 顯示比賽日期 -->
                <td><?php echo $gamelist_alliance;?></td><!-- 顯示比賽聯盟 -->
                <td><?php echo $gamelist_team_a_name;?></td>	<!-- 顯示比賽隊伍名稱 -->
                <td>VS</td>
                <td><?php echo $gamelist_team_b_name;?></td>	<!-- 顯示比賽隊伍名稱 -->

                 <!-- <?php
                //if ($withdraw_done != 'yes'){
                ?> -->
                <td><a href="backend_withdraw_check.php?gamelist_id=<?php echo $gamelist_id;?>">詳細資料</a></td>
				<input type="hidden" id="gamelist_id" name="gamelist_id" value="<?php //echo $withdraw_id;?>">	</td>
            <?php //} ?> 
            </tr>
            <?php }?>
		</table>


</div>



  <script> 
    $(function(){
        $("#all").click(function(res) {
        $.ajax({
          type: "get",
          url: "gamelist.php",
          dataType: "html",
          data: {},
          success: function(data) {
            $("#result").html(data);
            },
          error: function(xhr) {
            alert(xhr.status);
            }     
          });
        });
      $("#load").click(function() {
        $.ajax({
          type: "get",
          url: "a4.php",
          dataType: "html",
          data: {},
          success: function(data) {
            $("#result").html(data);
            },
          error: function(xhr) {
            alert(xhr.status);
            }     
          });
        });
      });
  </script>
</body>

</html>