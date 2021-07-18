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
        case "getUserListByIds":
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
                    echo $row["profile_text"];
                }
            }
            break;

        case "getUser":
            if($db) {
                $id = $_GET["phone"];
                $sql = "select * from t_user where id = '$id'";
                $res = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($res)) {
                    echo json_encode($row);
                }
            }
            break;
        }
        
        mysqli_close($db);
    }

//상태 메시지 변경 요청
if(isset($_POST["status_msg"])) {
    $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
    $msg = $_POST["status_msg"];
    $id = $_POST["phone"];
    if($db) {
        $msg = $_POST["status_msg"];
        $sql = "update t_user set profile_text = '$msg' where id = '$id'";
        $res = $db->query($sql);
        //정상적으로 데이터베이스가 update 될 경우
        if($res) {
            $result = 200;
            echo $result;
        }
        else {//정상적으로 데이터베이스가 update 되지 않을 경우
            $result = -1;
            echo $result;
        }
    }
}
?>