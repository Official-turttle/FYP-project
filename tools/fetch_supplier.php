<?php
//fetch.php
if(isset($_POST["query"]))
{
  include '../engine/connect.php';
 $connect = mysqli_connect("localhost", "root", "", "test_server_fyp");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM supplier_list 
  WHERE ID LIKE '%".$request."%'
  OR supplier_name LIKE '%".$request."%'  
 ";
 $result = mysqli_query($connect, $query);
 $data =array();

 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["ID"];
   $data[] = $row["supplier_name"];
  }
 }
 else
 {
  $data = 'No Data Found';
 }
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>