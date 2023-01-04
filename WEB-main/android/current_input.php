<?php
include("/dbinfo.php");

$id=$_POST['id'];
$Current1=$_POST['current1'];
$Current2=$_POST['current2'];
$Current3=$_POST['current3'];
$Current4=$_POST['current4'];
$Current5=$_POST['current5'];
$Current6=$_POST['current6'];
$Current7=$_POST['current7'];
$Current8=$_POST['current8'];
$Current9=$_POST['current9'];
$Current10=$_POST['current10'];
$Current11=$_POST['current11'];
$Current12=$_POST['current12'];
$Current13=$_POST['current13'];
$Current14=$_POST['current14'];
$Current15=$_POST['current15'];
$Current16=$_POST['current16'];
$Current17=$_POST['current17'];
$Current18=$_POST['current18'];
$Current19=$_POST['current19'];
$Current20=$_POST['current20'];
$Current21=$_POST['current21'];
$Current22=$_POST['current22'];
$Current23=$_POST['current23'];
$Current24=$_POST['current24'];
$DateTime=$_POST['dateTime'];
$Sleep=$_POST['sleep'];
$Body=$_POST['body'];
$Smoke=$_POST['smoke'];
$Drink=$_POST['drink'];

$sql1="INSERT INTO CURRENTS(ID, LUNG_LEFT, PERICARDIUM_LEFT, HEART_LEFT, LIVER_LEFT, SPLEEN_LEFT, STOMACH_LEFT, TRIPLEFOCUS_LEFT, SMALL_INTESTINE_LEFT, LARGE_INTESTINE_LEFT, GALLBLADDER_LEFT, BLADDER_LEFT, KIDNEY_LEFT, LUNG_RIGHT, PERICARDIUM_RIGHT, HEART_RIGHT, LIVER_RIGHT, SPLEEN_RIGHT, STOMACH_RIGHT, TRIPLE_FOCUS_RIGHT, SMALL_INTESTINE_RIGHT, LARGE_INTESTINE_RIGHT, GALLBLADDER_RIGHT, BLADDER_RIGHT, KIDNEY_RIGHT, INPUT_DATE)
VALUES('$id',  $Current1, $Current2, $Current3, $Current4, $Current5, $Current6, $Current7, $Current8, $Current9, $Current10, $Current11, $Current12, $Current13, $Current14, $Current15, $Current16, $Current17, $Current18, $Current19, $Current20, $Current21, $Current22, $Current23, $Current24,'$DateTime')";

$sql2="INSERT INTO CONDITION(ID, SLEEP, BODY, SMOKE, DRINK, INPUT_DATE)VALUES('$id','$Sleep','$Body','$Smoke','$Drink', '$DateTime')";

$input1=oci_parse($connect, $sql1);
oci_execute($input1);
oci_free_statement($input1);

$input2=oci_parse($connect, $sql2);
oci_execute($input2);
oci_free_statement($input2);

oci_close($connect);
?>
