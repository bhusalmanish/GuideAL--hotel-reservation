<?php require_once 'include/checksession.php';?>
<?php 
   if(is_numeric($_GET['id'])){
    $id = $_GET['id'];
   }else{
       header('location:booking_info.php?msg=1');
   }
   
   require_once 'include/databaseconn.php';
   $sql = "DELETE FROM room_booking_details WHERE id='$id' "; 
   $result = $connection -> query($sql);
   print_r($result);
   if($connection -> affected_rows == 1){
     header('location:booking_info.php?msg=2');
   }else{
     header('location:booking_info.php?msg=3');   
   }
    
 