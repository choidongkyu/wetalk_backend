<?php 
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $resutl = -1;
        $file_path = './profile_image/'.$id.'.jpg';
        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                $result = 200;
            }
        }
        echo $result;
    }
?>