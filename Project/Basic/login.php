<?php
include("../Asset/Connection/Connection.php");
session_start();
if(isset($_GET['btnsave']))
{
	$email=$_GET['txtemail'];
	$password=$_GET['txtpassword'];
	$selShop="select * from tbl_shop where shop_email='".$email."' and shop_password='".$password."'";
	$selDoctor="select * from tbl_doctor where doctor_email='".$email."' and doctor_password='".$password."'";
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$resAdmin=$conn->query($selAdmin);
	$resUser=$conn->query($selUser);
	$resDoctor=$conn->query($selDoctor);
	$resShop=$conn->query($selShop);
	if($resAdmin->num_rows>0)
	{
		$row=$resAdmin->fetch_assoc();
		$_SESSION['aid']=$row['admin_id'];
		$_SESSION['aname']=$row['admin_name'];
		header('location: ../Admin/Homepage.php');
	}
	else if ($resUser->num_rows>0)
	{
		$row=$resUser->fetch_assoc();
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['uname']=$row['user_name'];
		header('location: ../User/Homepage.php');
	}
	else if ($resDoctor->num_rows>0)
	{
		$row=$resDoctor->fetch_assoc();
		$_SESSION['did']=$row['doctor_id'];
		$_SESSION['dname']=$row['doctor_name'];
		header('location: ../Doctor/Homepage.php');
	}
	else if ($resShop->num_rows>0)
	{
		$row=$resShop->fetch_assoc();
		$_SESSION['sid']=$row['shop_id'];
		$_SESSION['sname']=$row['shop_name'];
		header('location: ../Shop/Homepage.php');
	}
	else
	{
		echo "No user Found";
	}
}
?>
?><html lang="en">
  <head>
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="txtemail" id="txtemail" type="text" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="txtpassword" id="txtpassword" type="password" placeholder="Password" />
            </div>
            <input name="btnsave" type="submit" value="Login" class="btn solid" />
            <p class="social-text">Connect with us on</p>
            <div class="social-media">
              <a href="https://www.facebook.com" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Name" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Connect with us</p>
            <div class="social-media">
              <a href="https://www.facebook.com" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
            “Life (ayu) is the combination (samyoga) of body, senses, mind, and reincarnating soul. Ayurveda is the most sacred science of life, beneficial to humans both in this world and the world beyond.”
             </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/images.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
             “The great thing about Ayurveda is that its treatments always yield side benefits, not side effects.”
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/images.svg" class="image" alt="" />
        </div>
        <p>
        
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
