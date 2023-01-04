<?php
session_start();
include("/dbinfo.php");

if(!isset($_SESSION['ID'])){
    echo "<script>alert('로그인 후 이용하세요'); location.replace('mem_login.php');</script>";
}
else
{
    $id = $_SESSION['ID'];
}
$PW = $_POST['PW'];
$AGE = $_POST['AGE'];
$SEX = $_POST['SEX'];
$PHONE = $_POST['PHONE'];
$EMAIL = $_POST['EMAIL'];
$NAME = $_POST['NAME'];
$MBTI_EI = $_POST['MBTI_EI'];
$MBTI_NS = $_POST['MBTI_NS'];
$MBTI_FT = $_POST['MBTI_FT'];
$MBTI_JP = $_POST['MBTI_JP'];

$sql1 = "UPDATE INFO SET ID='$id', PW='$PW', AGE='$AGE', SEX='$SEX', PHONE='$PHONE', EMAIl='$EMAIL', NAME='$NAME' WHERE ID='$id'";
$result1 = oci_parse($connect, $sql1);
oci_execute($result1);
oci_free_statement($result1);

$sql2 = "UPDATE BODY_TYPE SET EI='$MBTI_EI', NS='$MBTI_NS', FT='$MBTI_FT', JP='$MBTI_JP' WHERE ID='$id'";
$result2 = oci_parse($connect, $sql2);
oci_execute($result2);
oci_free_statement($result2);
echo "<script>alert('수정 되었습니다!'); location.replace('member_info_edit.php');</script>";

?>
