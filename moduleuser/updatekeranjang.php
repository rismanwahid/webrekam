<?php
include "../database.php";

$id_s = $_SESSION['ss_sewa'];
$lama  = $_POST['datalist'];
$_SESSION['lamasewass'] = $lama;
//$_SESSION['lamasewass'] = '';

mysqli_query($db, "UPDATE tmp_detsewa SET lama='$lama' WHERE id_sewa='$id_s'");

$query  = mysqli_query($db,"SELECT * FROM tmp_detsewa WHERE id_sewa='$id_s'");
$pecah = mysqli_fetch_assoc($query);

echo json_encode($lama);

 ?>
