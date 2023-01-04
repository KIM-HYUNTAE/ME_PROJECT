<?php
include("/dbinfo.php");


$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM INFO WHERE ID='$id'";
$result = oci_parse($connect, $sql);
oci_execute($result);
$row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS);
$hashpw = $row['PW'];
if($pw == $hashpw)
{
  session_start();
  $_SESSION['ID'] = $row['ID'];
  $_SESSION['PW'] = $row['PW'];
  echo "<script>alert('로그인 되었습니다!'); location.replace('member_main.php');</script>";
}
else
{
  echo "<script>alert('아이디 또는 비밀번호를 확인하세요.'); history.back();</script>";
}
?>
