<html>
<a href="manager_main.php" style="color: #404040; font-weight: bold">Home</a>

</html>
<?php
include("/dbinfo.php");



$select_date = "SELECT * FROM INFO_BACKUP";
$result = oci_parse($connect, $select_date);
oci_execute($result);

while ($deleted_date = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
    $today = date("Y-m-d H:i:s");
    echo "today: $today ";
    $d_date_ = $deleted_date['DELETE_DATE'];
    $d_date = date("Y-m-d H:i:s", strtotime($d_date_));
    echo "deleted date: $d_date";

    $date1 = new DateTime($today);
    $date2 = new DateTime($d_date);

    $date_d = date_diff($date1, $date2);

    echo $date_d->days;
    if ($date_d->days >= 1) {
        echo "삭제 대상O";
        $get_id = "SELECT * FROM INFO_BACKUP WHERE DELETE_DATE = '$d_date'";
        $result1 = oci_parse($connect, $get_id);
        oci_execute($result1);
        $row = oci_fetch_array($result1, OCI_ASSOC + OCI_RETURN_NULLS);
        $id = $row['ID'];
        echo "$id";

        $remove_currents = "DELETE FROM CURRENTS_BACKUP WHERE ID='$id'";
        $result6 = oci_parse($connect, $remove_currents);
        oci_execute($result6);

        $remove_condition = "DELETE FROM CONDITION_BACKUP WHERE ID='$id'";
        $result7 = oci_parse($connect, $remove_condition);
        oci_execute($result7);

        $remove_mbti = "DELETE FROM BODY_TYPE_BACKUP WHERE ID='$id'";
        $result8 = oci_parse($connect, $remove_mbti);
        oci_execute($result8);

        $remove_info = "DELETE FROM INFO_BACKUP WHERE ID='$id'";
        $result9 = oci_parse($connect, $remove_info);
        oci_execute($result9);
    } else {
        echo "삭제대상X";
    }
}
//}
header("Refresh:1");
?>
