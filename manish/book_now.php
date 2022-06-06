<?php require_once 'include/databaseconn.php';
   include 'include/checksession.php';
?>
<?php 
   if(is_numeric($_GET['room_id'])){
    $id = $_GET['room_id'];
   }else{
       header('location:rooms.php?msg=1');
   }
  $sql = "select * from rooms where room_id=$id ";
  $result = $connection -> query($sql);
  if($result -> num_rows == 1){
    $row = $result -> fetch_assoc();
  }else{
      $row = [];
  }
   
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
     <!--*******************This is jquery links**************-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#checkindate" ).datepicker({ minDate: -0, maxDate: "+30D" });
    $( "#checkoutdate" ).datepicker({ minDate:+1, maxDate: "+30D" })
  } );
  </script>
   
    <link rel="stylesheet" href="rooms.css">
    <title>Hotel Reservation Form</title>
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 50px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      legend {
      padding: 10px;      
      font-family: Roboto, Arial, sans-serif;
      font-size: 18px;
      color: #fff;
      background-color: #006622;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px #006622; 
      }
      .banner {
      position: relative;
      height: 250px;
      background-image: url("/uploads/media/default/0001/02/b23a2c8c49b8e43249487140e4c2e22a63bd7cb8.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input, select {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #006622;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #006622;
      color: #006622;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #00b33c;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      .week {
      display:flex;
      justify-content:space-between;
      }
      .columns {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .columns div {
      width:48%;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid  #006622;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid  #006622;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .flax {
      display:flex;
      justify-content:space-around;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #006622;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #00b33c;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
</head>
<body>
<?php
 if(isset($_POST['submit'])){
   $err = [];
if(isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])){
  $name = $_POST['name'];
}else
{
  $err['name'] = "Please enter name";
}
if(isset($_POST['room']) && !empty($_POST['room']) && trim($_POST['room'])){
  $no_of_rooms = $_POST['room'];
}else
{
  $err['room'] = "Please enter No of Rooms";
}

if(count($err) == 0){

$room_id = $_POST['room_id'];
$booked_by = $_POST['email'];
$no_of_rooms = $_POST['room'];	
$checkout_date = $_POST['checkoutdate'];
$checkin_date = $_POST['checkindate'];

$select = "select room_id, checkin_date,checkout_date, N0_of_rooms, booked_by,booked_at from room_booking_details where room_id = '$room_id' && checkin_date = '$checkin_date' && checkout_date = '$checkout_date'&& N0_of_rooms = '$no_of_rooms' &&
booked_by = '$booked_by' ";
   $result = mysqli_query($connection, $select);
   if(mysqli_num_rows($result) > 0){

    echo '<script>alert("Booking already done!")</script>';
 }else{
  $insert = "insert into room_booking_details (room_id, checkin_date, checkout_date,	N0_of_rooms, booked_by ) values( '$room_id', '$checkin_date', '$checkout_date', '$no_of_rooms', '$booked_by' ) ";
  $connection -> query($insert);
  echo "<script>alert('Booking Successful.')</script>";
 }
}
}
?>
<div class="testbox">
    <form method="POST" action="">
      <div class="banner">
        <h1>Hotel Reservation Form</h1>
      </div>
      <br/>
      <fieldset>

        <legend>Reservation Details</legend>
        
        <div class="columns">
        <div class="item">
             
            <label for="name">Enter Name<span>*
         <?php if(isset($err['name'])) {?>
            <?php echo $err['name']; ?>
         <?php };?>
            </span></label>
            <select name="name">
            <option value="" disabled selected>Select Name</option>
            <?php 
               $sql = mysqli_query($connection, "select name from users");
            while($user = mysqli_fetch_assoc($sql))
            {?>
            <option name="name" ><?php echo $user['name'];?></option>
            <?php }?>
            </select>
           
          </div>
          
          <div class="item">
            <label for="lname">Room type<span>*</span></label>
            <select name="room_type">
            <option value="1" name="room_type" selected><?php echo $row['type'];?></option>
            </select>
          </div>
          <div class="item">
            <label for="zip">Price<span>*</span></label>
            <select name="price">
            <option value="1" name="price" selected>RS: <?php echo $row['price'];?> /- Per Night.</option>
            </select>
          </div>
          <div class="item">
            <label for="state">Room no<span>*</span></label>
            <select name="room_no">
            <option value="1" name="room_no" selected><?php echo $row['room_no'];?></option>
            </select>
          </div>
          <div class="item">
            <label for="email">Email Address<span>*</span></label>
            <select name="email">
            <option value="<?php echo $_SESSION['email'];?>" name="email" selected><?php echo $_SESSION['email']; ?></option>
            </select>
          </div>
          <div class="item">
            <label for="phone">room_id<span>*</span></label>
            <select name="room_id">
            <option name="room_id" value="<?php echo $row['room_id'];?>" selected><?php echo $row['room_id'];?></option>
            </select>
          </div>
      </fieldset>
      <br/>
      <fieldset>
      <legend>Dates</legend>
      <div class="columns">
      <div class="item">
      <label for="date"><b>Check-in: </b>
      <label for="checkindate">Check-in Date <span>*    
      </span></label>
      <input id="checkindate" type="text" name="checkindate" placeholder="<?php echo date("Y/m/d");?>" required/>
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="checkoutdate">Check-out Date <span>*</span>
    </label>
      <input id="checkoutdate" type="text" name="checkoutdate" placeholder="<?php echo date( "Y/m/d", strtotime( "+1 days" ) );?>" required/>
      <i class="fas fa-calendar-alt"></i>
      </div>
       
      <div class="item" style=width:100%>
      <label for="room">Number of rooms</label>
      <span>* 
      <?php if(isset($err['room'])) {?>
            <?php echo $err['room']; ?>
         <?php };?>
      </span>
      <input id="room" type="number" name="room" min="0" max="5"/>
      </div>
      
    </div>
      </div>
      </fieldset>
      <div class="btn-block">
      <button type="submit" name="submit" href="/">Submit</button>
      </div>
    </form>
    </div>
       
     <?php include_once('include/footer.php');?>
</body>
</html>
