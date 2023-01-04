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
            background-color: #F1F2F5;
            overflow-x:hidden;
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
        .show {
            display:block;
        }
        .nav{
            position: fixed;
            height: 100%;
            width: 150px;
            left: 0;
            top: 0;
            display: inline-block;
        }
        .nav > .nav_menu{
            margin-left: 5%;
            z-index: 2;   
            margin-top: 100px;
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
            height: 1000px;
        }
        .main1 > .member_info{
            position: relative;
            margin-top: 150px;
            margin-left: 200px;
            margin-right: 150px;
            justify-content: center;
        } 
        .member_info_title{
            position: relative;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 30px;
            display: block;
            font-weight: bold;
        }
        table.member_info_table{
            width: 100%;
            height: 500px;
            text-align: center;
            margin-bottom: 20px;
        }
        table.member_info_table th{
            text-align: center;
            justify-content: center;
        }
        table.member_info_table td{
            text-align: left;
        }
        table.member_info_table tr{
            height: 30px;
            background-color: #fff;
            border-radius: 30px;
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
                <a href="current_input.php">전류입력 </a>
                <a href="member_mypage.php" style="border-right: solid 8px #0062F2">마이페이지</a>
            <?php
            }?>
        </div>
    </div>
    <?php                    
                if(isset($id)){
                    $num=1;
                    $sql1 = "SELECT * FROM INFO WHERE ID='$id'";
                    $sql2 = "SELECT * FROM BODY_TYPE WHERE ID='$id'";
                    $info = oci_parse($connect, $sql1);
                    oci_execute($info);
                    while($result = oci_fetch_array($info,OCI_ASSOC+OCI_RETURN_NULLS)){
                        $ID=$result['ID'];
                        $PW=$result['PW'];
                        $NAME=$result['NAME'];
                        $AGE=$result['AGE'];
                        $SEX=$result['SEX'];
                        $PHONE=$result['PHONE'];
                        $EMAIL=$result['EMAIL'];      
                    }
                    $mbti = oci_parse($connect, $sql2);
                    oci_execute($mbti);
                    while($mbti_result = oci_fetch_array($mbti,OCI_ASSOC+OCI_RETURN_NULLS)){
                        $EI=$mbti_result['EI'];
                        $NS=$mbti_result['NS'];
                        $FT=$mbti_result['FT'];
                        $JP=$mbti_result['JP'];   
                    }
                }
    ?>
    <div class="main1">
        <div class="member_info">
            <div class="member_info_title">정보 수정</div>
            <form method="POST" action="member_info_update.php" class="member_info_form">
                <table class="member_info_table">
                    <tr>
                        <th>ID</th>
                        <td><input type="text" name="ID" id="ID" value="<?=$ID?>" disabled/></td>
                    </tr>
                    <tr>
                        <th>NAME</th>
                        <td><input type="text" name="NAME" id="NAME" value="<?=$NAME?>"></td>
                    </tr>
                    <tr>
                        <th>PW</th>
                        <td><input type="text" name="PW" id="PW" value="<?=$PW?>"></td>
                    </tr>
                    <tr> 
                        <th>AGE</th>                           
                        <td><input type="text" name="AGE" id="AGE" value="<?=$AGE?>"></td>
                    </tr>
                    <tr>
                        <th>SEX</th>
                        <td>
                            <input type="radio" name="SEX" id="SEX_female" value="female" required>여성
                            <input type="radio" name="SEX" id="SEX_male" value="male">남성
                        </td>
                    </tr>
                    <tr>
                        <th>PHONE</th>  
                        <td><input type="text" name="PHONE" id="PHONE" value="<?=$PHONE?>"></td>
                    </tr>
                    <tr> 
                        <th>EMAIL</th>
                        <td><input type="text" name="EMAIL" id="EMAIL" value="<?=$EMAIL?>"></td>
                    </tr>
                    <tr> 
                        <th rowspan="4">MBTI</th>
                        <td>E <input type="range" min="1" max="100" value="<?=$EI?>" class="slider" NAME="MBTI_EI" id="MBTI_EI" onkeyup='printNum_EI()'> I<div id="input_MBTI_EI"></div></td>
                    </tr>
                    <tr> 
                        <td>N <input type="range" min="1" max="100" value="<?=$NS?>" class="slider" NAME="MBTI_NS" id="MBTI_NS" onkeyup='printNum_NS()'> S<div id="input_MBTI_NS"></div></td>
                    </tr>
                    <tr> 
                        <td>F <input type="range" min="1" max="100" value="<?=$FT?>" class="slider" NAME="MBTI_FT" id="MBTI_FT" onkeyup='printNum_FT()'> T<div id="input_MBTI_FT"></div></td>
                    </tr>
                    <tr> 
                        <td>J <input type="range" min="1" max="100" value="<?=$JP?>" class="slider" NAME="MBTI_JP" id="MBTI_JP" onkeyup='printNum_JP()'> P<div id="input_MBTI_JP"></div></td>
                    </tr>
                </table>
                <input type="button" value="수정" class="edit_btn" id="edit_btn" onclick='inputActive()'>
                <input type="submit" value="완료" class="submit_btn">
                <a href="member_withdrawal.php" style="float: right; text-decoration: none" onclick="if(!confirm('탈퇴 하시겠습니까?'))">회원탈퇴</a>
            </form>
        </div>
    </div>
    <div style="height: 500px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
    <script type="text/javascript">
        var pw_check = prompt("비밀번호를 입력하세요.");
        if(pw_check == <?=$pw?>){
        }
        else{
            alert("잘못된 비밀번호 입니다.");
            location.replace('member_main.php');
        }
        const EMAIL = document.getElementById('EMAIL');
        EMAIL.disabled = true;
        const NAME = document.getElementById('NAME');
        NAME.disabled = true;
        const PW = document.getElementById('PW');
        PW.disabled = true;
        const AGE = document.getElementById('AGE');
        AGE.disabled = true;
        const SEX_female = document.getElementById('SEX_female');
        SEX_female.disabled = true;
        const SEX_male = document.getElementById('SEX_male');
        SEX_male.disabled = true;
        const PHONE = document.getElementById('PHONE');
        PHONE.disabled = true;
        const MBTI_EI = document.getElementById('MBTI_EI');
        MBTI_EI.disabled = true;
        const MBTI_NS = document.getElementById('MBTI_NS');
        MBTI_NS.disabled = true;
        const MBTI_FT = document.getElementById('MBTI_FT');
        MBTI_FT.disabled = true;
        const MBTI_JP = document.getElementById('MBTI_JP');
        MBTI_JP.disabled = true;

        

        const MBTI_EI_num = document.getElementById('MBTI_EI').value;
        const MBTI_NS_num = document.getElementById('MBTI_NS').value;
        const MBTI_FT_num = document.getElementById('MBTI_FT').value;
        const MBTI_JP_num = document.getElementById('MBTI_JP').value;
        document.getElementById("input_MBTI_JP").innerText = MBTI_JP_num;
        document.getElementById("input_MBTI_FT").innerText = MBTI_FT_num;
        document.getElementById("input_MBTI_NS").innerText = MBTI_NS_num;
        document.getElementById("input_MBTI_EI").innerText = MBTI_EI_num;
        function inputActive()  {
            EMAIL.disabled = false;
            NAME.disabled = false;
            PW.disabled = false;
            AGE.disabled = false;
            SEX_female.disabled = false;
            SEX_male.disabled = false;
            PHONE.disabled = false;
            MBTI_EI.disabled = false;
            MBTI_NS.disabled = false;
            MBTI_FT.disabled = false;
            MBTI_JP.disabled = false;
        }
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
        
    </script>
</body>
</html>
