<?php
putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
session_start();

include("/dbinfo.php");



//mbti 값 바꾸기
//$id=$_POST['$id'];
$id=$_POST['id'];
$sql_mbti="SELECT * FROM BODY_TYPE WHERE ID='$id'";
$mbti_result=oci_parse($connect, $sql_mbti);

oci_execute($mbti_result);
while($mbti_row=oci_fetch_array($mbti_result, OCI_ASSOC+OCI_RETURN_NULLS))  {
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

//체질 별 mbti
$type1 = array("ISTP", "ISTJ", "ESTP", "ESTJ");
$type2 = array("ENFJ", "ESFJ");
$type3 = array("INTJ", "INTP", "INFJ", "INFP");
$type4 = array("ENTJ", "ENTP", "ENFJ", "ENFP");
$type5 = array("INTJ", "ENTJ", "ISTJ", "ESTJ");
$type6 = array("ISTJ", "ISFJ");
$type7 = array("ENFP", "ESFP");

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
    $type = "";
}
echo "$mbti,".implode(",",$type);
oci_free_statement($mbti_result);
?>

