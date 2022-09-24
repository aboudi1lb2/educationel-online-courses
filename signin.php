<?php
require_once 'connect.php';
$error = '';

$email = $password = '';

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email)){

            if(!empty($password)){

                if(filter_var($email,FILTER_VALIDATE_EMAIL)){

                    $query = 'select * from users where email = "'.$email.'"';

                    $result = $conn->query($query);

                    if($result->num_rows === 1){

                        $query = 'select * from users where email = "'.$email.'" and password = "'.$password.'"';

                        $result = $conn->query($query);

                        if($result->num_rows === 1){

                            setcookie('auth','true',time() + 24*60*60);
    
                            setcookie('email',$email,time() + 24*60*60);
    
                            header('location:index.php');

                        }else $error = '<P>Incorrect Password !</P>' ;

                    }else $error = '<p>Incorrect Email !</p>';

                }else $error = '<p>Enter validate Email!</p>';

            }else $error = '<P>Enter Password!</p>';

    }else $error = '<P>Enter Email!</p>';

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
    .main-form{
        width:100%;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    form{
        padding:30px 20px;
        box-shadow:0px 0px 2px 2px rgba(0,0,255,0.2);
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

    .input input:focus{
        border:none;
        box-shadow:0px 0px 2px 0.1px blue;
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

    #checkbox{
        position:relative;
        gap:4px;
        font-size:15px;
        color:black;
        display:flex;
        align-items:center;
        width:100%;
    }

    #checkbox input{
        height:20px;
        width:20px;
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
        width:9rem;
        height:2.8rem;
        background-color:rgb(0,80,255);
        color:white;

    }

    .button #forget{
        background:none;
        border:none;
    }

    .signin{
        color:black;
        width:100%;
        display:flex;
        justify-content:center;
        margin-top:30px;
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
</style>
<body>
   <div class="main-form">
    <form action=<?php echo $_SERVER['PHP_SELF'] ?>  method="post">
        <div class="logo">
            <i class="material-icons">school</i>
        </div>

        <div class="error">
            <?php echo $error; ?>
        </div>

        <div class="input">
            <label for="email" class="place">Email</label>
            <input type="text" id="email" value="<?php echo $email ?>"  name="email">
        </div>
        
        <div class="input">
            <label for="password" class="place">Password</label>
            <input type="password" id="password" value="<?php echo $password ?>" name="password">
        </div> 
        
        <div class="button">
            <button id="submit" name="submit" id="submit" type="submit">Sign In</button>
            <button id="forget" type="submit"><a href="#">Forget password?</a></button>
        </div>
        <div class="signin">Did not have an account ?
            <a href="register.php">
                Create.
            </a>
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