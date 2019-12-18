<?php
    $_POST = json_decode(file_get_contents('php://input'), true);
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $deviceName = $_POST['deviceName'];

    $link = mysqli_connect('localhost', 'root', '', 'users') 
    or die("Ошибка " . mysqli_error($link));

    $query ="SELECT * FROM login where Password = '$pass' and Login = '$login' and DeviceName = '$deviceName'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        $example = "";
        $rows = mysqli_num_rows($result);

        for ($i = 0 ; $i < $rows ; ++$i)
        {
        $row = mysqli_fetch_row($result);
            for ($j = 0 ; $j < 6 ; ++$j){
                if($j == 0){
                $id = "$row[$j]";
                }
                if($j == 4){
                $Name = "$row[$j]";
                }
                $example = "$row[$j] " ;
            } 
        }
        if($example == ""){
            echo json_encode(
                array(
                    'status' => "false"
                )
            );
          } 
        if($example){
      /*  $sql = "UPDATE login SET Password ='$pass', Login = '$login', DeviceName = '$deviceName', Name = '$Name', Code = 123451  WHERE id = 1";
                        $res = mysql_query($sql) or die ("could not update".mysql_error());
                               echo "<meta http-equiv='refresh' content='0;url=in66.php'>";
*/
            echo json_encode(
                array(
                    'status' => "true"
                )

            );
            
          } 
          
        mysqli_free_result($result);
    }
    mysqli_close($link);
?>
