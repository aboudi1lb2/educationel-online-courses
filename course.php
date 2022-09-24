<?php
require_once 'connect.php';
require_once 'validation.php';


//check if the lesson set or not
if(isset($_GET['lan']) && isset($_GET['title'])){
    $qu = "select * from courses where type = '".$_GET['lan']."' and title = '".$_GET['title']."'";

    $res = $conn->query($qu);

    if($res->num_rows === 0){
        die("No data found!");
    }
}
else{
    header('Location:index.php');
    die();
}
    //function lesson
    function lesson($lan , $title){
        echo "<a href='course.php?lan=".$lan."&title=".$title."'>
                    <div class=\"lesson-part\" >
                        <p>".$title."</p>
                        <i class=\"fas fa-angle-right\"></i>
                    </div>
                </a>";
    }

    //funciton read video
    function video($title , $video){

        echo "<p class=\"title\">".$title."</p>";
        echo '<iframe src="'.$video.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

    }

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Document</title>
</head>



<style>
@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');
    *{
        font-family:'rajdhani';
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
        text-decoration: none;
    }

    body{
        overflow-x:hidden;
        display: grid;
        grid-template-columns: 30% 70%;
        background-color:white;
    }

    i{
        cursor:pointer;
    }
    /* end header style */

    /* start section style */
    menu{
        border-right:2px solid black;
        background-color:white;
        z-index: 999;
        height: 100vh;
        overflow-x: hidden;
        overflow-y: auto;
        transition: 0.3s;
        padding: 20px 0px;
    }
    
    
    menu.menu-open{
            left:0;
    }

    .btn-menu{
        display: none;
        z-index: 999;
        position: absolute;
        right: 20px;
        top: 20px;
        height: 30px;
        width: 30px;       
    }

    .btn-menu .line{
        width: 100%;
        height: 100%;
        position: relative;
    }

    .btn-menu .line p{
        position: absolute;
        height: 2px;
        width:100%;
        background-color: black;
    }

    .line .line1{
        top: 0;
    }

    .line2{
        top: 50%;
        transform: translateY(-50%);
    }

    .line3{
        bottom: 0;
    }


    .lesson{
        width: 100%;
        display: block;
    }

    .lesson a{
        color: black;
    }

    .lesson-part{
        border-bottom:2px solid rgba(0, 0, 0, 0.17);
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .active{
        background-color:rgba(0,0,0,0.09);
    }

    .lesson-part:hover{
        background-color: rgba(0, 0, 0, 0.04);
    }

    .lesson-part p {       
        font-size: 26px;
    }

    .lesson-par i{
        font-size: 16px;
    }

    .video-box{
        padding-bottom:50px;
        width:100%;
        display: flex;
    }
    .video-box .video{
        position:relative;
        justify-content: center;
        display: flex;
        flex-wrap:wrap;
        width: 100%;
    }

    .video-box .video .title{
        height: fit-content;
        padding: 30px 15px;
        color:rgba(220,0,0,0.8);
        font-size: 40px;
        width: 100%;
        text-align: center;
    }

    .video-box .video iframe{
        width:90%;
        background-color:red;
    }


    @media (max-width:900px){
        body{
            display:flex;
        }

        .btn-menu{
            display:flex;
        }

        menu{           
            width:40%;
            position:absolute;
            left:-100%;

        }

        menu.active{
            background-color:white;
            border-right:2px solid black;
            left:0;
        }

        section{
            padding-top:30px;
            width:100%;
        }

        .video .title{
            padding:10px 5px;
            font-size:24px;
        }

        .lesson-part p{
            font-size:22px;
        }
    }


</style>

<body>
        <div class="btn-menu">
            <div class="line">
                <p class="line1"></p>
                <p class="line2"></p>
                <p class="line3"></p>
            </div>
        </div>

    <!-- lesson name  -->
    <menu>
        <div class="lesson">
            <?php
            
                if(isset($_GET['lan']) && $_GET['lan'] != null){

                    $query  ="select * from courses where type = '".$_GET['lan']."'";
                     
                    $result = $conn->query($query);

                    if($result->num_rows > 0){

                        
                        while($row = $result->fetch_array()){   
                            lesson($_GET['lan'] , $row['title']);
                        }

                    }

                }
            
            ?>
        </div>
    </menu>

    <!-- video of lesson -->
    <section class="video-box">
            <div class="video">
                <?php
                    if(isset($_GET['title']) && $_GET['title'] != null && isset($_GET['lan']) && $_GET['lan'] != null){

                        $get_video = "select * from courses where type = '".$_GET['lan']."' and title = '".$_GET['title']."'";

                        $res = $conn->query($get_video);

                        if($res->num_rows === 1){

                            $row = $res->fetch_array();

                            $video = $row['video'];

                            video($row['title'] , $row['video']);

                        }

                    }
                ?>
            </div>
    </section>

</body>
</html>

<script>

    

    $(document).ready(function(){
        
        //lesson select         
        let pgurl = window.location.href.substr(window.location.href
        .lastIndexOf("/")+1).split("%20").join("");
        $(".lesson a").each(function(){
        if($(this).attr("href").split(" ").join("") === pgurl)
            $(this).children('div').addClass('active');
        });

        //height iframe
        let videoWidth = $('iframe').innerWidth();
        $('iframe').css('height',0.5625*videoWidth+"px")
        
        //open menu and comment
        $('.btn-menu').click(function(){
            $('menu').toggleClass('active');
        });

    });

         
</script>



