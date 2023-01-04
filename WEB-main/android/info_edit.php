<?php
session_start();
include("/dbinfo.php");


//$id="yez0218";
//$date1="2022-09-01";
//$date2="2022-11-01";
$id = $_POST["id"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$pw = $_POST["pw"];
//$mbti = $_POST["mbti"];
$age = $_POST["age"];
$name = $_POST["name"];

$update_info = "UPDATE INFO SET PW='$pw', AGE='$age', PHONE='$phone', EMAIL='$email', NAME='$name' WHERE ID='$id'";
$up_date=oci_parse($connect, $update_info);
oci_execute($up_date);
$up_row=oci_fetch_array($up_date, OCI_ASSOC+OCI_RETURN_NULLS);

$result_info = "SELECT * FROM INFO WHERE ID='$id'";

$result=oci_parse($connect, $result_info);
oci_execute($result);

$row=oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS);

$pw_=$row['PW'];
$age_=$row['AGE'];
$phone_=$row['PHONE'];
$email_=$row['EMAIL'];
$name_=$row['NAME'];

if($pw_==$pw && $age_==$age && $phone_==$phone && $email_==$email && $name_==$name){
    echo "OK";
}
oci_free_statement($up_date);
oci_free_statement($result);
oci_close($connect);
?>
