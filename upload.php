<?php 
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $result = 0;
        $file_path = './profile_image/'.$id.'.jpg';
        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            $result = 1;
            if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                $result = 200;
            }else {
                $result = -1;
            }
        }
        echo $result;
    }
?>