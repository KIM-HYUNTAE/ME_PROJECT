<html>
<a href="manager_main.php" style="color: #404040; font-weight: bold">Home</a>

</html>
<?php
ob_start();
putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
session_start();

include("/dbinfo.php");


$select_date = "SELECT * FROM BODY_TYPE";
$result = oci_parse($connect, $select_date);
oci_execute($result);

while ($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
    $id = $row['ID'];
    $avg = "SELECT AVG(LUNG_LEFT),AVG(PERICARDIUM_LEFT),AVG(HEART_LEFT),AVG(LIVER_LEFT),AVG(SPLEEN_LEFT),AVG(STOMACH_LEFT),AVG(TRIPLEFOCUS_LEFT),AVG(SMALL_INTESTINE_LEFT),AVG(LARGE_INTESTINE_LEFT),AVG(GALLBLADDER_LEFT),AVG(BLADDER_LEFT),AVG(KIDNEY_LEFT),AVG(LUNG_RIGHT),AVG(PERICARDIUM_RIGHT),AVG(HEART_RIGHT),AVG(LIVER_RIGHT),AVG(SPLEEN_RIGHT),AVG(STOMACH_RIGHT),AVG(TRIPLE_FOCUS_RIGHT),AVG(SMALL_INTESTINE_RIGHT),AVG(LARGE_INTESTINE_RIGHT),AVG(GALLBLADDER_RIGHT),AVG(BLADDER_RIGHT),AVG(KIDNEY_RIGHT) FROM CURRENTS WHERE ID='$id'";
    $avg_CURRENT1 = 0;
    $avg_CURRENT2 = 0;
    $avg_CURRENT3 = 0;
    $avg_CURRENT4 = 0;
    $avg_CURRENT5 = 0;
    $avg_CURRENT6 = 0;
    $avg_CURRENT7 = 0;
    $avg_CURRENT8 = 0;
    $avg_CURRENT9 = 0;
    $avg_CURRENT10 = 0;
    $avg_CURRENT11 = 0;
    $avg_CURRENT12 = 0;
    $avg_CURRENT13 = 0;
    $avg_CURRENT14 = 0;
    $avg_CURRENT15 = 0;
    $avg_CURRENT16 = 0;
    $avg_CURRENT17 = 0;
    $avg_CURRENT18 = 0;
    $avg_CURRENT19 = 0;
    $avg_CURRENT20 = 0;
    $avg_CURRENT21 = 0;
    $avg_CURRENT22 = 0;
    $avg_CURRENT23 = 0;
    $avg_CURRENT24 = 0;

    $avg_result = oci_parse($connect, $avg);
    oci_execute($avg_result);
    while ($avg_row = oci_fetch_array($avg_result, OCI_ASSOC + OCI_RETURN_NULLS)) {
        $avg_CURRENT1 = $avg_row['AVG(LUNG_LEFT)'];
        $avg_CURRENT2 = $avg_row['AVG(PERICARDIUM_LEFT)'];
        $avg_CURRENT3 = $avg_row['AVG(HEART_LEFT)'];
        $avg_CURRENT4 = $avg_row['AVG(LIVER_LEFT)'];
        $avg_CURRENT5 = $avg_row['AVG(SPLEEN_LEFT)'];
        $avg_CURRENT6 = $avg_row['AVG(STOMACH_LEFT)'];
        $avg_CURRENT7 = $avg_row['AVG(TRIPLEFOCUS_LEFT)'];
        $avg_CURRENT8 = $avg_row['AVG(SMALL_INTESTINE_LEFT)'];
        $avg_CURRENT9 = $avg_row['AVG(LARGE_INTESTINE_LEFT)'];
        $avg_CURRENT10 = $avg_row['AVG(GALLBLADDER_LEFT)'];
        $avg_CURRENT11 = $avg_row['AVG(BLADDER_LEFT)'];
        $avg_CURRENT12 = $avg_row['AVG(KIDNEY_LEFT)'];
        $avg_CURRENT13 = $avg_row['AVG(LUNG_RIGHT)'];
        $avg_CURRENT14 = $avg_row['AVG(PERICARDIUM_RIGHT)'];
        $avg_CURRENT15 = $avg_row['AVG(HEART_RIGHT)'];
        $avg_CURRENT16 = $avg_row['AVG(LIVER_RIGHT)'];
        $avg_CURRENT17 = $avg_row['AVG(SPLEEN_RIGHT)'];
        $avg_CURRENT18 = $avg_row['AVG(STOMACH_RIGHT)'];
        $avg_CURRENT19 = $avg_row['AVG(TRIPLE_FOCUS_RIGHT)'];
        $avg_CURRENT20 = $avg_row['AVG(SMALL_INTESTINE_RIGHT)'];
        $avg_CURRENT21 = $avg_row['AVG(LARGE_INTESTINE_RIGHT)'];
        $avg_CURRENT22 = $avg_row['AVG(GALLBLADDER_RIGHT)'];
        $avg_CURRENT23 = $avg_row['AVG(BLADDER_RIGHT)'];
        $avg_CURRENT24 = $avg_row['AVG(KIDNEY_RIGHT)'];
    }

    $avgs = array($avg_CURRENT1, $avg_CURRENT2, $avg_CURRENT3, $avg_CURRENT4, $avg_CURRENT5, $avg_CURRENT6, $avg_CURRENT7, $avg_CURRENT8, $avg_CURRENT9, $avg_CURRENT10, $avg_CURRENT11, $avg_CURRENT12, $avg_CURRENT13, $avg_CURRENT14, $avg_CURRENT15, $avg_CURRENT16, $avg_CURRENT17, $avg_CURRENT18, $avg_CURRENT19, $avg_CURRENT20, $avg_CURRENT21, $avg_CURRENT22, $avg_CURRENT23, $avg_CURRENT24);
    //echo "$avgs[0] $avgs[1] $avgs[2] $avgs[3] $avgs[4] $avgs[5] $avgs[6] $avgs[7] $avgs[8] $avgs[9] $avgs[10] $avgs[11] $avgs[12] $avgs[13] $avgs[14] $avgs[15] $avgs[16] $avgs[17] $avgs[18] $avgs[19] $avgs[20] $avgs[21] $avgs[22] $avgs[23]";

    $query = calc($avgs, $id);

    echo "$query";
    echo "<br>";
    $edit = oci_parse($connect, $query);
    oci_execute($edit);
    oci_free_statement($edit);
}

function max_data($data = array())
{
    if (isset($data)) {
        $max = $data[0];
        $max_index = 0;
        for ($i = 1; $i < 10; $i++) {
            if ($max < $data[$i]) {
                $max = $data[$i];
                $max_index = $i;
            }
        }
    }
    return $max_index;
}

function max_($data = array())
{
    if (isset($data)) {
        $max = $data[0];
        $max_index = 0;
        for ($i = 1; $i < 10; $i++) {
            if ($max < $data[$i]) {
                $max = $data[$i];
            }
        }
        return $max;
    }
    else{
        $max = 1;
        return $max;
    }
}

function min_data($data = array())
{
    if (isset($data)) {
        $min = $data[0];
        $min_index = 0;
        for ($i = 1; $i < 10; $i++) {
            if ($min > $data[$i]) {
                $min = $data[$i];
                $min_index = $i;
            }
        }
    }
    return $min_index;
}

function min_($data = array())
{
    if (isset($data)) {
        $min = $data[0];
        $min_index = 0;
        for ($i = 1; $i < 12; $i++) {
            if ($min > $data[$i]) {
                $min = $data[$i];
            }
        }
    }
    return $min;
}

function calc($current = array(), $id)
{
    $organ_l = [];
    $organ_r = [];

    $organ_l[0] = $current[0];
    $organ_l[1] = $current[2];
    $organ_l[2] = $current[3];
    $organ_l[3] = $current[4];
    $organ_l[4] = $current[5];
    $organ_l[5] = $current[7];
    $organ_l[6] = $current[8];
    $organ_l[7] = $current[9];
    $organ_l[8] = $current[10];
    $organ_l[9] = $current[11];

    $organ_r[0] = $current[12];
    $organ_r[1] = $current[14];
    $organ_r[2] = $current[15];
    $organ_r[3] = $current[16];
    $organ_r[4] = $current[17];
    $organ_r[5] = $current[19];
    $organ_r[6] = $current[20];
    $organ_r[7] = $current[21];
    $organ_r[8] = $current[22];
    $organ_r[9] = $current[23];

    $strongest_current_l_index = 0;
    $weakest_current_l_index = 0;
    $strongest_current_r_index = 0;
    $weakest_current_r_index = 0;

    $type = "";

    $ype_score_l = [];
    $type_score_r = [];

    $type_score_l[0] = Renotonia($organ_l);
    $type_score_l[1] = Vesicotonia($organ_l);
    $type_score_l[2] = Hepatonia($organ_l);
    $type_score_l[3] = Cholecystonia($organ_l);
    $type_score_l[4] = Pulmotonia($organ_l);
    $type_score_l[5] = Colonotonia($organ_l);
    $type_score_l[6] = Pancreotonia($organ_l);
    $type_score_l[7] = Gastrotonia($organ_l);

    $type_score_r[0] = Renotonia($organ_r);
    $type_score_r[1] = Vesicotonia($organ_r);
    $type_score_r[2] = Hepatonia($organ_r);
    $type_score_r[3] = Cholecystonia($organ_r);
    $type_score_r[4] = Pulmotonia($organ_r);
    $type_score_r[5] = Colonotonia($organ_r);
    $type_score_r[6] = Pancreotonia($organ_r);
    $type_score_r[7] = Gastrotonia($organ_r);

    $max_score_index_l = 0;
    $max_score_index_r = 0;

    $max_score_l = $type_score_l[0];
    for ($i = 1; $i < 8; $i++) {
        if ($max_score_l < $type_score_l[$i]) {
            $max_score_l = $type_score_l[$i];
            $max_score_index_l = $i;
        }
    }

    $max_score_r = $type_score_r[0];
    for ($i = 1; $i < 8; $i++) {
        if ($max_score_r < $type_score_r[$i]) {
            $max_score_r = $type_score_r[$i];
            $max_score_index_r = $i;
        }
    }

    if ($max_score_l > $max_score_r) {
        //왼손이 더 강할 때
        switch ($max_score_index_l) {
            case 0:
                $type = "수양";
                break;
            case 1:
                $type = "수음";
                break;
            case 2:
                $type = "목양";
                break;
            case 3:
                $type = "목음";
                break;
            case 4:
                $type = "금양";
                break;
            case 5:
                $type = "금음";
                break;
            case 6:
                $type = "토양";
                break;
            case 7:
                $type = "토음";
                break;
        }
        //bodytype to query
        switch ($type) {
            case "수양":
                $body_type = 5;
                break;
            case "수음":
                $body_type = 6;
                break;
            case "목양":
                $body_type = 1;
                break;
            case "목음":
                $body_type = 2;
                break;
            case "금양":
                $body_type = 3;
                break;
            case "금음":
                $body_type = 4;
                break;
            case "토양":
                $body_type = 7;
                break;
            case "토음":
                $body_type = 8;
                break;
        }
        return "UPDATE BODY_TYPE SET TYPE_L = '', TYPE_R = '', TYPE = $body_type WHERE ID = '$id'";


    } else if ($max_score_l < $max_score_r) {
        //오른손이 더 강할 때
        switch ($max_score_index_r) {
            case 0:
                $type = "수양";
                break;
            case 1:
                $type = "수음";
                break;
            case 2:
                $type = "목양";
                break;
            case 3:
                $type = "목음";
                break;
            case 4:
                $type = "금양";
                break;
            case 5:
                $type = "금음";
                break;
            case 6:
                $type = "토양";
                break;
            case 7:
                $type = "토음";
                break;
        }
        switch ($type) {
            case "수양":
                $body_type = 5;
                break;
            case "수음":
                $body_type = 6;
                break;
            case "목양":
                $body_type = 1;
                break;
            case "목음":
                $body_type = 2;
                break;
            case "금양":
                $body_type = 3;
                break;
            case "금음":
                $body_type = 4;
                break;
            case "토양":
                $body_type = 7;
                break;
            case "토음":
                $body_type = 8;
                break;
        }
        return "UPDATE BODY_TYPE SET TYPE_L = '', TYPE_R = '', TYPE = $body_type WHERE ID = '$id'";

    } else {
        //같을 때
        if ($max_score_index_l == $max_score_index_r) {
            switch ($max_score_index_l) {
                case 0:
                    $type = "수양";
                    break;
                case 1:
                    $type = "수음";
                    break;
                case 2:
                    $type = "목양";
                    break;
                case 3:
                    $type = "목음";
                    break;
                case 4:
                    $type = "금양";
                    break;
                case 5:
                    $type = "금음";
                    break;
                case 6:
                    $type = "토양";
                    break;
                case 7:
                    $type = "토음";
                    break;
            }
            switch ($type) {
                case "수양":
                    $body_type = 5;
                    break;
                case "수음":
                    $body_type = 6;
                    break;
                case "목양":
                    $body_type = 1;
                    break;
                case "목음":
                    $body_type = 2;
                    break;
                case "금양":
                    $body_type = 3;
                    break;
                case "금음":
                    $body_type = 4;
                    break;
                case "토양":
                    $body_type = 7;
                    break;
                case "토음":
                    $body_type = 8;
                    break;
            }
            return "UPDATE BODY_TYPE SET TYPE_L = '', TYPE_R = '', TYPE = $body_type WHERE ID = '$id'";

        } else {
            $type_l = "";
            $type_r = "";
            if (max_($organ_l > $organ_r)) {
                switch ($max_score_index_l) {
                    case 0:
                        $type_l = "수양";
                        break;
                    case 1:
                        $type_l = "수음";
                        break;
                    case 2:
                        $type_l = "목양";
                        break;
                    case 3:
                        $type_l = "목음";
                        break;
                    case 4:
                        $type_l = "금양";
                        break;
                    case 5:
                        $type_l = "금음";
                        break;
                    case 6:
                        $type_l = "토양";
                        break;
                    case 7:
                        $type_l = "토음";
                        break;
                }
            } else if (max_($organ_r) > max_($organ_l)) {
                switch ($max_score_index_r) {
                    case 0:
                        $type_r = "수양";
                        break;
                    case 1:
                        $type_r = "수음";
                        break;
                    case 2:
                        $type_r = "목양";
                        break;
                    case 3:
                        $type_r = "목음";
                        break;
                    case 4:
                        $type_r = "금양";
                        break;
                    case 5:
                        $type_r = "금음";
                        break;
                    case 6:
                        $type_r = "토양";
                        break;
                    case 7:
                        $type_r = "토음";
                        break;
                }
            } else {
                switch ($max_score_index_l) {
                    case 0:
                        $type_l = "수양";
                        break;
                    case 1:
                        $type_l = "수음";
                        break;
                    case 2:
                        $type_l = "목양";
                        break;
                    case 3:
                        $type_l = "목음";
                        break;
                    case 4:
                        $type_l = "금양";
                        break;
                    case 5:
                        $type_l = "금음";
                        break;
                    case 6:
                        $type_l = "토양";
                        break;
                    case 7:
                        $type_l = "토음";
                        break;
                }
            }

            switch ($type_l) {
                case "수양":
                    $body_type_l = 5;
                    break;
                case "수음":
                    $body_type_l = 6;
                    break;
                case "목양":
                    $body_type_l = 1;
                    break;
                case "목음":
                    $body_type_l = 2;
                    break;
                case "금양":
                    $body_type_l = 3;
                    break;
                case "금음":
                    $body_type_l = 4;
                    break;
                case "토양":
                    $body_type_l = 7;
                    break;
                case "토음":
                    $body_type_l = 8;
                    break;
            }

            switch ($type_r) {
                case "수양":
                    $body_type_r = 5;
                    break;
                case "수음":
                    $body_type_r = 6;
                    break;
                case "목양":
                    $body_type_r = 1;
                    break;
                case "목음":
                    $body_type_r = 2;
                    break;
                case "금양":
                    $body_type_r = 3;
                    break;
                case "금음":
                    $body_type_r = 4;
                    break;
                case "토양":
                    $body_type_r = 7;
                    break;
                case "토음":
                    $body_type_r = 8;
                    break;
            }
            if (isset($body_type_l)) {
                return "UPDATE BODY_TYPE SET TYPE_L = '', TYPE_R = '', TYPE = $body_type_l WHERE ID = '$id'";
            } else if (isset($body_type_r)) {
                return "UPDATE BODY_TYPE SET TYPE_L = '', TYPE_R = '', TYPE = $body_type_r WHERE ID = '$id'";
            }
        }
    }
}

function Renotonia($organ = array())
{
    $score = 0;

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 9) {
        $score += 40;
        if ($min_index == 3) {
            $score += 30;
            if ($organ[0] > $organ[2]) {
                $score += 15;
            }
            if ($organ[2] > $organ[1]) {
                $score += 15;
            }
        } else {
            if ($organ[0] > $organ[2]) {
                $score += 15;
            }
            if ($organ[2] > $organ[1]) {
                $score += 15;
            }
        }
    }
    //수양체질: 신장(방광) >폐(대장) >간(담) >심장(소장) >췌장(위장)
    return $score;
}

function Vesicotonia($organ = array())
{
    $score = 0;

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 8) {
        $score += 40;
        if ($min_index == 4) {
            $score += 30;
            if ($organ[7] > $organ[5]) {
                $score += 15;
            }
            if ($organ[6] > $organ[4]) {
                $score += 15;
            }
        } else {
            if ($organ[5] > $organ[6]) {
                $score += 15;
            }
            if ($organ[6] > $organ[4]) {
                $score += 15;
            }
        }
    }
    //수음체질: 방광(신장) >담(간) >소장(심장) >대장(폐) >위(췌장)
    return $score;
}

function Hepatonia($organ = array())
{
    $score = 0;

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 2) {
        $score += 40;
        if ($min_index == 0) {
            $score += 30;
            if ($organ[9] > $organ[1]) {
                $score += 15;
            }
            if ($organ[1] > $organ[3]) {
                $score += 15;
            }
        } else {
            if ($organ[9] > $organ[1]) {
                $score += 15;
            }
            if ($organ[1] > $organ[3]) {
                $score += 15;
            }
        }
    }
    //목양체질: 간(담) >신장(방광) >심장(소장) >췌장(위장) >폐(대장)
    return $score;
}

function Cholecystonia($organ = array())
{
    $score = 0;
    //목음체질: 담(간) >소장(심장) >위장(췌장) >방광(신장) >대장(폐)

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 7) {
        $score += 40;
        if ($min_index == 6) {
            $score += 30;
            if ($organ[5] > $organ[4]) {
                $score += 15;
            }
            if ($organ[4] > $organ[8]) {
                $score += 15;
            }
        } else {
            if ($organ[5] > $organ[4]) {
                $score += 15;
            }
            if ($organ[4] > $organ[8]) {
                $score += 15;
            }
        }
    }
    return $score;
}

function Pulmotonia($organ = array())
{
    $score = 0;
    //금양체질: 폐(대장) >췌장(위장) >심장(소장) >신장(방광) >간(담)

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 0) {
        $score += 40;
        if ($min_index == 2) {
            $score += 30;
            if ($organ[3] > $organ[1]) {
                $score += 15;
            }
            if ($organ[1] > $organ[9]) {
                $score += 15;
            }
        } else {
            if ($organ[3] > $organ[1]) {
                $score += 15;
            }
            if ($organ[1] > $organ[9]) {
                $score += 15;
            }
        }
    }
    return $score;
}

function Colonotonia($organ = array())
{
    $score = 0;
    //금음체질: 대장(폐) >방광(신장) >위장(췌장) >소장(심장) >담(간)

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 6) {
        $score += 40;
        if ($min_index == 7) {
            $score += 30;
            if ($organ[8] > $organ[4]) {
                $score += 15;
            }
            if ($organ[4] > $organ[5]) {
                $score += 15;
            }
        } else {
            if ($organ[8] > $organ[4]) {
                $score += 15;
            }
            if ($organ[4] > $organ[5]) {
                $score += 15;
            }
        }
    }
    return $score;
}

function Pancreotonia($organ = array())
{
    $score = 0;
    //토양체질: 췌장(위) >심장(소장) >간(담) >폐(대장) >신장(방광)

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 3) {
        $score += 40;
        if ($min_index == 9) {
            $score += 30;
            if ($organ[1] > $organ[2]) {
                $score += 15;
            }
            if ($organ[2] > $organ[0]) {
                $score += 15;
            }
        } else {
            if ($organ[1] > $organ[2]) {
                $score += 15;
            }
            if ($organ[2] > $organ[0]) {
                $score += 15;
            }
        }
    }
    return $score;
}

function Gastrotonia($organ = array())
{
    $score = 0;
    //토음체질: 위장(췌장) >대장(폐) >소장(심장) >담(간) >방광(신장)

    $max_index = max_data($organ);
    $min_index = min_data($organ);

    if ($max_index == 4) {
        $score += 40;
        if ($min_index == 8) {
            $score += 30;
            if ($organ[6] > $organ[5]) {
                $score += 15;
            }
            if ($organ[5] > $organ[7]) {
                $score += 15;
            }
        } else {
            if ($organ[6] > $organ[5]) {
                $score += 15;
            }
            if ($organ[5] > $organ[7]) {
                $score += 15;
            }
        }
    }
    return $score;
}
header("Refresh:10");

?>
