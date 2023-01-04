<?php
session_start();
include("/dbinfo.php");


$id = $_POST["id"];
$pw = $_POST["pw"];


$check_pw = "SELECT * FROM INFO WHERE ID = '$id'";
$result1=oci_parse($connect, $check_pw);
oci_execute($result1);
$row = oci_fetch_array($result1, OCI_ASSOC + OCI_RETURN_NULLS);
//oci_free_statement($result1);
$pw_check = $row['PW'];
echo "result: $result1 pwcheck:$pw_check";
if($pw==$pw_check){
    echo "pw checked";
    $today = date("Y-m-d H:i:s");
    //$date1 = new DateTime($today);
    $move_info_data = "INSERT INTO INFO_BACKUP (ID, PW, AGE, SEX, PHONE, EMAIL, NAME) SELECT ID, PW, AGE, SEX, PHONE, EMAIL, NAME FROM INFO WHERE ID = '$id'";
    $result2=oci_parse($connect, $move_info_data);
    oci_execute($result2);

    $input_delete_date = "UPDATE INFO_BACKUP SET DELETE_DATE = '$today' WHERE ID = '$id'";
    $result10=oci_parse($connect, $input_delete_date);
    oci_execute($result10);

    //oci_free_statement($result2);
    
    $move_currents_data = "INSERT INTO CURRENTS_BACKUP SELECT * FROM CURRENTS WHERE ID = '$id'";
    $result3=oci_parse($connect, $move_currents_data);
    oci_execute($result3);
    //oci_free_statement($result3);

    $move_condition_data = "INSERT INTO CONDITION_BACKUP SELECT * FROM CONDITION WHERE ID = '$id'";
    $result4=oci_parse($connect, $move_condition_data);
    oci_execute($result4);
    //oci_free_statement($result4);

    $move_mbti_data = "INSERT INTO BODY_TYPE_BACKUP SELECT * FROM BODY_TYPE WHERE ID = '$id'";
    $result5=oci_parse($connect, $move_mbti_data);
    oci_execute($result5);
    //oci_free_statement($result5);

    $remove_currents = "DELETE FROM CURRENTS WHERE ID='$id'";
    $result6=oci_parse($connect, $remove_currents);
    oci_execute($result6);
    //oci_free_statement($result6);

    $remove_condition = "DELETE FROM CONDITION WHERE ID='$id'";
    $result7=oci_parse($connect, $remove_condition);
    oci_execute($result7);
    //oci_free_statement($result7);

    $remove_mbti = "DELETE FROM BODY_TYPE WHERE ID='$id'";
    $result8=oci_parse($connect, $remove_mbti);
    oci_execute($result8);
    //oci_free_statement($result8);

    $remove_info = "DELETE FROM INFO WHERE ID='$id'";
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
