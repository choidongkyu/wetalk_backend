<?php 
    //id 데이터가 정상적으로 올 경우 pw, email 데이터가 정상적으로 왔다고 가정하고 따로 데이터가 있는지 검증 하지 않음
    if(isset($_POST["id"])) {
        $id = $_POST["id"];

        //mysql 연결
        $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
        if($db) {
             $sql = "insert into t_user (id) values ('$id')";
             $res = $db->query($sql);
             //정상적으로 데이터베이스가 생성 될 경우
             if($res) {
                $result = 200;
                echo $result;
             }
             else {//정상적으로 데이터베이스가 생성되지 않을 경우
                $result = -1;
                echo $result;
             }
        }
        //mysql 연결이 정상적으로 되지 않을 경우
        else { 
            $result = 404;
             echo $result;
        }
        mysqli_close($db);
    }

    //중복체크 요청이 온 경우
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $result["retCode"] = 0;
        //중복검사를 위한 데이터 조회
        $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
        if($db) {
            $sql = "select id from t_user";
            $res = mysqli_query($db, $sql);
            if (mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    //중복되는 id가 있을 경우
                    if($row['id'] == $id) {
                        $result = -1;
                        break;
                    }
                }
            }
        }
        echo $result;
        mysqli_close($db);
    }


    $id = "+8210-1234-1234";

        //mysql 연결
        $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
        if($db) {
             $sql = "insert into t_user (id) values ('$id')";
             $res = $db->query($sql);
             //정상적으로 데이터베이스가 생성 될 경우
             if($res) {
                $result = 200;
                echo $result;
             }
             else {//정상적으로 데이터베이스가 생성되지 않을 경우
                $result = -1;
                echo $result;
             }
        }
        //mysql 연결이 정상적으로 되지 않을 경우
        else { 
            $result = 404;
             echo $result;
        }
        mysqli_close($db);
?>
