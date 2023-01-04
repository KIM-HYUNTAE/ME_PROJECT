<?php
session_start();
include("/dbinfo.php");


$id = $_POST["id"];
//$id = "htkim";
//$date = "2022-07-13 17:04:00";

$select_info = "SELECT * FROM INFO WHERE ID='$id'";
$result1=oci_parse($connect, $select_info);
oci_execute($result1);

while($row=oci_fetch_array($result1, OCI_ASSOC+OCI_RETURN_NULLS)){
    $name=$row['NAME'];
    $email=$row['EMAIL'];
    $phone=$row['PHONE'];
    $age=$row['AGE'];
}

echo "$name, $email, $phone, $age";
oci_free_statement($result1);
oci_close($connect);
?>