<?php
include "config.php";
$data = json_decode(file_get_contents("php://input"));

$request = $data->request;

// Fetch All records
if($request == 1){
  $p_Data = mysqli_query($conn,"select * from products order by id desc");

  $response = array();
  while($row = mysqli_fetch_assoc($p_Data)){
    $response[] = $row;
  }

  echo json_encode($response);
  exit;
}

// Add record
if($request == 2){
  $productID = $data->p_id;
  $productName = $data->p_name;
  $productPrice = $data->p_price;
  $productDescription = $data->p_description;

  $p_Data = mysqli_query($conn,"SELECT * FROM products WHERE p_id='".$productID."'");
  if(mysqli_num_rows($p_Data) == 0){
    mysqli_query($conn,"INSERT INTO products(p_id,p_name,p_price,p_description) VALUES('".$productID."','".$productName."','".$productPrice."','".$productDescription."')");
    echo "Insert successfully";
  }else{
    echo "Username already exists.";
  }

  exit;
}
if($request == 3){
  $productID = $data->p_id;
  $productName = $data->p_name;
  $productPrice = $data->p_price;
  $productDescription = $data->p_description;

  mysqli_query($conn,"UPDATE users SET p_name='".$productName."',p_price='".$productPrice."',p_description='".$productDescription."' WHERE p_id=".$productID);
 
  echo "Update successfully";
  exit;
}

// Delete record
if($request == 4){
  $productID = $data->p_id;

  mysqli_query($conn,"DELETE FROM products WHERE p_id=".$productID);

  echo "Delete successfully";
  exit;
}

?>