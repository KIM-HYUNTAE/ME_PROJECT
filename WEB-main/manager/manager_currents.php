<?php
include("/dbinfo.php");

session_start();
if(!isset($_SESSION['M_ID'])){
    echo "<script>alert('로그인 후 이용하세요.');location.href='manager_login.php';</script>";
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
    <title>search page</title>
    <link rel = "stylesheet" href="style.css">
    <style>
        html, body{
            margin: 0;
            padding: 0;
        }
        body{
            position: relative;
            background-color: #F2F6FC;
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
        .result{
            margin-top: 200px;
            position: relative;
            text-align: center;
            padding: 10px;
            font-size: 15px;
            height: 800px;
            margin-bottom: 300px;
        } 
        .result > .result_table{
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
        }
        .result > .result_table th{
            position: sticky;
            top: 0px;   
            height: 30px;
        }
        .result > .result_table tr{
            border-bottom: 1px solid #eee;
        }
        .result > .result_table tr:last-child{
            border: none;
        }
        .result > .result_table tbody tr:nth-child(even){
            background-color: #eee;
        }
        .result > .result_table th,
        .result > .result_table td{
            padding: 5px;
            text-align: center;
        }
        .result > .result_table tr th{
            background-color: #DBE9F9;
            color: #404040;
            border: none;
        }
        .result > .result_table input{
            width: 30px;
        }
        .result > .result_table select{
            width: 40px;
        }
        .result{
            margin-left: 100px;
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
    <div class="logo"><a href="member_main.php">생체전류와 MBTI  </a><span class="logo_min"><a href="manager_main.php">관리자 페이지</span></a></div>
        <div class="link">
            <a href="manager_main.php">Home</a>
            <?php
            if(!isset($m_id)){?>
                <a href="manager_login.php" class="login_btn">login</a>
            <?php
            }
            else{?>
                <a href="manager_search.php" style="color: #404040; font-weight: bold">manage</a>
                <a href="manager_logout.php" class="logout_btn">logout</a>
            <?php
            }
            ?>

        </div>
    </header>
    <main>
        <div class="result" style="height: 500px; overflow-y: auto">
                <table class="result_table">
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>ID</th>
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
                        $ID = (isset($_GET["ID"]) && $_GET["ID"]) ? $_GET["ID"] : NULL;
                        $num=1;
                        if(isset($ENUM)&&isset($ID)){
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
                                WHERE CONDITION.ID='$ID' 
                                ORDER BY CONDITION.INPUT_DATE DESC) C";
                            $all=oci_parse($connect, $sql3);
                            oci_execute($all);
                            while($edit_row=oci_fetch_array($all, OCI_ASSOC+OCI_RETURN_NULLS))
                            {
                                $edit_NUM=$edit_row['NUM'];
                                $ID=$edit_row['ID'];
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
                        <form class="edit_current_form" method="POST" action="member_data_edit.php?ENUM=<?=$ENUM?>">
                            <input type = "hidden" name = "ID" value ="<?=$ID?>">
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
                                <td><?=$ID?></td>      
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
                                WHERE CONDITION.ID='$ID' 
                                ORDER BY CONDITION.INPUT_DATE DESC) C";
                            $all=oci_parse($connect, $sql3);
                            oci_execute($all);
                            
                            while($row=oci_fetch_array($all, OCI_ASSOC+OCI_RETURN_NULLS))
                            {
                                $NUM=$row['NUM'];
                                $ID=$row['ID'];
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
                        <form class="edit_current_form" method="POST" action="member_data_delete.php?ENUM=<?=$ENUM?>">          
                            <input type = "hidden" name = "ID" value ="<?=$ID?>">
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
                                <td> <?=$ID?> </td>
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
                                <td> <a href="manager_currents.php?ENUM=<?=$NUM?>&ID=<?=$ID?>" style="text-decoration: none; color: #0062F2">수정</a></td>
                                <td><button type = "submit" style="border:none; color: #0062F2; font-size: 16px" onclick="return confirm('삭제하시겠습니까?')">삭제</button></td>
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

    </main>

    <div style="height: 50px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
</body>
</html>

