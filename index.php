<?php
////////////////////////////
require_once("init.php");
////////////////////////////
?>

<html>
<head>
    <title>Log in with Facebook</title>
    

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body style="font-family: 'Raleway', sans-serif;text-align:center">
    <div class='confirmationClass'>
    <form method="post" action="">
    <h2>ImageWrap</h2>
        <?php
            echo '<a href=' . $loginUrl . '><img src="img\01.png" width="30%"></a>';
        ?>
        </form></div>
    
    <style>
        body{
            background-image: url(img/confirm_account.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .confirmationClass{
            background-color: rgba(74, 74, 74, 0.86);
            padding: 20px;
            margin: 15%;
            color: #fff;
        }
        .btn.btn-info{
            background: #FCAC45;
            border: 0;
            border-radius:0%;
            padding: 10px 40px;
            color: #ffffff;
            text-transform: uppercase;
        }
        .btn.btn-info:hover{
            color: black;
        }
        .btn:active, .btn.active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .btn:focus, 
        .btn:active:focus, 
        .btn.active:focus, 
        .btn.focus, 
        .btn:active.focus, 
        .btn.active.focus {
            outline: thin dotted;
            outline: none;
            outline-offset: none;
        }
        .admin-email-form {
            margin:10px ;
            max-width: 400px;
            padding: 10px;
            font-size: 13px ;
            font-family:'Raleway',sans-serif;
        }

        .admin-email-form input[type=email]{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            border:1px solid #BEBEBE;
            padding: 7px;
            margin-bottom:5px;
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;  
        }

        .admin-email-form input[type=email]:focus,{
            -moz-box-shadow: 0 0 8px #88D5E9;
            -webkit-box-shadow: 0 0 8px #88D5E9;
            box-shadow: 0 0 8px #88D5E9;
            border: 1px solid #88D5E9;
        }

        .admin-email-form .field-long{
            width: 100%;
        }
        img{
            transform: scaleX(1.0);
            transition-duration: 0.2s;
        }
        img:hover{
            transform: scale(1.2);
            transition-duration: 0.2s;
        }
    </style>
    
    
</body>
</html>