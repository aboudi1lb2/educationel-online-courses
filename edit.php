<?php
require_once 'connect.php';
require_once 'validation.php';
$error = '';
$name = $dob = '';
$query = 'select * from users where email = "'.$_COOKIE['email'].'"';
$result = $conn->query($query);
$row = $result->fetch_array();
$name = $row['name'];
$dob = $row['dob'];


if(isset($_POST['submit'])){

    $name = $_POST['name'];

    $dob = $_POST['date'];

    if(!empty($name)){

        if(!empty($dob)){

            $query = 'update users set name = "'.$name.'" , dob = "'.$dob.'" where email = "'.$_COOKIE['email'].'"';

            $result = $conn->query($query);

            header('location:profile.php');

        }else $error = '<p>Enter Your Dob !</p>';

    }else $error = '<p>Enter New Name !</p>';

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');
    *{
        font-family:'rajdhani';
        padding:0;
        margin:0;
        box-sizing: border-box;
        scroll-behavior:smooth;
    }
    body{
        padding:10px;
    }
    a{
        color:blue;
        text-decoration:none;
    }
    a:hover{
        text-decoration:underline;
    }

    /* header style */
    header{
        position:relative;
        width:100%;
        height:250px;
        background-color:rgba(0,0,0,0.05)
    }

    header .profile-img{
        height:300px;
        width:300px;
        position:absolute;
        top:100%;
        left:50%;
        transform:translate(-50%,-50%);
    }

    header .profile-img img{
        border-radius:50%;
        width:100%;
        height:100%;
    }

    /* form style */
    .main-form{
        margin-top:170px;
        width:100%;
        /* height:100vh; */
        display:flex;
        justify-content:center;
        align-items:center;
    }
    form{
        padding:30px 20px;
        display:flex;
        flex-wrap:wrap;
        gap:20px;
        max-width:500px;
    }

    form .logo{
        width:100%;
        text-align:center;
    }

    form .logo i{
        color:rgb(0,120,255);
        font-size:80px;
    }

    .input{
        position:relative;
        width:100%;
    }

    .input input{
        position:relative;
        font-weight:500;
        padding:25px 10px;
        font-size:18px;
        border:none;
        border-bottom:1px solid rgba(0,0,0,0.1);
        outline:none;
        height:40px;
        width:100%;
    }

    #date{
        width:40%;
        height:40px;
        padding-left:10px;
    }

    .place{
        z-index:1000;
        padding:0 2px;
        background-color:white;
        transition:0.1s ease-in-out;
        font-size:18px;
        /* z-index:1000; */
        left:10px;
        top:8px;
        position:absolute;
    }

    .place.active{
        color:blue;
        font-size:13px;
        top:0;
        left:10px;
        transform: translateY(-50%);
    }

    .button{
        width:100%;
        display:flex;
        justify-content:space-between;
    }

    .button #submit{
        font-size:18px;
        border:none;
        border-radius:5px;
        width:fit-content;
        padding:10px 20px;
        height:2.8rem;
        background-color:rgb(0,80,255);
        color:white;

    }
    
    .error{
        border-radius:4px;
        width:100%;
        background-color: #EF5350;
    }

    .error p{
        text-align:center;
        color:white;
        font-size:19px;
        font-weight:500;
        width:100%;
        padding:10px
    }

    @media (max-width:700px){
        header{
            height:200px;
        }

        header .profile-img{
            height:200px;
            width:200px;
        }

        .main-form{
            margin-top:120px;
        }
    }

    @media (max-width:400px){
        header{
            height:150px;
        }
        header .profile-img{
            height:150px;
            width:150px;
        }
    }
</style>
<body>

    <header>
        <div class="profile-img">
            <img src="images/profile.png">
        </div>
    </header>


   <div class="main-form">
    <form action=<?php echo $_SERVER['PHP_SELF'] ?>  method="post">
        <div class="input">
            <label for="name" class="place">Full Name</label>
            <input type="text" id="name" value="<?php echo $name ?>" name="name">
        </div>

        <input type="date" id="date" value="<?php echo $dob ?>" name="date">
        <div class="button">
            <button id="submit" name="submit" id="submit" type="submit">Save Changes</button>
        </div>

        <div class="error">
            <?php echo $error; ?>
        </div>
    </form> 
   </div>
</body>
<script>
    $(document).ready(function(){

        // place holder manuely 
        $('.input input').each(function(){
            if($(this).val() != ''){
                $(this).siblings('.place').addClass('active');
            }
        })

        $('.input input').focusin(function () {
            $(this).siblings('.place').addClass('active');
        });

        $('.input input').focusout(function () {
            if($(this).val() == ''){
                $(this).siblings('.place').removeClass('active');
            }
        });                      
    });
</script>
</html>