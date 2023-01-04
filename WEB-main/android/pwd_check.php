<?php
session_start();
include("/dbinfo.php");


$id = $_POST['id'];
$pw = $_POST['pw'];

$check_pwd = "SELECT * FROM INFO WHERE ID='$id' AND PW='$pw'";

$result=oci_parse($connect, $check_pwd);
oci_execute($result);

$row=oci_fetch_array($result, OCI_ASSOC);
$hashpwd=$row['PW'];

if($pw == $hashpwd){
        echo "okay!";
}
else{
        echo "no";
}

oci_free_statement($result);
oci_close($connect);
?>
