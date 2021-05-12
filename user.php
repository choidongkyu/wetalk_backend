<?php
if(isset($_GET["request"])) {
    $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
    switch($_GET["request"]) {
        case "getName":
            $id = $_GET["phone"];
            if($db) {
                $sql = "select name from t_user where id = '$id'";
                $res = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($res)) {
                    echo $row["name"];
                }
            }
            break;
        
        case "getUserList":
            if($db) {
                $sql = "select * from t_user";
                $res = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($res)) {
                    $list[] = $row;
                }
                echo json_encode($list);
            }
            break;

        case "getStatusMsg":
            if($db) {
                $id = $_GET["phone"];
                $sql = "select profile_text from t_user where id = '$id'";
                $res = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($res)) {
                    echo $row["msg"];
                }
            }
            break;
        }
        
        mysqli_close($db);
    }
?>