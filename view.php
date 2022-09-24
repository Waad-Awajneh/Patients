<?php
require_once "connection.php";

$query=$connect->prepare("SELECT * from `patients_info` where id=?");

$query->execute([$_GET['id']]);

$patient=$query->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>curd</title>
</head>
<body>
    

<div class="container" style="display:flex;">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0" style="display: flex; justify-content: space-between;">
    <div class="col-md-3">
      <img src="./OIP.jfif"  class="img-fluid rounded-start" alt="patient">
    </div>

    <div class="col-md-5"   style=" margin-top: 150px;margin-left: 50px;">
      <div class="card-body">
        <h1 class="card-title" style="    text-align: center;">PatientID #<?PHP echo $patient->id?></h1>
        <p class="card-text">Name : <?PHP echo $patient->Name?></p>
        <p class="card-text">Age: <?PHP echo $patient->Age?></p>
        <p class="card-text">Address : <?PHP echo $patient->Address?></p>
       <a href="index.php"><button style ="width:100px;height:30px; background-color:azure;">back</button></a>
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>