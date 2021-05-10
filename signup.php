<?php 
    if(isset($_POST["id"])) {
        $id = $_POST["id"];
        $userName = $_POST["userName"];

        //mysql 연결
        $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
        if($db) {    
            //중복체크
            $sql = "select id from t_user";
            $res = mysqli_query($db, $sql);
            if (mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    //중복되는 id가 있을 경우
                    if($row['id'] == $id) {
                        $result = -100;
                        echo $result;
                        mysqli_close($db);
                        exit;
                    }
                }
            }

             $sql = "insert into t_user (id, name) values ('$id','$userName')";
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
        $result = 0;
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

    if(isset($_GET["request"])) {
        if($_GET["request"] === "getName") { //클라이언트가 이름을 요청한 경우
            $id = '+'.$_GET["phone"];
            $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
            if($db) {
                $sql = "select name from t_user where id = '$id'";
                $res = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($res)) {
                    echo $row;
                }
            }
            mysqli_close($db);

        }
    }
?>
