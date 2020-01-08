<?php
    include('includes/include.php');
    $cBank = new bank();

    switch($_POST["xf"]){
        case "transfer":
            $result = $cBank->transfer($_POST);
            echo $result;
            //var_dump($result);
            break;
    }

?>
