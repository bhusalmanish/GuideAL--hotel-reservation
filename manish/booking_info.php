<?php session_start();
include_once('include/databaseconn.php');
if (!isset($_SESSION['email'])) {
    header('location:index.php?msg=1');
}
 else{   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Profile | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <style>
       table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;
}
th {
  background-color: #04AA6D;
  color: white;
}
tr:hover {background-color: #ddd;}
.action_column a{
    color: white;
    border: none;
    border-radius: 10px;
    padding: 3px 10px;
    text-decoration: none;
}
.action_column a.view{
    background-color: greenyellow;
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
    <body class="sb-nav-fixed">
      <?php include_once('include/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('include/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
<?php 
 $email = $_SESSION['email'];
 $sql = "select * from room_booking_details where booked_by = '$email' order by booked_at desc ";
 $result = $connection -> query($sql);
 $data =[];
 if($result -> num_rows > 0){
     while($row = $result -> fetch_assoc()){
         array_push($data, $row);
     }
 }?>
 <?php if (isset($_GET['msg']) && $_GET['msg'] == 1) {
		echo "<script>alert('Select your room first.')</script>";
	} 
    if (isset($_GET['msg']) && $_GET['msg'] == 2) {
		echo "<script>alert('category deleted successfully.')</script>";
	} 
    if (isset($_GET['msg']) && $_GET['msg'] == 3) {
		echo "<script>alert('category not deleted.')</script>";
	} 
    
    
    ?>
    <h3>Your Booked Rooms Information</h3>
   <table>
         <thread>
             <tr>
                 <th>SN</th>
                 <th>room_id</th>
                 <th>checkin_date</th>
                 <th>checkout_date</th>
                 <th>N0_of_rooms</th>
                 <th>booked_by</th>
                 <th>booked_at</th>
                 <th>Action</th>
             </tr>
             <tbody>
                 <?php if(count($data) > 0) {?>
                    <?php foreach($data as $key => $record){?>
                 <tr>
                     <td><?php echo  $key + 1;?></td>
                     <td><?php echo $record['room_id'] ;?></td>
                     <td><?php echo $record['checkin_date'] ;?></td>
                     <td><?php echo $record['checkout_date'] ;?></td>
                     <td><?php echo $record['N0_of_rooms'] ;?></td>
                     <td><?php echo $record['booked_by'] ;?></td>
                     <td><?php echo $record['booked_at'] ;?></td>
                     <td class="action_column">
                        <a href="view_details.php?id=<?php echo $record['room_id'];?>" class="view">View</a>
                        <a href="cancel_booking.php?id=<?php echo $record['id'];?>"
                        class="delete" onclick="return confirm('Are you sure to cancel Booking!');">cancel</a>
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
                </main>
          <?php include('include/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
