<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();
    //oracle data base address
    //enter HOST & PORT
    include("/dbinfo.php");


    if(!isset($_SESSION['ID'])){
        echo "<script>alert('로그인 후 이용하세요.');location.replace('mem_login.php');</script>";
    }
    else
    {
        $id = $_SESSION['ID'];
        $pw = $_SESSION['PW'];
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <style>
        @keyframes flash { 0%, 20%, 40%, to { opacity: 1; } 30%, 30% { opacity: 0; } }
        html, body{
            margin: 0;
            padding: 0;
            overflow-x: hidden;
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
            z-index: 2;
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
            margin-right: 25px;
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
        .show {display:block;}
        .nav{
            position: fixed;
            height: 100%;
            width: 150px;
            left: 0;
        }
        .nav_menu{
            margin-top: 100px;
            margin-left: 5%;
            z-index: 1;   
        }
        .nav_menu > a{
            width: 100px;
            text-align: left;
            text-decoration: none;
            font-size: 18px;
            color: #404040;
            display: block;
            padding: 10px;
        }
        .current_input{
            margin-top: 120px;
            position: relative;
            height: 650px;
            width: 100%;
            margin-right: 100px;
        }
        .current_input > .Input{  
            height: 710px;
            position: relative;
            align-items: center;
            width: 70%;
            padding: 10px;
            border-radius: 30px;
            background-color: #fff;
            float: left;
        }
        .current_input > .Input > .Input_con{
            font-size: 25px;
            font-weight: bold;
            height: 25px;
            margin-top: 25px;
            color: #404040;  
            margin-left: 4%;  
        }
        .current_input > .Input >  .InputData_canvans_left{
            position: relative;
            float: left;
            width: 45%;  
            height: 200px;   
            margin-left: 4%;  
            margin-top: 5px;
            display: inline-block;
        }
        .current_input > .Input > .InputData_canvans_right{
            position: relative;
            float: left;
            width: 45%;   
            height: 200px; 
            margin-left: 2%;  
            margin-top: 5px;
            display: inline-block;
        }
        .current_input > .Input > .InputData input{
            background-color: #eee;
            height: 30px;
            border: none;
        }
        .Input select{
            width: 100%;
            height: 30px;
        }
        .current_input > .Input > .InputData{
            font-size: 17px;
            color: #404040;
        }
        .Input1
        {
            border: none;
            text-align: center;
            margin-bottom: 5px;
            border: none;
            width: 100%;
            margin-left: 0px;
            display: inline-block;
            height: 65px;
        }
        .Input2
        {
            border: none;
            text-align: center;
            margin-bottom: 5px;
            border: none;
            width: 100%;
            margin-left: 0px;
            display: inline-block;
            height: 65px;
        }
        .Input3
        {
            border: none;
            text-align: center;
            margin-bottom: 5px;
            border: none;
            width: 100%;
            margin-left: 0px;
            display: block;
            height: 65px;
        }
        .Input4
        {
            text-align: center;
            margin-bottom: 5px;
            border: none;
            width: 100%;
            margin-left: 0px;
            display: inline-block;
            height: 65px;
        }
        .Input5
        {
            border: none;
            text-align: center;
            margin-bottom: 5px;
            border: none;
            margin-left: 0px;
            display: block;
            height: 65px;
        }
        .Input1 table
        {
            width: 100%;
        }
        .Input1 th,
        .Input1 td
        {
        }
        .Input2 table
        {
            width: 100%;
        }
        .Input3 table
        {
            width: 100%;
        }
        .Input4 table
        {
            width: 100%;
        }
        .Input5 table
        {
            width: 100%;
        }
        .Input > .InputData > .tables input{
            width: 95%;
        }
        .InputTable1 td,
        .InputTable2 td,
        .InputTable3 td,
        .InputTable4 td,
        .InputTable5 td{
            vertical-align: bottom;
        }
        .Input > .InputData > .tables th{
            vertical-align: bottom;
        }
        .Input > .InputData > .tables{
            border: none;
            text-align: center;
            margin-bottom: 5px;
            border: none;
            height: 350px;
            width: 95%;
            margin-top: 10px;
            margin-left: 2%;
            margin-right: 8%;
            display: inline-block;
        }
        .Input > .InputData > .inputBtn{
            margin-top: 10px;
            position: relative;
            display: flex;
            justify-content : center;
            height: 45px;
        }
        .Input > .InputData > .inputBtn > .inputDataBtn{
            text-align: center;
            background-color: #0062F2;
            color: #ffffff;
            width: 15%;
            height: 45px;
            font-size: 20px;
            border-radius: 25px;
            border: none;
        }
        .current_input > .imgs{
            position: relative;
            height: 650px;
            width: 25%;
            float: right;
            text-align: center;
        }
        .dot{
            font-size: 7px;
            position: absolute;
            z-index: 1;
            color: red;
            text-shadow: 0 0.1em, 0 0 1em;
            animation: flash 2s infinite;
            top: 75px;
            left: 198px;
        }
        .imgs > .hand{
            background-color: #fff;
            margin-bottom: 30px;
            border-radius: 30px;
            padding: 20px;
            width: 100%;
            height: 300px;
        }
        .imgs > .body{
            background-color: #fff;
            margin-bottom: 30px;
            border-radius: 30px;
            padding: 20px;
            width: 100%;
            height: 320px;
            margin-top: 15px;
        }
        .imgs > .hand > .hand_img{
            height: 300px;
        }
        .imgs > .body > .body_img{
            height: 300px;
        }
        .result{
            margin-top: 150px;
            position: relative;
            text-align: center;
            padding: 10px;
            font-size: 15px;
        } 
        .result > .result_table{
            width: 100%;
            background-color: transparent;
            border: none;
            border-radius: 5px;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        .result > .result_table th{
            position: sticky;
            top: 0px;   
            padding: 5px;
            height: 70px;
            background-color: #F1F2F5;
        }
        .result > .result_table tr{
            height: 50px;
            margin-bottom: 5px;
            border-radius: 15px;
        }
        .result > .result_table tr:last-child{
            border: none;
        }
        .result > .result_table tbody{
            
            border-radius: 10px;
        }
        .result > .result_table tbody tr:nth-child(odd){
            background-color: #fff;
        }
        .result > .result_table tbody tr:nth-child(even){
            background-color: #fff;
        }
        .result > .result_table td{
            padding: 5px;
            text-align: center;
            height: 70px;
        }
        .result > .result_table tr th{
            color: #404040;
            border-bottom: 1px solid #eee;
        }
        .result > .result_table input{
            width: 30px;
        }
        .result > .result_table select{
            width: 40px;
        }
        .main2{
            margin-top: 120px;
            position: relative;
            margin-left: 180px;
            margin-right: 100px;
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
<body>
    <header>
        <div class="logo"><a href="member_main.php" style="text-decoration: none;color: #0062F2; font-weight: bold; font-size: 27px; letter-spacing: 2px">ME </a><a href="member_main.php" style="text-decoration: none; color: #404040; font-size: 15; margin-top: 10px; font-weight: bold; margin-left: 10px"> MBTI WITH ELECTRIC </a></div>
        <div class="link">
            <?php
            if(!isset($id)){?>
                <a href="mem_login.php" class="logout_btn">로그인</a>
                <a href="member_signup.php" class="signup_btn">회원가입</a>
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
                <a href="member_main.php">메인</a>
                <a href="current_input.php" style="border-right: solid 8px #0062F2">전류입력 </a>
                <a href="member_mypage.php">마이페이지</a>
            <?php
            }?>
        </div>
    </div>
    <div class="main2">
        <div class="current_input">
            <div class="Input">
                <div class="Input_con">전류 데이터 입력<span style="font-weight: normal; font-size: 15px; display: inline-block; float: right; margin-right: 4%">🕓 <span id="clock"></span></span></div>
                <div class="InputData_canvans_left"><canvas id="currents_data_left"></canvas></div>
                <div class="InputData_canvans_right"><canvas id="currents_data_right"></canvas></div>
                
                <form class="InputData" method="POST">
                    <div class="tables">
                        <div class="Input5">
                            <table class="InputTable5">
                                <tr>
                                    <th rowspan="2" style="width: 10%">컨디션</th>
                                    <th>측정시간</th>            
                                    <th>수면시간</th>
                                    <th>몸상태</th>
                                    <th style="width: 10px">흡연여부</th>
                                    <th style="width: 10px">음주여부</th>
                                </tr>

                                <tr>
                                    <td style="width:30%"><input type="datetime-local" name="dateTimeLocal" step="1" placeholder="측정시간" style="width: 99%" required></td>
                                    <td style="width:15%"><input type="number" name="sleep" min="0" max="24" placeholder="수면시간" required></td>
                                    <td style="width:15%"><input type="number" name="body" min="0" max="5" placeholder="몸상태" required></td>
                                    <td style="text-align: center; width:15%">
                                        <select name="smoke">
                                            <option value="0" required>아니오</option>
                                            <option value="1">예</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center; width: 15%">
                                        <select name="drink">
                                            <option value="0" required>아니오</option>
                                            <option value="1">적당한 음주</option>
                                            <option value="2">과음</option>
                                        </select>
                                    </td>                   
                                </tr>
                            </table>
                        </div>
                        <div class="Input1">
                            <table class="InputTable1">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">좌수</th>
                                            <th style="width: 15%">폐</th>
                                            <th style="width: 15%">심포</th>
                                            <th style="width: 15%">심장</th>
                                            <th style="width: 15%">간</th>
                                            <th style="width: 15%">췌장</th>
                                            <th style="width: 15%">위</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle">전류</td>
                                            <td><input type="number" name="current1" id="current1" min="0" max="50" placeholder="1" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current2" id="current2" min="0" max="50" placeholder="2" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current3" id="current3" min="0" max="50" placeholder="3" onkeyup='showCurrent()' required></td>     
                                            <td><input type="number" name="current4" id="current4" min="0" max="50" placeholder="4" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current5" id="current5" min="0" max="50" placeholder="5" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current6" id="current6" min="0" max="50" placeholder="6" onkeyup='showCurrent()' required></td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        <div class="Input2">
                            <table class="InputTable2" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">좌측</th>
                                            <th style="width: 15%">삼초</th>
                                            <th style="width: 15%">소장</th>
                                            <th style="width: 15%">대장</th>
                                            <th style="width: 15%">쓸개</th>
                                            <th style="width: 15%">방광</th>
                                            <th style="width: 15%">신장</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle">전류</td>
                                            <td><input type="number" name="current7" id="current7" min="0" max="50" placeholder="7" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current8" id="current8" min="0" max="50" placeholder="8" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current9" id="current9" min="0" max="50" placeholder="9" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current10" id="current10" min="0" max="50" placeholder="10" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current11" id="current11" min="0" max="50" placeholder="11" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current12" id="current12" min="0" max="50" placeholder="12" onkeyup='showCurrent()' required></td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        <div class="Input3">
                            <table class="InputTable3">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">우수</th>
                                            <th style="width: 15%">폐</th>
                                            <th style="width: 15%">심포</th>
                                            <th style="width: 15%">심장</th>
                                            <th style="width: 15%">간</th>
                                            <th style="width: 15%">췌장</th>
                                            <th style="width: 15%">위</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle">전류</td>
                                            <td><input type="number" name="current13" id="current13" min="0" max="50" placeholder="13" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current14" id="current14" min="0" max="50" placeholder="14" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current15" id="current15" min="0" max="50" placeholder="15" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current16" id="current16" min="0" max="50" placeholder="16" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current17" id="current17" min="0" max="50" placeholder="17" onkeyup='showCurrent()' required></td>
                                            <td><input type="number" name="current18" id="current18" min="0" max="50" placeholder="18" onkeyup='showCurrent()' required></td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        <div class="Input4">
                            <table class="InputTable4">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">우측</th>
                                        <th style="width: 15%">삼초</th>
                                        <th style="width: 15%">소장</th>
                                        <th style="width: 15%">대장</th>
                                        <th style="width: 15%">쓸개</th>
                                        <th style="width: 15%">방광</th>
                                        <th style="width: 15%">신장</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle">전류</td>
                                        <td><input type="number" name="current19" id="current19" min="0" max="50" placeholder="19" onkeyup='showCurrent()' required></td>
                                        <td><input type="number" name="current20" id="current20" min="0" max="50" placeholder="20" onkeyup='showCurrent()' required></td>
                                        <td><input type="number" name="current21" id="current21" min="0" max="50" placeholder="21" onkeyup='showCurrent()' required></td>
                                        <td><input type="number" name="current22" id="current22" min="0" max="50" placeholder="22" onkeyup='showCurrent()' required></td>
                                        <td><input type="number" name="current23" id="current23" min="0" max="50" placeholder="23" onkeyup='showCurrent()' required></td>
                                        <td><input type="number" name="current24" id="current24" min="0" max="50" placeholder="24" onkeyup='showCurrent()' required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="inputBtn"><button type="submit" class="inputDataBtn" id="inputData">입력</button></div>
                    <script>
                            new Chart(document.getElementById("currents_data_left"), {
                                type: 'line',
                                data: {
                                    labels: ['폐', '심포', '심장', '간', '췌장', '위', '삼초', '소장', '대장', '쓸개', '방광', '신장'],
                                    datasets: [{
                                        label: '왼손',
                                        type: 'line',
                                        data: [current1, current2, current3, current4, current5, current6, current7, current8, current9, current10, current11, current12],
                                        borderColor: "rgba(255, 0, 0, 1)",
                                        backgroundColor: "rgba(255, 0, 0, 1)",
                                        fill: false,
                                        lineTension: 0
                                    }]
                                },
                                options: {
                                    maintainAspectRatio: false,
                                    title: {
                                        display: false,
                                        text: '왼손 전류 데이터'
                                    },
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    },
                                    scales: {
                                        xAxes: [{
                                            display: true
                                        }],
                                        yAxes: [{
                                            display: true,
                                            ticks: {
                                                min: 0,
                                                max: 50,
                                            },
                                            scaleLabel: {
                                                display: false,
                                                labelString: '전류 값'
                                            }
                                        }]
                                    }
                                }
                            });
                            new Chart(document.getElementById("currents_data_right"), {
                                type: 'line',
                                data: {
                                    labels: ['폐', '심포', '심장', '간', '췌장', '위', '삼초', '소장', '대장', '쓸개', '방광', '신장'],
                                    datasets: [{
                                        label: '오른손',
                                        type: 'line',
                                        data: [current13, current14, current15, current16, current17, current18, current19, current20, current21, current22, current23, current24],
                                        borderColor: "rgba(255, 0, 0, 1)",
                                        backgroundColor: "rgba(255, 0, 0, 1)",
                                        fill: false,
                                        lineTension: 0
                                    }]
                                },
                                options: {
                                    maintainAspectRatio: false,
                                    title: {
                                        display: false,
                                        text: '오른손 전류 데이터'
                                    },
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    },
                                    scales: {
                                        xAxes: [{
                                            display: true
                                        }],
                                        yAxes: [{
                                            display: true,
                                            ticks: {
                                                min: 0,
                                                max: 50,
                                            },
                                            scaleLabel: {
                                                display: false,
                                                labelString: '전류 값'
                                            }
                                        }]
                                    }
                                }
                            });
                        function showCurrent()  {
                            const current1 = document.getElementById('current1').value;
                            const current2 = document.getElementById('current2').value;
                            const current3 = document.getElementById('current3').value;
                            const current4 = document.getElementById('current4').value;
                            const current5 = document.getElementById('current5').value;
                            const current6 = document.getElementById('current6').value;
                            const current7 = document.getElementById('current7').value;
                            const current8 = document.getElementById('current8').value;
                            const current9 = document.getElementById('current9').value;
                            const current10 = document.getElementById('current10').value;
                            const current11 = document.getElementById('current11').value;
                            const current12 = document.getElementById('current12').value;
                            const current13 = document.getElementById('current13').value;
                            const current14 = document.getElementById('current14').value;
                            const current15 = document.getElementById('current15').value;
                            const current16 = document.getElementById('current16').value;
                            const current17 = document.getElementById('current17').value;
                            const current18 = document.getElementById('current18').value;
                            const current19 = document.getElementById('current19').value;
                            const current20 = document.getElementById('current20').value;
                            const current21 = document.getElementById('current21').value;
                            const current22 = document.getElementById('current22').value;
                            const current23 = document.getElementById('current23').value;
                            const current24 = document.getElementById('current24').value;
                        
                            new Chart(document.getElementById("currents_data_left"), {
                                type: 'line',
                                data: {
                                    labels: ['폐', '심포', '심장', '간', '췌장', '위', '삼초', '소장', '대장', '쓸개', '방광', '신장'],
                                    datasets: [{
                                        label: '왼손',
                                        type: 'line',
                                        data: [current1, current2, current3, current4, current5, current6, current7, current8, current9, current10, current11, current12],
                                        borderColor: "rgba(255, 0, 0, 1)",
                                        backgroundColor: "rgba(255, 0, 0, 1)",
                                        fill: false,
                                        lineTension: 0
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    title: {
                                        display: false,
                                        text: '왼손 전류 데이터'
                                    },
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    },
                                    scales: {
                                        xAxes: [{
                                            display: true
                                        }],
                                        yAxes: [{
                                            display: true,
                                            ticks: {
                                                min: 0,
                                                max: 50,
                                            },
                                            scaleLabel: {
                                                display: false,
                                                labelString: '전류 값'
                                            }
                                        }]
                                    }
                                }
                            });
                            new Chart(document.getElementById("currents_data_right"), {
                                type: 'line',
                                data: {
                                    labels: ['폐', '심포', '심장', '간', '췌장', '위', '삼초', '소장', '대장', '쓸개', '방광', '신장'],
                                    datasets: [{
                                        label: '오른손',
                                        type: 'line',
                                        data: [current13, current14, current15, current16, current17, current18, current19, current20, current21, current22, current23, current24],
                                        borderColor: "rgba(255, 0, 0, 1)",
                                        backgroundColor: "rgba(255, 0, 0, 1)",
                                        fill: false,
                                        lineTension: 0
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    title: {
                                        display: false,
                                        text: '오른손 전류 데이터'
                                    },
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false,
                                    },
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    },
                                    scales: {
                                        xAxes: [{
                                            display: true
                                        }],
                                        yAxes: [{
                                            display: true,
                                            ticks: {
                                                min: 0,
                                                max: 50,
                                            },
                                            scaleLabel: {
                                                display: false,
                                                labelString: '전류 값'
                                            }
                                        }]
                                    }
                                }
                            });
                        }
                    </script>
                </form>
                <?php
                    if(isset($_POST['current1'])){
                        $Current1=$_POST['current1'];
                    }
                    if(isset($_POST['current2'])){
                        $Current2=$_POST['current2'];
                    }
                    if(isset($_POST['current3'])){
                        $Current3=$_POST['current3'];
                    }
                    if(isset($_POST['current4'])){
                        $Current4=$_POST['current4'];
                    }
                    if(isset($_POST['current5'])){
                        $Current5=$_POST['current5'];
                    }
                    if(isset($_POST['current6'])){
                        $Current6=$_POST['current6'];
                    }
                    if(isset($_POST['current7'])){
                        $Current7=$_POST['current7'];
                    }
                    if(isset($_POST['current8'])){
                        $Current8=$_POST['current8'];
                    }
                    if(isset($_POST['current9'])){
                        $Current9=$_POST['current9'];
                    }
                    if(isset($_POST['current10'])){
                        $Current10=$_POST['current10'];
                    }
                    if(isset($_POST['current11'])){
                        $Current11=$_POST['current11'];
                    }
                    if(isset($_POST['current12'])){
                        $Current12=$_POST['current12'];
                    }
                    if(isset($_POST['current13'])){
                        $Current13=$_POST['current13'];
                    }
                    if(isset($_POST['current14'])){
                        $Current14=$_POST['current14'];
                    }
                    if(isset($_POST['current15'])){
                        $Current15=$_POST['current15'];
                    }
                    if(isset($_POST['current16'])){
                        $Current16=$_POST['current16'];
                    }
                    if(isset($_POST['current17'])){
                        $Current17=$_POST['current17'];
                    }
                    if(isset($_POST['current18'])){
                        $Current18=$_POST['current18'];
                    }
                    if(isset($_POST['current19'])){
                        $Current19=$_POST['current19'];
                    }
                    if(isset($_POST['current20'])){
                        $Current20=$_POST['current20'];
                    }
                    if(isset($_POST['current21'])){
                        $Current21=$_POST['current21'];
                    }
                    if(isset($_POST['current22'])){
                        $Current22=$_POST['current22'];
                    }
                    if(isset($_POST['current23'])){
                        $Current23=$_POST['current23'];
                    }
                    if(isset($_POST['current24'])){
                        $Current24=$_POST['current24'];
                    }
                    if(isset($_POST['dateTimeLocal'])){
                        $DateTimeLocal=date('Y-m-d H:i:s', strtotime($_POST['dateTimeLocal']));
                    }
                    if(isset($_POST['sleep'])){
                        $Sleep=$_POST['sleep'];
                    }
                    if(isset($_POST['body'])){
                        $Body=$_POST['body'];
                    }
                    if(isset($_POST['smoke'])){
                        $Smoke=$_POST['smoke'];
                    }
                    if(isset($_POST['drink'])){
                        $Drink=$_POST['drink'];
                    }
                    if(isset($Current1)&&isset($Current2)&&isset($Current3)&&isset($Current4)&&isset($Current5)&&isset($Current6)&&isset($Current7)&&isset($Current8)&&isset($Current9)&&isset($Current10)&&isset($Current11)&&isset($Current12)&&isset($Current13)&&isset($Current14)&&isset($Current15)&&isset($Current16)&&isset($Current17)&&isset($Current18)&&isset($Current19)&&isset($Current20)&&isset($Current21)&&isset($Current22)&&isset($Current23)&&isset($Current23)&&isset($DateTimeLocal)&&isset($Sleep)&&isset($Body)&&isset($Smoke)&&isset($Drink)){
                        $date_sql="SELECT COUNT(*) FROM CURRENTS WHERE ID='$id' AND INPUT_DATE='$DateTimeLocal'";
                        $date_result=oci_parse($connect, $date_sql);
                        oci_execute($date_result); 
                        while($date_result_num=oci_fetch_array($date_result, OCI_ASSOC+OCI_RETURN_NULLS))
                        {
                            $date_num=$date_result_num['COUNT(*)'];
                        }
                        oci_free_statement($date_result);                    
                        if($date_num > 0){
                            echo "<script>alert('입력한 시간에 해당하는 데이터가 존재합니다.');location.replace('current_input.php');</script>";
                        }
                        else{ 
                            $sql1="INSERT INTO CURRENTS(ID
                            , LUNG_LEFT
                            , PERICARDIUM_LEFT
                            , HEART_LEFT
                            , LIVER_LEFT
                            , SPLEEN_LEFT
                            , STOMACH_LEFT
                            , TRIPLEFOCUS_LEFT
                            , SMALL_INTESTINE_LEFT
                            , LARGE_INTESTINE_LEFT
                            , GALLBLADDER_LEFT
                            , BLADDER_LEFT
                            , KIDNEY_LEFT
                            , LUNG_RIGHT
                            , PERICARDIUM_RIGHT
                            , HEART_RIGHT
                            , LIVER_RIGHT
                            , SPLEEN_RIGHT
                            , STOMACH_RIGHT
                            , TRIPLE_FOCUS_RIGHT
                            , SMALL_INTESTINE_RIGHT
                            , LARGE_INTESTINE_RIGHT
                            , GALLBLADDER_RIGHT
                            , BLADDER_RIGHT
                            , KIDNEY_RIGHT
                            , INPUT_DATE)
                            VALUES
                            (
                                '$id'
                                , $Current1
                                , $Current2
                                , $Current3
                                , $Current4
                                , $Current5
                                , $Current6
                                , $Current7
                                , $Current8
                                , $Current9
                                , $Current10
                                , $Current11
                                , $Current12
                                , $Current13
                                , $Current14
                                , $Current15
                                , $Current16
                                , $Current17
                                , $Current18
                                , $Current19
                                , $Current20
                                , $Current21
                                , $Current22
                                , $Current23
                                , $Current24
                                , '$DateTimeLocal'
                            )";
                            $input1=oci_parse($connect, $sql1);
                            oci_execute($input1);
                            oci_free_statement($input1);
                            $sql2="INSERT INTO CONDITION(ID, SLEEP, BODY, SMOKE, DRINK, INPUT_DATE)
                            VALUES
                            (
                                '$id'
                                , $Sleep
                                , $Body 
                                , $Smoke
                                , $Drink
                                , '$DateTimeLocal'
                            )";
                            $input2=oci_parse($connect, $sql2);
                            oci_execute($input2);
                            oci_free_statement($input2);
                        }
                    }
                ?>
            </div>
            <div class="imgs">
                <div class="hand">
                    <div class="dot" name="dot" id="dot">●</div>
                    <img src = "leftpalm0.png" alt="hand img" id="hand_img" class="hand_img">
                </div>
                <div class="body">
                    <img src = "body0.png" alt="body img" id="body_img" class="body_img">
                </div>
            </div>
        </div>
        <div class="result" style="height: 600px; overflow-y: auto">
                <table class="result_table">
                    <thead style="border-radius: 20px">
                        <tr>
                            <th>번호</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>     
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>측정시간</th>
                            <th>수면시간</th>
                            <th>몸상태</th>
                            <th>흡연여부</th>
                            <th>음주여부</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $ENUM = (isset($_GET["ENUM"]) && $_GET["ENUM"]) ? $_GET["ENUM"] : NULL;
                        $num=1;


                            $sql3="SELECT 
                            ROWNUM AS NUM
                            , C.*
                            FROM
                                (SELECT * 
                                FROM CURRENTS
                                INNER JOIN CONDITION
                                ON
                                CONDITION.INPUT_DATE = CURRENTS.INPUT_DATE
                                AND 
                                CONDITION.ID = CURRENTS.ID
                                WHERE CONDITION.ID='$id' 
                                ORDER BY CONDITION.INPUT_DATE DESC) C";
                            $all=oci_parse($connect, $sql3);
                            oci_execute($all);
                            while($row=oci_fetch_array($all, OCI_ASSOC+OCI_RETURN_NULLS))
                            {
                                $NUM=$row['NUM'];
                                $CURRENT1=$row['LUNG_LEFT'];
                                $CURRENT2=$row['PERICARDIUM_LEFT'];
                                $CURRENT3=$row['HEART_LEFT'];
                                $CURRENT4=$row['LIVER_LEFT'];
                                $CURRENT5=$row['SPLEEN_LEFT'];
                                $CURRENT6=$row['STOMACH_LEFT'];
                                $CURRENT7=$row['TRIPLEFOCUS_LEFT'];
                                $CURRENT8=$row['SMALL_INTESTINE_LEFT'];
                                $CURRENT9=$row['LARGE_INTESTINE_LEFT'];
                                $CURRENT10=$row['GALLBLADDER_LEFT'];
                                $CURRENT11=$row['BLADDER_LEFT'];                        
                                $CURRENT12=$row['KIDNEY_LEFT'];
                                $CURRENT13=$row['LUNG_RIGHT'];
                                $CURRENT14=$row['PERICARDIUM_RIGHT'];
                                $CURRENT15=$row['HEART_RIGHT'];
                                $CURRENT16=$row['LIVER_RIGHT'];
                                $CURRENT17=$row['SPLEEN_RIGHT'];
                                $CURRENT18=$row['STOMACH_RIGHT'];
                                $CURRENT19=$row['TRIPLE_FOCUS_RIGHT'];
                                $CURRENT20=$row['SMALL_INTESTINE_RIGHT'];
                                $CURRENT21=$row['LARGE_INTESTINE_RIGHT'];
                                $CURRENT22=$row['GALLBLADDER_RIGHT'];
                                $CURRENT23=$row['BLADDER_RIGHT'];
                                $CURRENT24=$row['KIDNEY_RIGHT'];
                                $DATETIME=$row['INPUT_DATE'];
                                $SLEEP=$row['SLEEP'];
                                $BODY=$row['BODY'];
                                $SMOKE=$row['SMOKE'];
                                $DRINK=$row['DRINK'];
                        ?>
                        <tr>
                            <td> <?=$NUM?> </td>
                            <td> <?=$CURRENT1?> </td>
                            <td> <?=$CURRENT2?> </td>
                            <td> <?=$CURRENT3?> </td>
                            <td> <?=$CURRENT4?> </td>
                            <td> <?=$CURRENT5?> </td>
                            <td> <?=$CURRENT6?> </td>
                            <td> <?=$CURRENT7?> </td>
                            <td> <?=$CURRENT8?> </td>
                            <td> <?=$CURRENT9?> </td>
                            <td> <?=$CURRENT10?> </td>
                            <td> <?=$CURRENT11?> </td>
                            <td> <?=$CURRENT12?> </td>
                            <td> <?=$CURRENT13?> </td>
                            <td> <?=$CURRENT14?> </td>
                            <td> <?=$CURRENT15?> </td>
                            <td> <?=$CURRENT16?> </td>
                            <td> <?=$CURRENT17?> </td>
                            <td> <?=$CURRENT18?> </td>
                            <td> <?=$CURRENT19?> </td>
                            <td> <?=$CURRENT20?> </td>
                            <td> <?=$CURRENT21?> </td>
                            <td> <?=$CURRENT22?> </td>
                            <td> <?=$CURRENT23?> </td>
                            <td> <?=$CURRENT24?> </td>
                            <td> <?=$DATETIME?> </td>
                            <td> <?=$SLEEP?> </td>
                            <td> <?=$BODY?> </td>
                            <td> <?=$SMOKE?> </td>
                            <td> <?=$DRINK?> </td>
                        </tr>
                    <?php
                            }
                            $num++;
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div style="height: 300px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
<?php
oci_free_statement($all);
oci_close($connect);
?>
    <script type="text/javascript">
        var hand_img = document.getElementById("hand_img");
        var hand_img_top = hand_img.getBoundingClientRect().top;
        var hand_img_left = hand_img.getBoundingClientRect().left;
        $("#dot").hide();

        var c1 = $('#current1');
        var c2 = $('#current2');
        var c3 = $('#current3');
        var c4 = $('#current4');
        var c5 = $('#current5');
        var c6 = $('#current6');

        var c7 = $('#current7');
        var c8 = $('#current8');
        var c9 = $('#current9');
        var c10 = $('#current10');
        var c11 = $('#current11');
        var c12 = $('#current12');

        var c13 = $('#current13');
        var c14 = $('#current14');
        var c15 = $('#current15');
        var c16 = $('#current16');
        var c17 = $('#current17');
        var c18 = $('#current18');

        var c19 = $('#current19');
        var c20 = $('#current20');
        var c21 = $('#current21');
        var c22 = $('#current22');
        var c23 = $('#current23');
        var c24 = $('#current24');

        $( document ).ready( function() {
            var Target = document.getElementById("clock");
            function clock() {
                var time = new Date();
                var year = time.getFullYear();
                var month = time.getMonth();
                var date = time.getDate();
                var day = time.getDay();                    
                var week = ['일', '월', '화', '수', '목', '금', '토'];

                var hours = time.getHours();
                var minutes = time.getMinutes();
                var seconds = time.getSeconds();

                Target.innerText = 
                `${year}년`+
                `${month + 1}월 ${date}일 ${week[day]}요일 ` +
                `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;
                        
            }
            clock();
            setInterval(clock, 1000); // 1초마다 실행
            c1.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+200});
                document.getElementById("hand_img").src = "leftpalm0.png";
                document.getElementById("body_img").src = "body1.png";
            });
            c2.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+217});
                document.getElementById("hand_img").src = "leftpalm0.png";
                document.getElementById("body_img").src = "body0.png";
            }); 
            c3.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+230});
                document.getElementById("hand_img").src = "leftpalm0.png";
                document.getElementById("body_img").src = "body2.png";
            });  
            c4.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+248});
                document.getElementById("hand_img").src = "leftpalm0.png";
                document.getElementById("body_img").src = "body3.png";
            });
            c5.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+260});
                document.getElementById("hand_img").src = "leftpalm0.png";
                document.getElementById("body_img").src = "body4.png";
                
            }); 
            c6.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+273});
                document.getElementById("hand_img").src = "leftpalm0.png";
                document.getElementById("body_img").src = "body6.png";
            });  
            
            c7.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+85});
                document.getElementById("hand_img").src = "left1.png";
                document.getElementById("body_img").src = "body0.png";
            });
            c8.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+75});
                document.getElementById("hand_img").src = "left1.png";
                document.getElementById("body_img").src = "body9.png";
            }); 
            c9.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+62});
                document.getElementById("hand_img").src = "left1.png";
                document.getElementById("body_img").src = "body10.png";
            });  
            c10.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+38});
                document.getElementById("hand_img").src = "left1.png";
                document.getElementById("body_img").src = "body7.png";
            });
            c11.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+30});
                document.getElementById("hand_img").src = "left1.png";
                document.getElementById("body_img").src = "body8.png";
            }); 
            c12.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+20});
                document.getElementById("hand_img").src = "left1.png";
                document.getElementById("body_img").src = "body5.png";
            });  

            c13.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+85});
                document.getElementById("hand_img").src = "rightpalm0.png";
                document.getElementById("body_img").src = "body1.png";
            });
            c14.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+75});
                document.getElementById("hand_img").src = "rightpalm0.png";
                document.getElementById("body_img").src = "body0.png";
            }); 
            c15.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+62});
                document.getElementById("hand_img").src = "rightpalm0.png";
                document.getElementById("body_img").src = "body2.png";
            });              
            c16.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+38});
                document.getElementById("hand_img").src = "rightpalm0.png";
                document.getElementById("body_img").src = "body3.png";
            });
            c17.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+30});
                document.getElementById("hand_img").src = "rightpalm0.png";
                document.getElementById("body_img").src = "body4.png";
            }); 
            c18.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+20});
                document.getElementById("hand_img").src = "rightpalm0.png";
                document.getElementById("body_img").src = "body6.png";
            });  

            c19.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+202});
                document.getElementById("hand_img").src = "right1.png";
                document.getElementById("body_img").src = "body0.png";
            });
            c20.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+217});
                document.getElementById("hand_img").src = "right1.png";
                document.getElementById("body_img").src = "body9.png";
            }); 
            c21.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+62, left: hand_img_left+230});
                document.getElementById("hand_img").src = "right1.png";
                document.getElementById("body_img").src = "body10.png";
            });  
            c22.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+248});
                document.getElementById("hand_img").src = "right1.png";
                document.getElementById("body_img").src = "body7.png";
            });
            c23.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+262});
                document.getElementById("hand_img").src = "right1.png";
                document.getElementById("body_img").src = "body8.png";
            }); 
            c24.focus(function(){
                $("#dot").show();
                $('#dot').offset({top: hand_img_top+110, left: hand_img_left+272});
                document.getElementById("hand_img").src = "right1.png";
                document.getElementById("body_img").src = "body5.png";
            });  
        });
    </script>
</body>
</html>
