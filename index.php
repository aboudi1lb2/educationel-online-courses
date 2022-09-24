<?php
require_once 'connect.php';
require_once 'validation.php';


if(isset($_POST['signout'])){
    setcookie('auth' ,'',time() - 10000);
    header('location:signin.php');
}

$name = '';

$query = 'select * from users where email = "'.$_COOKIE['email'].'"';
$result = $conn->query($query);
$row = $result->fetch_array();
$name = $row['name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Ta3allam</title>
    <link rel="stylesheet" href="node_modules/normalize.css/normalize.css"> 
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>  
</head>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js">

</script>
<style>

@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');

    :root{
        --main-color:rgba(0, 0, 0, 0.7);
        --main-background-color:white;
    }

    *{
        font-family: 'rajdhani';
        margin: 0;
        padding:0;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        scroll-behavior: smooth;
        text-decoration: none;
    }


    /* start header style */

    .btn-menu{
        display: none;
        z-index: 999;
        position: absolute;
        left: 20px;
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
        top:28px;
    }

    header{
        z-index: 100;
        position: fixed;
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.4);
        background-color: var(--main-background-color);
        width: 100%;
        display: flex;
        justify-content: center;
        gap:40px;
        align-items: center;
        padding:10px;
    }

    
    header .left-side{
        height: 50px;
        display: flex;
        align-items: center;
    }

    header .left-side i{
        cursor:pointer;
        font-size: 30px;
    }

    header .right-side{
        display: flex;
        align-items: center;
        height: 50px;
        gap: 40px;
    }

    header .right-side a{
        transition: 0.2s;
        font-size: 18px;
        font-weight: 600;
        display: flex;
        color: var(--main-color);
        height: 100%;
        align-items: center;
    }

    header .right-side a:hover{   
        color: black;
    }

    header .right-side button{
        border:1px solid rgba(0,0,0,0.1);
        transition:0.3s;
        color: var(--main-color);
        background:none;
        padding:5px;
    }
    header .right-side button:hover{
        color: black;
        transform:scale(1.1);
    }

    .profile{
        cursor:pointer;
        gap:10px;
        position:absolute;
        height:70px;
        display:flex;
        top:0;
        right:10px;
    }

    .profile .uname{
        color:blue;
        font-weight:500;
        height:100%;
        display:flex;
        align-items:center;
        justify-content:center; 
    }

    .profile i{
        height:100%;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    /* end header style */

    /* start main section style */
    .main{
        height:100vh;
        padding-bottom:50px;
        display: flex;
        gap:70px;
        align-items: center;
        width: 100%;
    }

    .main .image{
        display: flex;
        align-items: center; 
        height: 350px;
        width: 50%;
    }
    .main .image img{ 
        border-radius: 20px;         
        width: 550px;
        height: 350px;
    }

    .main .desc{
        gap: 10px;
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        padding:0px 30px;
        height: 300px;
        width:50%;
    }

    .desc h1{
        width: 100%;
        font-size: 44px;
    }

    .desc p{
        width: 100%;
        font-size: 26px;
        font-weight: 400;
    }

    .desc button{
        padding: 5px 10px;
        border:none;
        height: 50px;
        border-radius: 15px;
        background-color: black;
    }

    .desc button a{
        font-size: 22px;
        color: white;
    }

    /* end main section style */

    /* start courses section style */
    .courses{
        padding: 90px 0;
        background-image: linear-gradient(to bottom right ,rgb(0, 0, 0), rgb(54, 54, 54));
        min-height: 100vh;
        width: 100%;
    }

    .courses .title{
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .courses .title h1{
        font-size: 50px;
        padding-bottom: 20px;
        border-bottom:3px solid white;
        color:white;
        width: fit-content;
    }

    .card{
        border:none;
        background:none;
        padding-top:20px;
        position: relative;
        width: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card .card-container{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card-container .lan{
        box-shadow: 0 0 5px 1px white;
        transition: 0.3s ease-in-out;
        border-radius: 15px;
        z-index: 1;
        width: 200px;
        min-height: 170px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card1 .card-container .lan{
        background-image: linear-gradient(to bottom right , rgb(211, 95, 0) , rgb(207, 121, 0));
    }

    .card2 .card-container .lan{
        background-image: linear-gradient(to bottom right , rgb(0, 207, 35) , rgb(0, 211, 105));
    }

    .card3 .card-container .lan{
        background-image: linear-gradient(to bottom right , rgb(20, 23, 200) , rgb(20, 135, 150)) ;
    }

    .card .card-container .lan:hover{
        transform: scale(1.1);
    }

    .card-container .card-background{
        z-index: 0;
        position: absolute;
        bottom: 0;
        width: 250px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.041);
        height: 120px;
        
    }

    .card-container .lan img{
        width: 80px;
        height: 80px;
    }

    .card-container .desc{
        z-index: 1;
        width: 100%;
        padding: 30px 30px;
    }

    .card-container .desc p{
        width: 100%;
        text-align: center;
        font-size: 18px;
        color:rgba(255, 255, 255, 0.747);
        font-weight: 500;
    }
    /* end courses section style */

    /* style swiper */
    .swiper {
        margin-top: 120px;
        width: 100%;
        height: 100%;
      }

      

      .swiper-slide {
        text-align: center;
        font-size: 18px;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper {
        margin-left: auto;
        margin-right: auto;
      }

      .swiper-button-next,.swiper-button-prev{
            display:none;
        }
    /* end style swiper */
    
    iframe{
        width: 100%;
        height: 100vh;
    }

    /* footer style */
    footer{
        gap:30px;
        padding-top:50px;
        width:100%;
        background-color:white;
        display: flex;
        flex-direction:column;
        align-items:center;
    }

    footer h1{
        font-size:32px;
    }

    footer p{
        text-align:center;
        width:50%;
        font-size:28px;
    }

    footer ul{
        list-style: none;
        display:flex;
        gap:35px;
    }

    footer ul li a{
        color:black;
        font-size:32px;
    }


    footer .footer-copyright{
        padding:10px 5px;
        font-size:17px;
        width:100%;
        background-color:black;
        color:white;
    }
    footer .footer-copyright span{
        color:rgb(0,0,255);
    }
    
    @media (max-width:1200px){
        .main{
            padding: 120px 0;
            display:block;
            height:auto;
        }

        .main .image{
            margin-top:70px;
            height:fit-content;
            width:100%;
            display:flex;
            justify-content: center;
        }

        .main .image img{
            height:auto;
            width:60%;
        }

        .main .desc{
            width: 100%;
        }

        .main .desc button a i{
            font-size: 18px;
        }
        
    }

    @media (max-width:1100px){
        .swiper-button-next,.swiper-button-prev{
            display:flex;
        }

        footer h1{
            font-size:26px;
        }

        footer p{
            text-align:center;
            width:70%;
            font-size:20px;
        }
    }

    @media (max-width:700px){

        .btn-menu{
            display: flex;
            top: 10px;
        }

        header{
            padding: 0;
            display: block;
        }

        header .left-side{
            justify-content: center;
            width: 100%;
        }

        header .right-side{
            padding:0 40px;
            overflow-y:auto;
            height: calc(100vh - 50px);
            display: none;
            margin-top: 50px;
            width: 100%;
            flex-direction: column;
        }

        header .right-side a{
            margin-bottom:10px;
            height: 50px;
            align-items: center;
            border-bottom:1px solid rgba(0, 0, 0, 0.37);
            width: 100%;
        }
        
        .profile{
            height:50px;
        }

        .profile .uname{
            font-size:12px;
        }

        .main .desc{
            padding: 0px 20px;
            height: auto;
        }
        .main .image img{
            height:fit-content;
            width:90%;
        }
        
        .desc h1{
            font-size: 32px;
        }

        .desc p{
            font-size: 20px;
        }

        .desc button{
            width: fit-content;
            font-size: 10px;
        }

        .courses .title h1{
            font-size: 30px;
            padding-bottom: 10px;
            border-bottom:2px solid white;
        }

        footer ul{
            list-style: none;
            display:flex;
            gap:20px;
        }

        footer ul li a{
            font-size:24px;
        }

        footer h1{
            font-size:24px;
        }

        footer p{
            text-align:center;
            width:90%;
            font-size:16px;
        }
    }


</style>

<body>
    <!-- start header -->
    
    <header>
        <div class="btn-menu">
            <div class="line">
                <p class="line1"></p>
                <p class="line2"></p>
                <p class="line3"></p>
            </div>
        </div>

        <a href="profile.php" class="profile">
            <p class="uname"><?php echo $name; ?></p>
            <i class="material-icons">account_circle</i>
        </a>
        <div class="left-side">
            <div class="logo">
                <i class="material-icons">school</i>
            </div>
        </div>
        <div class="right-side">
            <a href="#home">Home</a>
            <a href="#courses">Courses</a>
            <a href="about_us.php">About Us</a>
            <a href="contact_us.php">Contact Us</a>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button type="submit" name="signout">Sign Out</button>
            </form>
        </div>
    </header>
    <!-- end header -->

    <!-- start main section -->
    <sectin class="main" id="home">
        <div class="desc">
            <h1>Learn programming from zero to hero.</h1>
            <p>Master programming now by taking best free courses!.</p>
            <button><a href="#courses">Start your professionel career</a></button>
        </div>
        <div class="image">
            <img src="images/main-image.jpg" alt="Image not found!">
        </div>
    </sectin>
    <!-- end main section -->

    <!-- start courses section -->
    <section class="courses" id="courses">
        <div class="title">
            <h1>Courses</h1>
        </div>

        <!-- start card view card -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <a href="course.php?lan=Frontend&title=Lesson1" class="swiper-slide">
                    <div class="card card1">
                        <div class="card-container">
                            <div class="card-background"></div>
                            <div class="lan">
                                <img src="images/front-end-image.png" alt="">
                            </div>
                            <div class="desc">
                                <p>Front end</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="course.php?lan=Backend&title=Lesson1" class="swiper-slide">
                    <div class="card card2">
                        <div class="card-container">
                            <div class="card-background"></div>
                            <div class="lan">
                                <img src="images/back-end-image.png" alt="">
                            </div>
                            <div class="desc">
                                <p>Back end</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="course.php?lan=Android&title=Lesson1" class="swiper-slide">
                    <div class="card card3">
                        <div class="card-container">
                            <div class="card-background"></div>
                            <div class="lan">
                                <img src="images/android-image.png" alt="">
                            </div>
                            <div class="desc">
                                <p>Android developpment</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- end card view card -->
        
    </section>
    <!-- end courses section -->


    <!-- start footer -->

    <footer class="footer">
        <h1>Ta3allam Online Courses</h1>
        <p>Ta3allam is a website that gives online courses for novice students in the programming world</p>
        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-skype"></i></a></li>
        </ul>
        <div class="footer-copyright">
            Copyright @2022 <span>Ta3allam online courses</span>
        </div>
    </footer>

    <!-- end footer -->
    
      <!-- Swiper JS -->
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  
      <!-- Initialize Swiper -->
      <script>
          //swiper
          var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {               
                1100: {
                    slidesPerView: 3, 
                    loop: false,
                },
                800 :{
                    slidesPerView: 2,
                    loop: true,
                },
                0 :{
                    slidesPerView: 1,
                    loop: true,
                    
                }
            }
            });

            //menu open

            $('.btn-menu').click(function(){
                $('.right-side').slideToggle();
            })

            $('.right-side a').click(function(){
                $('body').innerWidth() <= 700 ? $('.right-side').slideUp() : ''
            });
         
      </script>
    

  <!-- Demo styles -->
</body>



</html>