<?php
include("/dbinfo.php");

if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
session_start();
if(!isset($_SESSION['M_ID'])){

}
else
{
    $m_id = $_SESSION['M_ID'];
    $m_pw = $_SESSION['M_PW'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="style.css">
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
        header > .logo > .logo_min > a{
            text-decoration: none;
            color: #0062F2;
            font-size: 15px;
            font-weight: bold;
            margin-left: 7px;
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
            font-size: 20px;
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
        main > .main1 > .container{
            height: 100px;
            margin-left: 100px;
            margin-right: 100px;
        }
        main > .main1 > .container > .num{
            position: relative;
            top: 180px;
            text-align: right;
            margin-right: 200px;
            font-size: 50px;
            color: #404040;
            font-weight: bold;
        }
        main > .main1 > .container > a{
            position: relative;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            color: #0062F2;
            background-color: #DBE9F9;
            border-radius: 10px;
        }
        main > .main1 > .container > a.login_btn{
            top: 300px;
            margin-left: 200px;
        }
        main > .main1 > .container > a.request_btn{
            top: 300px;
            margin-left: 30px;
        }
        main > .main1 > .container > .search_btn{
            top: 150px;
            margin-left: 200px;
        }
        main > .main1 > .container > a:hover{
            background-color: #0062F2;
            color: white;
        }
        main > .main1 > .container > a:active{
            background-color: white;
            color: #0062F2;
        }
        body{
            background-color: #FFFFFF;
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
    <div class="logo"><a href="../member/member_main.php">생체전류와 MBTI  </a><span class="logo_min"><a href="manager_main.php">관리자 페이지</span></a></div>
        <div class="link">
            <a href="manager_main.php" style="color: #404040; font-weight: bold">Home</a>
            <?php
            if(!isset($m_id)){?>
                <a href="manager_login.php" class="login_btn">login</a>
            <?php
            }
            else{?>
                <a href="manager_search.php">manage</a>
                <a href="manager_logout.php" class="logout_btn">logout</a>
                <a href="auto_classify.php">체질분류</a>
                <a href="restore_management.php">탈퇴회원데이터관리</a>
            <?php
            }?>

        </div>
    </header>
    <main>
        <div class="main1">
            <div class="container">
        <?php
            if(!isset($m_id)){
        ?>
                <a href="manager_login.php" class="login_btn">login ➜</a>
                <a href="manager_request.php" class="request_btn">request ➜</a>
        <?php
            }
            else{
                $sql1 = "SELECT COUNT(*) FROM INFO";
                $n1=oci_parse($connect, $sql1);
                oci_execute($n1);
                $row1=oci_fetch_array($n1, OCI_ASSOC+OCI_RETURN_NULLS);
                $result1 = $row1['COUNT(*)'];

                $sql2 = "SELECT COUNT(*) FROM CURRENTS";
                $n2=oci_parse($connect, $sql2);
                oci_execute($n2);
                $row2=oci_fetch_array($n2, OCI_ASSOC+OCI_RETURN_NULLS);
                $result2 = $row2['COUNT(*)'];
        ?>
                <div class="num">
                    <div class="member_num" style="margin-bottom: 20px">회원 수    <span style="color: #0062F2; text-shadow: none"><?=$result1?></span></div>
                    <div class="data_num">데이터 수    <span style="color: #0062F2; text-shadow: none"><?=$result2?></span></div>
                </div>
                <a href="manager_search.php" class="search_btn">manage ➜</a>
            </div>
            <?php
            }?>
        </div>
    </main>
    <div style="height: 50px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
</body>
</html>
