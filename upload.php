<?php 
    if(isset($_POST['id'])) {
        $db = mysqli_connect("127.0.0.1", "root", "Ddr7979556!", "wetalk");
        $id = $_POST['id'];
        if($db) {
            $sql = "SELECT NOW()";
            $res = $this->db->query($sql);
            $data = mysqli_fetch_row($res);
            $data = $data[0];

            $sql = "update t_user set profile_image = '$data' where id = '$id'";
            $res = $db->query($sql);
        

            $result = -1;
            $file_path = './profile_image/'.$id.'.jpg';
            if(file_exists($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                    $result = 200;
                }
            }
            echo $result;
        }
        mysqli_close($db);
    }

    $sql = "SELECT NOW()";
    $res = $this->db->query($sql);
    $data = mysqli_fetch_row($res);
    echo $data[0];
?>