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
        main{
            margin-bottom: 400px;
        }
        main > .main1{
            position: relative;
            width: 100%;
            height: 500px;
            background-color: #F2F6FC;
            border-bottom-right-radius: 800px 60px;
            border-bottom-left-radius: 800px 60px;
        }
        body{
            background-color: #FFFFFF;
        }
        .box{
            position: absolute;
            width: 600px;
            height: 600px;
            top: 480px;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 40;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 5px 5px 5px #D0CECE;
        }
        .findPW {
            display: inline-block;
            width:500px;
            height:00px;
            padding: 30px, 20px;
            text-align:center;
            border-radius: 15px;
        }
        .findPW h1{
            text-align: left;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 20px;
        }
        .box > .findPW > .findTable th{
            width: 100px;
        }
        .box > .findPW > .findTable tr{
            height: 80px;
        }
        .box > .findPW > .findTable th, td{
            height: 50px;
        }
        .id {
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
        .age {
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
<body>
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
    <header>
        <div class="logo"><a href="member_main.php">생체전류와 MBTI</a></div>
        <div class="link">
            <a href="member_main.php" style="color: #404040; font-weight: bold">Home</a>
            <?php
            if(!isset($id)){?>
                <a href="mem_login.php" class="login_btn">로그인</a>
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
    <main>
        <div class="main1">
        </div>
    </main>
    <div class="box">
        <form class="findPW" method="POST">
            <h1> 비밀번호 찾기 </h1>
            <table class="findTable">
                <tr align="left">
                    <th><span style="color: red">*  </span>아이디</th>
                    <td><div align="left"><input type="text" class="id" name="id" id="id" placeholder="아이디 입력"></div></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>이메일</th>
                    <td><div align="left"><input type="text" class="email" name="email" id="email" placeholder="이메일 입력"></div> </td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>생년월일</th>
                    <td><div align="left"><input type="text" class="age" name="age" id="age" placeholder="생년월일 6자리 숫자 입력"></div> </td>
                </tr>
            </table> 
            <div class="button">
                <button type="submit">비밀번호 찾기</button>
            </div>
            <div class="bottomText">
                <div>
                    <a href="member_id_find.php" style="color: #0062F2">아이디 찾기</a>            
                     | <a href="mem_login.php" style="color: #0062F2">로그인</a>
                     | <a href="member_signup.php" style="color: #0062F2">회원가입</a>
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST['id'])){
            $ID = $_POST['id'];
        }        
        if(isset($_POST['email'])){
            $EMAIL = $_POST['email'];
        }        
        if(isset($_POST['age'])){
            $AGE = $_POST['age'];
        }
        if(isset($_POST['id'])&&isset($_POST['email'])&&isset($_POST['age'])){
            $sql1="SELECT * FROM INFO WHERE ID = '$ID' AND EMAIL = '$EMAIL' AND AGE = '$AGE'";
            $result=oci_parse($connect, $sql1);
            oci_execute($result);
            $row=oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS);
            $PW = $row['PW'];
            if($ID == ""){

            }
            else{
                if($row['ID']==$ID){
                    echo "<script>alert('회원님의 비밀번호는 ".$PW."입니다.');history.back();</script>";
                }
                else{
                    echo "<script>alert('존재하지 않는 아이디 또는 이메일 입니다.');history.back();</script>";
                }    
                oci_free_statement($result);
                oci_close($connect);        
            }
        }
        ?>
    </div>
    <div style="height: 50px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
</body>
</html>