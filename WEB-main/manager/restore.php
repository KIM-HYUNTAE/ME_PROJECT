<?php
session_start();
include("/dbinfo.php");


$id = $_POST["id"];

if(isset($id)){
    $move_info_data = "INSERT INTO INFO (ID, PW, AGE, SEX, PHONE, EMAIL, NAME) SELECT ID, PW, AGE, SEX, PHONE, EMAIL, NAME FROM INFO_BACKUP WHERE ID = '$id'";
    $result2=oci_parse($connect, $move_info_data);
    oci_execute($result2);
    //oci_free_statement($result2);

    $move_currents_data = "INSERT INTO CURRENTS SELECT * FROM CURRENTS_BACKUP WHERE ID = '$id'";
    $result3=oci_parse($connect, $move_currents_data);
    oci_execute($result3);
    //oci_free_statement($result3);

    $move_condition_data = "INSERT INTO CONDITION SELECT * FROM CONDITION_BACKUP WHERE ID = '$id'";
    $result4=oci_parse($connect, $move_condition_data);
    oci_execute($result4);
    //oci_free_statement($result4);

    $move_mbti_data = "INSERT INTO BODY_TYPE SELECT * FROM BODY_TYPE_BACKUP WHERE ID = '$id'";
    $result5=oci_parse($connect, $move_mbti_data);
    oci_execute($result5);
    //oci_free_statement($result5);

    $remove_currents = "DELETE FROM CURRENTS_BACKUP WHERE ID='$id'";
    $result6=oci_parse($connect, $remove_currents);
    oci_execute($result6);
    //oci_free_statement($result6);

    $remove_condition = "DELETE FROM CONDITION_BACKUP WHERE ID='$id'";
    $result7=oci_parse($connect, $remove_condition);
    oci_execute($result7);
    //oci_free_statement($result7);

    $remove_mbti = "DELETE FROM BODY_TYPE_BACKUP WHERE ID='$id'";
    $result8=oci_parse($connect, $remove_mbti);
    oci_execute($result8);
    //oci_free_statement($result8);

    $remove_info = "DELETE FROM INFO_BACKUP WHERE ID='$id'";
    $result9=oci_parse($connect, $remove_info);
    oci_execute($result9);
    //oci_free_statement($result9);

    echo "ok";
}
else{
    echo "no";
}

oci_close($connect);


?>
<html>
<a href="manager_main.php">main</a>
<a href="delete_backup.php">탈퇴회원데이터관리</a>
</html>
