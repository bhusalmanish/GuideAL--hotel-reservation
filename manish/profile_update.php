<?php session_start();
include_once('include/databaseconn.php');
if (!isset($_SESSION['email'])) {
    header('location:index.php?msg=1');
}
 else{   
?>
<?php 
$eid = $_SESSION['email'];
   if(isset($_POST['edit'])){
       $err = [];
       if(isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])){
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $err['name'] = "Only letters and white space allowed";
        }

    }else
    {
        $err['name'] = "Please enter name";
    } 
     if(isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])){
              $email = $_POST['email'];
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                  $err['email'] = "Enter valid E-mail.";
              }
          }else
          {
              $err['email'] = "Please enter E-mail";
          }

          if(isset($_POST['pass']) && !empty($_POST['pass']) && trim($_POST['pass'])){
              if(isset($_POST['pass']) < 6){
                $err['pass'] = "Password must be longer than 6 characters";
              }else{
                $pass = md5($_POST['pass']);
              }
           
        }else
        {
            $err['pass'] = "Please enter password.";
        }
        if(count($err) == 0){
            $sql = "update users set name= '$name', email = '$email', password='$pass' where email='$eid' ";
            $connection -> query($sql);
            if($connection -> affected_rows == 1){
                $success = "Profile updated successfully.";
                session_destroy();
            }
            else{
                $error = "Profile edit failed!";
            }
        }
   }
   $sql = "select id,name,email,password from users where email = '$eid' ";
   $result = $connection -> query($sql);
   if($result -> num_rows == 1){
     $row = $result -> fetch_assoc();
   }else{
       $row = [];
   }
;?>




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
            .err_msg{
                background-color: red;
                color: white;
                padding: 10px;
            }
            .success_msg{
                background-color: green;
                color: white;
                padding: 10px;
            }
            .err{
                color: red;
                font-weight: bold;
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
                    <fieldset>
     <legend><h2>Edit Profile</h2></legend>
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <?php if(isset($error)){ ?>
        <p class="err_msg"><?php echo $error;?></p>
     <?php } ?>
     <?php if(isset($success)){ ?>
        <p class="success_msg"><?php echo $success;?></p>
     <?php } ?>


     Name: <input type="text" name="name" placeholder="Enter name." value="<?php echo isset($row['name'])?$row['name']:'';?>">
     <span class="err">
         <?php if(isset($err['name'])) {?>
            <?php echo $err['name']; ?>
         <?php };?>
     </span>
     <br>
     E-mail: <input type="text" name="email" value="<?php echo isset($row['email'])?$row['email']:'';?>" placeholder="Enter Email.">
     <span class="err">
         <?php if(isset($err['email'])) {?>
            <?php echo $err['email']; ?>
         <?php };?>
     </span>
     <br>
     password: <input type="password" placeholder="Password" name="pass">
     <span class="err">
         <?php if(isset($err['pass'])) {?>
            <?php echo $err['pass']; ?>
         <?php };?>
     </span>
     <br>   
     <input type="submit" value="submit" name="edit">
     <input type="reset" value="reset" name="reset">
     </form>
 </fieldset>

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

