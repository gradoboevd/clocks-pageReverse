<?php
    $_POST = json_decode(file_get_contents('php://input'), true);
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $deviceName = $_POST['deviceName'];
    $code = $_POST['code'];


    $link = mysqli_connect('localhost', 'root', '', 'users')
    or die("Ошибка " . mysqli_error($link));

    $query ="SELECT * FROM login where Password = '$pass' and Login = '$login' and DeviceName = '$deviceName' and Code = '$code'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result)
    {
        $example = "";
        $rows = mysqli_num_rows($result);

        for ($i = 0 ; $i < $rows ; ++$i)
        {
        $row = mysqli_fetch_row($result);
            for ($j = 0 ; $j < 5 ; ++$j){
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
        $sessionId = "123457";
        setcookie("sessionId", $sessionId, time() + 1800, null, null, null, true);

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
