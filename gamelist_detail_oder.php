<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php 
       echo $gamelist_id = $_GET['gamelist_id'];
       echo "<br>";
       //echo $profit_id = $_GET['profit_id'];
       //echo $boda_id = $_GET['boda_id'];
       echo 'i'.$i = $_GET['i'];
       echo 'j'.$j = $_GET['j'];
       echo "<br>";
       //echo '$profit02 '.$profit02 ="profit_".$score."<br>";
       require_once("connect_db.php");

       $sql_query01 ="SELECT *
                        FROM boda
                        INNER JOIN profit 
                        ON boda.gamelist_id=profit.gamelist_id
                        WHERE boda.gamelist_id = '$gamelist_id' AND profit.gamelist_id = '$gamelist_id'";
        $result01 = $conn->query($sql_query01) or die("MySQL query error");
        $row01 = mysqli_fetch_array($result01);
       echo $row01["profit_".$i."_".$j];

       echo $boda = $row01["boda_".$i."_".$j];
    ?>

    <form action="">
        <table>
            <tr>
                <th>交易金額</th>               
                <th>獲利%</th>
                <th>預估獲利</th>
            </tr>
            <tr>
                <td><input type="number" name="" id="" ></td>
                <td><input type="number" name="" id="" value="<?php echo $row01["profit_".$i."_".$j];?>" readonly></td>
                <td><input type="number"></td>
            </tr>  
        </table>  
    </form>
    
</body>
<script> 
    $(function(){
      $("#load").click(function() {
        $.ajax({
          type: "get",
          url: "gamelist_ajax.php",
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
</html>