<?php
session_start();
include("/dbinfo.php");

$id=$_POST["id"];

$sql = "SELECT EMAIL, PHONE FROM INFO WHERE ID!='$id'";
$result = oci_parse($connect, $sql);
oci_execute($result);
while($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)){
        $email=$row['EMAIL'];
        $phone=$row['PHONE'];
        echo "$email,$phone,";

}
?>
