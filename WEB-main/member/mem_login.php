<?php
session_start();
include("/dbinfo.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        html, body{
            margin: 0;
            padding: 0;
        }
        body{
            position: relative;
        }
        header{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 75px;
            width: 100%;
            background-color: white;
            display: flex;
            align-items: center;
            z-index: 1;
        }
        header > .logo{
            margin-left: 100px;
            height: 75px;
            display: flex;
            font-size: 25px;
            align-items: center;
        }
        header > .logo > a{
            text-decoration: none;
            color: #0062F2;
            font-weight: bold;
        }
        header > .link{
            margin-left: auto;
            margin-right: 100px;
            height: 75px;
            display: flex;
            align-items: center; 
            justify-content: flex-end;       
        }
        header > .link > a{
            text-decoration: none;
            color: #7F7F7F;
            margin-right: 25px;
        }
        header > .link > a:hover{
            color: #404040;
            font-size: 20px;
        }
        a {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            font-family:sans-serif;
        }
        main{
            margin-bottom: 400px;
        }
        main > .main1{
            position: relative;
            top: 75px;
            width: 100%;
            height: 500px;
            background-color: #F2F6FC;
            border-bottom-right-radius: 800px 60px;
            border-bottom-left-radius: 800px 60px;
        }
        .login_box{
            position: absolute;
            width: 600px;
            top: 350px;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 40;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 5px 5px 5px #D0CECE;
        }
        .loginForm {
            display: inline-block;
            width:600px;
            height:500px;
            padding: 30px, 20px;
            text-align:center;
            border-radius: 15px;
        }
        .loginForm h2{
            text-align: left;
            margin-left: 50px;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 30;
            color: #404040
        }
        .id {
            width: 500px;
            height: 60px;
            border-left-width: 0;
            border-right-width: 0;
            border-top-width: 0;
            border-bottom-width: 1.5px;
            border-color: #eee;
            outline:none;
            font-size:16px;
            height:35px;
            background: none;
            margin-top: 10px;
            margin-bottom: 20px;
            background-color: #ffffff;
        }
        .pw {
            width: 500px;
            height: 60px;
            border-left-width: 0;
            border-right-width: 0;
            border-top-width: 0;
            border-bottom-width: 1.5px;
            border-color: #eee;
            outline:none;
            font-size:16px;
            height:35px;
            background: none;
            margin-top: 20px;
            margin-bottom: 10px;
            background-color: #ffffff;
        }
        button {
            margin-bottom: 40px;
            margin-top: 40px;
            width: 500px;
            height: 60px;
            background-color: #0062F2;
            color: white;
            border-radius: 10px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.4s;
            display: inline;
        }
        button:hover {
            background-color: #0062F2;
            color: white;
        }
        button:active{
            background-color: white;
            color: #0062F2;
        }
        .bottomText {
            text-align: center;
        }
        #wrap{
            height: auto;
            min-height: 100%;
            width: 100%;
            position: relative;
            padding-bottom: 300px;
            background-color: #0062F2;
        }
        footer{
            width: 100%;
            height: 300px;
            bottom: 0px;
            position: absolute;
            background-color: #404040;
        }
    </style>
</head>
<header>
    <div class="logo"><a href="member_main.php">생체전류와 MBTI</a></div>
    <div class="link">
        <a href="member_main.php">Home</a>
        <?php
        if(!isset($id)){?>
            <a href="mem_login.php" class="login_btn" style="color: #404040; font-weight: bold">로그인</a>
            <a href="member_signup.php" class="signup_btn">회원가입</a>
        <?php
        }
        else{?>
            <a href="current_input.php">전류입력 </a>
            <a href="member_mypage.php">마이페이지</a>
            <a href="member_logout.php" class="logout_btn">로그아웃</a>
        <?php
        }?>
            
    </div>
</header>
<body>
<main>
    <div class="main1">
        <div class="login_box">
            <form method="post" action="member_login_check.php" class="loginForm">
                <h2>로그인</h2>
                <div>
                    <input type="text" class="id" name="id" placeholder="아이디 입력">
                </div>
                <div>
                    <input type="password" class="pw" name="pw" placeholder="비밀번호 입력">
                </div>

                <div class="button">
                    <button type="submit">로그인</button>
                </div>
                <div class="bottomText">
                    <div>
                        <a href="member_id_find.php" style="color:#0062F2">아이디 찾기</a>
                        <span style="color: #7F7F7F"> | </span>
                        <a href="member_pw_find.php" style="color: #0062F2">비밀번호 찾기</a> 
                        <span style="color: #7F7F7F"> | </span>
                        <a href="member_signup.php" style="color:#0062F2">회원가입</a>           
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<div id="wrap">
</div>
<footer></footer>
</body>
</html>
