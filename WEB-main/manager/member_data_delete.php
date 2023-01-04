<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();
    //oracle data base address
    //enter HOST & PORT
    include("/dbinfo.php");

    if(!isset($_SESSION['M_ID'])){
        echo "<script>alert('로그인 후 이용하세요.');location.href='manager_login.php';</script>";
    }
    else
    {
        $m_id = $_SESSION['M_ID'];
        $m_pw = $_SESSION['M_PW'];
?>
<?php
        $ID=$_POST['ID'];
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
        $sql1="DELETE 
        FROM CURRENTS_BACKUP
        WHERE ID = '$ID' 
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
        $result1 = oci_parse($connect, $sql1);

        $sql2="DELETE 
        FROM CONDITION
        WHERE ID='$ID'
        AND INPUT_DATE = '$cdate'
        AND SLEEP = $csleep
        AND BODY = $cbody
        AND DRINK = $cdrink
        AND SMOKE = $csmoke";
        $result1 = oci_parse($connect, $sql1);
        $result2 = oci_parse($connect, $sql2);

        if(!$result1 || !$result2){
            echo "
            <script>
                alert('삭제되지 않았습니다.');location.replace('manager_currents.php?ID=$ID');
            </script>
        ";  
        }
        else{
            oci_execute($result1);
            oci_execute($result2);
            oci_free_statement($result1);
            oci_free_statement($result2);
            oci_close($connect);
            echo "
                <script>
                    alert('삭제되었습니다.');location.replace('manager_currents.php?ID=$ID');
                </script>
            ";              
        }
    }

?>
