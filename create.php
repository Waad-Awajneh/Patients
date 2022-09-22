<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>curd</title>
</head>

<body>

  <div class="container">
    <div class="col-md-12">
      <h3>Insert Patient Informations</h3>
      <hr />
    </div>
    <form action="create.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" class="form-control" name="name">
      </div>
      <div class="mb-3">
        <label for="Age" class="form-label">Age</label>
        <input type="number" id="Age" class="form-control" name="Age">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Address</label>
        <textarea id="name" class="form-control" name="Address"></textarea>
      </div>

      <button type="submit" name="add" class="btn btn-primary">Submit</button>
    </form>

  </div>

</body>

</html>

<?php
require_once 'connection.php'; //require include include_once 

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $age = $_POST['Age'];
  $address = $_POST['Address'];

  //  $query="INSERT INTO `patients_info` (`name`,`age`,`address`) VALUES(:n,:a,:ad)";  //one
  $query = "INSERT INTO `patients_info` (`name`,`age`,`address`) VALUES(?,?,?)";        //two 

  $query = $connect->prepare($query);

  /****** option1  ****** */
  // $query->bindParam(':n',$name,POD::PARAM_STR);
  // $query->bindParam(':a',$name,POD::PARAM_INT);
  // $query->bindParam(':ad',$name,POD::PARAM_STR);
  // query->execute();

  /****** option2 ******* */
  // $query->execute([':n'=>$name,':a'=>$age,'ad'=>$address]);

  /*******  option3 ********* */
  $query->execute([$name, $age, $address]);


  /*******  option 4  (mysqli) ********* */
  // $query->bind_param('sis', $name,$age,$address);
  // $query->execute();


  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  $lastInsertId = $connect->lastInsertId();

  // echo $lastInsertId;
  if ($lastInsertId) {
    // Message for successfull insertion
    echo "<script>alert('Patients Info Inserted Successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
  } else {
    // Message for unsuccessfull insertion
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='index.php'</script>";
  }
}

?>