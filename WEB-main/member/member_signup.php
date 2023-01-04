<?php
    session_start();
    include("/dbinfo.php");


    $id_array = [];

    $sql1="SELECT ID FROM INFO";
    $sql2="SELECT ID FROM INFO_BACKUP";

    $id_info=oci_parse($connect, $sql1);
    oci_execute($id_info); 
    $info_row_num=oci_fetch_all($id_info, $id_info_row);
    for($i=0; $i<$info_row_num; $i++){
        $id_array[] = $id_info_row['ID'][$i];
    }

    $id_infoBackUp=oci_parse($connect, $sql2);
    oci_execute($id_infoBackUp); 
    $infoBackUp_row_num=oci_fetch_all($id_infoBackUp, $id_infoBackUp_row);
    for($i=0; $i<$infoBackUp_row_num; $i++){
        $id_array[] = $id_infoBackUp_row['ID'][$i];
    }

    $email_array = [];

    $sql3="SELECT EMAIL FROM INFO";
    $sql4="SELECT EMAIL FROM INFO_BACKUP";

    $email_info=oci_parse($connect, $sql3);
    oci_execute($email_info); 
    $info_row_num=oci_fetch_all($email_info, $email_info_row);
    for($i=0; $i<$info_row_num; $i++){
        $email_array[] = $email_info_row['EMAIL'][$i];
    }

    $email_infoBackUp=oci_parse($connect, $sql4);
    oci_execute($email_infoBackUp); 
    $infoBackUp_row_num=oci_fetch_all($email_infoBackUp, $email_infoBackUp_row);
    for($i=0; $i<$infoBackUp_row_num; $i++){
        $email_array[] = $email_infoBackUp_row['EMAIL'][$i];
    }

    oci_free_statement($id_info);
    oci_free_statement($id_infoBackUp);
    oci_free_statement($email_info);
    oci_free_statement($email_infoBackUp);
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
            background-color: #F1F2F5;
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
            color: #7F7F7F;
            font-size: 20px;
        }
        a {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            font-family:sans-serif;
        }
        .signup_box{
            position: relative;
            width: 800px;
            height: 1300px;
            margin-top: 150px;
            left: 50%;
            transform: translate(-50%);
            text-align: center;
            font-size: 40;
            background-color: #FFFFFF;
            border-radius: 10px;
            display: block;
            padding-left: 15px;
            padding-right: 15px;
            box-shadow: 5px 5px 5px #D0CECE;
            margin-bottom: 300px;
        }
        .signup_box > .title{
            position: relative;
            text-align: left;
            margin-left: 30px;
            height: 40px;
            display: block;
            padding: 10px;
            padding-top: 50px;
            margin-top: 150px;
            font-size: 30px;
            font-weight: bold;
            color: #404040
        }
        .signupForm {
            display: inline-block;
            width: 1000px;
            height: 1300px;
            padding: 30px;
            color: #404040;
            font-size: 15px;
        }
        th{
            padding-left: 15px;
            width: 150px;
        }
        td{
            width: 400px;
        }
        tr{
            height: 70px;
        }
        input{
            width: 500px;
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
        .IDcheck, .Emailcheck{
            width: 130px;
            background-color: #DBE9F9;
            border-radius: 10px;
        }
        .sex{
            width: 60px;
            height: 20px;
        }
        .signup_btn2 {
            margin-top: 20px;
            margin-right: 250px;
            width: 525px;
            height: 60px;
            color: white;
            background-color: #0062F2;
            background-size: 200%;
            border-radius: 10px;
            font-weight: bold;
            border:none;
            cursor:pointer;
            transition: 0.4s;
            display:inline;
        }
        .signup_btn2:hover {
            background-color: #0062F2;
            color: white;
        }
        .signup_btn2:active{
            background-color: white;
            color: #0062F2;
        }
        #wrap{
            height: auto;
            min-height: 100%;
            width: 100%;
            position: relative;
            padding-bottom: 300px;
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
<body>
<header>
    <div class="logo"><a href="member_main.php">생체전류와 MBTI</a></div>
    <div class="link">
        <a href="member_main.php">Home</a>
        <?php
        if(!isset($id)){?>
            <a href="mem_login.php" class="login_btn">로그인</a>
            <a href="member_signup.php" class="signup_btn" style="color: #404040; font-weight: bold">회원가입</a>
        <?php
        }
        else{?>
            <a href="current_input.php">전류입력 </a>
            <a href="#">마이페이지</a>
            <a href="member_logout.php" class="logout_btn">로그아웃</a>
        <?php
        }?>
            
    </div>
</header>
<main>
    <div class="signup_box">
        <div class="title"> 회원가입 </div>
        <form method="post" action="member_signup_check.php" class="signupForm">
            <table class="signupTable">
                <tr align="left">
                    <th><span style="color: red">*  </span>이름</th>
                    <td><input type="text" class="member_name" name="member_name" id="member_name" placeholder="이름" required></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>아이디</th>
                    <td><input type="text" class="id" id="id" name="id" placeholder="아이디" required></td>
                </tr>
                <tr style="height: 10px">
                    <th></th>
                    <td style="text-align: left"><span id="id-alert-success" style="display: none; color: #0062F2">사용 가능한 아이디 입니다.</span>
                    <span id="id-alert-danger" style="display: none; color: #d92742; font-weight: bold">이미 사용중인 아이디 입니다.</span>
                    </td>
                </tr>
                <script src="http://code.jquery.com/jquery-latest.min.js"></script>
                <tr align="left">
                    <th><span style="color: red">*  </span>비밀번호</th>
                    <td><input type="password" class="pw" id="pw" name="pw" placeholder="비밀번호" required></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>비밀번호 확인</th>
                    <td><input type="password" class="pw" id="pw2" placeholder="비밀번호 확인" required></td>
                </tr>
                <tr style="height: 10px">
                    <th></th>
                    <td style="text-align: left"><span id="alert-success" style="display: none; color: #0062F2">비밀번호가 일치합니다.</span>
                    <span id="alert-danger" style="display: none; color: #d92742; font-weight: bold; ">비밀번호가 일치하지 않습니다.</span><td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>생년월일</th>
                    <td><input type="text" class="age" id="age" name="age" placeholder="생년월일" required></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>전화번호</th>
                    <td><input type="text" class="phone" id="phone" name="phone" placeholder="전화번호" required></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>이메일</th>
                    <td><span><input type="text" class="email" id="email" name="email_id" placeholder="이메일" required>
                    </td>
                </tr>
                <tr style="height: 10px">
                    <th></th>
                    <td style="text-align: left"><span id="email-alert-success" style="display: none; color: #0062F2">사용 가능한 이메일 입니다.</span>
                    <span id="email-alert-danger" style="display: none; color: #d92742; font-weight: bold">이미 사용중인 이메일 입니다.</span>
                    <span id="email-alert-danger2" style="display: none; color: #d92742; font-weight: bold">잘못된 이메일 형식 입니다.</span>
                    </td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>성별</th>
                    <td style="margin-top: 20px; display: flex; align-items: center">
                        <input type="radio" class="sex" name="sex" id="sex" value="male" required>남성
                        <input type="radio" class="sex" name="sex" id="sex" value="female" style="margin-left: 30px;">여성
                    </td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>E-I</th>
                    <td style="text-align: center; padding-bottom: 20px">E <input type="range" min="0" max="100" value="50" class="slider" NAME="E" id="MBTI_EI" onkeyup='printNum_EI()' style="width: 450px" required> I<div id="input_MBTI_EI"></div></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>N-S</th>
                    <td style="text-align: center; padding-bottom: 20px">N <input type="range" min="0" max="100" value="50" class="slider" NAME="N" id="MBTI_NS" onkeyup='printNum_NS()' style="width: 450px" required> S<div id="input_MBTI_NS"></div></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>F-T</th>
                    <td style="text-align: center; padding-bottom: 20px">F <input type="range" min="0" max="100" value="50" class="slider" NAME="F" id="MBTI_FT" onkeyup='printNum_FT()' style="width: 450px" required> T<div id="input_MBTI_FT"></div></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>J-P</th>
                    <td style="text-align: center; padding-bottom: 20px">J <input type="range" min="0" max="100" value="50" class="slider" NAME="J" id="MBTI_JP" onkeyup='printNum_JP()' style="width: 450px" required> P<div id="input_MBTI_JP"></div></td>
                </tr>
            </table>
            <div class="button">
                <button type="submit" class="signup_btn2">회원가입</button>
            </div>
        </form>
    </div>
    </div>
</main>
<div style="height: 50px"></div>
<div id="wrap">
</div>
<footer></footer>
<script>
        const MBTI_EI_num = document.getElementById('MBTI_EI').value;
        const MBTI_NS_num = document.getElementById('MBTI_NS').value;
        const MBTI_FT_num = document.getElementById('MBTI_FT').value;
        const MBTI_JP_num = document.getElementById('MBTI_JP').value;
        document.getElementById("input_MBTI_JP").innerText = MBTI_JP_num;
        document.getElementById("input_MBTI_FT").innerText = MBTI_FT_num;
        document.getElementById("input_MBTI_NS").innerText = MBTI_NS_num;
        document.getElementById("input_MBTI_EI").innerText = MBTI_EI_num;
        MBTI_EI.oninput = function printNum_EI()  {
            const MBTI_EI_num = document.getElementById('MBTI_EI').value;
            document.getElementById("input_MBTI_EI").innerText = MBTI_EI_num;
        }
        MBTI_NS.oninput = function printNum_NS()  {
            const MBTI_NS_num = document.getElementById('MBTI_NS').value;
            document.getElementById("input_MBTI_NS").innerText = MBTI_NS_num;
        }
        MBTI_FT.oninput = function printNum_FT()  {
            const MBTI_FT_num = document.getElementById('MBTI_FT').value;
            document.getElementById("input_MBTI_FT").innerText = MBTI_FT_num;
        }
        MBTI_JP.oninput = function printNum_JP()  {
            const MBTI_JP_num = document.getElementById('MBTI_JP').value;
            document.getElementById("input_MBTI_JP").innerText = MBTI_JP_num;
        }

        $('.id').focusout(function(){   
            var id = $('#id').val();
            const id_array = <?=json_encode($id_array)?>;
            if(id_array.includes(id)){
                $("#id-alert-danger").css('display', 'inline-block'); 
                $("#id-alert-success").css('display', 'none');
            }
            else{
                $("#id-alert-success").css('display', 'inline-block');
                $("#id-alert-danger").css('display', 'none');
            }
        });
        $('.pw').focusout(function(){
            var pwd1 = $('#pw').val();
            var pwd2 = $('#pw2').val();

            if(pwd1 != '' && pwd2 == ''){
                null;
            } 
            else if(pwd1 != "" || pwd2 != "") {
                if(pwd1 == pwd2){
                    $("#alert-success").css('display', 'inline-block');
                    $("#alert-danger").css('display', 'none');
                } 
                else{
                    $("#alert-success").css('display', 'none');
                    $("#alert-danger").css('display', 'inline-block');
                }
            }
        });
        $('.email').focusout(function(){
            var email = $('#email').val();
            const email_array = <?=json_encode($email_array)?>;
            if(email_array.includes(email)){
                if(email.includes('@')){
                    $("#email-alert-danger").css('display', 'inline-block'); 
                    $("#email-alert-success").css('display', 'none');
                    $("#email-alert-danger2").css('display', 'none');
                }
                else{
                    $("#email-alert-success").css('display', 'none');
                    $("#email-alert-danger").css('display', 'none');
                    $("#email-alert-danger2").css('display', 'inline-bock');
                }
            }
            else{
                if(email.includes('@')){
                    $("#email-alert-success").css('display', 'inline-block');
                    $("#email-alert-danger").css('display', 'none');
                    $("#email-alert-danger2").css('display', 'none');
                }
                else{
                    $("#email-alert-success").css('display', 'none');
                    $("#email-alert-danger").css('display', 'none');
                    $("#email-alert-danger2").css('display', 'inline-bock');
                }
            }
        });
    </script>
</body>
</html>
