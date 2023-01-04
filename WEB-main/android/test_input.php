<?php
include("/dbinfo.php");

$DateTime=$_GET['dateTime'];

$sql1="SELECT * FROM CURRENTS WHERE TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS')=TO_DATE('$DateTime', 'YYYY-MM-DD HH24:MI:SS')";
$input1=oci_parse($connect, $sql1);

$sql2="SELECT * FROM CONDITION WHERE TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS')=TO_DATE('$DateTime', 'YYYY-MM-DD HH24:MI:SS')";
$input2=oci_parse($connect, $sql2);

oci_execute($input1);
oci_execute($input2);

while($row=oci_fetch_array($input1, OCI_ASSOC+OCI_RETURN_NULLS)){
    $date=$row['INPUT_DATE'];
    echo "$date";
}

oci_free_statement($input1);
oci_free_statement($input2);
?>
