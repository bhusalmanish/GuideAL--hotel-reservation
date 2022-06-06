
<?php 
  require_once 'include/databaseconn.php';
  $sql = "select * from room_booking_details  order by checkin_date desc ";
  $result = $connection -> query($sql);
  $data =[];
  if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
          array_push($data, $row);
      }
  }
   
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking details</title>
    <style>
       table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
th {
  background-color: #04AA6D;
  color: white;
}
.action_column a{
    color: white;
    border: none;
    border-radius: 10px;
    padding: 3px 10px;
    text-decoration: none;
}
.action_column a.edit{
    background-color: greenyellow;
}
.action_column a.view{
    background-color: peachpuff;
}
.action_column a.delete{
    background-color: red;
}
.err_msg{
    background-color: red;
    padding: 10px;
    color: white;
}
.success_msg{
    background-color: green;
    padding: 10px;
    color: white;
}
    </style>
</head>
<body>
    <h3>Booking Details</h3>
     <div>
     <?php if(isset($_GET['msg']) && $_GET['msg'] == 1){ ?>
        <p class="err_msg">Invalid Request.</p>
     <?php } ?>
     <?php if(isset($_GET['msg']) && $_GET['msg'] == 2){ ?>
        <p class="success_msg">Category deleted successfully. </p>
     <?php } ?>
     <?php if(isset($_GET['msg']) && $_GET['msg'] == 3){ ?>
        <p class="err_msg">unable to delete</p>
     <?php } ?>
     <?php if(isset($_GET['msg']) && $_GET['msg'] == 4){ ?>
        <p class="err_msg">Book edited successfully</p>
     <?php } ?>
     <table>
         <thread>
             <tr>
                 <th>SN</th>
                 <th>Name</th>
                 <th>Status</th>
                 <th>action</th>
             </tr>
             <tbody>
                 <?php if(count($data) > 0) {?>
                    <?php foreach($data as $key => $record){?>
                 <tr>
                     <td><?php echo  $key + 1;?></td>
                     <td>
                     <?php if($row['room_id']) ;?>
                    </td>
                     <td><?php echo $record['NO_of_rooms'] ;?></td>
                     <td class="action_column">
                        <a href="?id=<?php echo $record['id'];?>" class="edit">Edit</a>
                        <a href="?id=<?php echo $record['id'];?>" class="view">View</a>
                        <a href="?id=<?php echo $record['id'];?>" class="delete" onclick="return confirm('Are you sure to Delete!');">Delete</a>
                     </td>
                 </tr>
                 <?php };?>
                 <?php } else {?> 
                    <tr>
                        <td colspan="4">NO categories found in database</td>
                    </tr>
                    <?php };?>
             </tbody>
         </thread>
     </table>
     </div>

    
</body>
</html>