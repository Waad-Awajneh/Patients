<?php
require_once "connection.php";
$query=$connect->prepare("select * from`patients_info` where id=?");
$query->execute([$_GET['id']]);
$patient=$query->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container" style="display:flex;">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0" style="display: flex; justify-content: space-between;">
    <div class="col-md-3">
      <img src="./OIP.jfif"  class="img-fluid rounded-start" alt="patient">
    </div>

    <div class="col-md-5"   style="    text-align: center; margin-top: 150px;margin-left: 50px;">
      <div class="card-body">
        <h1 class="card-title">PatientID #<?PHP echo $patient->id?></h1>
        <p class="card-text">Name : <?PHP echo $patient->Name?></p>
        <p class="card-text">Age: <?PHP echo$patient->Age?></p>
        <p class="card-text">Address : <?PHP echo$patient->Address?></p>

        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>