<?php
require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        Front end <input type="radio" name="type" value="Frontend"><br>
        BackE end <input type="radio" name="type" value="Backend"><br>
        Android <input type="radio" name="type" value="Android"><br>
        Enter lesson title : <input type="text" name="title"><br>
        Url video : <input type="text" name="video"><br><br>
        <input type="submit" name="send"/>
    </form>

    <?php 

        if(isset($_POST['send'])){
            $type = $_POST['type'];
            $title = $_POST['title'];
            $video = $_POST['video'];
            if(!empty($type)){
                if(!empty($title)){
                    if(!empty($video)){
                        $query = "insert into courses ( type , title , video ) values ( '".$type."' , '".$title."' , '".$video."' )";
                        $conn->query($query);
                    }else echo "enter video url!";
                }else echo "enter title!";
            }else echo "enter type!";
        }

        /*if(isset($_POST['send'])){
            // $vid_error = $_FILES['upload_file']['error'];
            // $vid_name = $_FILES['upload_file']['name'];
            // $vid_tmp = $_FILES['upload_file']['tmp_name'];
            // $vid_size = $_FILES['upload_file']['size'];
            // $vid_ext = explode('.', $vid_name);
            // $vid_actual_ext = strtolower(end($vid_ext));
            // $type =  $_FILES['upload_file']['type'];
            // $allowed = array('webm','mpg','mp2','mpeg','mpe' , 'mpv' , 'ogg' , 'mp4' , 'm4p' , 'm4v' , 'avi' , 'wmv' , 'mov' ,'qt', 'flv' , 'swf' , 'avchd');
            
            
            
            if(!empty($_POST['type']) || isset($_POST['type'])){

                $type = $_POST['type'];

                if(!empty($_POST['title'])){

                    $title = $_POST['title'];

                    if(in_array($vid_actual_ext,$allowed)){

                        if($vid_error === 0){

                            if($vid_size < 200000000){

                                $vid_name_new = uniqid('',true).".".$vid_actual_ext;

                                $vid_destination = 'videos/'.$vid_name_new;

                                if(move_uploaded_file($vid_tmp,$vid_destination)){

                                    echo "this video is upload successfully";

                                    $query = "insert into courses ( type , title , video ) values ( '".$type."' , '".$title."' , '".$vid_name_new."' )";

                                    $conn->query($query);

                                }else echo "your image not uploaded!";

                            }else echo "error! your size is greatr than 10mb <br>";

                        }else echo "error <br>";

                    }else echo "your file is not include ext of video type ! <br>";

                }else echo "Enter title of video";

            }else echo "Select language";
        }*/

    ?>
</body>
</html>