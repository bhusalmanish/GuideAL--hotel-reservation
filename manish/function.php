
<?php 
 function getNameByAdminID($room_id){
    $connection = new mysqli('localhost', 'root', '', 'GUIDEAL');
    if($connection ->connect_errno !=0){
        die('Databse connection Error.' . $connection -> connect_error);
    }
    $sql = "select  * from rooms where room_id= '$room_id'";
    $result = $connection -> query($sql);
    $row = $result -> fetch_assoc();
    return $row['room_id'];
     
 }
?>