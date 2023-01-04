<?php
session_start();
include("/dbinfo.php");


$date = $_POST["date"];
$id = $_POST["id"];
//$id = "htkim";
//$date = "2022-07-13 17:04:00";

$select_current = "SELECT * FROM CURRENTS_BACKUP WHERE ID='$id' AND INPUT_DATE='$date'";
//$select_current="SELECT LUNG_LEFT, PERICARDIUM_LEFT, HEART_LEFT, LIVER_LEFT, SPLEEN_LEFT, STOMACH_LEFT, TRIPLEFOCUS_LEFT, SMALL_INTESTINE_LEFT, LARGE_INTESTINE_LEFT, GALLBLADDER_LEFT, BLADDER_LEFT, KIDNEY_LEFT, LUNG_RIGHT, PERICARDIUM_RIGHT, HEART_RIGHT, LIVER_RIGHT, SPLEEN_RIGHT, STOMACH_RIGHT, TRIPLEFOCUS_RIGHT, SMALL_INTESTINE_RIGHT, LARGE_INTESTINE_RIGHT, GALLBLADDER_RIGHT, BLADDER_RIGHT, KIDNEY_RIGHT FROM CURRENTS_BACKUP WHERE ID='$id' AND INPUT_DATE='$date'";
$result1=oci_parse($connect, $select_current);
oci_execute($result1);

while($row=oci_fetch_array($result1, OCI_ASSOC+OCI_RETURN_NULLS)){
    $c1=$row['LUNG_LEFT'];
    $c2=$row['PERICARDIUM_LEFT'];
    $c3=$row['HEART_LEFT'];
    $c4=$row['LIVER_LEFT'];
    $c5=$row['SPLEEN_LEFT'];
    $c6=$row['STOMACH_LEFT'];
    $c7=$row['TRIPLEFOCUS_LEFT'];
    $c8=$row['SMALL_INTESTINE_LEFT'];
    $c9=$row['LARGE_INTESTINE_LEFT'];
    $c10=$row['GALLBLADDER_LEFT'];
    $c11=$row['BLADDER_LEFT'];
    $c12=$row['KIDNEY_LEFT'];
    $c13=$row['LUNG_RIGHT'];
    $c14=$row['PERICARDIUM_RIGHT'];
    $c15=$row['HEART_RIGHT'];
    $c16=$row['LIVER_RIGHT'];
    $c17=$row['SPLEEN_RIGHT'];
    $c18=$row['STOMACH_RIGHT'];
    $c19=$row['TRIPLE_FOCUS_RIGHT'];
    $c20=$row['SMALL_INTESTINE_RIGHT'];
    $c21=$row['LARGE_INTESTINE_RIGHT'];
    $c22=$row['GALLBLADDER_RIGHT'];
    $c23=$row['BLADDER_RIGHT'];
    $c24=$row['KIDNEY_RIGHT'];
    $DATETIME=$row['INPUT_DATE'];
}

$select_condition = "SELECT * FROM CONDITION WHERE ID='$id' AND INPUT_DATE='$date'";

$result2=oci_parse($connect, $select_condition);
oci_execute($result2);

while($row=oci_fetch_array($result2, OCI_ASSOC+OCI_RETURN_NULLS)){
        $sleep = $row['SLEEP'];
        $drink = $row['DRINK'];
        $smoke = $row['SMOKE'];
        $body = $row['BODY'];
}


echo "$c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $c11, $c12, $c13, $c14, $c15, $c16, $c17, $c18, $c19, $c20, $c21, $c22, $c23, $c24, $sleep, $body, $smoke, $dring";
oci_free_statement($result1);
oci_free_statement($result2);
oci_close($connect);
?>
