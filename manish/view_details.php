<?php session_start();
include_once('include/databaseconn.php');
if(is_numeric($_GET['id'])){
    $id = $_GET['id'];
   }else{
       header('location:booking_info.php?msg=1');
   }
 
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
img{
    width: 50%;
    height: 20%;
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
 $sql = "select * from rooms where room_id=$id ";
 $result = $connection -> query($sql);
 if($result -> num_rows == 1){
   $row = $result -> fetch_assoc();
 }else{
     $row = [];
 } 
?>
 <div>
        <?php 
            if(!empty($row)){ ?>
            <table>
                <tr>
                    <th>Room image</th>
                    <td><img src="photos/<?php echo $row['image'] ;?>" alt="room image"></td>
                </tr>
                <tr>
                    <th>Room NO</th>
                    <td><?php echo $row['room_no'];?></td>
                </tr>
                <tr>
                    <th>Room type</th>
                    <td><?php echo $row['type'] ;?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td> Rs: <?php echo $row['price'] ;?> /- Per Night</td>
                </tr>
                <tr>
                    <th>Details</th>
                    <td><?php echo $row['details'];?></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><?php echo $row['location'];?></td>
                </tr>
            </table>
           <?php }else{ ?>
               <div class="no_record">
                   Invalid category.
               </div>
           <?php }  ?> 
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
