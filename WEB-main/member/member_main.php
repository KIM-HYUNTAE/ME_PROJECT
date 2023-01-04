<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();
    include("/dbinfo.php");


    if(!isset($_SESSION['ID'])){

    }
    else
    {
        $id = $_SESSION['ID'];
        $pw = $_SESSION['PW'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        html, body{
            margin: 0;
            padding: 0;
        }
        body{
            position: relative;
            background-color: #fff;
            overflow-x: hidden;
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
            align-items: center;
        }
        header > .logo > a{
        }
        header > .link{
            width: 500px;
            margin-left: auto;
            margin-right: 100px;
            height: 75px;
            display: flex;
            align-items: center;   
            justify-content: flex-end;       
        }
        header > .link > a{
            text-align: right;
            text-decoration: none;
            color: #7F7F7F;
            margin-right: 5%;
        }
        .dropbtn {
            color: #404040;
            padding: 5px;
            font-size: 15px;
            border: none;
            cursor: pointer;
            width: 30px;
            background-color: #fff;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }
        .dropdown-content a {
            color: #404040;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {background-color: #f1f1f1}
        .show {
            display:block;
        }
        .nav{
            position: fixed;
            height: 100%;
            width: 150px;
            left: 0;
            display: inline-block;
        }
        .nav > .nav_menu{
            margin-top: 100px;
            margin-left: 5%;
            z-index: 1;   
        }
        .nav > .nav_menu > a{
            width: 100px;
            text-align: left;
            text-decoration: none;
            font-size: 18px;
            color: #404040;
            display: block;
            padding: 10px;
        }
        .main1{
            width: 100%;
            height: 580px;
            background-color: #F1F2F5;
        }
        .main1 > .title{
            display: inline-block;
            width: 100%;
            margin-left: 15%;
            margin-top: 150px;
            margin-right: 100px;
            position: relative;
            font-size: 20px;
            color: black;
        } 
        .underline{
            display: inline;
            box-shadow: inset 0 -15px 0 #a2d2ff;
        } 
        .main1 > .title p{
            line-height: 20px;
        } 
        .main1 > .contents{
            width: 100%;
            margin-left: 15%;
            margin-top: 150px;
            margin-right: 100px;
            position: relative;
            font-size: 20px;
            color: black;
        } 
        .main1 > .contents > .content1{
            float: left; 
            width: 23%; 
            height: 200px; 
            display: inline-block;
            padding: 1%;
            border-radius: 20px;
            background-color: #333333;
        }
        .main1 > .contents > .content2{
            float: left; 
            width: 23%; 
            height: 200px; 
            display: inline-block;
            padding: 1%;
            border-radius: 20px;
            background-color: #333333;
            margin-left: 2%;
        }
        .main1 > .contents > .content3{
            float: left; 
            width: 23%; 
            height: 200px; 
            display: inline-block;
            padding: 1%;
            border-radius: 20px;
            background-color: #333333;
            margin-left: 2%;
        }
        .main1 > .contents > .content1 > .sub_title_num1,
        .main1 > .contents > .content2 > .sub_title_num2,
        .main1 > .contents > .content3 > .sub_title_num3{
            position: relative;
            margin-top: 20px;
            margin-left: 20px;
            color: #1C77C3;
            font-size: 18px;
            font-weight: bold;
        }
        .main1 > .contents > .content1 > .sub_title,
        .main1 > .contents > .content2 > .sub_title,
        .main1 > .contents > .content3 > .sub_title{
            position: relative;
            margin-top: 5px;
            margin-left: 20px;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .main1 > .contents > .content1 > p,
        .main1 > .contents > .content2 > p,
        .main1 > .contents > .content3 > p{
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
            color: #fff;
            font-size: 15px;
            font-weight: lighter;
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
        <div class="logo"><a href="member_main.php" style="text-decoration: none;color: #0062F2; font-weight: bold; font-size: 27px; letter-spacing: 2px">ME </a><a href="member_main.php" style="text-decoration: none; color: #404040; font-size: 15; margin-top: 10px; font-weight: bold; margin-left: 10px"> MBTI WITH ELECTRIC </a></div>
        <div class="link">
            <?php
            if(!isset($id)){?>
                <a href="mem_login.php" class="logout_btn">로그인</a>
            <?php
            }
            
            else{?>
            <script>
                function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getEleentsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>
            <div class="dropdown">
                <div style="color: #404040"><?=$id?>
                    <button onclick="myFunction()" class="dropbtn">▼</button>
               </div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="member_logout.php" class="logout_btn">로그아웃</a>
                    <a href="member_info_edit.php">정보 수정</a>
                </div>
            </div>                   
            <?php
            }?>
            
        </div>
    </header>
    <div class="nav">
        <div class="nav_menu">
            <?php
            if(!isset($id)){?>

            <?php
            }
            else{?>
                <a href="member_main.php" style="border-right: solid 8px #0062F2">메인</a>
                <a href="current_input.php">전류입력 </a>
                <a href="member_mypage.php">마이페이지</a>
            <?php
            }?>
        </div>
    </div>
    <div class="main1">
        <div class="title">
            <span style="font-size: 20px; font-weight: bold; color: #0062F2; margin-right: 10px">Project Goal</span>
            <p>인체 피부의 표면에 흐르는 생체 전류 에너지를 측정하여 8체질을 분석하고 성격유형을 제시합니다.</p>
            <p>객관적인 데이터를 통해 <span class="underline">신뢰성 있는</span> 성격 유형 결과를 제공합니다.</p>
            <p>전류 데이터를 입력하고 성격유형을 확인하세요.</p>
        </div>
        <div class="contents">
            <div class="content1">
                <div class="sub_title_num1">function 1</div>
                <div class="sub_title">전류 데이터 입력/수정/삭제</div>
                <p>측정한 생체 전류 데이터를 관리</p>
            </div>
            <div class="content2">
                <div class="sub_title_num2">function 2</div>
                <div class="sub_title">내 데이터 그래프로 한 눈에 보기</div>
                <p>1개월, 3개월, 6개월 데이터 평균 패턴 그래프로 확인 가능</p>
            </div>
            <div class="content3">
                <div class="sub_title_num3">function 3</div>
                <div class="sub_title">나의 객관적 MBTI 예측값 확인</div>
                <p>나의 MBTI와 예측 결과의 일치율 제공</p>
            </div>  
        </div>
    </div>
    <div style="height: 500px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
</body>
</html>
