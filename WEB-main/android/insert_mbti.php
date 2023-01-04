<?php
session_start();
include("/dbinfo.php");


$id=$_POST["id"];
$ei=$_POST["ei"];
$ns=$_POST["ns"];
$ft=$_POST["ft"];
$jp=$_POST["jp"];

$insert_mbti = "INSERT INTO BODY_TYPE(ID, EI, NS, FT, JP) VALUES ('$id', '$ei', '$ns', '$ft', '$jp')";

$result=oci_parse($connect, $insert_mbti);
oci_execute($result);
oci_free_statement($result);
oci_close($connect);
?>