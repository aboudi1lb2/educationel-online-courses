<?php
require_once 'connect.php';
require_once 'validation.php';

$query = 'select * from users where email = "'.$_COOKIE['email'].'"';
$result = $conn->query($query);
$row = $result->fetch_array();
$name = $row['name'];
$email = $row['email'];



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Document</title>
</head>
<style>

    @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');
    *{
        font-family: 'rajdhani';
        margin: 0;
        padding:0;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        scroll-behavior: smooth;
        text-decoration: none;
    }


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


    /* details style */
    .details{
        width:100%;
        margin-top:170px;
    }

    .details h1{
        font-size:32px;
        width:100%;
        text-align:center;
    }

    .details p{
        margin-top:15px;
        font-size:24px;
        width:100%;
        text-align:center;
    }

    /* edit style */
    .edit{
        margin-top:30px;
        width:100%;
        display:flex;
        justify-content:center;
    }

    .edit button{
        width:200px;
        height:50px;
        background-color:rgb(0,80,255);
        border:none;
        border-radius:5px;
    }

    .edit button a{
        font-size:18px;
        color:white;
    }

    @media (max-width:700px){

        header{
            height:200px;
        }

        header .profile-img{
            height:200px;
            width:200px;
        }

        .details{
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
    <div class="details">
        <h1><?php echo $name ?></h1>
        <p><?php echo $email ?></p>
        <div class="edit">
            <button><a href="edit.php">Edit Profile</a></button>
        </div>
    </div>
</body>
</html>