<?php require_once 'include/databaseconn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="rooms.css">
    <title>GuideAl rooms</title>
</head>
<body>
    <div class="page-wrapper">
      <section id="header">
          <!-- logo -->
          <h1><a href="index.php"><i class="bi bi-house"></i>GuideAL</a></a></h1>
          <!-- nav -->
          <nav id="nav">
            <ul>
                <li><a href="index.php" class="active"><span>Home</span></a></li>
                <li><a href="#"><span>Kathmandu</span></a></li>
                <li><a href="#"><span>Bhaktapur</span></a></li>
                <li><a href="#"><span>Lalitpur</span></a></li>
            </ul>  
          </nav>
          <!-- banner -->
          <section id="banner">
              <header>
                  <h2><i class="bi bi-house"></i>GuideAL</h2>
                  <p>A Complete accommodation finder.</p>
              </header>
          </section>
          <!-- intro -->
          <section id="intro" class="container">
              <div class="row">
                  <div class="col-0">
                      <section class="first">
                        <i class="fas fa-spa"></i>
                          <header>
                              <h2>Spa</h2>
                          </header>
                          <p>Feel the greater hospitaliity with us.</p>
                      </section>
                  </div>
                  
                  <div class="col-0">
                    <section class="middle">
                        <i class="fas fa-swimming-pool"></i>
                        <header>
                            <h2>Swimming Pool</h2>
                        </header>
                        <p>Infinity Pool for our guest.</p>
                    </section>
                  </div>

                  <div class="col-0">
                      <section class="last">
                        <i class="fas fa-wifi"></i>
                          <header>
                              <h2>Free wifi</h2>
                          </header>
                          <p>Free wifi also Available.</p>
                      </section>
                  </div>
              </div>
          </section>

      </section> 
       <section id="main">
           <div class="container">
               <div class="row">
              
                 <div class="col-2">
                     <!-- Hotel rooms -->
                     <section>
                         <header class="major">
                             <h2>Rooms near Your Places.</h2>
                         </header>
                        
                         <div class="row">
                         <?php 
	                        $sql=mysqli_query($connection,"select * from rooms");
	                        while($row=mysqli_fetch_assoc($sql))
	                     {?>
                             <div class="col-1">
                                 
                                 <section class="box">
                                     <a href="#" class="image featured"><img src="photos/<?php echo $row['image']; ?>" alt="ROOMS1"></a>
                                     <header>
                                         <h3>[ <?php echo $row['type']; ?>]</h3>
                                         <h3>Located Near: <?php echo $row['location']; ?></h3>
                                     </header>
                                     <p><?php echo $row['details']; ?></p>
                                     <footer>
                                         <ul class="actions">
                                             <li><a href="room_details.php?room_id=<?php echo $row['room_id']; ?>" class="button">Find out more.</a></li>
                                         </ul>
                                     </footer>
                                 </section>
                             </div>
                             <?php }?>
                        </div>
                        
                     </section>
                 </div>
                 

                 <div class="col-2">
                     <!-- blog -->
                     <section>
                         <header class="major">
                             <h2>The Blog</h2>
                         </header>
                         <div class="row">
                             <div class="col-3">
                                 <section class="box">
                                     <a href="#" class="image featured left"><img src="photos/room5.jpg" alt="room"></a>
                                     <header>
                                         <h3>kathmandu Durbar Square</h3>
                                     </header>
                                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, dolore minus, autem doloremque, impedit ab itaque dignissimos officia quis perferendis eaque aperiam molestias omnis ducimus laborum labore optio odio magni.</p>
                                     <footer>
                                         <ul class="actions">
                                             <li><a href="#" class="button alt large">Continue Reading.</a></li>
                                         </ul>
                                     </footer>
                                 </section>
                             </div>

                             <div class="col-3">
                                <section class="box">
                                    <a href="#" class="image featured left"><img src="photos/room5.jpg" alt="room"></a>
                                    <header>
                                        <h3>kathmandu Durbar Square</h3>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, dolore minus, autem doloremque, impedit ab itaque dignissimos officia quis perferendis eaque aperiam molestias omnis ducimus laborum labore optio odio magni.</p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="#" class="button alt large">Continue Reading.</a></li>
                                        </ul>
                                    </footer>
                                </section>
                            </div>  
                         </div>
                     </section>
                 </div>  
               </div>
           </div>
       </section>
    </div>
     <?php include_once('include/footer.php');?>
</body>
</html>
