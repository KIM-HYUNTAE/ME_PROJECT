<?php
include("/dbinfo.php");


$m_id = $_POST['m_id'];
$m_pw = $_POST['m_pw'];

$sql = "SELECT * FROM MANAGER WHERE M_ID='$m_id'";
$result = oci_parse($connect, $sql);
oci_execute($result);
$row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS);
$hashpw = $row['M_PW'];
if($m_pw == $hashpw)
{
  session_start();
  $_SESSION['M_ID'] = $row['M_ID'];
  $_SESSION['M_PW'] = $row['M_PW'];
  echo "<script>alert('로그인 되었습니다!'); location.replace('manager_main.php');</script>";
}
else
{
  echo "<script>alert('아이디 또는 비밀번호를 확인하세요.'); history.back();</script>";
}
?>
