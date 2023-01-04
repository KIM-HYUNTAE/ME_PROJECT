<?php
session_start();
include("/dbinfo.php");


//$id="yez0218";
//$date1="2022-10-01";
//$date2="2022-10-31";
$id = $_POST["id"];
$date_1 = $_POST["date1"];
$date_2 = $_POST["date2"];

//$select_date="SELECT * FROM CURRENTS_BACKUP WHERE ID='$id' AND TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS') BETWEEN TO_DATE('$date1', 'YYYY-DD-MM HH24:MI:SS') AND TO_DATE('$date2', 'YYYY-MM-DD HH24:MI:SS') ORDER BY INPUT_DATE ASC";

//$select_date = "SELECT * FROM CURRENTS_BACKUP WHERE ID='$id' AND INPUT_DATE>='$date1' AND INPUT_DATE<='$date2'";

$show_date = "SELECT * FROM CURRENTS WHERE ID='$id' AND TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS') BETWEEN TO_DATE('$date_1', 'YYYY-MM-DD HH24:MI:SS') AND TO_DATE('$date_2', 'YYYY-MM-DD HH24:MI:SS')+0.99999 ORDER BY INPUT_DATE ASC";

$result=oci_parse($connect, $show_date);
oci_execute($result);

while($row=oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)){
    $date=$row['INPUT_DATE'];
    echo "$date".",";
}
oci_free_statement($result);
oci_close($connect);
?>
