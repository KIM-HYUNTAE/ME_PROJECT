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
  echo "ok";
  echo "<script>alert('ok');</script>";
}
else
{
  echo "<script>alert('no');</script>";
}
?>
