<?php
if(isset($_GET["request"])) {
    if($_GET["request"] === "getName") { //클라이언트가 이름을 요청한 경우
        $id = $_GET["phone"];
        $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
        if($db) {
            $sql = "select name from t_user where id = '$id'";
            $res = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($res)) {
                echo $row["name"];
            }
        }
        mysqli_close($db);
    }else if($_GET["request"] === "getUserList") {
        $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
        if($db) {
            $sql = "select * from t_user";
            $res = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($res)) {
                $list[] = $row;
            }

            echo json_encode($list);
        }
    }
}
?>