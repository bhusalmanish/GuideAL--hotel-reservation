<?php
 session_start();
 include('include/databaseconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="project1.css">
     <!--this is bootstrap link-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
     <!-- this is fontawesome link -->
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
     <!--*******************This is jquery links**************-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date11" ).datepicker({ minDate: -0, maxDate: "+30D" });
    $( "#date1" ).datepicker({ minDate:+1, maxDate: "+30D" })
  } );
  </script>
</head>
<body>
   <div class="gird-container">
    <div class="header">
     
      <nav class="navbar">
        <div class="content">
          <div class="logo">
            <a href="#"><i class="bi bi-house"></i>GuideAL</a>
          </div>
          <ul class="menu-list">
            <div class="icon cancel-btn">
              <i class="bi bi-x-lg"></i>
            </div>
            <li><a href="#">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#Features">Features</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="admin/index.php">Admin</a></li>
          </ul>
          <?php if(isset($_SESSION['email']) != "") {?>
            
            <div class="signin">
            <h3 class="sign-in">
            <span><?php echo $_SESSION['email'];?></span> </h3>
              <div id="myDropdown" class="dropdown-content">
             <a href="profile.php">Booking</a>
             <a href="logout.php">logout</a>
          </div> 
          </div>
            <?php } else {?>
              <div class="signin" onclick="signclose()">
            <h3 class="sign-in">
              <i class="bi bi-person-circle"></i><span>sign-in</span>
            </h3>
          </div>
          <?php };?> 
          <div class="icon menu-btn">
            <i class="bi bi-list"></i>
          </div>
        </div>
      </nav>
      <div class="banner"></div>
        </div>
    </div>
    
  <!--this is for login-->  
 <?php
 if(isset($_POST["login"])){
   if($_SERVER["REQUEST_METHOD"] == "SUBMIT"){
    $err = [];
   if (empty($_POST["email"])) {
    $emailErr = "Email is required";
   } else {
    $email = test_value($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if(empty($_POST["pass"])){
  $passErr = "Password required";
  }
  else{
  $pass = test_value($_POST["pass"]);
  }
 
}else{
   $email = mysqli_real_escape_string($connection, $_POST["email"]);
   $pass = mysqli_real_escape_string($connection, $_POST["pass"]);
   $pass = md5($pass);
   
   $query = "select email,password from users where email ='$email' and password = '$pass' and user_type ='user' ";
   
   $result = mysqli_query($connection, $query);
   if( mysqli_num_rows($result) == 1){
       #fetch user records using fetch
   $user = mysqli_fetch_array($result);
   #storing data into session
   $_SESSION["email"] = $email;
   #check remember
   if(isset($_POST["remember"])){
   //setcookie to store cookie value
   setcookie('email', $email, time()+(60*60*7));
   setcookie('name', $name, time()+(60*60*7));

   }
  }
  else{
  echo "<script>alert('INVALID E-MAIL OR PASSWORD')</script>";
  }
   }
 }
function test_value($data){
     $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
   }
 ?>
<?php if (isset($_GET['msg']) && $_GET['msg'] == 1) {
		echo "<script>alert('Please login to continue.')</script>";
	} 

	if (isset($_GET['msg']) && $_GET['msg'] == 2) {
		echo "<script>alert('Logout successful')</script>";
	}
  if (isset($_GET['msg']) && $_GET['msg'] == 3) {
		echo "<script>alert('booking successful')</script>";
	}
  ?>

 <!-- this is for login -->
 
    <div class="container">
      <div class="forms" >
          <div class="form1 login">
              <span class="title">Login</span>
              <div class="cancel-login-signup" onclick="close_cross()">
                <i class="bi bi-x-lg"></i>
              </div>
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              
                  <div class="input-field email">
                      <input type="text" placeholder="Enter your email"  name="email" >
  
                      <i class="bi bi-envelope-fill icon1"></i>
                  </div>
                  <br>
                  <span class="error" style="color: red;" id="err_email"></span>

                  <div class="input-field password">
                      <input type="password"
                      id="password" name="pass" placeholder="password">
 
                      <i class="bi bi-lock-fill icon1"></i>
                  </div>
                  <br>
                  <span class="error" style="color: red;"  id="err_psd"></span>
                  <br>
                      
                  <div class="checkbox-text">
                      <div class="checkbox-content">
                          <input type="checkbox" id="logCheck" name="remember">
                          <label for="logCheck" class="text" name="remember">Remember me</label>
                      </div>
                      <a href="#" class="text">Forgot password?</a>
                  </div>

                  <div class="input-field button">
                      <input type="submit" value="Login Now" name="login">
                  </div>
              </form>

              <div class="login-signup">
                  <span class="text">Not a member?
                      <a href="#" class="text signup-link">Signup now</a>
                  </span>
              </div>
          </div>
          
<?php

if(isset($_POST['register'])){

   $name = mysqli_real_escape_string($connection, $_POST['name']);
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $pass = md5($_POST['pass']);
   $repass = md5($_POST['repass']);

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($connection, $select);

   if(mysqli_num_rows($result) > 0){

      $err[] = '<script>alert("user already exist!")</script>';

   }else{

      if($pass != $repass){
         $err[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($connection, $insert);
         echo "<script>alert('Registration Successful.')</script>";
      }
   }

};
?>

          <!----------------- Registration Form---------- -->
          <div class="form1 signup">
              <span class="title">Registration</span>
              <div class="cancel-login-signup" onclick="close_cross()">
                <i class="bi bi-x-lg"></i>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="formreg" method="post" >
               <?php
      if(isset($err)){
         foreach($err as $err){
            echo '<span class="error">' . $err . '</span>';
         };
      };?>
                  <div class="input-field username">
                      <input type="text" placeholder="Enter your name" name="name" >
                      <i class="bi bi-person-fill"></i>
                  </div>
                  <br>
                  <span class="error" style="color: red;" id="err_username"></span>

                  <div class="input-field email">
                      <input type="text" placeholder="Enter your email" name="email">
                      <i class="bi bi-envelope-fill icon1"></i>
                  </div>
                  <br>
                  <span class="error" style="color: red;" id="err_emaill"></span>

                  <div class="input-field password">
                    <input type="password" name="pass" 
                    id="password" placeholder="password">
                      <i class="bi bi-lock-fill icon1"></i>
                  </div>
                  <br>
                  <span class="error" style="color: red;" id="err_psdd"></span>
                      
                  <div class="input-field repassword">
                    <input type="password"
                    id="repassword" name="repass" placeholder="Confirm password">
                      <i class="bi bi-lock-fill icon1"></i>
                  </div>
                  <br>
                  <span class="error" style="color: red;" id="err_re-psdd"></span>

                  <div class="checkbox-text">
                      <div class="checkbox-content">
                          <input type="checkbox" name="remember" id="sigCheck">
                          <label for="sigCheck" class="text">Remember me</label>
                      </div>
                      
                      <a href="#" class="text">Forgot password?</a>
                  </div>

                  <div class="input-field button">
                      <input type="submit" value="Login Now" name="register">
                  </div>
              </form>

              <div class="login-signup">
                  <span class="text">Not a member?
                      <a href="#" class="text login-link">Signup now</a>
                  </span>
              </div>
          </div>
      </div>
  </div>  

      <!---------this is for Reserve Now rect -------------->
    <div class="explore-row">
        <h2>Explore Now</h2>
    <div class="flex_grow">
        <label for="dest">Destination</label><br>
        <input onclick="myFunction()" type="text" id="dest" name="dest" placeholder="Where To?" required> 
    </div>
    <div class="flex_grow">
        <label for="date">Date</label><br>
        <input onclick="myFunction()" type="text" value="
        <?php
echo "FROM :"." " . date("Y/m/d");
echo " \n"."-". " ";
$tomorrow = date( "Y/m/d", strtotime( "+1 days" ) );

echo "TO : " . $tomorrow;
?>"
 name="date" id="date" required>
    </div>
    <div class="flex_grow" style="align-self:center">
        <input onclick="myFunction()" type="submit" style="width: auto" value="Reserve Now">
    </div>
</div>

<!----------this is for clickable reserve now button-----------> 
<?php 
$dest = $check = $guest = "";
$destErr = $checkErr = $guestErr ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty($_POST["dest"])){
$destErr = "Enter your destination.";
}else{
$dest = test_input($_POST["dest"]);
}
if(empty($_POST["guest"])){
$guestErr = "guest cannot be empty";
}else{
$guest = test_input($_POST["guest"]);
}
if(empty($_POST["check"])){
$checkErr = "please enter date";
}else{
$check = test_input($_POST["check"]);
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<hr>
<div class="form" id="form1">
    <form class="form_content animate"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="img_container1">
            <p class="close" id="cross"><i class="bi bi-x-lg"></i></p>
            <p class="person"><i class="bi bi-person-circle"></i></p>
        </div>
        <div class="container1">
            <label for="dest"><b>Destination: </b>
            <span class="error"><?php echo "*" . $destErr;?></span>
            </label>
		<select name ="dest" class ="dest">
		<option><?php echo $dest; ?></option>
		<option>Kathmandu</option>
		<option>Bhaktapur</option>
		<option>Lalitpur</option>
		</select>
		<br>
            <br>
            <label for="date"><b>Check-in: </b>
            <span class="error"><?php echo "*" .  $checkErr;?></span>
            </label>
            <input type="text" name="check" id="date11">
            
            <br>
            <label for="date"><b>Check-out: </b>
            <span class="error"><?php echo "*" . $checkErr;?></span>
            </label>
            <input type="text" name="check" id="date1">
            <br>
            <label>Adults:</label> <br>
            <input name="guest" type="number" min="0" max="6" placeholder="00">
            <span class="error"><?php echo "*" . $guestErr;?></span>
            <br>
            <label>Children:</label> <br>
            <input name="guest" type="number" min="0" max="6" placeholder="00">
            <span class="error"><?php echo "*" . $guestErr;?></span>
            <br>
            <button type="submit" class="btn_reserve">Reserve Now</button>

            <div class="container1" style="background-color: #f1f1f1;">
                <button  class="cancelbtn"
                 onclick="document.getElementById('form1').style.display = 'none';"
                 type="button" >Cancel</button>
            </div>
        </div>
    </form>
</div>

    <div class="gird-row-2">
        <!--This is for two images-->
<div class="gallery" id="apartment">
    <img src="photos/room1.jpg" alt="image_loading">
      <div class="img_text">
       <p><span>GuideAL</span> offers 500 guest rooms and suites with beautiful views and spacious quarters. Stay in the Preferred Club Two-Bedroom Villa, ideal for families who want to be steps from the water park, lazy river, Explorer's Club for Kids and Core Zone for Teens. Or try one of our spacious Junior suites, with beautiful views of the garden, pool or ocean and easy access to our gourmet restaurants and bars. Each room is equipped with the all-inclusive amenities of Unlimited-Luxury. Calming neutral tones are accented by deep teals and blues with hints of the tropical island throughout.</p>
      </div>
  </div>
  <div class="gallery">
     <img src="photos/bouddha.jpg" alt="image_loading">
      <div class="img_text">
        <p>Add a description of the image here</p>
      </div>
  </div>
    </div>

    <div class="wrapper top" id="services">
      <div class="container-amenties">
        <div class="text">
          <h2>Our Amenities</h2>
          <p>We have tried to include all the facilities that our customers require during their stays in our partner hotels and apartments so this are some of our main services that we provide along with our rooms and packages.  </p>
  
          <div class="content2">
            <div class="box-flex">
              <i class="fas fa-swimming-pool"></i>
              <span>Swimming pool</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-dumbbell"></i>
              <span>Gym & yogaa</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-ship"></i>
              <span>Boat Tours</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-swimmer"></i>
              <span>Surfing Lessons</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-microphone"></i>
              <span>Conference room</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-water"></i>
              <span>Diving & smorking</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-umbrella-beach"></i>
              <span>Private Beach</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-wifi"></i>
              <span>Free wifi</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-charging-station"></i>
              <span>Electric vehicle charging</span>
            </div>
            <div class="box-flex">
              <i class="fas fa-spa"></i>
              <span>Spa</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="gird-row-3">
        <!--This is for Near available rooms-->
    <div class="explore">
        <div class="explore_center">
          <h1>Explore More</h1>
          <button><a href="rooms.php">Near Available Rooms</a></button>
        </div> 
       </div>
    </div>

    <!--This is for image container info-->
    <div class="gird-row-4">
    <div class="image_info">
        <div class="image_group">
            <div class="image_card">
                <img src="photos/kathmandu.jpg" alt="Kathmandu" style="width:100%" height="300px">
                <div class="image_container">
                   <h2>kathmanu</h2>
                   <p class="img_title">Explore kathmandu</p>
                   <p>Kathmandu is a beautiful city and capital city of Nepal</p>
                   <p>
                     <button class="img_button"><a href="rooms.php">Explore More</a></button>
                    </p>
               </div>
            </div>
        </div>
   
        <div class="image_group">
           <div class="image_card">
               <img src="photos/lalitpur.jpg" alt="Lalitpur" style="width:100%" height="300px">
               <div class="image_container">
                  <h2>Lalitpur</h2>
                  <p class="img_title">Explore Lalitpur</p>
                  <p>Kathmandu is a beautiful city and capital city of Nepal</p>
                  <p>
                    <button class="img_button"><a href="rooms.php">Explore More</a></button>	
                  </p>
              </div>
           </div>
       </div>
   
       <div class="image_group">
           <div class="image_card">
               <img src="photos/bhaktapur.jpg" alt="Bhaktapur" style="width:100%" height="300px">
               <div class="image_container">
                  <h2>Bhaktapur</h2>
                  <p class="img_title">Explore Bhaktapur</p>
                  <p>Kathmandu is a beautiful city and capital city of Nepal</p>
                  <p>
                    <button class="img_button"><a href="rooms.php">Explore More</a></button>
                  </p>
              </div>
           </div>
       </div>
     </div>
    </div>

    
    <div class="gird-row-5" id="Features">
        <!--This is for featured Destinations-->
 <h2>Featured Destinations</h2>
 <div class="Featured_dest">
  <img class="feature" src="photos/nature.jpg" alt="Resort_image" width="800" height="400">
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet...
 </div>
    </div>

  <?php include_once('include/footer.php');?>
   <script type="text/Javascript" src="project.js"></script>
</body>
</html>
