<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title></title>
<style>
/*this is for footer*/
footer
{
    bottom: 0;
}
@media screen and (max-height: 800px){
    footer
    {
        position: static;
    }
}
.footer
{
    grid-area: footer;
    background-color: #2c292f;
	box-sizing: border-box;
	width: 100%;
	text-align: left;
	font: bold 16px sans-serif;
	padding: 50px 50px 60px 50px;
	margin-top: 5px;
}
.footer .footer-left,
.footer .footer-center,
.footer .footer-right{
	display: inline-block;
	vertical-align: top;
}
/* Footer left */

.footer .footer-left{
	width: 30%;
}

.footer .logo{
	color:  #ffffff;
	font: normal 36px ;
	margin: 0;
}
/* Footer links */

.footer .footer-links{
	color:  #ffffff;
	margin: 20px 0 12px;
}

.footer .footer-links a{
	display:inline-block;
	line-height: 1.8;
	text-decoration: none;
	color:  inherit;
}

.footer .footer-company-name{
	color:  #8f9296;
	font-size: 14px;
	font-weight: normal;
	margin: 0;
}
/* Footer Center */

.footer .footer-center{
	width: 35%;
}


.footer .footer-center i{
	background-color:  #33383b;
	color: #ffffff;
	font-size: 25px;
	width: 38px;
	height: 38px;
	border-radius: 50%;
	text-align: center;
	line-height: 42px;
	margin: 10px 15px;
	vertical-align: middle;
}

.footer .footer-center i.fa-envelope{
	font-size: 17px;
	line-height: 38px;
}

.footer .footer-center p{
	display: inline-block;
	color: #ffffff;
	vertical-align: middle;
	margin:0;
}

.footer .footer-center p span{
	display:block;
	font-weight: normal;
	font-size:14px;
	line-height:2;
}

.footer .footer-center p a{
	color:  #e0ac1c;
	text-decoration: none;;
}
/* Footer Right */

.footer .footer-right{
	width: 30%;
}

.footer .footer-company-about{
	line-height: 20px;
	color:  #92999f;
	font-size: 13px;
	font-weight: normal;
	margin: 0;
}

.footer .footer-company-about span{
	display: block;
	color:  #ffffff;
	font-size: 18px;
	font-weight: bold;
	margin-bottom: 20px;
}

.footer .footer-icons{
	margin-top: 25px;
}

.footer .footer-icons a{
	display: inline-block;
	width: 35px;
	height: 35px;
	cursor: pointer;
	background-color:  #33383b;
	border-radius: 2px;
	font-size: 20px;
	color: #ffffff;
	text-align: center;
	line-height: 35px;
	margin-right: 3px;
	margin-bottom: 5px;
}
@media (max-width: 880px)
{

	.footer .footer-left,
	.footer .footer-center,
	.footer .footer-right{
		display: block;
		width: 100%;
		margin-bottom: 40px;
		text-align: center;
	}

	.footer .footer-center i{
		margin-left: 0;
	}
}
</style>
</head>
<body>
  <!--This is for footer-->
    <div class="footer" id="contact">
  <footer>
    <div class="footer-left">
      <label class="logo">
        <i class="bi bi-house-fill"></i>
        </i>GuideAL</i>
      </label>
      <p class="footer-links">
        <a href="">Home</a> |
        <a href="">Blog</a> |
        <a href="">About</a> |
        <a href="">Contact</a>
      </p>
      <p class="footer-company-name">
        &copy; 2022 <span>GuideAL</span> Accomodation pvt. Ltd.
      </p>
    </div>
    <div class="footer-center">
      <div>
        <i class="bi bi-geo-alt-fill"></i>
          <p><span>Patan Multiple Campus, </span>
          Patan Dhoka, Lalitpur, Nepal</p>
      </div>
      <div>
        <i class="bi bi-telephone-fill"></i>
        <p>+977 9844588930</p>
      </div>
      <div>
        <i class="bi bi-envelope-fill"></i>
        <p><a href="mailto:#">support@GuideAL.com</a></p>
      </div>
    </div>
    <div class="footer-right">
      <p class="footer-company-about">
        <span>About the company</span>
        We offer Rooms for Rooms seeks and provide online platforms for Room owners to go online.</p>
      <div class="footer-icons">
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-twitter"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-linkedin"></i></a>
        <a href="#"><i class="bi bi-youtube"></i></a>
        <a href="#"><i class="bi bi-github"></i></a>
      </div>
    </div>
  </div>
  </footer>
    </div>
   
</body>
</html>
