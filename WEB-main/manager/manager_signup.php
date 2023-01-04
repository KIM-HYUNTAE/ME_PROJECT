<?php
session_start();
include("/dbinfo.php");


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        * {
            text-decoration: none;
            font-family:sans-serif;
        }
        .signup_box{
            margin-top: 80px;
            text-align: center;
            font-size: 40;
        }
        .signupForm {
            display: inline-block;
            width: 500px;
            height:350px;
            padding: 30px;
            background-color:#FFFFFF;
            border-radius: 15px;
            color: #545454;
            background-color: #F5F5F5;
        }
        .nameForm{
            margin-top: 30px;
            align: left;
        }
        .idForm{
            align: left;
        }
        .pwForm{
            align: left;
        }
        .id {
            width: 200px;
            border: none;
            outline: none;
            color: #636e72;
            font-size:16px;
            height:40px;
            background: none;
            margin-left: 10px;
            margin-right: 10px;
            margin-bottom: 20px;
            padding: 10px 10px;
            background-color: #ffffff;
            border-radius: 5px;
        }
        .pw {
            width: 300px;
            border:none;
            outline:none;
            color: #636e72;
            font-size:16px;
            height:40px;
            background: none;
            margin-left: 10px;
            margin-right: 50px;
            margin-bottom: 10px;
            padding: 10px 10px;
            background-color: #ffffff;
            border-radius: 5px;
        }
        button {
            left: 43%;
            margin-bottom: 50px;
            margin-top: 30px;
            width:85%;
            height:60px;
            background-color: #787878;
            background-position: left;
            background-size: 200%;
            border-radius: 20px;
            font-weight: bold;
            border:none;
            cursor:pointer;
            transition: 0.4s;
            display:inline;
        }
        button:hover {
            background-position: right;
        }
    </style>
</head>
<body>

    <div class="signup_box">
        <h1> 회원가입 </h1>
        <form method="post" action="manager_signup_check.php" class="signupForm" onsubmit="return check()">
            <div>
                <span class="idForm">아이디<input type="text" class="id" id="id" name="id" placeholder="아이디" required></span>
            </div>
            <p id="id_check"></p>
            <div><span class="pwForm">비밀번호<input type="text" class="pw" id="pw" name="pw" placeholder="비밀번호"></span></div>
            <div><span class="pwForm"><input type="text" class="pw" id="pwcheck" placeholder="비밀번호 확인"></span></div>
            <div class="button">
                <button type="submit">회원가입</button>
            </div>
        </form>
    </div>
</body>
</html>
