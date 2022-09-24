<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');
    *{
        margin: 0;
        padding:0;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        scroll-behavior: smooth;
        text-decoration: none;
    }
    button{
        cursor:pointer;
    }
    section{
        padding: 30px 0 100px 0;
        width: 100%;
        min-height: 100vh;
    }
    section .title{
        width: 100%;
        display: flex;
        justify-content: center;
        color: rgb(0, 0, 0);
        font-size: 32px;
        font-family: 'rajdhani';
        margin-bottom: 60px;
    }

    section .title h1{
        width: fit-content;
        border-bottom: 2px solid rgba(0, 0, 0, 0.699);
    }
    .side{
        width: 100%; 
        display: grid;
        grid-template-columns: 60% 40%;
    }

    .side .left form{
        width: 100%;
        padding: 0 20px;
        display: flex;
        row-gap: 30px;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    form p{
        width: 100%;
        color: rgb(0, 4, 255);
        font-family: 'rajdhani';
        font-size: 30px;
    }

    form #name,#email{
        width:47%;
    }

    form #address,#description{
        width: 100%;
    }

    #description{
        height: 150px;
    }

    input,textarea{
        font-family: sans-serif;
        font-size: 20px;
        padding: 5px;
        border-radius: 5px;
        border: 2px solid rgba(0, 0, 0, 0.123);
        outline: none;
        height: 50px;
    }

    input:focus,textarea:focus{
        border: none;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 255, 0.267);
    }


    form button{
        border: none;
        border-radius: 5px;
        height: 50px;
        width: 100%;
        background-color: blue;
        color: white;
        font-family: sans-serif;
    }
    .right{
        padding-left:20px;
    }
    .right .info{
        width: 100%;
        display:flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .right .info .part{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 24px;
    }

    .part .tit{
        font-weight: 600;
        margin: 0;
        color: black;
        font-family: 'rajdhani';
        justify-content: left;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .tit i{
        margin: 4px;
        color: blue;
    } 

    .part span{
        font-weight: 500;
        margin-left: 10px;
        font-family: 'rajdhani';
        color: rgba(0, 0, 0, 0.74);
    }
    /* end contact section */

    @media (max-width:1100px){
        .side{
            width: 100%; 
            display: grid;
            grid-template-columns: 100%;
            gap: 50px;
        }
    }

    @media (max-width:1000px){
        .side .left form p{
            font-size: 25px;
        }

    }

    @media (max-width:800px){
        .side .left form #name,#email{
            width: 100%;
        }
        .side .left form p{
            font-size: 20px;
        }
        .right .info .part{
            font-size: 18px;
        }
    }
</style>
<body>
<section class="contact-us" id="contact-us">
        <div class="title">
            <h1>Contact us</h1>
        </div>
        <div class="side">
            <div class="left">
                <form action="contact_us.php" method="post">
                    <p>To contact us , please fill out the following form. Thank you!</p>
                    <input name="name" type="text" placeholder="Full name" id="name">
                    <input type="text" placeholder="Email address" id="email">
                    <input type="text" placeholder="Address" id="address">
                    <textarea name="desc" placeholder="Enter description" id="description" cols="30" rows="10"></textarea>
                    <button name="send" type="submit">Submit</button>
    
                </form>
            </div>
            <div class="right">
                <div class="info">
                    <div class="part">
                        <p class="tit"><i class="material-icons">location_on</i>Location : </p>
                        <span>Lebanon , chamal , danyeh , deirnbouh.</span>
                    </div>
                    <div class="part">
                        <p class="tit"><i class="material-icons">email</i>Email : </p>
                        <span>example@info.com</span>
                    </div>
                    <div class="part">
                        <p class="tit"><i class="material-icons">phone</i>Phone : </p>
                        <span>+961 70261514</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>