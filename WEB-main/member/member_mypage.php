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
    $date = date("Y-m-d H:i:s");
    $date1 = date("Y-m-d H:i:s", strtotime("-1 month", strtotime($date)));
    $date3 = date("Y-m-d H:i:s", strtotime("-3 months", strtotime($date)));
    $date6 = date("Y-m-d H:i:s", strtotime("-6 months", strtotime($date)));
    $avg1 = "SELECT AVG(LUNG_LEFT),AVG(PERICARDIUM_LEFT),AVG(HEART_LEFT),AVG(LIVER_LEFT),AVG(SPLEEN_LEFT),AVG(STOMACH_LEFT),AVG(TRIPLEFOCUS_LEFT),AVG(SMALL_INTESTINE_LEFT),AVG(LARGE_INTESTINE_LEFT),AVG(GALLBLADDER_LEFT),AVG(BLADDER_LEFT),AVG(KIDNEY_LEFT),AVG(LUNG_RIGHT),AVG(PERICARDIUM_RIGHT),AVG(HEART_RIGHT),AVG(LIVER_RIGHT),AVG(SPLEEN_RIGHT),AVG(STOMACH_RIGHT),AVG(TRIPLE_FOCUS_RIGHT),AVG(SMALL_INTESTINE_RIGHT),AVG(LARGE_INTESTINE_RIGHT),AVG(GALLBLADDER_RIGHT),AVG(BLADDER_RIGHT),AVG(KIDNEY_RIGHT) FROM CURRENTS WHERE ID='$id' AND TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS') BETWEEN TO_DATE('$date1', 'YYYY-MM-DD HH24:MI:SS') AND TO_DATE('$date','YYYY-MM-DD HH24:MI:SS')";

    $avg_result1=oci_parse($connect, $avg1);
    oci_execute($avg_result1);
    $avg1_CURRENT1=0;
    $avg1_CURRENT2=0;
    $avg1_CURRENT3=0;
    $avg1_CURRENT4=0;
    $avg1_CURRENT5=0;
    $avg1_CURRENT6=0;
    $avg1_CURRENT7=0;
    $avg1_CURRENT8=0;   
    $avg1_CURRENT9=0;
    $avg1_CURRENT10=0;
    $avg1_CURRENT11=0;
    $avg1_CURRENT12=0;
    $avg1_CURRENT13=0;
    $avg1_CURRENT14=0;
    $avg1_CURRENT15=0;
    $avg1_CURRENT16=0;
    $avg1_CURRENT17=0;
    $avg1_CURRENT18=0;
    $avg1_CURRENT19=0;
    $avg1_CURRENT20=0;
    $avg1_CURRENT21=0;
    $avg1_CURRENT22=0;
    $avg1_CURRENT23=0;
    $avg1_CURRENT24=0;
    while($avg1_row=oci_fetch_array($avg_result1, OCI_ASSOC+OCI_RETURN_NULLS))
    {
        $avg1_CURRENT1=$avg1_row['AVG(LUNG_LEFT)'];
        $avg1_CURRENT2=$avg1_row['AVG(PERICARDIUM_LEFT)'];
        $avg1_CURRENT3=$avg1_row['AVG(HEART_LEFT)'];
        $avg1_CURRENT4=$avg1_row['AVG(LIVER_LEFT)'];
        $avg1_CURRENT5=$avg1_row['AVG(SPLEEN_LEFT)'];
        $avg1_CURRENT6=$avg1_row['AVG(STOMACH_LEFT)'];
        $avg1_CURRENT7=$avg1_row['AVG(TRIPLEFOCUS_LEFT)'];
        $avg1_CURRENT8=$avg1_row['AVG(SMALL_INTESTINE_LEFT)'];
        $avg1_CURRENT9=$avg1_row['AVG(LARGE_INTESTINE_LEFT)'];
        $avg1_CURRENT10=$avg1_row['AVG(GALLBLADDER_LEFT)'];
        $avg1_CURRENT11=$avg1_row['AVG(BLADDER_LEFT)'];                        
        $avg1_CURRENT12=$avg1_row['AVG(KIDNEY_LEFT)'];
        $avg1_CURRENT13=$avg1_row['AVG(LUNG_RIGHT)'];
        $avg1_CURRENT14=$avg1_row['AVG(PERICARDIUM_RIGHT)'];
        $avg1_CURRENT15=$avg1_row['AVG(HEART_RIGHT)'];
        $avg1_CURRENT16=$avg1_row['AVG(LIVER_RIGHT)'];
        $avg1_CURRENT17=$avg1_row['AVG(SPLEEN_RIGHT)'];
        $avg1_CURRENT18=$avg1_row['AVG(STOMACH_RIGHT)'];
        $avg1_CURRENT19=$avg1_row['AVG(TRIPLE_FOCUS_RIGHT)'];
        $avg1_CURRENT20=$avg1_row['AVG(SMALL_INTESTINE_RIGHT)'];
        $avg1_CURRENT21=$avg1_row['AVG(LARGE_INTESTINE_RIGHT)'];
        $avg1_CURRENT22=$avg1_row['AVG(GALLBLADDER_RIGHT)'];
        $avg1_CURRENT23=$avg1_row['AVG(BLADDER_RIGHT)'];
        $avg1_CURRENT24=$avg1_row['AVG(KIDNEY_RIGHT)'];
    }

    $avg3 = "SELECT AVG(LUNG_LEFT),AVG(PERICARDIUM_LEFT),AVG(HEART_LEFT),AVG(LIVER_LEFT),AVG(SPLEEN_LEFT),AVG(STOMACH_LEFT),AVG(TRIPLEFOCUS_LEFT),AVG(SMALL_INTESTINE_LEFT),AVG(LARGE_INTESTINE_LEFT),AVG(GALLBLADDER_LEFT),AVG(BLADDER_LEFT),AVG(KIDNEY_LEFT),AVG(LUNG_RIGHT),AVG(PERICARDIUM_RIGHT),AVG(HEART_RIGHT),AVG(LIVER_RIGHT),AVG(SPLEEN_RIGHT),AVG(STOMACH_RIGHT),AVG(TRIPLE_FOCUS_RIGHT),AVG(SMALL_INTESTINE_RIGHT),AVG(LARGE_INTESTINE_RIGHT),AVG(GALLBLADDER_RIGHT),AVG(BLADDER_RIGHT),AVG(KIDNEY_RIGHT) FROM CURRENTS WHERE ID='$id' AND TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS') BETWEEN TO_DATE('$date3', 'YYYY-MM-DD HH24:MI:SS') AND TO_DATE('$date','YYYY-MM-DD HH24:MI:SS')";

    $avg_result3=oci_parse($connect, $avg3);
    oci_execute($avg_result3);
    $avg3_CURRENT1=0;
    $avg3_CURRENT2=0;
    $avg3_CURRENT3=0;
    $avg3_CURRENT4=0;
    $avg3_CURRENT5=0;
    $avg3_CURRENT6=0;
    $avg3_CURRENT7=0;
    $avg3_CURRENT8=0;   
    $avg3_CURRENT9=0;
    $avg3_CURRENT10=0;
    $avg3_CURRENT11=0;
    $avg3_CURRENT12=0;
    $avg3_CURRENT13=0;
    $avg3_CURRENT14=0;
    $avg3_CURRENT15=0;
    $avg3_CURRENT16=0;
    $avg3_CURRENT17=0;
    $avg3_CURRENT18=0;
    $avg3_CURRENT19=0;
    $avg3_CURRENT20=0;
    $avg3_CURRENT21=0;
    $avg3_CURRENT22=0;
    $avg3_CURRENT23=0;
    $avg3_CURRENT24=0;
    while($avg3_row=oci_fetch_array($avg_result3, OCI_ASSOC+OCI_RETURN_NULLS))
    {
        $avg3_CURRENT1=$avg3_row['AVG(LUNG_LEFT)'];
        $avg3_CURRENT2=$avg3_row['AVG(PERICARDIUM_LEFT)'];
        $avg3_CURRENT3=$avg3_row['AVG(HEART_LEFT)'];
        $avg3_CURRENT4=$avg3_row['AVG(LIVER_LEFT)'];
        $avg3_CURRENT5=$avg3_row['AVG(SPLEEN_LEFT)'];
        $avg3_CURRENT6=$avg3_row['AVG(STOMACH_LEFT)'];
        $avg3_CURRENT7=$avg3_row['AVG(TRIPLEFOCUS_LEFT)'];
        $avg3_CURRENT8=$avg3_row['AVG(SMALL_INTESTINE_LEFT)'];
        $avg3_CURRENT9=$avg3_row['AVG(LARGE_INTESTINE_LEFT)'];
        $avg3_CURRENT10=$avg3_row['AVG(GALLBLADDER_LEFT)'];
        $avg3_CURRENT11=$avg3_row['AVG(BLADDER_LEFT)'];                        
        $avg3_CURRENT12=$avg3_row['AVG(KIDNEY_LEFT)'];
        $avg3_CURRENT13=$avg3_row['AVG(LUNG_RIGHT)'];
        $avg3_CURRENT14=$avg3_row['AVG(PERICARDIUM_RIGHT)'];
        $avg3_CURRENT15=$avg3_row['AVG(HEART_RIGHT)'];
        $avg3_CURRENT16=$avg3_row['AVG(LIVER_RIGHT)'];
        $avg3_CURRENT17=$avg3_row['AVG(SPLEEN_RIGHT)'];
        $avg3_CURRENT18=$avg3_row['AVG(STOMACH_RIGHT)'];
        $avg3_CURRENT19=$avg3_row['AVG(TRIPLE_FOCUS_RIGHT)'];
        $avg3_CURRENT20=$avg3_row['AVG(SMALL_INTESTINE_RIGHT)'];
        $avg3_CURRENT21=$avg3_row['AVG(LARGE_INTESTINE_RIGHT)'];
        $avg3_CURRENT22=$avg3_row['AVG(GALLBLADDER_RIGHT)'];
        $avg3_CURRENT23=$avg3_row['AVG(BLADDER_RIGHT)'];
        $avg3_CURRENT24=$avg3_row['AVG(KIDNEY_RIGHT)'];
    }

    $avg6 = "SELECT AVG(LUNG_LEFT),AVG(PERICARDIUM_LEFT),AVG(HEART_LEFT),AVG(LIVER_LEFT),AVG(SPLEEN_LEFT),AVG(STOMACH_LEFT),AVG(TRIPLEFOCUS_LEFT),AVG(SMALL_INTESTINE_LEFT),AVG(LARGE_INTESTINE_LEFT),AVG(GALLBLADDER_LEFT),AVG(BLADDER_LEFT),AVG(KIDNEY_LEFT),AVG(LUNG_RIGHT),AVG(PERICARDIUM_RIGHT),AVG(HEART_RIGHT),AVG(LIVER_RIGHT),AVG(SPLEEN_RIGHT),AVG(STOMACH_RIGHT),AVG(TRIPLE_FOCUS_RIGHT),AVG(SMALL_INTESTINE_RIGHT),AVG(LARGE_INTESTINE_RIGHT),AVG(GALLBLADDER_RIGHT),AVG(BLADDER_RIGHT),AVG(KIDNEY_RIGHT) FROM CURRENTS WHERE ID='$id' AND TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS') BETWEEN TO_DATE('$date6', 'YYYY-MM-DD HH24:MI:SS') AND TO_DATE('$date','YYYY-MM-DD HH24:MI:SS')";   
    $avg6_CURRENT1=0;
    $avg6_CURRENT2=0;
    $avg6_CURRENT3=0;
    $avg6_CURRENT4=0;
    $avg6_CURRENT5=0;
    $avg6_CURRENT6=0;
    $avg6_CURRENT7=0;
    $avg6_CURRENT8=0;   
    $avg6_CURRENT9=0;
    $avg6_CURRENT10=0;
    $avg6_CURRENT11=0;
    $avg6_CURRENT12=0;
    $avg6_CURRENT13=0;
    $avg6_CURRENT14=0;
    $avg6_CURRENT15=0;
    $avg6_CURRENT16=0;
    $avg6_CURRENT17=0;
    $avg6_CURRENT18=0;
    $avg6_CURRENT19=0;
    $avg6_CURRENT20=0;
    $avg6_CURRENT21=0;
    $avg6_CURRENT22=0;
    $avg6_CURRENT23=0;
    $avg6_CURRENT24=0;

    $avg_result6=oci_parse($connect, $avg6);
    oci_execute($avg_result6);
    while($avg6_row=oci_fetch_array($avg_result6, OCI_ASSOC+OCI_RETURN_NULLS))
    {
        $avg6_CURRENT1=$avg6_row['AVG(LUNG_LEFT)'];
        $avg6_CURRENT2=$avg6_row['AVG(PERICARDIUM_LEFT)'];
        $avg6_CURRENT3=$avg6_row['AVG(HEART_LEFT)'];
        $avg6_CURRENT4=$avg6_row['AVG(LIVER_LEFT)'];
        $avg6_CURRENT5=$avg6_row['AVG(SPLEEN_LEFT)'];
        $avg6_CURRENT6=$avg6_row['AVG(STOMACH_LEFT)'];
        $avg6_CURRENT7=$avg6_row['AVG(TRIPLEFOCUS_LEFT)'];
        $avg6_CURRENT8=$avg6_row['AVG(SMALL_INTESTINE_LEFT)'];
        $avg6_CURRENT9=$avg6_row['AVG(LARGE_INTESTINE_LEFT)'];
        $avg6_CURRENT10=$avg6_row['AVG(GALLBLADDER_LEFT)'];
        $avg6_CURRENT11=$avg6_row['AVG(BLADDER_LEFT)'];                        
        $avg6_CURRENT12=$avg6_row['AVG(KIDNEY_LEFT)'];
        $avg6_CURRENT13=$avg6_row['AVG(LUNG_RIGHT)'];
        $avg6_CURRENT14=$avg6_row['AVG(PERICARDIUM_RIGHT)'];
        $avg6_CURRENT15=$avg6_row['AVG(HEART_RIGHT)'];
        $avg6_CURRENT16=$avg6_row['AVG(LIVER_RIGHT)'];
        $avg6_CURRENT17=$avg6_row['AVG(SPLEEN_RIGHT)'];
        $avg6_CURRENT18=$avg6_row['AVG(STOMACH_RIGHT)'];
        $avg6_CURRENT19=$avg6_row['AVG(TRIPLE_FOCUS_RIGHT)'];
        $avg6_CURRENT20=$avg6_row['AVG(SMALL_INTESTINE_RIGHT)'];
        $avg6_CURRENT21=$avg6_row['AVG(LARGE_INTESTINE_RIGHT)'];
        $avg6_CURRENT22=$avg6_row['AVG(GALLBLADDER_RIGHT)'];
        $avg6_CURRENT23=$avg6_row['AVG(BLADDER_RIGHT)'];
        $avg6_CURRENT24=$avg6_row['AVG(KIDNEY_RIGHT)'];
    }
    $avgs1_left=array($avg1_CURRENT1, $avg1_CURRENT2, $avg1_CURRENT3, $avg1_CURRENT4, $avg1_CURRENT5, $avg1_CURRENT6, $avg1_CURRENT7, $avg1_CURRENT8, $avg1_CURRENT9, $avg1_CURRENT10, $avg1_CURRENT11, $avg1_CURRENT12);
    $avgs1_right=array($avg1_CURRENT13, $avg1_CURRENT14, $avg1_CURRENT15, $avg1_CURRENT16, $avg1_CURRENT17, $avg1_CURRENT18, $avg1_CURRENT19, $avg1_CURRENT20, $avg1_CURRENT21, $avg1_CURRENT22, $avg1_CURRENT23, $avg1_CURRENT24);

    $avgs3_left=array($avg3_CURRENT1, $avg3_CURRENT2, $avg3_CURRENT3, $avg3_CURRENT4, $avg3_CURRENT5, $avg3_CURRENT6, $avg3_CURRENT7, $avg3_CURRENT8, $avg3_CURRENT9, $avg3_CURRENT10, $avg3_CURRENT11, $avg3_CURRENT12);
    $avgs3_right=array($avg3_CURRENT13, $avg3_CURRENT14, $avg3_CURRENT15, $avg3_CURRENT16, $avg3_CURRENT17, $avg3_CURRENT18, $avg3_CURRENT19, $avg3_CURRENT20, $avg3_CURRENT21, $avg3_CURRENT22, $avg3_CURRENT23, $avg3_CURRENT24);

    $avgs6_left=array($avg6_CURRENT1, $avg6_CURRENT2, $avg6_CURRENT3, $avg6_CURRENT4, $avg6_CURRENT5, $avg6_CURRENT6, $avg6_CURRENT7, $avg6_CURRENT8, $avg6_CURRENT9, $avg6_CURRENT10, $avg6_CURRENT11, $avg6_CURRENT12);
    $avgs6_right=array($avg6_CURRENT13, $avg6_CURRENT14, $avg6_CURRENT15, $avg6_CURRENT16, $avg6_CURRENT17, $avg6_CURRENT18, $avg6_CURRENT19, $avg6_CURRENT20, $avg6_CURRENT21, $avg6_CURRENT22, $avg6_CURRENT23, $avg6_CURRENT24);

    $sql_mbti="SELECT * FROM BODY_TYPE WHERE ID='$id'";
    $mbti_result=oci_parse($connect, $sql_mbti);
    oci_execute($mbti_result);
    while($mbti_row=oci_fetch_array($mbti_result, OCI_ASSOC+OCI_RETURN_NULLS))
    {
        $EI = $mbti_row['EI'];
        $NS = $mbti_row['NS'];
        $FT = $mbti_row['FT'];
        $JP = $mbti_row['JP'];
        $body_type = $mbti_row['TYPE'];
    }
    $mbti = "";
    if($EI >= 50){
        $mbti = $mbti."E";
    }
    else{
        $mbti = $mbti."I";
    }
    if($NS >= 50){
        $mbti = $mbti."N";
    }
    else{
        $mbti = $mbti."S";
    }
    if($FT >= 50){
        $mbti = $mbti."F";
    }
    else{
        $mbti = $mbti."T";
    }
    if($JP >= 50){
        $mbti = $mbti."J";
    }
    else{
        $mbti = $mbti."P";
    }
    if($mbti == "ESTJ"){
        $color = "#4282A5";
    }
    else if($mbti == "ENTJ"){
        $color = "#1C2850";
    }
    else if($mbti == "ESFJ"){
        $color = "#387973";
    }
    else if($mbti == "ENFJ"){
        $color = "#519D93";
    }
    else if($mbti == "ESTP"){
        $color = "#564478";
    }
    else if($mbti == "ENTP"){
        $color = "#D05351";
    }
    else if($mbti == "ESFP"){
        $color = "#F48264";
    }
    else if($mbti == "ENFP"){
        $color = "#FEE0A0";
    }
    else if($mbti == "ISTJ"){
        $color = "#86C1DF";
    }
    else if($mbti == "INTJ"){
        $color = "#7D82A8";
    }
    else if($mbti == "ISFJ"){
        $color = "#ADD2C1";
    }
    else if($mbti == "INFJ"){
        $color = "#A5DBDD";
    }
    else if($mbti == "ISTP"){
        $color = "#AF8BB7";
    }
    else if($mbti == "INTP"){
        $color = "#F0C5D5";
    }
    else if($mbti == "ISFP"){
        $color = "#FDC2A2";
    }
    else if($mbti == "INFP"){
        $color = "#FEF4C7";
    }
                    
    $type1 = array("ISTP", "ISTJ", "ESTP", "ESTJ");
    $type2 = array("ENFJ", "ESFJ");
    $type3 = array("INTJ", "INTP", "INFJ", "INFP");
    $type4 = array("ENTJ", "ENTP", "ENFJ", "ENFP");
    $type5 = array("INTJ", "ENTJ", "ISTJ", "ESTJ");
    $type6 = array("ISTJ", "ISFJ");
    $type7 = array("ENFP", "ESFP");
    $type0 = "undifined";

    if($body_type == 1){
        $type = $type1;
    }
    else if($body_type == 2){
        $type = $type2;
    }
    else if($body_type == 3){
        $type = $type3;
    }
    else if($body_type == 4){
        $type = $type4;
    }
    else if($body_type == 5){
        $type = $type5;
    }
    else if($body_type == 6){
        $type = $type6;
    }
    else if($body_type == 7){
        $type = $type7;
    }
    else{
        $type = $type0;
        $body_type = 0;
    }
    oci_free_statement($avg_result1);
    oci_free_statement($avg_result3);
    oci_free_statement($avg_result6);
    oci_free_statement($mbti_result);
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
        .main{
            margin-top: 120px;
            position: relative;
            margin-left: 12%;
            margin-right: 5%;
        }
        .underline{
            display: inline;
            box-shadow: inset 0 -18px 0 #99CCFF;
        } 
        .MBTI_result{
            height: 710px;
            width: 100%;
            background-color: #fff;
            border-radius: 30px;
            border: none;
            position: relative;
            float: left;
        }
        .MBTI_result > .MBTI_title{
            margin-top: 25px;
            margin-left: 3%;
            margin-right: 4%;
            font-size: 25px;
            height: 30px;
            color: #404040;
            font-weight: bold;  
        }
        .MBTI_result > .MBTI_contents{
            margin-top: 10px;
            margin-left: 3%;
            margin-right: 4%;
            font-size: 25px;
            height: 100px;
            color: #404040;
            font-weight: bold;  
        }
        .MBTI_result > .MBTI_chart{
            margin-top: 30px;
        }
        .MBTI_result > .MBTI_chart > .my_MBTI_perc{
            display: flex;
            float: left;
            height: 450px;
            width: 40%;
            display: inline-block;
            margin-left: 5%;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }
        .MBTI_result > .MBTI_chart >.my_currents_MBTI{
            display: flex;
            float: right;
            height: 450px;
            width: 40%;
            display: inline-block;
            margin-right: 5%;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }
        .graph{
            position: relative;
            background-color: #fff;
            height: 730px;
            width: 100%;
            border-radius: 30px;
            border: none;
            position: relative;
            float: left;
            display: block;
            justify-content: center;
            margin-bottom: 120px;
            margin-top: 120px;
        }
        .graph > .currents_data_left_div{
            width: 90%;  
            height: 310px;
            padding: 20px;
            margin-left: 2.5%;
            margin-top: 20px;
            margin-right: 2.5%;
        }
        .graph > .currents_data_right_div{
            width: 90%;  
            height: 310px;
            padding: 20px;
            margin-left: 2.5%;
            margin-right: 2.5%;
        }
        .result{
            margin-top: 120px;
            height: 730px;
            width: 100%;
            position: relative;
            text-align: center;
            padding: 10px;
            font-size: 15px;
            background-color: transparent;
            border-bottom: 1px solid #404040;
        } 
        .result > .result_table{
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            border: none;
            border-radius: 5px;
        }
        .result > .result_table th{
            position: sticky;
            top: 0px;   
            height: 50px;
        }
        .result > .result_table tr{
            border-bottom: 1px solid #eee;
        }
        .result > .result_table tr:last-child{
            border: none;
        }
        .result > .result_table tbody tr:nth-child(odd){
            background-color: #eee;
        }
        .result > .result_table td{
            padding: 5px;
            text-align: center;
            height: 40px;
        }
        .result > .result_table tr th{
            background-color: #fff;
            color: #404040;
            border-bottom: 1px solid #eee;
        }
        .result > .result_table input{
            width: 30px;
        }
        .result > .result_table select{
            width: 40px;
        }
        #wrap{
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
            <a href="member_main.php">메인</a>
            <?php
            if(!isset($id)){?>
                <a href="mem_login.php" class="login_btn">로그인</a>
                <a href="member_signup.php" class="signup_btn">회원가입</a>
            <?php
            }
            else{?>
                <a href="current_input.php">전류입력 </a>
                <a href="member_mypage.php" style="border-right: solid 8px #0062F2">마이페이지</a>
            <?php
            }?>

        </div>
    </div>
    <div class="main">
        <div class="contents"></div>
        <div class="MBTI_result">
            <div class="MBTI_title">나의 MBTI 예측 결과</div>
            <div class="MBTI_chart">
                <div class="my_MBTI_perc">
                    <div style="color: #404040"><span class="underline">나의 MBTI 일치율</span></div>
                    <div style="margin-top: 15px; margin-bottom: 40px; color: #404040; font-size: 30px; text-align: center">"<?=$mbti?>"</div>
                    <canvas id="my_MBTI_perc_pie-chart"></canvas>
                </div>
                <div class="my_currents_MBTI">       
                    <div style="color: #404040"><span class="underline">나의 생체전류 MBTI</span></div>
                    <div style="margin-top: 15px; margin-bottom: 40px; color: #404040; font-size: 30px"><?=json_encode($type)?></div>
                    <canvas id="my_currents_MBTI_pie-chart"></canvas>
                </div>
            </div>
                <script>   
                    var EI = <?= $EI ?>;
                    var NS = <?= $NS ?>;
                    var FT = <?= $FT ?>;
                    var JP = <?= $JP ?>; 
                    var mbti = "";
                    var mbti_rate = 0;
                    if(EI >= 50){
                        mbti += "E";
                    }
                    else{
                        mbti += "I";
                    }
                    if(NS >= 50){
                        mbti += "N";
                    }
                    else{
                        mbti += "S";
                    }
                    if(FT >= 50){
                        mbti += "F";
                    }
                    else{
                        mbti += "T";
                    }
                    if(JP >= 50){
                        mbti += "J";
                    }
                    else{
                        mbti += "P";
                    }
                    var body_type = <?=$body_type?>; 
                    
                    var type1 = ["ISTP", "ISTJ", "ESTP", "ESTJ"];
                    var type2 = ["ENFJ", "ESFJ"];
                    var type3 = ["INTJ", "INTP", "INFJ", "INFP"];
                    var type4 = ["ENTJ", "ENTP", "ENFJ", "ENFP"];
                    var type5 = ["INTJ", "ENTJ", "ISTJ", "ESTJ"];
                    var type6 = ["ISTJ", "ISFJ"];
                    var type7 = ["ENFP", "ESFP"];
                    var type0 = [""];

                    var max = 0;
                    if(body_type == 1){
                        var count = 0;
                        for(var i = 0; i < type1[0].length; i++) {
                            if ( mbti[i] !== type1[0][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type1[1].length; i++) {
                            if ( mbti[i] !== type1[1][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type1[2].length; i++) {
                            if ( mbti[i] !== type1[2][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type1[3].length; i++) {
                            if ( mbti[i] !== type1[3][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }
                    }
                    else if(body_type == 2){
                        var count = 0;
                        for(var i = 0; i < type2[0].length; i++) {
                            if ( mbti[i] !== type2[0][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type2[1].length; i++) {
                            if ( mbti[i] !== type2[1][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }
                    }
                    else if(body_type == 3){
                        var count = 0;
                        for(var i = 0; i < type3[0].length; i++) {
                            if ( mbti[i] !== type3[0][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type3[1].length; i++) {
                            if ( mbti[i] !== type3[1][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type3[2].length; i++) {
                            if ( mbti[i] !== type3[2][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type3[3].length; i++) {
                            if ( mbti[i] !== type3[3][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }
                    }
                    else if(body_type == 4){
                        var count = 0;
                        for(var i = 0; i < type4[0].length; i++) {
                            if ( mbti[i] !== type4[0][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type4[1].length; i++) {
                            if ( mbti[i] !== type4[1][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type4[2].length; i++) {
                            if ( mbti[i] !== type4[2][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type4[3].length; i++) {
                            if ( mbti[i] !== type4[3][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }
                    }
                    else if(body_type == 5){
                        var count = 0;
                        for(var i = 0; i < type5[0].length; i++) {
                            if ( mbti[i] !== type5[0][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type5[1].length; i++) {
                            if ( mbti[i] !== type5[1][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type5[2].length; i++) {
                            if ( mbti[i] !== type5[2][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type5[3].length; i++) {
                            if ( mbti[i] !== type5[3][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }
                    }
                    else if(body_type == 6){
                        var count = 0;
                        for(var i = 0; i < type6[0].length; i++) {
                            if ( mbti[i] !== type6[0][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type6[1].length; i++) {
                            if ( mbti[i] !== type6[1][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }
                    }
                    else if(body_type == 7){
                        var count = 0;
                        for(var i = 0; i < type7[0].length; i++) {
                            if ( mbti[i] !== type7[0][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }

                        var count = 0;
                        for(var i = 0; i < type7[1].length; i++) {
                            if ( mbti[i] !== type7[1][i] ) continue;
                            count++; 
                        }
                        count = count * 25;
                        if(count > max){
                            max = count;
                        }
                    }
                    else if(body_type == 0){
                        max = 0;
                    }
                    mbti_rate = max;

                    if(mbti == "ESTJ"){
                        var color = "#4282A5";
                    }
                    else if(mbti == "ENTJ"){
                        var color = "#1C2850";
                    }
                    else if(mbti == "ESFJ"){
                        var color = "#387973";
                    }
                    else if(mbti == "ENFJ"){
                        var color = "#519D93";
                    }
                    else if(mbti == "ESTP"){
                        var color = "#564478";
                    }
                    else if(mbti == "ENTP"){
                        var color = "#D05351";
                    }
                    else if(mbti == "ESFP"){
                        var color = "#F48264";
                    }
                    else if(mbti == "ENFP"){
                        var color = "#FEE0A0";
                    }
                    else if(mbti == "ISTJ"){
                        var color = "#86C1DF";
                    }
                    else if(mbti == "INTJ"){
                        var color = "#7D82A8";
                    }
                    else if(mbti == "ISFJ"){
                        var color = "#ADD2C1";
                    }
                    else if(mbti == "INFJ"){
                        var color = "#A5DBDD";
                    }
                    else if(mbti == "ISTP"){
                        var color = "#AF8BB7";
                    }
                    else if(mbti == "INTP"){
                        var color = "#F0C5D5";
                    }
                    else if(mbti == "ISFP"){
                        var color = "#FDC2A2";
                    }
                    else if(mbti == "INFP"){
                        var color = "#FEF4C7";
                    }
                    else{
                        var color = "#eeeeee";
                    }

                    var ESTJ_color = "#4282A5";
                    var ENTJ_color = "#1C2850";
                    var ESFJ_color = "#387973";
                    var ENFJ_color = "#519D93";
                    var ESTP_color = "#564478";
                    var ENTP_color = "#D05351";
                    var ESFP_color = "#F48264";
                    var ENFP_color = "#FEE0A0";
                    var ISTJ_color = "#86C1DF";
                    var INTJ_color = "#7D82A8";
                    var ISFJ_color = "#ADD2C1";
                    var INFJ_color = "#A5DBDD";
                    var ISTP_color = "#AF8BB7";
                    var INTP_color = "#F0C5D5";
                    var ISFP_color = "#FDC2A2";
                    var INFP_color = "#FEF4C7";

                    if(body_type == 1){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: type1,
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [ISTP_color, ISTJ_color, ESTP_color, ESTJ_color],
                                    data: [25, 25, 25, 25]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });
                    }
                    else if(body_type == 2){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: type2,
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [ENFJ_color, ESFJ_color],
                                    data: [50, 50]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });
                    }
                    else if(body_type == 3){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: type3,
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [INTJ_color, INTP_color, INFJ_color, INFP_color],
                                    data: [25, 25, 25, 25]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });
                    }
                    else if(body_type == 4){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: type4,
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [ENTJ_color, ENTP_color, ENFJ_color, ENFP_color],
                                    data: [25, 25, 25, 25]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });
                    }
                    else if(body_type == 5){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: type5,
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [INTJ_color, ENTJ_color, ISTJ_color, ESTJ_color],
                                    data: [25, 25, 25, 25]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });
                    }
                    else if(body_type == 6){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: type6,
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [ISTJ_color, ISFJ_color],
                                    data: [50, 50]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });
                    }
                    else if(body_type == 7){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: type7,
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [ENFP_color, ESFP_color],
                                    data: [50, 50]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });
                    }
                    else if(body_type == 0){
                        new Chart(document.getElementById("my_currents_MBTI_pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: ['판별 불가'],
                                datasets: [{
                                    label: "RESULT",
                                    backgroundColor: [color],
                                    data: [0, 100]
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: false,
                                    text: '나의 생체전류 MBTI'
                                }
                            }
                        });                     
                    }
                    new Chart(document.getElementById("my_MBTI_perc_pie-chart"), {
                        type: 'doughnut',
                        data: {
                        labels: [mbti],
                        datasets: [{
                                label: "RESULT",
                                backgroundColor: [color],
                                data: [mbti_rate, 100-mbti_rate]
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            title: {
                                display: false,
                                text: '나의 생체전류 MBTI 일치율',
                                fontSize: 18,
                            position: 'bottom'
                            },
                            animation: {
                                onComplete: function () {
                                    var chartInstance = this.chart,
                                    ctx = chartInstance.ctx;
                                    ctx.font = "30px verdana";
                                    ctx.fillStyle = 'black';
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'middle';
                                    this.data.datasets.forEach(function (dataset, i) {
                                        var meta = chartInstance.controller.getDatasetMeta(i);
                                        meta.data.forEach(function (bar, index) {
                                            var data = dataset.data[0] + '%';							
                                            ctx.fillText(data, bar._model.x, bar._model.y);
                                        });
                                    });
                                }
                            }
                        }
                    });
                </script>
        </div>
        <div class="graph">
            <div class="currents_data_left_div">
                <canvas id="currents_data_left"></canvas>
            </div>
            <div class="currents_data_right_div">
                <canvas id="currents_data_right"></canvas>
            </div>
                    <script>
                        var avgs1_left = <?= json_encode($avgs1_left) ?>;
                        var avgs3_left = <?= json_encode($avgs3_left) ?>;
                        var avgs6_left = <?= json_encode($avgs6_left) ?>;
                        
                        var avgs1_right = <?= json_encode($avgs1_right) ?>;
                        var avgs3_right = <?= json_encode($avgs3_right) ?>;
                        var avgs6_right = <?= json_encode($avgs6_right) ?>;
                        
                        new Chart(document.getElementById("currents_data_left"), {
                            type: 'line',
                            data: {
                                labels: ['폐', '심포', '심장', '간', '췌장', '위', '삼초', '소장', '대장', '쓸개', '방광', '신장'],
                                datasets: [{
                                    label: '1개월',
                                    type: 'line',
                                    data: [avgs1_left[0], avgs1_left[1], avgs1_left[2], avgs1_left[3], avgs1_left[4], avgs1_left[5], avgs1_left[6], avgs1_left[7], avgs1_left[8], avgs1_left[9], avgs1_left[10], avgs1_left[11]],
                                    borderColor: "#EF476F",
                                    backgroundColor: "#EF476F",
                                    fill: false,
                                    lineTension: 0
                                },{
                                    label: '3개월',
                                    type: 'line',
                                    data: [avgs3_left[0], avgs3_left[1], avgs3_left[2], avgs3_left[3], avgs3_left[4], avgs3_left[5], avgs3_left[6], avgs3_left[7], avgs3_left[8], avgs3_left[9], avgs3_left[10], avgs3_left[11]],
                                    borderColor: "#FFD166",
                                    backgroundColor: "#FFD166",
                                    fill: false,
                                    lineTension: 0
                                },{
                                    label: '6개월',
                                    type: 'line',
                                    data: [avgs6_left[0], avgs6_left[1], avgs6_left[2], avgs6_left[3], avgs6_left[4], avgs6_left[5], avgs6_left[6], avgs6_left[7], avgs6_left[8], avgs6_left[9], avgs6_left[10], avgs6_left[11]],
                                    borderColor: "#118AB2",
                                    backgroundColor: "#118AB2",
                                    fill: false,
                                    lineTension: 0
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                responsive: true,
                                title: {
                                    display: true,
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
                                            display: true,
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
                                    label: '1개월',
                                    type: 'line',
                                    data: [avgs1_right[0], avgs1_right[1], avgs1_right[2], avgs1_right[3], avgs1_right[4], avgs1_right[5], avgs1_right[6], avgs1_right[7], avgs1_right[8], avgs1_right[9], avgs1_right[10], avgs1_right[11]],
                                    borderColor: "#EF476F",
                                    backgroundColor: "#EF476F",
                                    fill: false,
                                    lineTension: 0
                                },{
                                    label: '3개월',
                                    type: 'line',
                                    data: [avgs3_right[0], avgs3_right[1], avgs3_right[2], avgs3_right[3], avgs3_right[4], avgs3_right[5], avgs3_right[6], avgs3_right[7], avgs3_right[8], avgs3_right[9], avgs3_right[10], avgs3_right[11]],
                                    borderColor: "#FFD166",
                                    backgroundColor: "#FFD166",
                                    fill: false,
                                    lineTension: 0
                                },{
                                    label: '6개월',
                                    type: 'line',
                                    data: [avgs6_right[0], avgs6_right[1], avgs6_right[2], avgs6_right[3], avgs6_right[4], avgs6_right[5], avgs6_right[6], avgs6_right[7], avgs6_right[8], avgs6_right[9], avgs6_right[10], avgs6_right[11]],
                                    borderColor: "#118AB2",
                                    backgroundColor: "#118AB2",
                                    fill: false,
                                    lineTension: 0
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                responsive: true,
                                title: {
                                    display: true,
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
                                            display: true,
                                            labelString: '전류 값'
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
        </div>
        <div class="result" style="height: 730px; overflow-y: auto">
                <table class="result_table">
                    <thead>
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
                            <th>수정</th>
                            <th>삭제</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $ENUM = (isset($_GET["ENUM"]) && $_GET["ENUM"]) ? $_GET["ENUM"] : NULL;
                        $num=1;

                        if(isset($ENUM)){
                            $sql2="SELECT 
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
                            $all2=oci_parse($connect, $sql2);
                            oci_execute($all2);
                            while($edit_row=oci_fetch_array($all2, OCI_ASSOC+OCI_RETURN_NULLS))
                            {
                                $edit_NUM=$edit_row['NUM'];
                                $edit_CURRENT1=$edit_row['LUNG_LEFT'];
                                $edit_CURRENT2=$edit_row['PERICARDIUM_LEFT'];
                                $edit_CURRENT3=$edit_row['HEART_LEFT'];
                                $edit_CURRENT4=$edit_row['LIVER_LEFT'];
                                $edit_CURRENT5=$edit_row['SPLEEN_LEFT'];
                                $edit_CURRENT6=$edit_row['STOMACH_LEFT'];
                                $edit_CURRENT7=$edit_row['TRIPLEFOCUS_LEFT'];
                                $edit_CURRENT8=$edit_row['SMALL_INTESTINE_LEFT'];
                                $edit_CURRENT9=$edit_row['LARGE_INTESTINE_LEFT'];
                                $edit_CURRENT10=$edit_row['GALLBLADDER_LEFT'];
                                $edit_CURRENT11=$edit_row['BLADDER_LEFT'];                        
                                $edit_CURRENT12=$edit_row['KIDNEY_LEFT'];
                                $edit_CURRENT13=$edit_row['LUNG_RIGHT'];
                                $edit_CURRENT14=$edit_row['PERICARDIUM_RIGHT'];
                                $edit_CURRENT15=$edit_row['HEART_RIGHT'];
                                $edit_CURRENT16=$edit_row['LIVER_RIGHT'];
                                $edit_CURRENT17=$edit_row['SPLEEN_RIGHT'];
                                $edit_CURRENT18=$edit_row['STOMACH_RIGHT'];
                                $edit_CURRENT19=$edit_row['TRIPLE_FOCUS_RIGHT'];
                                $edit_CURRENT20=$edit_row['SMALL_INTESTINE_RIGHT'];
                                $edit_CURRENT21=$edit_row['LARGE_INTESTINE_RIGHT'];
                                $edit_CURRENT22=$edit_row['GALLBLADDER_RIGHT'];
                                $edit_CURRENT23=$edit_row['BLADDER_RIGHT'];
                                $edit_CURRENT24=$edit_row['KIDNEY_RIGHT'];
                                $edit_DATETIME=$edit_row['INPUT_DATE'];
                                $edit_SLEEP=$edit_row['SLEEP'];
                                $edit_BODY=$edit_row['BODY'];
                                $edit_SMOKE=$edit_row['SMOKE'];
                                $edit_DRINK=$edit_row['DRINK'];

                                $c1 = $edit_CURRENT1;
                                $c2 = $edit_CURRENT2;
                                $c3 = $edit_CURRENT3;
                                $c4 = $edit_CURRENT4;
                                $c5 = $edit_CURRENT5;
                                $c6 = $edit_CURRENT6;
                                $c7 = $edit_CURRENT7;
                                $c8 = $edit_CURRENT8;
                                $c9 = $edit_CURRENT9;
                                $c10 = $edit_CURRENT10;
                                $c11 = $edit_CURRENT11;                       
                                $c12 = $edit_CURRENT12;
                                $c13 = $edit_CURRENT13;
                                $c14 = $edit_CURRENT14;
                                $c15 = $edit_CURRENT15;
                                $c16 = $edit_CURRENT16;
                                $c17 = $edit_CURRENT17;
                                $c18 = $edit_CURRENT18;
                                $c19 = $edit_CURRENT19;
                                $c20 = $edit_CURRENT20;
                                $c21 = $edit_CURRENT21;
                                $c22 = $edit_CURRENT22;
                                $c23 = $edit_CURRENT23;
                                $c24 = $edit_CURRENT24;
                                $cdate = $edit_DATETIME;
                                $csleep = $edit_SLEEP;
                                $cbody = $edit_BODY;
                                $csmoke = $edit_SMOKE;
                                $cdrink = $edit_DRINK;
                                if(isset($ENUM) && $edit_NUM == $ENUM){
                                    if($edit_SMOKE==1){
                                        $edit_smoke_val = '예';
                                    }
                                    else if($edit_SMOKE==0){
                                        $edit_smoke_val = '아니오';
                                    }
                            
                                    if($edit_DRINK==0){
                                        $edit_drink_val = '아니오';
                                    }
                                    else if($edit_DRINK==1){
                                        $edit_drink_val = '적당한 음주';
                                    }
                                    else if($edit_DRINK==2){
                                        $edit_drink_val = '과음';
                                    }
                    ?>
                        <form class="edit_current_form" method="POST" action="currents_data_edit.php?ENUM=<?=$ENUM?>">
                            <input type = "hidden" name = "c1" value ="<?=$c1?>">
                            <input type = "hidden" name = "c2" value ="<?=$c2?>">
                            <input type = "hidden" name = "c3" value ="<?=$c3?>">
                            <input type = "hidden" name = "c4" value ="<?=$c4?>">
                            <input type = "hidden" name = "c5" value ="<?=$c5?>">
                            <input type = "hidden" name = "c6" value ="<?=$c6?>">
                            <input type = "hidden" name = "c7" value ="<?=$c7?>">
                            <input type = "hidden" name = "c8" value ="<?=$c8?>">
                            <input type = "hidden" name = "c9" value ="<?=$c9?>">
                            <input type = "hidden" name = "c10" value ="<?=$c10?>">
                            <input type = "hidden" name = "c11" value ="<?=$c11?>">
                            <input type = "hidden" name = "c12" value ="<?=$c12?>">
                            <input type = "hidden" name = "c13" value ="<?=$c13?>">
                            <input type = "hidden" name = "c14" value ="<?=$c14?>">
                            <input type = "hidden" name = "c15" value ="<?=$c15?>">
                            <input type = "hidden" name = "c16" value ="<?=$c16?>">
                            <input type = "hidden" name = "c17" value ="<?=$c17?>">
                            <input type = "hidden" name = "c18" value ="<?=$c18?>">
                            <input type = "hidden" name = "c19" value ="<?=$c19?>">
                            <input type = "hidden" name = "c20" value ="<?=$c20?>">
                            <input type = "hidden" name = "c21" value ="<?=$c21?>">
                            <input type = "hidden" name = "c22" value ="<?=$c22?>">
                            <input type = "hidden" name = "c23" value ="<?=$c23?>">
                            <input type = "hidden" name = "c24" value ="<?=$c24?>">
                            <input type = "hidden" name = "cdate" value ="<?=$cdate?>">
                            <input type = "hidden" name = "csleep" value ="<?=$csleep?>">
                            <input type = "hidden" name = "cbody" value ="<?=$cbody?>">
                            <input type = "hidden" name = "csmoke" value ="<?=$csmoke?>">
                            <input type = "hidden" name = "cdrink" value ="<?=$cdrink?>">

                            <tr style="width: 100%">         
                                <td><?=$ENUM?></td>           
                                <td><input type="number" name="edit_current1" value="<?=$edit_CURRENT1?>" min="0" max="50" placeholder="1"></td>
                                <td><input type="number" name="edit_current2" value="<?=$edit_CURRENT2?>" min="0" max="50" placeholder="2"></td>
                                <td><input type="number" name="edit_current3" value="<?=$edit_CURRENT3?>" min="0" max="50" placeholder="3"></td>     
                                <td><input type="number" name="edit_current4" value="<?=$edit_CURRENT4?>" min="0" max="50" placeholder="4"></td>
                                <td><input type="number" name="edit_current5" value="<?=$edit_CURRENT5?>" min="0" max="50" placeholder="5"></td>
                                <td><input type="number" name="edit_current6" value="<?=$edit_CURRENT6?>" min="0" max="50" placeholder="6"></td>
                                <td><input type="number" name="edit_current7" value="<?=$edit_CURRENT7?>" min="0" max="50" placeholder="7"></td>
                                <td><input type="number" name="edit_current8" value="<?=$edit_CURRENT8?>" min="0" max="50" placeholder="8"></td>
                                <td><input type="number" name="edit_current9" value="<?=$edit_CURRENT9?>" min="0" max="50" placeholder="9"></td>
                                <td><input type="number" name="edit_current10" value="<?=$edit_CURRENT10?>" min="0" max="50" placeholder="10"></td>
                                <td><input type="number" name="edit_current11" value="<?=$edit_CURRENT11?>" min="0" max="50" placeholder="11"></td>
                                <td><input type="number" name="edit_current12" value="<?=$edit_CURRENT12?>" min="0" max="50" placeholder="12"></td>
                                <td><input type="number" name="edit_current13" value="<?=$edit_CURRENT13?>" min="0" max="50" placeholder="13"></td>
                                <td><input type="number" name="edit_current14" value="<?=$edit_CURRENT14?>" min="0" max="50" placeholder="14"></td>
                                <td><input type="number" name="edit_current15" value="<?=$edit_CURRENT15?>" min="0" max="50" placeholder="15"></td>
                                <td><input type="number" name="edit_current16" value="<?=$edit_CURRENT16?>" min="0" max="50" placeholder="16"></td>
                                <td><input type="number" name="edit_current17" value="<?=$edit_CURRENT17?>" min="0" max="50" placeholder="17"></td>
                                <td><input type="number" name="edit_current18" value="<?=$edit_CURRENT18?>" min="0" max="50" placeholder="18"></td>
                                <td><input type="number" name="edit_current19" value="<?=$edit_CURRENT19?>" min="0" max="50" placeholder="19"></td>
                                <td><input type="number" name="edit_current20" value="<?=$edit_CURRENT20?>" min="0" max="50" placeholder="20"></td>
                                <td><input type="number" name="edit_current21" value="<?=$edit_CURRENT21?>" min="0" max="50" placeholder="21"></td>
                                <td><input type="number" name="edit_current22" value="<?=$edit_CURRENT22?>" min="0" max="50" placeholder="22"></td>
                                <td><input type="number" name="edit_current23" value="<?=$edit_CURRENT23?>" min="0" max="50" placeholder="23"></td>
                                <td><input type="number" name="edit_current24" value="<?=$edit_CURRENT24?>" min="0" max="50" placeholder="24"></td>
                                <td><input type="datetime-local" name="edit_dateTimeLocal" step="1" value="<?=$edit_DATETIME?>" placeholder="측정시간" style="width: 100px"></td>
                                <td><input type="number" name="edit_sleep" min="0" max="24" value="<?=$edit_SLEEP?>" placeholder="수면시간"></td>
                                <td><input type="number" name="edit_body" min="0" max="5" value="<?=$edit_BODY?>" placeholder="몸상태"></td>
                                <td>
                                    <select name="edit_smoke">
                                        <option value="<?=$edit_SMOKE?>" selected><?=$edit_smoke_val?></option>
                                        <option value="1">예</option>
                                        <option value="0">아니오</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="edit_drink">
                                    <option value="<?=$edit_DRINK?>" selected><?=$edit_drink_val?></option>
                                        <option value="0">아니오</option>
                                        <option value="1">적당한 음주</option>
                                        <option value="2">과음</option>
                                    </select>
                                </td>
                                <td><button type = "submit" style="border:none; color: #0062F2; font-size: 16px">완료</button></td>
                            </tr>
                        </form>
                        <?php
                                }
                                $num++;
                            }
                        }
                        else
                        {
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
                        <form class="edit_current_form" method="POST" action="currents_data_delete.php?ENUM=<?=$ENUM?>">
                            <input type = "hidden" name = "c1" value ="<?=$CURRENT1?>">
                            <input type = "hidden" name = "c2" value ="<?=$CURRENT2?>">
                            <input type = "hidden" name = "c3" value ="<?=$CURRENT3?>">
                            <input type = "hidden" name = "c4" value ="<?=$CURRENT4?>">
                            <input type = "hidden" name = "c5" value ="<?=$CURRENT5?>">
                            <input type = "hidden" name = "c6" value ="<?=$CURRENT6?>">
                            <input type = "hidden" name = "c7" value ="<?=$CURRENT7?>">
                            <input type = "hidden" name = "c8" value ="<?=$CURRENT8?>">
                            <input type = "hidden" name = "c9" value ="<?=$CURRENT9?>">
                            <input type = "hidden" name = "c10" value ="<?=$CURRENT10?>">
                            <input type = "hidden" name = "c11" value ="<?=$CURRENT11?>">
                            <input type = "hidden" name = "c12" value ="<?=$CURRENT12?>">
                            <input type = "hidden" name = "c13" value ="<?=$CURRENT13?>">
                            <input type = "hidden" name = "c14" value ="<?=$CURRENT14?>">
                            <input type = "hidden" name = "c15" value ="<?=$CURRENT15?>">
                            <input type = "hidden" name = "c16" value ="<?=$CURRENT16?>">
                            <input type = "hidden" name = "c17" value ="<?=$CURRENT17?>">
                            <input type = "hidden" name = "c18" value ="<?=$CURRENT18?>">
                            <input type = "hidden" name = "c19" value ="<?=$CURRENT19?>">
                            <input type = "hidden" name = "c20" value ="<?=$CURRENT20?>">
                            <input type = "hidden" name = "c21" value ="<?=$CURRENT21?>">
                            <input type = "hidden" name = "c22" value ="<?=$CURRENT22?>">
                            <input type = "hidden" name = "c23" value ="<?=$CURRENT23?>">
                            <input type = "hidden" name = "c24" value ="<?=$CURRENT24?>">
                            <input type = "hidden" name = "cdate" value ="<?=$DATETIME?>">
                            <input type = "hidden" name = "csleep" value ="<?=$SLEEP?>">
                            <input type = "hidden" name = "cbody" value ="<?=$BODY?>">
                            <input type = "hidden" name = "csmoke" value ="<?=$SMOKE?>">
                            <input type = "hidden" name = "cdrink" value ="<?=$DRINK?>">
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
                                <td> <a href="member_mypage.php?ENUM=<?=$NUM?>" style="text-decoration: none; color: #0062F2">수정</a></td>
                                <td> <button type = "submit" style="border:none; color: #0062F2; font-size: 16px; background-color: transparent" onclick="return confirm('삭제하시겠습니까?')">삭제</button></td>
                            </tr>
                        </form>
                    <?php
                            }
                            $num++;
                        }
    
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
oci_free_statement($all2);
oci_free_statement($all);
oci_close($connect);
?>
</body>
</html>
