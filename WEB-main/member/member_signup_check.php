<?php
include("/dbinfo.php");


$id = $_POST['id'];
$pw = $_POST['pw'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$email_id = $_POST['email_id'];
$email = $email_id;
$name = $_POST['member_name'];
$e = $_POST["E"];
$n = $_POST["N"];
$f = $_POST["F"];
$j = $_POST["J"];




$sql = "INSERT INTO INFO(ID, PW, AGE, SEX, PHONE, EMAIL, NAME)
VALUES
(
    '$id', '$pw', '$age', '$sex', '$phone', '$email', '$name'
)";
$result = oci_parse($connect, $sql);
oci_execute($result);
oci_free_statement($result);

$sql1 = "SELECT COUNT(*) AS CNT FROM INFO WHERE ID='$id'";
$result1 = oci_parse($connect, $sql1);
oci_execute($result1);
$row = oci_fetch_array($result1, OCI_ASSOC+OCI_RETURN_NULLS);
$num = $row['CNT'];
oci_free_statement($result1);
$sql2 = "INSERT INTO BODY_TYPE(ID, EI, NS, FT, JP)
VALUES
(
    '$id','$e', '$n', '$f', '$j'
)";
$result2 = oci_parse($connect, $sql2);
oci_execute($result2);
oci_free_statement($result2);
if($num == 1){
    echo "<script>alert('회원가입 되었습니다!'); location.replace('mem_login.php');</script>";
}
?>
