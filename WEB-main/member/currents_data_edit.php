<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();
    //oracle data base address
    //enter HOST & PORT
    $db='
    (DESCRIPTION=
        (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
        )
        (CONNECT_DATA=
        (SID=orcl)
        )
    )';

    //enter user name & password
    $username = 'db501group5';
    $password = 'test1234';

    //connect with orable_db
    $connect = oci_connect($username, $password, $db);

    if(!isset($_SESSION['ID'])){
        echo "<script>alert('로그인 후 이용하세요.');location.replace('mem_login.php');</script>";
    }
    else
    {

        $id = $_SESSION['ID'];
        $pw = $_SESSION['PW'];
        $ENUM = $_GET['ENUM']; 
        $edit_Current1=$_POST['edit_current1'];
        $edit_Current2=$_POST['edit_current2'];
        $edit_Current3=$_POST['edit_current3'];
        $edit_Current4=$_POST['edit_current4'];
        $edit_Current5=$_POST['edit_current5'];
        $edit_Current6=$_POST['edit_current6'];
        $edit_Current7=$_POST['edit_current7'];
        $edit_Current8=$_POST['edit_current8'];
        $edit_Current9=$_POST['edit_current9'];
        $edit_Current10=$_POST['edit_current10'];
        $edit_Current11=$_POST['edit_current11'];
        $edit_Current12=$_POST['edit_current12'];
        $edit_Current13=$_POST['edit_current13'];
        $edit_Current14=$_POST['edit_current14'];
        $edit_Current15=$_POST['edit_current15'];
        $edit_Current16=$_POST['edit_current16'];
        $edit_Current17=$_POST['edit_current17'];
        $edit_Current18=$_POST['edit_current18'];
        $edit_Current19=$_POST['edit_current19'];
        $edit_Current20=$_POST['edit_current20'];
        $edit_Current21=$_POST['edit_current21'];
        $edit_Current22=$_POST['edit_current22'];
        $edit_Current23=$_POST['edit_current23'];
        $edit_Current24=$_POST['edit_current24'];
        $edit_DateTimeLocal=date('Y-m-d H:i:s', strtotime($_POST['edit_dateTimeLocal']));
        $edit_Sleep=$_POST['edit_sleep'];
        $edit_Body=$_POST['edit_body'];
        $edit_Smoke=$_POST['edit_smoke'];
        $edit_Drink=$_POST['edit_drink'];

        $c1=$_POST['c1'];
        $c2=$_POST['c2'];
        $c3=$_POST['c3'];
        $c4=$_POST['c4'];
        $c5=$_POST['c5'];
        $c6=$_POST['c6'];
        $c7=$_POST['c7'];
        $c8=$_POST['c8'];
        $c9=$_POST['c9'];
        $c10=$_POST['c10'];
        $c11=$_POST['c11'];
        $c12=$_POST['c12'];
        $c13=$_POST['c13'];
        $c14=$_POST['c14'];
        $c15=$_POST['c15'];
        $c16=$_POST['c16'];
        $c17=$_POST['c17'];
        $c18=$_POST['c18'];
        $c19=$_POST['c19'];
        $c20=$_POST['c20'];
        $c21=$_POST['c21'];
        $c22=$_POST['c22'];
        $c23=$_POST['c23'];
        $c24=$_POST['c24'];
        $cdate=$_POST['cdate'];
        $csleep=$_POST['csleep'];
        $cbody=$_POST['cbody'];
        $cdrink=$_POST['cdrink'];
        $csmoke=$_POST['csmoke'];

        if(isset($edit_Current1)&&isset($edit_Current2)&&isset($edit_Current3)&&isset($edit_Current4)&&isset($edit_Current5)&&isset($edit_Current6)&&isset($edit_Current7)&&isset($edit_Current8)&&isset($edit_Current9)&&isset($edit_Current10)&&isset($edit_Current11)&&isset($edit_Current12)&&isset($edit_Current13)&&isset($edit_Current14)&&isset($edit_Current15)&&isset($edit_Current16)&&isset($edit_Current17)&&isset($edit_Current18)&&isset($edit_Current19)&&isset($edit_Current20)&&isset($edit_Current21)&&isset($edit_Current22)&&isset($edit_Current23)&&isset($edit_Current24)&&isset($edit_DateTimeLocal)&&isset($edit_Sleep)&&isset($edit_Body)&&isset($edit_Smoke)&&isset($edit_Drink)){
            
            $sql3="UPDATE CURRENTS
            SET 
            ID = '$id'
            , LUNG_LEFT = $edit_Current1
            , PERICARDIUM_LEFT = $edit_Current2
            , HEART_LEFT = $edit_Current3
            , LIVER_LEFT = $edit_Current4
            , SPLEEN_LEFT = $edit_Current5
            , STOMACH_LEFT = $edit_Current6
            , TRIPLEFOCUS_LEFT = $edit_Current7
            , SMALL_INTESTINE_LEFT = $edit_Current8
            , LARGE_INTESTINE_LEFT = $edit_Current9
            , GALLBLADDER_LEFT = $edit_Current10
            , BLADDER_LEFT = $edit_Current11
            , KIDNEY_LEFT = $edit_Current12
            , LUNG_RIGHT = $edit_Current13
            , PERICARDIUM_RIGHT = $edit_Current14
            , HEART_RIGHT = $edit_Current15
            , LIVER_RIGHT = $edit_Current16
            , SPLEEN_RIGHT = $edit_Current17
            , STOMACH_RIGHT = $edit_Current18
            , TRIPLE_FOCUS_RIGHT = $edit_Current19
            , SMALL_INTESTINE_RIGHT = $edit_Current20
            , LARGE_INTESTINE_RIGHT = $edit_Current21
            , GALLBLADDER_RIGHT = $edit_Current22
            , BLADDER_RIGHT = $edit_Current23
            , KIDNEY_RIGHT = $edit_Current24
            , INPUT_DATE = '$edit_DateTimeLocal'
            WHERE ID = '$id' 
            AND LUNG_LEFT = $c1 
            AND PERICARDIUM_LEFT = $c2 
            AND HEART_LEFT = $c3 
            AND LIVER_LEFT = $c4 
            AND SPLEEN_LEFT = $c5 
            AND STOMACH_LEFT = $c6 
            AND TRIPLEFOCUS_LEFT = $c7 
            AND SMALL_INTESTINE_LEFT = $c8 
            AND LARGE_INTESTINE_LEFT = $c9 
            AND GALLBLADDER_LEFT = $c10 
            AND BLADDER_LEFT = $c11 
            AND KIDNEY_LEFT = $c12 
            AND LUNG_RIGHT = $c13 
            AND PERICARDIUM_RIGHT = $c14 
            AND HEART_RIGHT = $c15 
            AND LIVER_RIGHT = $c16 
            AND SPLEEN_RIGHT = $c17 
            AND STOMACH_RIGHT = $c18 
            AND TRIPLE_FOCUS_RIGHT = $c19 
            AND SMALL_INTESTINE_RIGHT = $c20 
            AND LARGE_INTESTINE_RIGHT = $c21 
            AND GALLBLADDER_RIGHT = $c22 
            AND BLADDER_RIGHT = $c23 
            AND KIDNEY_RIGHT = $c24 
            AND INPUT_DATE = '$cdate'";

            $sql5="UPDATE CONDITION 
            SET ID = '$id', SLEEP = $edit_Sleep, BODY = $edit_Body, SMOKE = $edit_Smoke, DRINK = $edit_Drink, INPUT_DATE = '$edit_DateTimeLocal'
            WHERE ID='$id' AND INPUT_DATE='$cdate' AND SLEEP=$csleep AND BODY=$cbody AND SMOKE=$csmoke AND DRINK=$cdrink";
            $edit1=oci_parse($connect, $sql3);
            $edit2=oci_parse($connect, $sql5);
            oci_execute($edit1);
            oci_execute($edit2);
            oci_free_statement($edit1);
            oci_free_statement($edit2);
            oci_close($connect);
            echo "
            <script>
                alert('수정되었습니다.');location.replace('member_mypage.php');
            </script>
        "; 
        }
        
    }
?>