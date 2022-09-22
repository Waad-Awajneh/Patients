<?php
require_once 'connection.php';
$patientId = $_GET['del'];

$query = $connect->prepare("DELETE  FROM `patients_info` Where id=?");
$query->execute([$patientId]);
echo "<script>window.location.href='index.php'</script>";
