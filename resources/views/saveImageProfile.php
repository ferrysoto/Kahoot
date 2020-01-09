<?php    
        $target_dir = "../img/imatges_perfil/tempo/";
        $target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {

            if (file_exists('../img/imatges_perfil/'.$id_creator['id_creator'].'.jpg')) {
                unlink("../img/imatges_perfil/".$id_creator['id_creator'].".jpg");
            }
            if (file_exists('../img/imatges_perfil/'.$id_creator['id_creator'].'.png')) {
                unlink("../img/imatges_perfil/".$id_creator['id_creator'].".png");
            }
            if (file_exists('../img/imatges_perfil/'.$id_creator['id_creator'].'.jpeg')) {
                unlink("../img/imatges_perfil/".$id_creator['id_creator'].".jpeg");
            }
            if (file_exists('../img/imatges_perfil/'.$id_creator['id_creator'].'.gif')) {
                unlink("../img/imatges_perfil/".$id_creator['id_creator'].".gif");
            }
           
            if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                             
                rename($target_file, "../img/imatges_perfil/".$id_creator['id_creator'].".".$imageFileType);
            }
        
    }
?>
