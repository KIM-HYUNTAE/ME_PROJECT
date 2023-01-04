<?php
include("/dbinfo.php");

if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$id = $_POST["req_search_ID"];
$sql = oci_parse($connect, "SELECT PW FROM REQUEST WHERE ID='$id'");
oci_execute($sql);
$result = oci_fetch_assoc($sql);
$pw = $result["PW"];



if($_POST["y"]){
    $sql = oci_parse($connect, "INSERT INTO MANAGER (M_ID, M_PW) VALUES ('$id', '$pw')");
    oci_execute($sql);
    $sql = oci_parse($connect, "DELETE FROM REQUEST WHERE ID='$id'");
    oci_execute($sql);
}
else if($_POST["n"]){
    $sql = oci_parse($connect, "DELETE FROM REQUEST WHERE ID='$id'");
    oci_execute($sql);
}

echo "<script>location.href='manager_main.php'</script>";
?>
