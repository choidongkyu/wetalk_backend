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
                foreach($_GET["ids"] as $value) {
                    $sql = "select * from t_user where id = '$value'";
                    $res = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($res)) {
                        $list[] = $row;
                    }
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

//?????? ????????? ?????? ??????
if(isset($_POST["status_msg"])) {
    $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
    $msg = $_POST["status_msg"];
    $id = $_POST["phone"];
    if($db) {
        $msg = $_POST["status_msg"];
        $sql = "update t_user set profile_text = '$msg' where id = '$id'";
        $res = $db->query($sql);
        //??????????????? ????????????????????? update ??? ??????
        if($res) {
            $result = 200;
            echo $result;
        }
        else {//??????????????? ????????????????????? update ?????? ?????? ??????
            $result = -1;
            echo $result;
        }
    }
}
?>