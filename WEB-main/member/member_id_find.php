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
        .findID h1{
            text-align: left;
            margin-left: 50px;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 25px;
            color: #404040
        }
        .box{
            position: absolute;
            width: 600px;
            height: 550px;
            top: 450px;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 40;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 5px 5px 5px #D0CECE;
        }
        .findID {
            display: inline-block;
            width:600px;
            height:500px;
            padding: 30px, 20px;
            text-align:center;
            border-radius: 15px;
        }
        .box > .findID > .findTable{
            margin-left: 50px;
        }
        .box > .findID > .findTable th{
            width: 100px;
        }
        .box > .findID > .findTable tr{
            height: 80px;
        }
        .box > .findID > .findTable th, td{
            height: 50px;
        }
        .member_name {
            width: 380px;
            border: none;
            outline:none;
            font-size:16px;
            height:35px;
            background: none;
            background-color: #EAEAEA;
            box-shadow: none; 
            font-size: 15px;
            padding: 5px;
        }
        .email {
            width: 380px;
            border: none;
            outline:none;
            font-size:16px;
            height:35px;
            background: none;
            background-color: #EAEAEA;
            box-shadow: none; 
            font-size: 15px;
            padding: 5px;
        }
        button {
            margin-bottom: 40px;
            margin-top: 40px;
            width: 500px;
            height: 60px;
            background-color: #0062F2;
            color: #ffffff;
            border-radius: 10px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.4s;
            display: inline;
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
            <a href="#">MBTI</a>
            <a href="#">마이페이지</a>
            <a href="member_logout.php" class="logout_btn">로그아웃</a>
        <?php
        }?>
            
    </div>
</header>
<body>
<main>
    <div class="main1">
</main>
<div class="box">
        <form class="findID" method="POST">
            <h1> 아이디 찾기 </h1>
            <table class="findTable">
                <tr align="left">
                    <th><span style="color: red">*  </span>이름</th>
                    <td><div><input type="text" class="member_name" name="member_name" id="member_name" placeholder="이름 입력"></div></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>이메일</th>
                    <td><div><input type="text" class="email" name="email" id="email" placeholder="이메일 입력"></div></td>
                </tr>
            </table>   
            <div class="button">
                <button type="submit">아이디 찾기</button>
            </div>
            <div class="bottomText">
                <div>
                    <a href="member_pw_find.php" style="color: #0062F2">비밀번호 찾기</a>
                     | 
                    <a href="mem_login.php" style="color: #0062F2">로그인</a>
                     | 
                    <a href="member_signup.php" style="color: #0062F2">회원가입</a>          
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST['member_name'])){
            $MEMBER_NAME = $_POST['member_name'];
        }
        if(isset($_POST['email'])){
            $EMAIL = $_POST['email'];
        }
        if(isset($_POST['member_name'])&&isset($_POST['email'])){
            $sql1="SELECT * FROM INFO WHERE MEMBER_NAME = '$MEMBER_NAME' AND EMAIL = '$EMAIL'";
            $result=oci_parse($connect, $sql1);
            oci_execute($result);
            $row=oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS);
            $ID = $row['ID'];
            if($MEMBER_NAME == ""){

            }
            else{
                if($row['MEMBER_NAME']==$MEMBER_NAME){
                    echo "<script>alert('회원님의 아이디는 ".$ID."입니다.');history.back();</script>";
                }
                else{
                    echo "<script>alert('존재하지 않는 이름 또는 이메일 입니다.');history.back();</script>";
                }            
            }
            oci_free_statement($result);
            oci_close($connect);
        }
        ?>
    </div>
    <div id="wrap">
    </div>
    <footer></footer>
</body>
</html>