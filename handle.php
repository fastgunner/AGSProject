<?php

include "config.php";

$request = 1;

// Read $_GET value
if(isset($_GET['request'])){
   $request = $_GET['request'];
}



// Insert record
if($request == 1){

   // Read POST data
   $data = json_decode(file_get_contents("php://input"));

   $name = $data->name;
   $address = $data->salary;
   $phone = $data->email;

   // Insert record
   $sql = "insert into contact(name, address, phone) values('".$name."',".$address.",'".$phone."');";
   if(mysqli_query($con,$sql)){
      echo 1; 
   }else{
      echo 0;
   }
   exit;
}

// Read records 
if($request == 2){

   // Read POST data
   $data = json_decode(file_get_contents("php://input"));

   $name = $data->name;

   // read record 
   $sql = "SELECT * FROM contact WHERE name = ".$name.";";
   $employeeData = mysqli_query($con,$sql);

   $response = array();

   while($row = mysqli_fetch_assoc($employeeData)){
      $response[] = array(
         "name" => $row['name'],
         "address" => $row['address'],
         "phone" => $row['phone'],,
      );
   }
   echo json_encode($response);
   exit;
}

// update records 
if($request == 3){

   // Read POST data
   $data = json_decode(file_get_contents("php://input"));

   $name = $data->name;
   $address = $data->address;
   $phone = $data->phone;

   // update record 
   $sql = "UPDATE contact SET name=".$name.", address=" .$address.", phone =" .$phone. "WHERE name = ".$name.";";
   $employeeData = mysqli_query($con,$sql);

   $response = array();
   while($row = mysqli_fetch_assoc($employeeData)){
      $response[] = "Updated" .$name. "with " .$address. " and ".$phone.;
      
   }

   echo json_encode($response);
   exit;
}

// delete records 
if($request == 4){

   // Read POST data
   $data = json_decode(file_get_contents("php://input"));

   $name = $data->name;

   // delete record 
   $sql = "DELETE FROM contact WHERE name = " .$name.";";
   $exec = mysqli_query($con,$sql);

   $response = "Executed Successfully";

   //TODO gracefully handle response
   

   echo json_encode($response);
   exit;
}